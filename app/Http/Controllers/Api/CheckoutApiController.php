<?php

namespace App\Http\Controllers\Api;

use Exception;
use Stripe\Token;
use Stripe\Charge;
use Stripe\Stripe;
use Ramsey\Uuid\Uuid;
use App\Shop\Orders\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Shop\Products\Product;
use App\Events\AddNotification;
use App\Shop\Addresses\Address;
use App\Shop\Countries\Country;
use App\Events\OrderCreateEvent;
use App\Shop\Customers\Customer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientMedicalHistory;
use Stripe\Customer as StripeCustomer;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Shipping\ShippingInterface;
use App\Shop\Checkout\CheckoutRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use App\Shop\Cart\Requests\CartCheckoutRequest;
use PayPal\Exception\PayPalConnectionException;
use App\Shop\Carts\Requests\StripeExecutionRequest;
use App\Shop\PaymentMethods\Stripe\StripeRepository;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Carts\Requests\PayPalCheckoutExecutionRequest;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\OrderStatuses\Repositories\OrderStatusRepository;
use App\Shop\PaymentMethods\Paypal\Exceptions\PaypalRequestError;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\PaymentMethods\Stripe\Exceptions\StripeChargingErrorException;
use App\Shop\PaymentMethods\Paypal\Repositories\PayPalExpressCheckoutRepository;

class CheckoutApiController extends Controller
{
    use ProductTransformable;

    /**
     * @var CartRepositoryInterface
     */
    private $cartRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepo;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepo;

    /**
     * @var PayPalExpressCheckoutRepository
     */
    private $payPal;

