<?php

namespace App\Models;

use App\Shop\Customers\Customer;
use Illuminate\Database\Eloquent\Model;

class CustomerImage extends Model
{
    protected $primaryKey = "customer_image_id";
    protected $fillable = [
        'customer_id',
        'image'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
