<?php
namespace App\Shop\Facility;


use App\Appointment;
use App\Shop\States\State;
use App\Shop\Facility\FacilityTimeslot;
use App\Shop\Facility\FacilityTimespan;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $primaryKey = "facility_id";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'zipcode',
        'latitude',
        'longitude',
        'state',
        'city',
        'image',
        'is_active',
        'address',
        'parking_available'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state');
    }

    public function timeslots()
    {
        return $this->hasMany(FacilityTimeslot::class, 'facility_timeslot_id');
    }
    
    public function timesspan()
    {
        return $this->hasMany(FacilityTimespan::class, 'facility_timespan_id');
    }
    
    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'facility_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
