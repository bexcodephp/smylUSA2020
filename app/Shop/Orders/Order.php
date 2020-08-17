<?php

namespace App\Shop\Orders;

use App\Models\OrderHistory;
use App\Shop\Couriers\Courier;
use App\Shop\Products\Product;
use App\Shop\Addresses\Address;
use App\Shop\Customers\Customer;
use App\Shop\Employees\Employee;
use App\Shop\Orders\OrderDetail;
use App\Models\OrderTreatmentPlan;
use App\Models\PatientMedicalHistory;
use App\Shop\OrderStatuses\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Order extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * Columns and their priority in search results.
     * Columns with higher values are more important.
     * Columns with equal values have equal importance.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'customers.name' => 10,
            'orders.reference' => 8,
            'products.name' => 5
        ],
        'joins' => [
            'customers' => ['customers.id', 'orders.customer_id'],
            'order_product' => ['orders.id', 'order_product.order_id'],
            'products' => ['products.id', 'order_product.product_id'],
        ],
        // 'groupBy' => ['orders.id', 'reference']
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'courier_id', // @deprecated
        'courier',
        'customer_id',
        'address_id',
        'order_status_id',
        'payment',
        'discounts',
        'total_products',
        'total',
        'tax',
        'total_paid',
        'invoice',
        'label_url',
        'tracking_number',
        'total_shipping',
        'notes',
        'stripe_txn_id',
        'patient_medical_history_id',
        'order_no',
        'paymentPlanId',
        'paymentTransactionId',
        'paymentPlanId',
        'patientExternalId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot([
                        'quantity',
                        'product_name',
                        'product_sku',
                        'product_description',
                        'product_price',
                        'product_attribute_id'
                    ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dentist()
    {
        return $this->belongsTo(Employee::class, 'assigned_dentist');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * @param string $term
     *
     * @return mixed
     */
    public function searchForOrder(string $term)
    {
        return self::join('customers', 'customers.customer_id', 'orders.customer_id')
        ->where('orders.id', 'like' , '%'.$term.'%' )
        ->orWhere('customers.name', 'like' , '%'. $term . '%' );
    }

    public function detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function medicalHistory()
    {
        return $this->belongsTo(PatientMedicalHistory::class, 'patient_medical_history_id');
    }

    public function scopeCustomers($query, $customer_id)
    {
        return $query->where('customer_id', $customer_id);
    }

    public function treatmentPlan()
    {
        return $this->hasOne(OrderTreatmentPlan::class, 'order_id');
    }
    public function orderHistory()
    {
        return $this->hasMany(OrderHistory::class, 'order_id');
    }
}
