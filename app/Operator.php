<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = ['fname', 'lname', 'email', 'phone', 'location_associated','home_address','status'];
}
