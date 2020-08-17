<?php

namespace App\Shop\Facility;

use App\Shop\Facility\Facility;
use App\Shop\Facility\FacilityTimeslot;
use Illuminate\Database\Eloquent\Model;

class FacilityTimeslot extends Model
{
    protected $table = "facility_timeslots";

    protected $primaryKey = "facility_timeslot_id";

    protected $fillable = [
        'facility_id',
        'weekday',
        'start_time',
        'end_time',
        'is_closed',
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
