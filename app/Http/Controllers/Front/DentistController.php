<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Events\AddNotification;
use App\Models\OrderTreatmentPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DentistController extends Controller
{

    public function profile()
    {
        $user = $this->employee();
        return view('front.dentist.profile', compact('user'));
    }

    public function newCase()
    {
        $user = $this->employee();
        
        $voodoo = OrderTreatmentPlan::with(['order' => function($query) use($user){
            $query->with(['customer']);
        }])
        ->where('order_status', 'Doctor Approval')
        ->whereIn('order_id', $user->orders()->pluck('id')->toArray())
        ->get();

        return view('front.dentist.new-case', compact('voodoo'));
    }

    public function approvedCase()
    {
        $voodoo = OrderTreatmentPlan::with(['order' => function($query){
            $query->with(['customer']);
        }])->get();

        return view('front.dentist.approved-case', compact('voodoo'));
    }

    public function rejectedCase()
    {
        $voodoo = OrderTreatmentPlan::with(['order' => function($query){
            $query->with(['customer']);
        }])->get();
        return view('front.dentist.rejected-case', compact('voodoo'));
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

        event(new AddNotification($user->id, 2, 'You have updated avatar.'));

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

        event(new AddNotification($user->id, 2, 'You have updated password.'));


        return $this->sendResponse(true, "Password updated successfully");
    }

    public function updatePersonalInfo(Request $request)
    {
        $user = $this->employee();

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'zipcode' => $request->zipcode
        ]);

        event(new AddNotification($user->id, 2, 'You have updated personal information.'));


        return $this->sendResponse(true,'Information updated');
    }
}
