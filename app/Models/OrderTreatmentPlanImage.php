<?php

namespace App\Models;

use App\Models\OrderTreatmentPlan;
use Illuminate\Database\Eloquent\Model;

class OrderTreatmentPlanImage extends Model
{
    protected $table = "order_treatment_plan_images";

    protected $primaryKey = "order_treatment_image_id";

    protected $fillable = [
        'order_treatment_id',
        'image_for',
        'image_type',
        'image'
    ];   

    public function orderTreatment()
    {
        return $this->belongsTo(OrderTreatmentPlan::class, 'order_treatment_id');
    }
    
    public $timestamps = false;
}
