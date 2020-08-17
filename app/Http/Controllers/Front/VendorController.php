<?php

namespace App\Http\Controllers\Front;

use App\Appointment;
use App\Shop\Roles\Role;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Shop\Roles\Repositories\RoleRepository;
use App\Shop\Roles\Repositories\RoleRepositoryInterface;

class VendorController extends Controller
{
  
    public function dashboard()
    {
        $fulfilled_cases = $this->getCases(true, 'FULFILLED');
        $pending_cases = $this->getCases(true, 'PENDING');
        $approved_cases = $this->getCases(true, 'APPROVED');
        $completed_cases = $this->getCases(true, 'COMPLETED');

        $notifications = Notification::where('user_type', 2)->where('user_id', $this->employee()->id)->get();


        return view('front.vendor.dashboard', compact('fulfilled_cases', 'pending_cases', 'approved_cases', 'completed_cases', 'notifications'));
    }
    
    public function profile()
    {

        $user = $this->employee();
        return view('front.vendor.profile', compact('user'));
    }

    public function newCase()
    {
        $roleRepo  = new RoleRepository(new Role);
        $dentists = $roleRepo->getUserBasedOnRole('dentist');
        $new_cases = $this->getCases(false, 'FULFILLED');

        return view('front.vendor.new-case', compact('new_cases', 'dentists'));
    }
    
    public function caseSent()
    {
        $pending_cases = $this->getCases(false, 'PENDING');
        return view('front.vendor.case-sent', compact('pending_cases'));
    }
    
    
    public function approvedCase()
    {
        $approved_cases = $this->getCases(false, 'APPROVED');
        return view('front.vendor.approved-case', compact('approved_cases'));
    }

    public function completedCase()
    {  
        $completed_cases = $this->getCases(false, 'COMPLETED');
        return view('front.vendor.completed-case', compact('completed_cases'));
    }

    public function sendCaseForApproval(Request $request)
    {
        $appointment = Appointment::findorfail($request->appointment_id);

        $appointment->dentist_id = $request->dentist_id;
        $appointment->appointment_status = "PENDING";
        $appointment->save();

        event(new AddNotification($user->id, 2, 'Case has been sent for approval'));


        return $this->sendResponse(true, "Case sent for approval");
    }
    
    public function updateCaseStatus(Request $request)
    {
        $appointment = Appointment::findorfail($request->appointment_id);
        
        if($request->appointment_status == "PENDING")
        {
            event(new AddNotification($appointment->customer_id, 1, 'Your case has been submitted to dentist for approval'));
        }

        if ($request->appointment_status == "COMPLETED") {
            event(new AddNotification($appointment->customer_id, 1, 'Your case has been completed.'));
        }


        $appointment->appointment_status = $request->appointment_status;
        $appointment->save();

        return $this->sendResponse(true, "Case status updated.");
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
        ]);

        event(new AddNotification($user->id, 2, 'You have updated personal information.'));

        return $this->sendResponse(true,'Information updated');
    }
}
