<?php

namespace App\Http\Controllers\Auth;

use App\Shop\States\State;
use Illuminate\Http\Request;
use App\Events\AddNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Shop\Admins\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/accounts';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function pharmaLoginFormShow()
    {
        return view('auth.pharma_login');
    }

    public function dentistLoginFormShow()
    {
        $states=array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming");

        return view('auth.dentist_login',compact('states'));
    }

    public function vendorLoginFormShow()
    {
        return view('auth.vendor_login');
    }

    public function login(LoginRequest $request)
    {
        dd($request);
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $details = $request->only('email', 'password');
        $details['status'] = 1;
        
        if (auth()->attempt($details)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function userLogin(LoginRequest $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $details = $request->only('email', 'password');
        // $detais['status'] = 1;
        //dd($details);
        //dd(auth()->guard('employee')->attempt($details));
        
        if (auth()->guard('employee')->attempt($details) == false) {
            $user = auth()->guard('employee')->user();
           // dd($user);

            if($user->status == 0)
            {
                auth()->logout();
                request()->session()->invalidate();

                return redirect()->back()->with(['error' => 'Your account is not approved by admin.']);
            }

            // event(new AddNotification($user->id, 2, 'Login Successful'));

            if($user->hasRole('dentist') && $request->user_type == 'dentist')
            {
                Session::put('user_type', 'dentist');
                return redirect()->route('dentist.profile');
            }
            elseif($user->hasRole('pharmacist') && $request->user_type == "pharmacist")
            {
                Session::put('user_type', 'pharmacist');
                return redirect()->route('operator.dashboard');
            }
            elseif($user->hasRole('vendor') && $request->user_type == "vendor")
            {
                Session::put('user_type', 'vendor');
                return redirect()->route('vendor.dashboard');
            }else{
                $this->logoutUser($request->user_type .'/login', "You're not " . $request->user_type );
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logoutUser($redirectPath, $message)
    {
        $this->guard('employee')->logout();
        request()->session()->invalidate();
        return $this->loggedOut(request()) ?: redirect($redirectPath)->back()->with(['error' => $message]);
    }

    //By default user guard will be used.
    protected function authenticated(Request $request, $user)
    {
        if($user->email_verified_at == null)
        {
            auth()->logout();
            request()->session()->invalidate();

            return redirect()->back()->with(['error' => 'Please verify your email.']);
        }


        if(Cart::content()->count() > 0)
        {
            return redirect()->route('checkout.index');
        }

        // event(new AddNotification($user->id, 1, 'Login Successful'));

    }
    public function patientLogin(){
        return view('front.auth.login');
    }
}
