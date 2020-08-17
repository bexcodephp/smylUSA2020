<?php

namespace App\Http\Controllers\Api;

use App\Shop\Orders\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\SendMailToAdmin;
use App\Models\CustomerImage;
use App\Events\AddNotification;
use App\Shop\Addresses\Address;
use App\Shop\Facility\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Shop\Facility\FacilityTimeslot;
use Illuminate\Support\Facades\Validator;
use App\Shop\Orders\Transformers\OrderTransformable;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;

class UserApiController extends Controller
{
    use OrderTransformable;
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;
    /**
     * AccountsController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepo = $customerRepository;
    }

    public function locations()
    {
        $facilities = Facility::Active()->get();
        
        $facilities = $facilities->transform(function($data){
            $result = $data;
            $result->timeslots = FacilityTimeslot::GetFacility($data->facility_id);
            return $result;
        });
        
        // $states = [];
        // foreach($facilities as $facilityInfo)
        // {
        //     $states[][$facilityInfo->state] = $facilityInfo; 
        // }

        return $this->sendJson(true, 'Success', [
            'facilities' => $facilities,
        ]);

    }

    public function profile()
    {
        $user = $this->apiUser();
        $customer = $this->customerRepo->findCustomerById($user->id);
        $address = Address::where('customer_id', $user->id)->latest()->first();
        $customer->city = $address ? $address->city : '';
        $customer->zip = $address ? $address->zip : '';
        $customer->state = $address ? $address->state_code : '';
        $customer->address = $address ? $address->address_1 : '';
        $customer->guide_url = "http://www.lequydonhanoi.edu.vn/upload_images/S%C3%A1ch%20ngo%E1%BA%A1i%20ng%E1%BB%AF/Rich%20Dad%20Poor%20Dad.pdf";

        $teethImages = CustomerImage::where('customer_id', $user->id)->get();

        return $this->sendJson(true, 'Success', [
            'customer' => $customer,
            'teeth_images' => $teethImages
        ]);
    }

    public function states()
    {
        $states = Facility::distinct('state')->Active()->pluck('state');
        $us_states = ["AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming"];

        $us_states_arr = [];
        foreach($us_states as $key => $state)
        {
            $us_states_arr[] = [
                'code' => $key,
                'state' => $state,
            ];
        }

        return $this->sendJson(true, 'success', [
            'location_states' => $states,
            'us_states' => $us_states_arr
        ]);
    }

    public function userOrders()
    {
        $user = $this->apiUser();
        $orders = Order::with(['orderStatus'])->where('customer_id', $user->id)->get();

        return $this->sendJson(true, 'Success', [
            'orders' => $orders
        ]);

    }

    public function updatePersonalInfo(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendJson(false, $validator->errors()->first());
        }

        $user = $this->apiUser();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'phone' => $request->phone,
            'dob' => date('Y-m-d', strtotime($request->dob)),
        ]);

        $address = Address::where('customer_id', $user->id)->first();
        if (!$address) {
            $input = $request->input();
            $input['customer_id'] = $user->id;
            Address::create($input);
        } else {
            $address->update([
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'state_code' => $request->state_code,
                'zip' => $request->zip,
                'city' => $request->city,
            ]);
        }



        event(new AddNotification($user->id, 1, 'You have updated personal information.'));

        return $this->sendJson(true,'Information updated');
    }


    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'file_type' => 'required|in:avatar,teeth_image'
        ]);   

        if($validator->fails())
        {
            return $this->sendJson(false, $validator->errors()->first());
        }

        if(!$request->hasFile('file'))
        {
            return $this->sendJson(false, 'File not found');
        }

        $user = $this->apiUser();
        if($request->file_type == "avatar")
        {
            $user->avatar = $this->saveImage($request->file('file'), 'images');
            $user->save();
            event(new AddNotification($user->id, 1, 'You have updated avatar.'));        

            $image = [
                'file' => $user->avatar,
                'file_id' => $user->id
            ];
            return $this->sendJson(true, 'success', $image);
        }

        if($request->file_type == 'teeth_image')
        {
            $teeth_image =  $this->saveImage($request->file('file'), 'images');
            $customer_image = CustomerImage::create([
                'customer_id' => $user->id,
                'image' => $teeth_image
            ]);

            event(new AddNotification($user->id, 1, 'You have uploaded teeth images.'));

            
            $image = [
                'file' => $customer_image->image,
                'file_id' => $customer_image->customer_image_id
            ];
            return $this->sendJson(true, 'success',$image);
        }

    }

    public function removeTeethImage(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'customer_image_id' => 'required|exists:customer_images',
        ]);

        if ($validator->fails()) {
            return $this->sendJson(false, $validator->errors()->first());
        }


        $teethImage = CustomerImage::find($request->customer_image_id );

        if($teethImage)
        {
            $teethImage->delete();   
            return $this->sendJson(true, 'Image removed');
        }

        return $this->sendJson(false, 'No Image found');

    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ]);   

        if($validator->fails())
        {
            return $this->sendJson(false, $validator->errors()->first());
        }

        $user = $this->apiUser();

        if(!Hash::check($request->password, $user->password))
        {
            return $this->sendJson(false, "Old Password is wrong");
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        event(new AddNotification($user->id, 1, 'You have updated password.'));

        return $this->sendJson(true, "Password updated successfully");
    }

    public function getNotifications()
    {
        $user = $this->apiUser();
        $notifications = Notification::where('user_type', 1)->where('user_id', $user->id)->latest()->get();

        return $this->sendJson(true, 'success', [
            'notifications' => $notifications
        ]);

    }

    public function smylJouryney()
    {
        $user = $this->apiUser();

        $order = Order::select('doctor_approval_visualizer_url')
        ->join('order_treatment_plan', 'order_treatment_plan.order_id', 'orders.id')
        ->where('orders.customer_id', $user->id)
        ->whereNotNull('doctor_approval_visualizer_url')
        ->latest('order_treatment_plan.created_at')
        ->first();

        $link = $order ? $order->doctor_approval_visualizer_url : '';
        return $this->sendJson(true, 'success', [
            'link' => $link
        ]);
    }

    public function contactUs(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendJson(false, $validator->errors()->first());
        }

        $user = $this->apiUser();

        Mail::to($user)->send(new SendMailToAdmin($request));
        
        return $this->sendJson(true, 'success');
    }

}
