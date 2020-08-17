<?php

namespace App;

use App\Shop\Facility\Facility;
use App\Shop\Customers\Customer;
use App\Shop\Employees\Employee;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $primaryKey = "appointment_id";

    protected $fillable = [
        'uuid',
        'appointment_id',
        'customer_id',
        'facility_id',
        'appointment_date',
        'schedule_time',
        'user_visited_facility',
        'operator_id',
        'remarks',
        'appointment_status',
        'design_approved_at',
        'scan_done_at',
        'design_send_to_vendor_at',
        'manufacturing_started_at',
        'dentist_id',
        'fulfill_date'
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function operator()
    {
        return $this->belongsTo(Employee::class, 'operator_id');
    }
    
    public function dentist()
    {
        return $this->belongsTo(Employee::class, 'dentist_id');
    }
}
