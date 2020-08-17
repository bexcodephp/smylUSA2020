<?php

namespace App\Http\Controllers\Front;

use Stripe\Token;
use Stripe\Charge;
use Stripe\Stripe;
use App\Appointment;
use Ramsey\Uuid\Uuid;
use App\Shop\Orders\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\CustomerImage;
use App\Events\AddNotification;
use App\Shop\Addresses\Address;
use App\Shop\Countries\Country;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\PatientMedicalHistory;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Checkout\CheckoutRepository;
use Illuminate\Support\Facades\Validator;
use App\Shop\OrderStatuses\Repositories\OrderStatusRepository;

class OperatorController extends Controller
{
  
    public function dashboard()
    {
        $appointments = $this->getPatientInLocations(true, 'BOOKED');
        $fulfilled_appointments = $this->getPatientInLocations(true, 'FULFILLED');

        $notifications = Notification::where('user_type', 2)->where('user_id', $this->employee()->id)->get();

        return view('front.operator.dashboard', compact('appointments', 'fulfilled_appointments', 'notifications'));
    }

    
    public function profile()
    {
        $user = $this->employee();
        return view('front.operator.profile', compact('user'));
    }

    public function updatePersonalInfo(Request $request)
    {
        $user = $this->employee();

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'zipcode' => $request->zipcode
        ]);

        event(new AddNotification($user->id, 2, 'You have updated personal information'));

        return $this->sendResponse(true,'Information updated');
    }
    
    public function newCase($appointment_id)
    {
        $appointment = Appointment::with(['customer', 'facility'])->where('uuid',$appointment_id)->firstorfail();
        $countries = Country::get();
        $customer_teeth_images = CustomerImage::where('customer_id', $appointment->customer_id)->get();
        return view('front.operator.new-case', compact('appointment', 'countries', 'customer_teeth_images'));
    }

    public function submitCase(Request $request)
    {
         try {
            DB::beginTransaction();
            $checkoutRepo = new CheckoutRepository;
            $orderStatusRepo = new OrderStatusRepository(new OrderStatus);
            $os = $orderStatusRepo->findByName('ordered');
            
            $input = $request->input();
            
        $input = $request->input();
        $appointment = Appointment::find($request->appointment_id);
        $customer = $appointment->customer_id;

        //Create customer account if not added already.
        $patient_history_id = null;
        if ($request->mf == 1) {
            $input['patient_id'] = $customer;
            $patient_history = PatientMedicalHistory::create($input);
            $patient_history_id = $patient_history->patient_medical_history_id;
        }
        
        $input['customer_id'] = $customer;
        $input['alias'] = 'Default'; //depreciated
        $address = Address::create($input);

        //Get order_id
        $max_order_id = Order::max('id') + 1;

        $order = $checkoutRepo->buildCheckoutItems([
            'reference' => Uuid::uuid4()->toString(),
            'courier_id' => 1, // @deprecated
            'customer_id' => $customer,
            'address_id' => $address->id,
            'order_status_id' => $os->id,
            'payment' => 'Stripe',
            'discounts' => 0,
            'total_products' => $this->cartRepo->getSubTotal(),
            // 'total' => $this->cartRepo->getTotal(2),
            'total' => $this->cartRepo->getSubTotal(),
            'total_shipping' => 0,
            'total_paid' => 0,
            'tax' => $this->cartRepo->getTax(),
            'notes' => $request->ordernote,
        ]);
        
        $chargeCustomer = $this->attachCard($request);
        $orderStatusRepo = new OrderStatusRepository(new OrderStatus);
        $os = $orderStatusRepo->findByName('paid');
        
        
        $order->update([
            'order_status_id' => $os->id,
            // 'total_paid' => $this->cartRepo->getTotal(2),
            'total_paid' => $this->cartRepo->getSubTotal(),
            'stripe_txn_id' => $chargeCustomer,
            'patient_medical_history_id' => $patient_history_id,
            'order_no' => 'SU-' . $max_order_id
        ]);

        event(new AddNotification($customer, 1, 'New order placed'));
    }
    
    public function patientsInLocation()
    {
        $appointments = $this->getPatientInLocations(false, 'BOOKED');
        
        return view('front.operator.patients-in-location', compact('appointments'));
    }

    private function getPatientInLocations($count = false, $status = null)
    {
        $user = $this->employee();
        $appointments = Appointment::join('facilities', 'facilities.facility_id', '=', 'appointments.facility_id')
        ->with(['customer', 'facility'])
        ->where('facilities.zipcode', $user->zipcode)
        ->whereNull('operator_id')
        ->when($status, function($query) use ($status){
            $query->where('appointment_status', $status);
        });

        if($count)
            return $appointments->count();
        return $appointments->get();

    }
    
    public function fulfilledPatients()
    {
        $user = $this->employee();

        $appointments = $this->getPatientInLocations(false, 'FULFILLED');

        return view('front.operator.fulfilled-patients', compact('appointments'));
    }
    
    public function commission()
    {   
        
        $appointments = $this->getPatientInLocations(false, 'FULFILLED');
        return view('front.operator.commission', compact('appointments'));
    }

    public function updateAvatar(Request $request)
    {
        if(!$request->file('avatar'))
        {
            return $this->sendResponse(false, "Avatar field is required");
        }
        
        $user = $this->employee();
        $user->avatar = $this->saveImage($request->file('avatar'), 'images');
        $user->save();

        event(new AddNotification($user->id, 2, 'You have updated avatar'));

        
        return $this->sendResponse(true, 'Image updated');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ]);   

        if($validator->fails())
        {
            return $this->sendResponse(false, $validator->errors()->first());
        }

        $user = $this->employee();

        if(!Hash::check($request->password, $user->password))
        {
            return $this->sendResponse(false, "Old Password is wrong");
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        event(new AddNotification($user->id, 2, 'You have updated password'));

        return $this->sendResponse(true, "Password updated successfully");
    }

    public function charge($customer)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Charge::create([
                'amount' => $this->cartRepo->getSubTotal() * 100,
                'currency' => 'usd',
                'description' => "SmylUSA Checkout",
                'customer' => $customer->id,
                "card" => $customer->sources->data[0]
            ]);
            $response_array = $charge->__toArray(true);
            return $response_array['balance_transaction'];
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }


    private function getStripeToken(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $response = Token::create(array(
                "card" => array(
                    "number"    => $request->card_number,
                    "exp_month" => $request->exp_month,
                    "exp_year"  => $request->exp_year,
                    "cvc"       => $request->cvc,
                    "name"      => $request->name_on_card
                )
            ));
            
            $response_array = $response->__toArray(true);
            //Credit card one time use token
            return $response_array['id'];

        } catch(Base $e) {
            return redirect()->back()->with(['error' => $e->getMssage()]);
        } catch(InvalidRequest $e) {
            return redirect()->back()->with(['error' => $e->getMssage()]);

        }
    }

    protected function attachCard(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        //create stripe customer
        $token = $this->getStripeToken($request);
        $user = auth()->user();

        $customer = StripeCustomer::create([
            'name' => $user->name,
            'email' => $user->email,
            'source'  => $token
        ]);

        $user->stripe_id = $customer->id;
        $user->card_brand = $customer->sources->data[0]->brand;
        $user->card_last_four = $customer->sources->data[0]->last4;
        $user->save();

        return $this->charge($customer);
    }

}
