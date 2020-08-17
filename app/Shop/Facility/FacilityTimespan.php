<?php

namespace App\Shop\Facility;

use App\Shop\Facility\Facility;
use Illuminate\Database\Eloquent\Model;

class FacilityTimespan extends Model
{

    protected $primaryKey = "facility_timespan_id";
    
    protected $fillable = [
        'facility_id',
        'timespan',
        'weekday'
    ];

    public $timestamps = false;

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
