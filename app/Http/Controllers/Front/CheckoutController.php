<?php

namespace App\Http\Controllers\Front;

use App\Models\OrderHistory;
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

class CheckoutController extends Controller
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

        // if(!auth()->check())
        // {
        //     return redirect()->route('login')->with(['error' => 'Login / Register in order to checkout']);
        // }

        $customer = $request->user();

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

        $statesList = array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming");


        // if($impressionKit)
        //     $view = 'front.checkout';
        // else
            $view = 'front.checkout2';

        return view($view, [
            'customer' => $customer ?: null,
            'billingAddress' => '',
            'address' => $customer ? $customer->addresses()->first() : null,
            'products' => $this->cartRepo->getCartItems(),
            'subtotal' => $this->cartRepo->getSubTotal(),
            'tax' => $this->cartRepo->getTax(),
            'total' => $this->cartRepo->getSubTotal(),
            'cartItems' => $this->cartRepo->getCartItemsTransformed(),
            'shippingFee' => $shippingFee,
            'countries' => $countries,
            'aligners' => $aligners,
            'statesList' => $statesList,
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
    public function store(CartCheckoutRequest $request)
    {
        try {
            DB::beginTransaction();
            $checkoutRepo = new CheckoutRepository;
            $orderStatusRepo = new OrderStatusRepository(new OrderStatus);
            $os = $orderStatusRepo->findByName('ordered');

            $input = $request->input();

            if(!auth()->user())
            {
                $password = uniqid();

                $customer = Customer::where('email', $request->email)->first();
                if(!$customer)
                {
                    $customer = Customer::create([
                        'dob' => date('Y-m-d', strtotime($request->dob)),
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'name' => $request->first_name . " " . $request->last_name,
                        'email' => $request->email,
                        'password' => bcrypt($password),
                        'phone' => $request->phone,
                        'billing_first_name' => $request->billing_first_name,
                        'billing_last_name' => $request->billing_last_name,
                        'billing_phone' => $request->billing_phone,
                        'email_verified_at' => now()
                    ]);

                }
                else{
                    $customer->update([
                    'dob' => date('Y-m-d', strtotime($request->dob)),
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'name' => $request->first_name . " " . $request->last_name,
                    'phone' => $request->phone,
                    'billing_first_name' => $request->billing_first_name,
                    'billing_last_name' => $request->billing_last_name,
                    'billing_phone' => $request->billing_phone,
                ]);
                }
            }else{
                $customer = auth()->user();
                $password = null;

                $customer->update([
                    'dob' => date('Y-m-d', strtotime($request->dob)),
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'name' => $request->first_name . " " . $request->last_name,
                    'phone' => $request->phone,
                    'billing_first_name' => $request->billing_first_name,
                    'billing_last_name' => $request->billing_last_name,
                    'billing_phone' => $request->billing_phone,
                ]);

            }

            $customerObj = $customer;


            if(!$customer->patient_id)
            {
                $customer->patient_id = '7695'.$customer->id.rand(11,99);
                $customer->save();
                $patient_id = $customer->patient_id;

            }else{
                $patient_id = $customer->patient_id;
            }

            $customer = $customer->id;

            $patient_history_id = null;
            if ($request->mf == 1) {
                $input['patient_id'] = $customer;
                $patient_history = PatientMedicalHistory::create($input);
                $patient_history_id = $patient_history->patient_medical_history_id;
            }

            $input['customer_id'] = $customer;
            $input['alias'] = 'Default'; //depreciated
            $address = Address::where('customer_id', $customer)->first();
            $input['same_as_shipping'] = $request->same_billing ? 1 : 0;

            if(!$address)
                $address = Address::create($input);
            else{
                $address->update([
                    'address_1' => $request->address_1,
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

            //Get order_id
            $max_order_id = Order::max('id') + 1;

            $order = $checkoutRepo->buildCheckoutItems([
                'reference' => Uuid::uuid4()->toString(),
                'courier_id' => 1, // @deprecated
                'customer_id' => $customer,
                'payment' => 'Stripe',
                'address_id' => $address->id,
                'order_status_id' => $os->id,
                'discounts' => 0,
                'total_products' => $this->cartRepo->getSubTotal(),
                // 'total' => $this->cartRepo->getTotal(2),
                'total' => $this->cartRepo->getSubTotal(),
                'total_shipping' => 0,
                'total_paid' => 0,
                'tax' => $this->cartRepo->getTax(),
                'notes' => $request->ordernote,
            ]);

            $os = $orderStatusRepo->findByName('paid');

            //Pay Now
            if($request->payment_type == 1)
            {
                $chargeCustomer = $this->attachCard($request, $customerObj);
                $order->update([
                    'order_status_id' => $os->id,
                    // 'total_paid' => $this->cartRepo->getTotal(2),
                    'total_paid' => $this->cartRepo->getSubTotal(),
                    'stripe_txn_id' => $chargeCustomer,
                    'patient_medical_history_id' => $patient_history_id,
                    'order_no' => 'SU-' . $max_order_id
                ]);
                event(new AddNotification($customer, 1, 'New order placed'));
                Cart::destroy();

                //Save Order History

                OrderHistory::create([
                    'order_id' => $order->id,
                    'status' => 'New Order',
                    'date' => date('Y-m-d H:i:s')
                ]);

                DB::commit();

                event(new OrderCreateEvent($order, $password));

                return redirect()->route('checkout.success', $order->id);

            }else{

                $order->update([
                    'order_status_id' => $os->id,
                    'order_no' => 'SU-' . $max_order_id,
                    'total_products' => 1,
                    'order_status_id' => 4 //Financing
                ]);

                //Apply for financing
                $data = array(
                    'clientId' => 'S65U0L74',
                    'patientId' => $patient_id,
                    'firstName' => $request->first_name,
                    'lastName' => $request->last_name,
                    'mobilePhoneNumber' => $request->phone,
                    'emailAddress' => $request->email,
                    'dateOfBirth' => date('m-d-Y', strtotime($request->dob)),
                    'addressLine1' => $request->address_1,
                    'city' => $request->city,
                    'state' => $request->state_code,
                    'zipCode' => $request->zip,
                    'encounters' => [
                            array(
                                'serviceDate' => date('m/d/Y'),
                                'encounterId' => 'SU-'. $max_order_id,
                                'balanceDue' => 1999
                                // 'balanceDue' => (float)$this->cartRepo->getSubTotal()
                            ),
                    ],
                    'quickPay' =>[
                        'link' => true,
                        'email' => true,
                        'integration' => [
                            'checkoutId' => 'SU-'. $max_order_id,
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

                // event(new OrderCreateEvent($order));

                if(!isset($response->paymentPlans))
                {

                    return redirect()->back()->with(['error' => $response->message])->withInput();
                }

                if(!isset($response->paymentPlans[0]->quickPay->link))
                {
                    return redirect()->back()->with(['error' => $response->paymentPlans[0]->quickPay->action])->withInput();
                }

                $redirect_link = $response->paymentPlans[0]->quickPay->link;



                Cart::destroy();
                DB::commit();
                return redirect($redirect_link);

            }
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['error' => $th->getMessage()]);
        }
    }



    public function charge($customer)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Charge::create([
                'amount' => $this->cartRepo->getSubTotal() * 100,
                'currency' => 'usd',
                'description' => "SmylUSA Checkout",
                'customer' => $customer->id,
                "card" => $customer->sources->data[0]
            ]);
            $response_array = $charge->__toArray(true);
            return $response_array['balance_transaction'];
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            throw new Exception($error);
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
            $error = $e->getMessage();
            throw new Exception($error);
        } catch(InvalidRequest $e) {
            $error = $e->getMessage();
            throw new Exception($error);

        }
    }

    protected function attachCard(Request $request, Customer $user)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        //create stripe customer
        $token = $this->getStripeToken($request);

        $customer = StripeCustomer::create([
            'name' => $user->name,
            'email' => $user->email,
            'source'  => $token
        ]);

        $user->stripe_id = $customer->id;
        $user->card_brand = $customer->sources->data[0]->brand;
        $user->card_last_four = $customer->sources->data[0]->last4;
        $user->save();

        return $this->charge($customer);
    }

    /**
     * Cancel page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cancel(Request $request)
    {
        return view('front.checkout-cancel', ['data' => $request->all()]);
    }

    /**
     * Success page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success($order_id)
    {
        try {
            $order = $this->orderRepo->findOrderById($order_id);
            return view('front.checkout-success', compact('order'));
            //code...
        } catch (\Throwable $th) {
            return redirect('/');
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
