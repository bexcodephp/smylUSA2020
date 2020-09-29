<?php

namespace App\Shop\Customers;

use App\Appointment;
use App\Shop\Orders\Order;
use App\Models\CustomerImage;
use Laravel\Cashier\Billable;
use App\Shop\Addresses\Address;
use App\Models\PatientMedicalHistory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes, SearchableTrait, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'username',
        'patient_id',
        'phone',
        'email',
        'cnic',
        'password',
        'dob',
        'status',
        'gender',
        'city',
        'country_id',
        'address',
        'email_verification_code',
        'email_verified_at',
        'avatar',
        'billing_first_name',
        'billing_last_name',
        'name_on_card',
        'card_last_four',
        'card_expiry',
        'is_form_completed',
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

    protected $dates = ['deleted_at', 'dob'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'customers.name' => 10,
            'customers.email' => 5
        ]
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @param $term
     *
     * @return mixed
     */
    public function searchCustomer($term)
    {
        return self::search($term);
    }


    public function medicalHistory()
    {
        return $this->hasMany(PatientMedicalHistory::class);
    }
    
    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'customer_id');
    }
    
    public function images()
    {
        return $this->hasMany(CustomerImage::class, 'customer_id');
    }
    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
