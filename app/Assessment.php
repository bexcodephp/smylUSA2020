<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $primaryKey = "assessment_id";

    protected $fillable = [
        'worn_braces',
        'reason',
        'concern',
        'teeth_crowding',
        'teeth_spacing',
        'zip_code',
        'email'
    ];

    public function getReasonAttribute($value)
    {
        if($value == 1)
            return "I am getting married";
        if($value == 2)
            return "I am looking for or starting a new job";
        if($value == 3)
            return "I'd generally like straighter teeth";
        if ($value == 4) 
            return "I want to feel more confident";
    }

    public function getConcernAttribute($value)
    {
        if($value == 1)
            return "Fix a spacing issue";
        if($value == 2)
            return "Fix a crowding issue";
        if($value == 3)
            return "Fix a bite problem(overbite, underbite, or crossbite)";
        if ($value == 4) 
            return "Generally straighter teeth";
    }

    public function getWornBracesAttribute($value)
    {
        return ($value == 0) ? "No" : "Yes";
    }
}
