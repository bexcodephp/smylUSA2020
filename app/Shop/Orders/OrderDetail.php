<?php

namespace App\Shop\Orders;

use App\Shop\Orders\Order;
use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table ="order_product";
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
