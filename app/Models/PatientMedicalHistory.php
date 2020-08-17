<?php

namespace App\Models;

use App\Shop\Orders\Order;
use App\Shop\Customers\Customer;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalHistory extends Model
{
    protected $table = "patient_medical_history";

    protected $primaryKey = "patient_medical_history_id";

    protected $fillable = [
        'patient_id',
        'operator_id',
        'branded_retainer',
        'bridgework',
        'crowns',
        'impacted_tooth',
        'implant',
        'baby_teeth',
        'veneers',
        'teeth_radiography',
        'feel_pain',
        'sores_near_mouth',
        'injury',
        'difficulty',
        'loosening_teeth',
        'known_allergies',
        'history_of_iv_bisphosphonate',
        'acute_corticosteroids',
        'bone_marrow_transplant',
        'chief_complaint',
        'remarks',
    ];

    public function patient()
    {
        return $this->belongsTo(Customer::class, 'patient_id');
    }


    public function setBrandedRetainerAttribute($value)
    {
        $this->attributes['branded_retainer'] = strtolower($value) == "yes" ? 1 : 0;
    }
    
    public function setBridgeworkAttribute($value)
    {
        $this->attributes['bridgework'] = strtolower($value) == "yes" ? 1 : 0;
    }
    
    public function setCrownsAttribute($value)
    {
        $this->attributes['crowns'] = strtolower($value) == "yes" ? 1 : 0;
    }
    
    public function setImpactedToothAttribute($value)
    {
        $this->attributes['impacted_tooth'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setBabyTeethAttribute($value)
    {
        $this->attributes['baby_teeth'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setImplantAttribute($value)
    {
        $this->attributes['implant'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setVeneersAttribute($value)
    {
        $this->attributes['veneers'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setTeethRadiographyAttribute($value)
    {
        $this->attributes['teeth_radiography'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setFeelPainAttribute($value)
    {
        $this->attributes['feel_pain'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setSoresNearMouthAttribute($value)
    {
        $this->attributes['sores_near_mouth'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setInjuryAttribute($value)
    {
        $this->attributes['injury'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setDifficultyAttribute($value)
    {
        $this->attributes['difficulty'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setLooseningTeethAttribute($value)
    {
        $this->attributes['loosening_teeth'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setKnownAllergiesAttribute($value)
    {
        $this->attributes['known_allergies'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setHistoryOfIvBisphosphonateAttribute($value)
    {
        $this->attributes['history_of_iv_bisphosphonate'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setAcuteCorticosteroidsAttribute($value)
    {
        $this->attributes['acute_corticosteroids'] = strtolower($value) == "yes" ? 1 : 0;
    }
    public function setBoneMarrowTransplantAttribute($value)
    {
        $this->attributes['bone_marrow_transplant'] = strtolower($value) == "yes" ? 1 : 0;
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
