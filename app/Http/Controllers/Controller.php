<?php

namespace App\Http\Controllers;

use App\Appointment;
use JWTAuth;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function loggedUser()
    {
        return auth()->user();
    }
    
    
    protected function apiUser()
    {
        return auth()->guard('api')->user();
    }


    
    //Employee Guard User
    protected function employee()
    {
        return auth()->guard('employee')->user();
    }

    protected function sendResponse($status = true, $message = null, $route = null)
    {
        $messageType = $status == true ? "message" : "error";

        if($route)
            return redirect()->route($route)->with(['status' => $status, $messageType => $message]);

        return redirect()->back()->with(['status' => $status, $messageType => $message]);
    }
    
    
    protected function sendJson($status, $message = null, $data = null)
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }


    protected function getCases($count = false, $status, $operator = false, $patient = false, $dentist = false)
    {
        $appointments = Appointment::with(['customer', 'facility','dentist'])
        ->join('facilities', 'facilities.facility_id', '=', 'appointments.facility_id')
        ->when($operator, function($query){
            $employee = $this->employee();
            $query->where('facilities.zipcode', $employee->zipcode);
        })
        ->where('appointment_status', $status)
        ->when($dentist, function($query) {
            $employee = $this->employee();
            $query->where('dentist_id', $employee->id);
        });
        
        if($count)
            return $appointments->count();

        return $appointments->get();

    }

    public function saveImage(UploadedFile $file, $path)
    {
        return $file->store($path, ['disk' => 'public']);
    }

}
