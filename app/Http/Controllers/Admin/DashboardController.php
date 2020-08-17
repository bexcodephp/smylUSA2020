<?php

namespace App\Http\Controllers\Admin;

use App\Assessment;
use App\Subscriber;
use App\Appointment;
use App\Shop\Orders\Order;
use App\Shop\Facility\Facility;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::count();
        $assessments = Assessment::count();
        $appointments = Appointment::count();
        $facilities = Facility::count();
        return view('admin.dashboard', compact('orders', 'assessments', 'appointments', 'facilities'));
    }
    
    public function subscribers()
    {
        $subscribers = Subscriber::get();
        return view('admin.subscribers', compact('subscribers'));
    }
}