    /**
     * @var ShippingInterface
     */
    private $shippingRepo;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        CourierRepositoryInterface $courierRepository,
        AddressRepositoryInterface $addressRepository,
        CustomerRepositoryInterface $customerRepository,
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        ShippingInterface $shipping
    ) {
        $this->cartRepo = $cartRepository;
        $this->courierRepo = $courierRepository;
        $this->addressRepo = $addressRepository;
        $this->customerRepo = $customerRepository;
        $this->productRepo = $productRepository;
        $this->orderRepo = $orderRepository;
        $this->payPal = new PayPalExpressCheckoutRepository;
        $this->shippingRepo = $shipping;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->cartRepo->getCartItems();

        if(!auth()->check())
        {
            return redirect()->route('login')->with(['error' => 'Login / Register in order to checkout']);
        }
     
        // $customer = $request->user();
        $rates = null;
        $shipment_object_id = null;

        if (env('ACTIVATE_SHIPPING') == 1) {
            $shipment = $this->createShippingProcess($customer, $products);
            if (!is_null($shipment)) {
                $shipment_object_id = $shipment->object_id;
                $rates = $shipment->rates;
            }
        }

        // Get payment gateways
        $paymentGateways = collect(explode(',', config('payees.name')))->transform(function ($name) {
            return config($name);
        })->all();


        // $billingAddress = $customer->addresses()->first();

        $courier = $this->courierRepo->findCourierById(request()->session()->get('courierId', 1));
        $shippingFee = $this->cartRepo->getShippingFee($courier);


        $countries = Country::get();
        //Check the if impression kit is in cart then show medical form as checkout page otherwise show simple checkout page
        $impressionKit = false;
        $aligners = false;

        foreach($this->cartRepo->getCartItems() as $item)
        {
            $product = Product::with(['categories'])->find($item->id);
            foreach($product->categories as $category)
            {
                if($category->label == "IK")
                    $impressionKit = true;

                if($category->label == "Aligners")
                    $aligners = true;
            }
        }
        

        if($impressionKit)
            $view = 'front.checkout';
        else 
            $view = 'front.checkout2';

        return view($view, [
            // 'customer' => $customer,
            'billingAddress' => '',
            // 'addresses' => $customer->addresses()->get(),
            'products' => $this->cartRepo->getCartItems(),
            'subtotal' => $this->cartRepo->getSubTotal(),
            'tax' => $this->cartRepo->getTax(),
            // 'total' => $this->cartRepo->getTotal(2, $shippingFee),
            'total' => $this->cartRepo->getSubTotal(),
            'payments' => $paymentGateways,
            'cartItems' => $this->cartRepo->getCartItemsTransformed(),
            'shipment_object_id' => $shipment_object_id,
            'shippingFee' => $shippingFee,
            'rates' => $rates,
            'countries' => $countries,
            'aligners' => $aligners
        ]);
    }

    /**
     * Checkout the items
     *
     * @param CartCheckoutRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Shop\Addresses\Exceptions\AddressNotFoundException
     * @throws \App\Shop\Customers\Exceptions\CustomerPaymentChargingErrorException
     * @codeCoverageIgnore
     */
    public function store(Request $request)
    {        
        
        
        try {
            
            $validator = Validator::make($request->input(), [
                'products' => 'required',
                'payment_type' => 'required',
                'mf' => 'required|boolean', //Medical Form only in case of impression kit.
                'email' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'zip' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address_1' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendJson(false, $validator->errors()->first());
            }


            if($request->payment_type == 1)
            {
                $validator = Validator::make($request->input(), [
                    'card_number' => 'required',
                    'exp_month' => 'required',
                    'exp_year' => 'required',
                    'cvc' => 'required',
                    'name_on_card' => 'required'
                ]);
            }
            if ($validator->fails()) {
                return $this->sendJson(false, $validator->errors()->first());
            }

            DB::beginTransaction();

            $orderStatusRepo = new OrderStatusRepository(new OrderStatus);
            $os = $orderStatusRepo->findByName('ordered');
            
            $input = $request->input();
            $customer = $this->apiUser()->id;

            $patient_history_id = null;
            if ($request->mf == 1) {
                $input['patient_id'] = $customer;
                $patient_history = PatientMedicalHistory::create($input);
                $patient_history_id = $patient_history->patient_medical_history_id;
            }
            
            $input['customer_id'] = $customer;
            $input['state_code'] = $request->zip;
            $input['alias'] = 'Default'; //depreciaated

            $address = Address::where('customer_id', $customer)->first();
            $input['same_as_shipping'] = $request->same_billing ? 1 : 0;

            if(!$address)
                $address = Address::create($input);
            else{
                $address->update([
                    'address_1' => $request->address_1,
                    'address_2' => $request->address_2,
                    'state_code' => $request->state_code,
                    'zip' => $request->zip,
                    'city' => $request->city,
                    'billing_address' => $request->billing_address,
                    'billing_city' => $request->billing_city,
                    'billing_state' => $request->billing_state,
                    'billing_zip' => $request->billing_zip,
                    'billing_phone' => $request->billing_phone,
                    'same_as_shipping' => $input['same_as_shipping'],
                ]);
            }
            
            
            $products = explode(',', $request->products);
            
            // \Log::debug($products);
     
            $order = Order::create([
                'reference' => Uuid::uuid4()->toString(),
                'courier_id' => 1, // @deprecated
                'customer_id' => $customer,
                'address_id' => $address->id,
                'order_status_id' => $os->id,
                'payment' => $request->payment_type == 1 ? 'Stripe' : 'Financing',
                'discounts' => 0,
                'total_products' => count($products),
                'total_shipping' => 0,
                'total_paid' => 0,
                'tax' => 0,
                'notes' => $request->ordernote,
            ]);


            $total = 0;
            
            foreach($products as $prod)
            {
                $data = explode("||", $prod);
                // $product_decode = json_encode($prod);
                $product = Product::find($data[0]);
                $order->products()->attach($product, [
                    'quantity' => $data[1],
                    'product_name' => $product->name,
                    'product_sku' => $product->sku,
                    'product_description' => $product->description,
                    'product_price' => $product->sale_price > 0 ? $product->sale_price : $product->price,
                    'product_attribute_id' => null,
                ]);
                $product->quantity = ($product->quantity- $data[1]);
                $product->save();

                $total += $product->sale_price > 0 ? $product->sale_price : $product->price;
            }

            $order->total = $total;
            $order->save();


            //Pay Now
            if($request->payment_type == 1)
            {
                $chargeCustomer = $this->attachCard($request, $order->total);
                $os = $orderStatusRepo->findByName('paid');
                $order->update([
                    'order_status_id' => $os->id,
                    // 'total_paid' => $this->cartRepo->getTotal(2),
                    'total_paid' => $total,
                    'stripe_txn_id' => $chargeCustomer,
                    'patient_medical_history_id' => $patient_history_id,
                    'order_no' => 'SU-' . $order->id
                ]);
                event(new AddNotification($customer, 1, 'New order placed'));

                event(new OrderCreateEvent($order));


                DB::commit();
                return $this->sendJson(true, 'success', [
                    'order' => $order
                ]);
            }else{
                // event(new AddNotification($customer, 1, 'New order placed'));

                //Apply for financing
                $data = array(
                    'clientId' => 'S65U0L74',
                    'patientId' => $customer,
                    'firstName' => $request->first_name,
                    'lastName' => $request->last_name,
                    'mobilePhoneNumber' => $request->phone,
                    'dateOfBirth' => date('m-d-Y', strtotime($request->dob)),
                    'emailAddress' => $request->email,
                    'addressLine1' => $request->address_1,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zipCode' => $request->zip,
                    'encounters' => [
                            array(
                                'serviceDate' => date('m/d/Y'),
                                'encounterId' => 'SU-'.$order->id,
                                'balanceDue' => 1999
                                // 'balanceDue' => (float)$order->total
                            ),
                    ],
                    'quickPay' =>[
                        'link' => true,
                        'email' => true,
                        'integration' => [
                            'checkoutId' => 'SU-'. $order->id,
                            'redirect' => true
                        ]
                    ],
                );

                
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://www2.acceleratepayments.com/api/smylusa/dos/import');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                        
                $headers = [
                    'Authorization: Basic RU5GRE1YTk1YS0ExRDFKNDpEdG1WaVR1Mk9NRmpnNE9Fa2t0YmdoVkVmNGZicnRVQw==',
                    'Cache-Control: no-cache',
                    'Content-Type: application/json'
                ];

                
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                // Receive server response ...
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
                $server_output = curl_exec($ch);
                
                curl_close($ch);

                $response = json_decode($server_output);

                DB::commit();
                
                $redirect_link = $response->paymentPlans[0]->quickPay->link;
                return $this->sendJson(true, 'success', [
                    'redirect_link' => $redirect_link
                ]);

            }
        } catch (\Exception $th) {
            DB::rollback();
            return $this->sendJson(false, $th->getMessage());
        }
    }


    
    public function charge($customer, $total_amount)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Charge::create([
                'amount' => $total_amount * 100,
                'currency' => 'usd',
                'description' => "SmylUSA Checkout",
                'customer' => $customer->id,
                "card" => $customer->sources->data[0]
            ]);
            $response_array = $charge->__toArray(true);
            return $response_array['balance_transaction'];
        } catch (\Throwable $th) {
            return $th;
        }
    }


    private function getStripeToken(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $response = Token::create(array(
                "card" => array(
                    "number"    => $request->card_number,
                    "exp_month" => $request->exp_month,
                    "exp_year"  => $request->exp_year,
                    "cvc"       => $request->cvc,
                    "name"      => $request->name_on_card
                )
            ));
            
            $response_array = $response->__toArray(true);
            //Credit card one time use token
            return $response_array['id'];

        } catch(Base $e) {
            return $e;
        } catch(InvalidRequest $e) {
            return $e;

        }
    }

    protected function attachCard(Request $request, $total_amount)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            //create stripe customer
            $token = $this->getStripeToken($request);
            $user = auth()->user();

            $customer = StripeCustomer::create([
                'name' => $user->name,
                'email' => $user->email,
                'source'  => $token
            ]);

            $user->stripe_id = $customer->id;
            $user->card_brand = $customer->sources->data[0]->brand;
            $user->card_last_four = $customer->sources->data[0]->last4;
            $user->save();

            return $this->charge($customer, $total_amount);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * @param Customer $customer
     * @param Collection $products
     *
     * @return mixed
     */
    private function createShippingProcess(Customer $customer, Collection $products)
    {
        $customerRepo = new CustomerRepository($customer);

        if ($customerRepo->findAddresses()->count() > 0 && $products->count() > 0) {

            $this->shippingRepo->setPickupAddress();
            $deliveryAddress = $customerRepo->findAddresses()->first();
            $this->shippingRepo->setDeliveryAddress($deliveryAddress);
            $this->shippingRepo->readyParcel($this->cartRepo->getCartItems());

            return $this->shippingRepo->readyShipment();
        }
    }
}
