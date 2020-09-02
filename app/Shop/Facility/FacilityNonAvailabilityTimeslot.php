<?php

namespace App\Shop\Facility;

use App\Shop\Facility\Facility;
use App\Shop\Facility\FacilityTimeslot;
use Illuminate\Database\Eloquent\Model;

class FacilityNonAvailabilityTimeslot extends Model
{
    protected $table = "facility_non_availability_timeslots";

    protected $primaryKey = "id";

    protected $fillable = [
        'date',
        'facility_id',
        'weekday',
        'start_time',
        'end_time',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }

    public function scopeGetFacility($query, $facility_id)
    {
        return $query->where('facility_id', $facility_id)->get();
    }
}
