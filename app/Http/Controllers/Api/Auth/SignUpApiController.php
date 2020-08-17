<?php
namespace App\Http\Controllers\Api\Auth;

use JWTAuth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserRegistration;
use App\Events\AddNotification;
use App\Mail\AfterRegistration;
use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SignUpApiController extends Controller {

	public function register(Request $request) {
		$validator = Validator::make($request->input(), [
			'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6',
            'phone' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendJson(false, $validator->messages()->first());
		}

		$input = $request->all();
		$input['password'] = bcrypt($request->password);
		$input['name'] = $request->first_name . " " . $request->last_name;
		$input['email_verification_code'] = Str::uuid();	

		$user = new Customer($input);
		$user->patient_id = '7695'.$user->id.rand(11, 99);

		if (!$user->save()) {
			return $this->sendJson(false,'Something Went Wrong');
		}
		
		Mail::to($user)->send(new UserRegistration($user));
        Mail::to($user)->send(new AfterRegistration($user));

        event(new AddNotification($user->id, 1, 'Account Registration'));


		$token = JWTAuth::fromUser($user);

		return $this->sendJson(true,'Please check your email',[
			'token' => $token
		]);
	}
}