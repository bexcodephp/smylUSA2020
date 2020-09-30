<?php

namespace App\Http\Controllers\Front;

use App\Shop\Faq;
use App\Assessment;
use App\Subscriber;
use App\Appointment;
use App\FaqCategory;
use Ramsey\Uuid\Uuid;
use App\Shop\Orders\Order;
use App\Traits\GetWeekday;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Shop\Products\Product;
use App\Events\AddNotification;
use App\Mail\EmailVerification;
use App\Shop\Addresses\Address;
use App\Shop\Facility\Facility;
use App\Shop\Customers\Customer;
use App\Shop\Employees\Employee;
use App\Mail\CustomerOrderShipped;
use App\Models\OrderTreatmentPlan;
use App\Http\Controllers\Controller;
use App\Mail\CompleteAssessmentForm;
use App\Mail\CustomerOrderDelivered;
use App\Mail\FillMedicalHistoryForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Shop\Facility\FacilityTimeslot;
use App\Shop\Facility\FacilityTimespan;
use Illuminate\Support\Facades\Session;
use App\Mail\OrderRequireDentalApproval;
use App\Mail\SendAppointmentNotification;
use Illuminate\Support\Facades\Validator;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class HomeController extends Controller
{
    use GetWeekday;
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with(['categories', 'images', 'brand'])->Active()->Featured()->orderBy('order_no', 'ASC')->get();
        return view('front.users.index', compact('products'));
    }

    public function about()
    {
        return view('front.users.u_aboutus');
    }

    public function faq()
    {
        $faq_categories = FaqCategory::get();

        $faqs = [];
        foreach ($faq_categories as $key => $category) {
            $faqs[$category->name] = Faq::where('faq_category_id', $category->faq_category_id)->get();
        }

        return view('front.faq', compact('faqs'));
    }

    public function locations($facility_id = null)
    {
        $states = Facility::distinct('state')->Active()->pluck('state');

        $facility = null;
        $facility_timeslots = [];
        $dates = null;
        if($facility_id){
            $facility = Facility::findorfail($facility_id);
            $facility_timeslots = FacilityTimeslot::GetFacility($facility_id);

            $dates = [];
            foreach ($facility_timeslots as $slot) {
                $dates[$this->weekday($slot->weekday, true)] = $slot->is_closed;
            }
        }

        // return view('front.locations', compact('states', 'facility', 'facility_timeslots', 'dates'));
        return view('front.users.u_locations', compact('states', 'facility', 'facility_timeslots', 'dates'));
    }

    public function getLocations(Request $request)
    {
         $facilities = Facility::Active()->where('state', $request->state)->get();
         $state = $request->state;

         $html = view('front._render_locations', compact('facilities', 'state'))->render();

         return response()->json($html);
    }

    public function getFacilityTime(Request $request)
    {
        $facility = Facility::find($request->facility_id);
        $facility_timeslots = FacilityTimeslot::GetFacility($request->facility_id);

        $dates = [];
        foreach($facility_timeslots as $slot)
        {
            $dates[$this->weekday($slot->weekday, true)] = $slot->is_closed;
        }

        $view = view('front.render_facility_dates', compact('facility', 'facility_timeslots', 'dates'))->render();

        return response()->json($view);
    }


    public function getFacilityWeekdaySpan(Request $request)
    {
        $weekday = $this->get_weekday($request->weekday);
        $spans = FacilityTimespan::where('facility_id', $request->facility_id)
        ->where('weekday', $weekday)->get();

        //Check if appointment is booked against date and facility

        $booked_appointments = Appointment::where('facility_id', $request->facility_id)->where('appointment_date', $request->weekday)->select('schedule_time')->get()->toArray();
        $bookings = [];
        foreach($booked_appointments as $booking)
        {
            $bookings[] = $booking['schedule_time'];
        }

        $facility_id = $request->facility_id;
        $view = view('front.render_facility_spans', compact('spans', 'bookings', 'facility_id'))->render();
        $form = view('front._show_form')->render();

        return response()->json([
            'form' => $form,
            'view' => $view
        ]);
    }


    public function team()
    {
        return view('front.team');
    }

    public function contactUs(Request $request)
    {
        $user = Employee::first();

        try {
            Mail::send('emails.customer.contact', ['request' => $request], function ($m) use ($user, $request) {
                $m->from($request->email, $request->name);
                $m->to($user->email, $user->name)->subject($request->subject);
            });
        } catch (\Throwable $th) {
            \Log::info($th);
        }

        return redirect()->back()->with(['message' => "Thank you for contacting us.", 'status' => '1']);
    }



    public function assessmentForm(Request $request)
    {
        Assessment::create($request->input());

        Mail::to($request->email)->send(new CompleteAssessmentForm($request->input()));
        return redirect()->route('landing-page');
    }

    public function subscribe(Request $request)
    {
        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->save();

        Session::put('subscribed', 1);

        return response()->json([
            'status' => true,
            'message' => 'Thank you for subscribing to SmylUSA'
        ]);
    }


    public function bookAppointment(Request $request)
    {
        try {
            \DB::beginTransaction();
            $customer = Customer::where('email', $request->email)->first();
            $password = null;
            if(!$customer)
            {
                $password = uniqid();
                $customer = Customer::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'name' => $request->first_name . " " . $request->last_name,
                    'email' => $request->email,
                    'password' => bcrypt($password),
                    'phone' => $request->phone,
                    'dob' => date('Y-m-d', strtotime($request->dob)),
                    'email_verified_at' => now()
                ]);

                Address::create([
                    'customer_id' => $customer->id
                ]);
            }

            if(!$customer->patient_id)
            {
                $customer->patient_id = '7695'.$customer->id.rand(11,99);
                $customer->save();
            }

            $uuid1 = Uuid::uuid1();


            $appointment = Appointment::create([
                'uuid' => $uuid1->toString(),
                'facility_id' => $request->facility_id,
                'schedule_time' => $request->timespan,
                'appointment_date' => $request->week_no,
                'customer_id' => $customer->id
            ]);


            \DB::commit();
            //Send notification to user about appointment
            Mail::to($customer->email)->send(new SendAppointmentNotification($appointment, $password));


            return redirect()->route('appointment.success', $appointment->uuid);
        //code...
        } catch (\Throwable $th) {
            \DB::rollback();
            return redirect()->back()->with(['message' => $th->getMessage()]);
        }
    }

    public function appointmentSuccess($uuid)
    {
        $appointment = Appointment::with(['facility'])->where('uuid',$uuid)->firstorfail();

        return view('front.booking-success', compact('appointment'));
    }


    public function howItWorks()
    {
        return view('front.users.u_works');
    }

    public function pricing()
    {
        $products = Product::Active()->orderBy('order_no', 'ASC')->get();
        return view('front.products.pricing', compact('products'));
    }

    public function verifyEmail(Request $request,$code)
    {
        // dd($request);

        $customer = Customer::where('email_verification_code', $code)->first();
        $customer->email_verified_at = date('Y-m-d H:i:s');
        $customer->password = Hash::make($request->password); 
        $customer->save();

        Mail::to($customer)->send(new EmailVerification($customer));
        
        return redirect('login')->with(['message' => "Email verified. Login Now", 'status' => '1']);
        

    }

    public function generate_password($code)
    {        
        return view('front.auth.resetpassword',compact('code'));
    }

    public function voodooResponse(Request $request)
    {
        $response = $request->input();

        \Log::debug($response);

        $voodoo = OrderTreatmentPlan::where('voodoo_order_id', $response['reference'])->first();

        if($voodoo)
        {
            $voodoo->order_status = $response['current_status'];

            if(isset($response['shipment']))
            {
                $voodoo->shipment_status = $response['shipment']['status'];
                $voodoo->shipment_carrier = $response['shipment']['carrier'];
                $voodoo->shipment_service = $response['shipment']['service'];
                $voodoo->shipment_tracking_code = $response['shipment']['tracking_code'];
            }

            if(isset($response['shipment']) && isset($response['shipment']['delivered_at']))
            {
                $voodoo->shipment_delivered_at = $response['shipment']['delivered_at'];
            }

            if(isset($response['doctor_approval']))
            {
                $voodoo->doctor_approval_url = $response['doctor_approval']['url'];
                $voodoo->doctor_approval_token = $response['doctor_approval']['token'];
                $voodoo->doctor_approval_visualizer_url = $response['doctor_approval']['visualizer_url'];
            }

            $voodoo->save();

            if($response['current_status'] == "Doctor Approval")
            {
                Mail::to(config('app.dentist_email'))->send(new OrderRequireDentalApproval($voodoo->order));
            }

            if($response['current_status'] == "Ready for Production")
            {
                event(new AddNotification($voodoo->order->customer_id, 1, 'Your case has been approved by dentist'));
            }

            //Send email to customer that your order has been shipped. With Shipping information
            if($response['current_status'] == "Shipped")
            {
                event(new AddNotification($voodoo->order->customer_id, 1, $voodoo->order->order_no . ' has been shipped'));
                Mail::to($voodoo->order->customer)->send(new CustomerOrderShipped($voodoo, $voodoo->order->customer));
            }

            //Send email to customer that your order has been delivered
            if($response['current_status'] == "Delivered")
            {
                event(new AddNotification($voodoo->order->customer_id, 1, $voodoo->order->order_no . ' has been delivered'));
                // Mail::to($voodoo->order->customer)->send(new CustomerOrderDelivered($voodoo->order->customer));
            }
        }

    }



    public function paymentSuccessView(Request $request)
    {
        $order = Order::with(['customer'])->where('reference', $request->token)->orWhere('order_no', $request->token)->firstorfail();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://uat.acceleratepayments.com/api/v2/payment_plans?payment_plan_id='.$order->paymentPlanId);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $headers = [
            'Authorization: Basic UFlESTg2RUk2TzFIODhBTzpiTGpwOFYxa0dSNDBxTEpLSjBVelN1QllFNXlvMThMZA==',
            'Cache-Control: no-cache',
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($server_output);


        if(isset($response))
        {

            if(isset($response[0]))
            {
                $response = $response[0];

                $order->current_balance = $response->current_balance;
                $order->number_payments = $response->number_payments;
                $order->initial_payment = $response->initial_payment;
                $order->payment_amount = $response->payment_amount;
                $order->day_of_month = $response->day_of_month;
                $order->payment_plan_status = $response->payment_plan_status;
                $order->estimate_total = $response->estimate_total;
                $order->patientId= $response->patient_id;
                $order->total_paid= $response->initial_payment;
                $order->total= $response->estimate_total;
                $order->total_products = 1;
                $order->order_status_id = 4;
                $order->payment = 'SmylUSA - Secure Portal';
                $order->save();

                //Save Order History
                //New Order status = "New Order"

                event(new AddNotification($order->customer, 1, 'New order placed'));

                OrderHistory::create([
                    'order_id' => $order->id,
                    'status' => 'New Order',
                    'date' => date('Y-m-d')
                ]);

                Mail::to($order->customer)->send(new FillMedicalHistoryForm($order, $order->customer));
            }

        }

        return view('front.payment-success', compact('order'));

    }

    public function paymentSuccess(Request $request){

        \Log::debug("Payment Success Log:");
        \Log::debug($request->input());


        $input = $request->input();

        $order = $input['encounters'][0];

        \Log::debug($order);
        $order = Order::where('order_no', $order)->first();
        $order->patientId = $input['patientId'];
        $order->paymentPlanId = $input['paymentPlanId'];
        $order->paymentTransactionId = $input['paymentTransactionId'];
        $order->patientExternalId = $input['patientExternalId'];
        $order->save();

        return response()->json([
            'redirect_uri' => 'http://smylusa.com/payment-success?token='. $order->reference
        ]);


    }
}
