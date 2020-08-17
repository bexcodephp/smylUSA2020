<?php

namespace App\Http\Controllers\Api\Auth;

use Auth;
use JWTAuth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginApiController extends Controller {
	
	public function login(Request $request, JWTAuth $JWTAuth) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required',
		]);

		if ($validator->fails()) {
			return $this->sendJson(false, $validator->messages()->first());
		}



		$credentials = $request->only(['email', 'password']);

		try {
			$token = JWTAuth::attempt($credentials);

			if (!$token) {
				
				return $this->sendJson(false, 'Invalid Credentials');
			}

		} catch (JWTException $e) {
			return $this->sendJson(false, $e->getMessage());
		}
		
		$user = Customer::where('email', $request->email)->first();

		if(!$user->email_verified_at)
		{
			return response()
                ->json([
                    'status' => false,
                    'message' => "Please confirm you email to login.",
                ]);

		}
		
		// if($user->status == 0)
		// {
		// 	return response()
        //         ->json([
        //             'status' => false,
        //             'message' => "Your account is inactive.",
        //         ]);

		// }

		return $this->sendJson(true, 'Login Success', ['token' => $token,'user' => $user]);
	}

	public function me()
	{
		$user = $this->apiUser();

		return $this->sendJson(true, 'Success', ['user' => $user]);
	}
}
