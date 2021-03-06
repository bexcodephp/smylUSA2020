<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserRegistration;
use App\Events\AddNotification;
use App\Mail\AfterRegistration;
use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Shop\Customers\Requests\RegisterCustomerRequest;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/accounts';

    private $customerRepo;

    /**
     * Create a new controller instance.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->middleware('guest');
        $this->customerRepo = $customerRepository;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    {        
        return $this->customerRepo->createCustomer($data);
    }

    /**
     * @param RegisterCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {  

        $validator = Validator::make($request->input(), [
            'email' => 'required|string|email|max:255|unique:customers,email',
        ]);
      
        if($validator->fails())
        {
            return $this->sendResponse(false, $validator->errors()->first());
        }

        $customer = $this->create($request->except('_method', '_token'));
        $userId = $customer->id;
        $userdata = Customer::find($userId);
        Mail::to($customer)->send(new UserRegistration($customer));
        Mail::to($customer)->send(new AfterRegistration($customer));
        event(new AddNotification($customer->id, 1, 'Account Registration'));
        return view('front.auth.thankyou');
        //return view('front.patient.loginform',compact('userdata'))->with(['message' => 'Verify your email address to continue', 'status' => 0]);
    }
}
