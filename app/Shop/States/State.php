<?php

namespace App\Shop\States;

use App\Shop\Countries\Country;
use App\Shop\Facility\Facility;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $fillable = [
        'state',
        'state_code'
    ];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}