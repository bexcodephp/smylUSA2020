<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    public $table = "order_history";

    protected $fillable = [
        'order_id',
        'status',
        'date'
    ];

    protected $dates = ['date'];
    public function order(){
        return $this->belongsTo('App/Order');
    }
}
