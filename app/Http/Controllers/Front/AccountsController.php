<?php

namespace App\Http\Controllers\Front;

use App\Shop\Orders\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\CustomerImage;
use App\Shop\Products\Product;
use App\Events\AddNotification;
use App\Shop\Addresses\Address;
use App\Shop\Customers\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\PatientMedicalHistory;
use Illuminate\Support\Facades\Validator;
use App\Shop\Orders\Transformers\OrderTransformable;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Input;
use App\Shop\Admins\Requests\UpdateAddressRequest;
use Illuminate\Support\Facades\Storage;

class AccountsController extends Controller
{
    use OrderTransformable;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;
    private $orderRepo;

    /**
     * AccountsController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CourierRepositoryInterface $courierRepository,
        CustomerRepositoryInterface $customerRepository,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->customerRepo = $customerRepository;
        $this->courierRepo = $courierRepository;
        $this->orderRepo = $orderRepository;
    }

    public function index()
    {
        return view('front.patient.loginform');
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerRepo = new CustomerRepository($customer);
        $orders = $customerRepo->findOrders(['*'], 'created_at');

        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

        $addresses = $customerRepo->findAddresses();

        $notifications = Notification::where('user_type', 1)->where('user_id', $customer->id)->latest()->get();

        $medical_form = true;
        if (PatientMedicalHistory::where('patient_id', $customer->id)->count() > 0) {
            $medical_form = false;
        }


        $products = Product::whereStatus(1)->orderBy('order_no', 'ASC')->get();

        return view('front.users.index', [
            'customer' => $customer,
            'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
            'addresses' => $addresses,
            'notifications' => $notifications,
            'medical_form' => $medical_form,
            'products' => $products
        ]);
    }

    public function medicalForm($order_ref = null)
    {
        if($order_ref)
        {
            $order = Order::with(['detail', 'customer'])->where('reference', $order_ref)->firstorfail();
            $history = PatientMedicalHistory::where('patient_id', $order->customer_id)->first();
            $address = $order->customer->addresses()->first();   
        }else{
            $address = auth()->user()->addresses()->first();   
            $history = null;
            $order = null;
        }
        $customer = auth()->user();
        $answers = DB::table('medical_form_question')
            ->where('customer_id', $customer->id)
            ->first();
        $teethImages = CustomerImage::where('customer_id', $customer->id)->get();
        $statesList = array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming");

        if($address == null)
        {
            $address = "";   
        }

        return view('front.patient.loginform', compact('order', 'address', 'history', 'customer', 'statesList','teethImages','answers'));

     //return view('front.medical_form', compact('order', 'address', 'history', 'customer','teethImages'));
    }

    public function submitMedicalForm(Request $request)
    {  
        try {
            DB::beginTransaction();
            $customer = auth()->user();
            if(PatientMedicalHistory::where('patient_id', $customer->id)->count() > 0)
            {
                return redirect()->back()->with(['error' => 'You\'ve already submitted the form.']);
            }
            
            $input = $request->input();
            //$input['patient_id'] = $customer->id;
            $state_code = ""; // need to add state code e.g. FL
            $input['patient_id'] = "ST".date('y-m-d').$state_code.$customer->id; // patient Id format e.g. ST200902FL24
            PatientMedicalHistory::create($input);           
            
            $customer->update([
                'dob' => date('Y-m-d', strtotime($request->dob)),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name . " " . $request->last_name,
                'phone' => $request->phone,
                'gender' => $request->gender,
            ]);

            DB::commit();
            return redirect()->route('orders')->with(['message' => 'Thank you for submitting information.']);
            //code...
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['message' => $th->getMessage()]);

        }

    }
    
    
    public function profile()
    {
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerRepo = new CustomerRepository($customer);

        $addresses = $customerRepo->findAddresses()->first();

        $user = $this->loggedUser();

        $teethImages = CustomerImage::where('customer_id', $user->id)->get();

        $answers = DB::table('medical_form_question')
            ->where('customer_id', $customer->id)
            ->first();

        $statesList = array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming");

        // echo "<pre>";
        // print_r($user);
        // exit();

        return view('front.dashboard.patientProfile', [
            'customer' => $customer,
            'address' => $addresses,
            'user' => $user,
            'teeth_images' => $teethImages,
            'statesList' => $statesList,
            'answers' => $answers
        ]);
    }

    public function resources()
    {
        $notifications = Notification::where('user_type', 1)->where('user_id', auth()->user()->id)->latest()->get();
        $resources = DB::table('table_resources')->get();
        return view('front.dashboard.patientResources', compact('notifications','resources'));

        // return view('front.user.resources', compact('notifications'));
    }
    
    
    public function orders()
    {
        $orders = $this->orderRepo->getCustomerOrders(auth()->user()->id);
        $products = Product::whereStatus(1)->orderBy('order_no', 'ASC')->get();
        return view('front.dashboard.patientMyOrders', compact('orders', 'products'));
    }

    public function updateUserInfoStep2(Request $request)
    {
        $user = $this->loggedUser();
        $data = DB::table('medical_form_question')
            ->where('customer_id', $user->id)
            ->first();

        if(isset($data->customer_id)) {
            DB::table('medical_form_question')->where('customer_id','=',$user->id)->update([
                'customer_id'   =>  $user->id,
                'question1'      => $request->ans1,
                'question2'      => $request->ans2,
                'question3'      => $request->ans3,
                'question4'      => $request->ans4,
                'question5'      => $request->ans5,
                'question6'      => $request->ans6,
                'question7'      => $request->ans7,
                'question8'      => $request->ans8,
                'question9'      => $request->ans9,
                'question10'      => $request->ans10,
                'question11'      => $request->ans11,
                'question12'      => $request->ans12,
                'question13'      => $request->ans13,
                'question14'      => $request->ans14,
                'question15'      => $request->ans15,
                'question16'      => $request->ans16,
                'question17'      => $request->ans17,
                'question18'      => $request->ans18,
                'question19'      => $request->ans19,
            ]);
        }else {
            DB::table('medical_form_question')->insert([
                'customer_id'   =>  $user->id,
                'question1'      => $request->ans1,
                'question2'      => $request->ans2,
                'question3'      => $request->ans3,
                'question4'      => $request->ans4,
                'question5'      => $request->ans5,
                'question6'      => $request->ans6,
                'question7'      => $request->ans7,
                'question8'      => $request->ans8,
                'question9'      => $request->ans9,
                'question10'      => $request->ans10,
                'question11'      => $request->ans11,
                'question12'      => $request->ans12,
                'question13'      => $request->ans13,
                'question14'      => $request->ans14,
                'question15'      => $request->ans15,
                'question16'      => $request->ans16,
                'question17'      => $request->ans17,
                'question18'      => $request->ans18,
                'question19'      => $request->ans19,
            ]);
        }
        return 200;
    }
    
    
    public function ordersShow($reference)
    {
        return $order = $this->orderRepo->getOrderDetail('reference', $reference);
        // return view('front.user.order_detail', compact('order'));
    }
    
    
    public function calendar()
    {       
        return view('front.user.calendar');
    }

    public function update(Request $request)
    {
      
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerData = [];
        $customerData = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if($request->new_password)
        {
            if(!Hash::check($request->new_password, auth()->user()->password)){
                return redirect()->back()->with(['message' => "Your current password is wrong", 'status' => 0]);
            }        
        
            if($request->new_password != $request->new_password_confirmation)
            {
                return redirect()->back()->with(['message' => "New Password do not match new confirm password", 'status' => 0]);
            }
            $customerData['password'] = $request->new_password;
        }

        $customer->update($customerData);

        return redirect()->back()-with(['message' => "Information updated.", 'status' => 1]);
    }

    public function updatePersonalInfo(Request $request)
    {
        $user = $this->loggedUser();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'phone' => $request->phone,
            'dob' => date('Y-m-d', strtotime($request->dob)),
        ]);

        event(new AddNotification($user->id, 1, 'You have updated personal information.'));

        return $this->sendResponse(true,'Information updated');
    }
    
    public function updateAddressInfo(Request $request)
    {
        $user = $this->loggedUser();
        $address = Address::where('customer_id', $user->id)->first();
        if(!$address){
            $input = $request->input();
            $input['customer_id'] = $user->id;
            Address::create($input);
        }else{
            $address->update([
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'state_code' => $request->state_code,
                'zip' => $request->zip,
                'city' => $request->city,
            ]);
        }        

        event(new AddNotification($user->id, 1, 'You have updated address information.'));

        return $this->sendResponse(true,'Information updated');
    
    }

    //My profile billing address update
    public function updateBillingInfo(Request $request)
    {
        $user = $this->loggedUser();
        $address = Address::where('customer_id', $user->id)->first();
        if(!$address){
            $input['customer_id'] = $user->id;
            Address::create($input);
        }else{
            $address->update([
                'billing_address_1' => $request->billing_address_1,
                'billing_address_2' => $request->billing_address_2,
                'billing_state' => $request->billing_state,
                'billing_zip' => $request->billing_zip,
                'billing_city' => $request->billing_city,
            ]);
        }        

        event(new AddNotification($user->id, 1, 'You have updated address information.'));

        return $this->sendResponse(true,'Information updated');
    
    }

    // this is step 1 for patient info
    public function updateUserInfoStep1(Request $request)
    {
        $user = $this->loggedUser();
        $customer = auth()->user();
        $customer_id = $user->id;
        $state_code = "";
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'phone' => $request->phone,
            'dob' => date('Y-m-d', strtotime($request->dob)),
            'patient_id' => "ST".date('ymd').$state_code.$customer->id,
        ]);
        $address = Address::where('customer_id', $user->id)->first();
        if(!$address){
            $input = $request->input();
            $input['customer_id'] = $user->id;
            Address::create($input);
        }else{
            $address->update([
                'billing_address_1' => $request->billing_address_1,
                'billing_address_2' => $request->billing_address_2,
                'billing_state' => $request->billing_state,
                'billing_zip' => $request->billing_zip,
                'billing_city' => $request->billing_city,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'state_code' => $request->state_code,
                'zip' => $request->zip,
                'city' => $request->city,
                'same_as_shipping' =>$request->same_as_shipping,
            ]);
        }
        return "success";
    }


    public function updateAvatar(Request $request)
    {
        if(!$request->file('avatar'))
        {
            return $this->sendResponse(false, "Avatar field is required");
        }

        $user = $this->loggedUser();
        $user->avatar = $this->saveImage($request->file('avatar'), 'images');
        $user->save();

        event(new AddNotification($user->id, 1, 'You have updated avatar.'));        
        return $this->sendResponse(true, 'Image updated');
    }
    
    public function addTeethImages(Request $request)
    {
        $description = $request->description;
            if($request->file('image') == 0)
            {
                return $this->sendResponse(false, "Teeth Images are required");
            }

            $user = $this->loggedUser();
           
            CustomerImage::create([
                'customer_id' => $user->id,
                'image' => $this->saveImage($request->file('image'), 'images'),
                'description' => $description
            ]);
    
        event(new AddNotification($user->id, 1, 'You have uploaded teeth images.'));        
        return $this->sendResponse(true, 'Image uplaoded');
    }

    public function editTeethImages(Request $request)
    {
        $customers = CustomerImage::find($request->doc_id_name);
            if(empty($customers ) && $customers ->count() == 0){
                return $this->sendResponse(false, "Teeth Images are required");
            }
            //Merge new data from request
            $updateArray = $request->all();
            if(!empty($updateArray['image'])){
              $path = $this->saveImage($request->file('image'),'images');
              $updateArray['image'] = $path;
            }
            $customers->fill($updateArray);
           
            if($customers->save()){
                event(new AddNotification($customers, 1, 'You have uploaded teeth images.'));        
                return $this->sendResponse(true, 'Image uplaoded');
            } else{
                return $this->sendResponse(false, "Teeth Images are required");
            }
    }

    public function removeTeethImage($image)
    {
        $teethImage = CustomerImage::find($image);
        $teethImage->delete();
        return $this->sendResponse(true, 'Image removed');
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

        $user = $this->loggedUser();

        if(!Hash::check($request->password, $user->password))
        {
            return $this->sendResponse(false, "Old Password is wrong");
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        event(new AddNotification($user->id, 1, 'You have updated password.'));

        return $this->sendResponse(true, "Password updated successfully");
    }

    public function patientPicture($order_ref = null)
    {
        if($order_ref)
        {
            $order = Order::with(['detail', 'customer'])->where('reference', $order_ref)->firstorfail();
            $history = PatientMedicalHistory::where('patient_id', $order->customer_id)->first();
            $address = $order->customer->addresses()->first();   
        }else{
            $address = auth()->user()->addresses()->first();   
            $history = null;
            $order = null;
        }
        $customer = auth()->user();
        $teethImages = CustomerImage::where('customer_id', $customer->id)->get();
        $statesList = array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming");


        return view('front.dashboard.patientPicture', compact('order', 'address', 'history', 'customer', 'statesList','teethImages'));
    }
    public function updateProfilePicture(Request $request)
    {
        if(!$request->file('avatar'))
        {
            return $this->sendResponse(false, "Avatar field is required");
        }
        $user = $this->loggedUser();
            //Merge new data from request
            $updateArray = $request->all();
            if(!empty($updateArray['avatar'])){
              $path = $this->saveImage($request->file('avatar'),'images');
              $updateArray['avatar'] = $path;
            }
            $user->fill($updateArray);
           
            if($user->save()){
                event(new AddNotification($user->id, 1, 'You have updated avatar.'));        
                return $this->sendResponse(true, 'Image uplaoded');
            } else{
                return $this->sendResponse(false, "Avatar Images are required");
            }
        }

    public function removeProfileImage($image)
    {
        $teethImage = DB::table('customers')->where('id', $image)->update(['avatar' => '']);
        // $teethImage = CustomerImage::find($image);

        // $teethImage->delete();

        return $this->sendResponse(true, 'Image removed');
    }

    public function updateCard(Request $request)
    {
        $user = $this->loggedUser();
        $user->update([
            'name_on_card' => $request->name_on_card,
            'card_last_four' => $request->card_last_four,
            'card_expiry' => $request->inputExpDate,
        ]);

        event(new AddNotification($user->id, 1, 'You have updated card information.'));

        return $this->sendResponse(true,'Information updated');
    }

    public function AddCard(Request $request)
    {
        $user = $this->loggedUser();

        $user->update([
            'name_on_card' => $request->add_name_on_card,
            'card_last_four' => $request->add_card_last_four,
            'card_expiry' => $request->inputExpDate,
        ]);
        dd($user);

        event(new AddNotification($user->id, 1, 'You have updated card information.'));

        return $this->sendResponse(true,'Information updated');
    }
    
    public function dashboard(Request $request)
    {       
        return view('front.dashboard.patientDashboard');

    }
    public function getPicturesImage()
    {
        $user = $this->loggedUser();

        $teethImages = CustomerImage::where('customer_id', $user->id)->get();

        return json_encode($teethImages);

    }
}
