<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatorLocation extends Model
{
    protected $fillable = ['id', 'operator_id', 'location', 'state', 'city','zipcode'];
}
