<?php

namespace App\Http\Controllers\Admin;

use App\Assessment;
use App\Http\Controllers\Controller;

class UserAssessmentController extends Controller
{
    public function index()
    {
        $user_assessments = Assessment::get();
        return view('admin.user_assessment.index', compact('user_assessments'));
    }
    
}
