<?php

namespace App\Http\Controllers\Api;

use App\Appointment;
use Ramsey\Uuid\Uuid;
use App\Traits\GetWeekday;
use Illuminate\Http\Request;
use App\Shop\Facility\Facility;
use App\Http\Controllers\Controller;
use App\Shop\Facility\FacilityTimeslot;
use App\Shop\Facility\FacilityTimespan;
use Illuminate\Support\Facades\Validator;

class AppointmentApiController extends Controller
{
    use GetWeekday;

    public function getFacilities()
    {
        $facilities = Facility::active()->get();

        $facilities = $facilities->transform(function($data){
            $result = $data;
            $result->timeslots = FacilityTimeslot::GetFacility($data->facility_id);
            return $result;
        });

        return $this->sendJson(true, 'success', $facilities);
    }


    public function getFacilityTime(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'facility_id' => 'required|exists:facilities,facility_id'
        ]);
        if($validator->fails())
        {
            return $this->sendJson(false, $validator->errors()->first());
        }
        
        $facility_timeslots = FacilityTimeslot::GetFacility($request->facility_id);

        return $this->sendJson(true, 'success', [
            'facility_timeslots' => $facility_timeslots
        ]);
    }
    

    public function getFacilityWeekdaySpan(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'facility_id' => 'required|exists:facilities,facility_id',
            'weekday' => 'required'
        ]);
        if($validator->fails())
        {
            return $this->sendJson(false, $validator->errors()->first());
        }

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

        return $this->sendJson(true, 'success', [
            'spans' => $spans,
            'bookings' => $bookings
        ]);
    }

    public function bookAppointment(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'facility_id' => 'required|exists:facilities,facility_id',
            'timespan' => 'required',
            'weekday' => 'required'
        ]);
        if($validator->fails())
        {
            return $this->sendJson(false, $validator->errors()->first());
        }


        $customer = $this->apiUser();

        //Check if user has booked appointment already or not.
        $check = Appointment::where('facility_id', $request->facility_id)->where('schedule_time', $request->timespan)
        ->where('appointment_date', $request->weekday)->count();

        if($check > 0)
        {
            return $this->sendJson(false, 'Appointment is already booked');
        }

        $uuid1 = Uuid::uuid1();

        $appointment = Appointment::create([
            'uuid' => $uuid1->toString(),
            'facility_id' => $request->facility_id,
            'schedule_time' => $request->timespan,
            'appointment_date' => $request->weekday,
            'customer_id' => $customer->id
        ]);

        return $this->sendJson(true, 'success',$appointment);
    }
}
