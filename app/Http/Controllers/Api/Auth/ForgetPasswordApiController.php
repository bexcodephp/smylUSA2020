<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ForgetPasswordNotification;

class ForgetPasswordApiController extends Controller
{
    public function forgot_password(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'email' => "required|email|exists:customers",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return $this->sendJson(false, $validator->errors()->first());
        }
        $user = Customer::where('email', $request->email)->first();


        $user->password_reset_code = random_int(111111,999999);
        $user->save();
        $user->notify(new ForgetPasswordNotification());
        return $this->sendJson(true, "Reset code sent to your email");

        return \Response::json($arr);
    }

    public function change_password(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'reset_code' => 'required|exists:customers,password_reset_code',
            'new_password' => 'required|min:6|confirmed',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => false, "message" => $validator->errors()->first(), "data" => array());
        }         
        $user = Customer::where('password_reset_code', $request->reset_code)->first();
        $user->password = bcrypt($request->new_password);
        $user->password_reset_code = null;
        $user->save();
        
        return $this->sendJson(true, 'Password updated');
    }
}
