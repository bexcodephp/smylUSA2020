<?php

namespace App\Models;

use App\Shop\Orders\Order;
use App\Models\OrderTreatmentPlanImage;
use Illuminate\Database\Eloquent\Model;

class OrderTreatmentPlan extends Model
{
    protected $table = "order_treatment_plan";
    protected $primaryKey = "order_treatment_plan_id";
    protected $fillable = [
        'order_id',
        'voodoo_order_id',
        'doctor',
        'notes',
        'order_type',
        'is_impression',
        'arches',
        'treatment_notes',
        'rx_form',
        'voodoo_order_id',
        'order_status',
        'shipment_carrier',
        'shipment_service',
        'shipment_status',
        'shipment_tracking_code',
        'shipment_delivered_at',
        'order_created_at',
        'order_ship_by'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function images()
    {
        return $this->hasMany(OrderTreatmentPlanImage::class, 'order_treatment_plan_id');
    }
}
