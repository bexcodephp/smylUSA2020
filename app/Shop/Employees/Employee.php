<?php

namespace App\Shop\Employees;

use App\Appointment;
use App\Shop\Orders\Order;
use App\Shop\Employees\Employee;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable, SoftDeletes, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'location_associated',
        'home_address',
        //'operator_certificates',
        'password',
        'status',
        'state',
        'zipcode',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'operator_id');
    }


    public function cases()
    {
        return $this->hasMany(Appointment::class, 'dentist_id');
    }
    
    
    public function orders()
    {
        return $this->hasMany(Order::class, 'assigned_dentist');
    }
}
