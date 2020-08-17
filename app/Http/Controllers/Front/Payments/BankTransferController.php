<?php

namespace App\Http\Controllers\Front\Payments;

use Shippo_Shipment;
use Ramsey\Uuid\Uuid;
use Shippo_Transaction;
use Illuminate\Http\Request;
use App\Shop\Addresses\Address;
use App\Shop\Customers\Customer;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\Shipping\ShippingInterface;
use App\Shop\Checkout\CheckoutRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Shop\Orders\Repositories\OrderRepository;
use App\Shop\OrderStatuses\Repositories\OrderStatusRepository;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;

class BankTransferController extends Controller
{
    /**
     * @var CartRepositoryInterface
     */
    private $cartRepo;
    private $courierRepo;

    /**
     * @var int $shipping
     */
    private $shippingFee;

    private $rateObjectId;

    private $shipmentObjId;

    private $billingAddress;

    private $carrier;

    /**
     * BankTransferController constructor.
     *
     * @param Request $request
     * @param CartRepositoryInterface $cartRepository
     * @param ShippingInterface $shippingRepo
     */
    public function __construct(
        Request $request,
        CartRepositoryInterface $cartRepository,
        ShippingInterface $shippingRepo,
        CourierRepositoryInterface $courierRepository
    )
    {
        $this->cartRepo = $cartRepository;
        $this->courierRepo = $courierRepository;
        $fee = 0;
        $rateObjId = null;
        $shipmentObjId = null;
        $billingAddress = $request->input('billing_address');

        if ($request->has('rate')) {
            if ($request->input('rate') != '') {

                $rate_id = $request->input('rate');
                $rates = $shippingRepo->getRates($request->input('shipment_obj_id'));
                $rate = collect($rates->results)->filter(function ($rate) use ($rate_id) {
                    return $rate->object_id == $rate_id;
                })->first();

                $fee = $rate->amount;
                $rateObjId = $rate->object_id;
                $shipmentObjId = $request->input('shipment_obj_id');
                $this->carrier = $rate;
            }
        }

        $courier = $this->courierRepo->findCourierById(1);
        $shippingFee = $this->cartRepo->getShippingFee($courier);

        $this->shippingFee = $shippingFee;
        $this->rateObjectId = $rateObjId;
        $this->shipmentObjId = $shipmentObjId;
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.bank-transfer-redirect', [
            'subtotal' => $this->cartRepo->getSubTotal(),
            'shipping' => $this->shippingFee,
            'tax' => $this->cartRepo->getTax(),
            'total' => $this->cartRepo->getTotal(2, $this->shippingFee),
            'rateObjectId' => $this->rateObjectId,
            'shipmentObjId' => $this->shipmentObjId,
            'billingAddress' => $this->billingAddress
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $checkoutRepo = new CheckoutRepository;
        $orderStatusRepo = new OrderStatusRepository(new OrderStatus);
        $os = $orderStatusRepo->findByName('ordered');

        $addressData = $request->input();

        $customer = Customer::where('email', $request->email)->first();
        if(!$customer)
        {
            //Creating New Customer (26-7-19)
            $customer = Customer::create([
                'name' => $request->name,
                'cnic' => $request->cnic,
                'email' => $request->email,
                'status' => 0
            ]);
        }

        $addressData['customer_id'] = $customer->id;
        $addressData['alias'] = 'Default';
        $address = Address::create($addressData);

        $order = $checkoutRepo->buildCheckoutItems([
            'reference' => Uuid::uuid4()->toString(),
            'courier_id' => 1, // @deprecated
            'customer_id' => $customer->id,
            'address_id' => $address->id,
            'order_status_id' => $os->id,
            'payment' => 'Cash on delivery',
            'discounts' => 0,
            'total_products' => $this->cartRepo->getSubTotal(),
            'total' => $this->cartRepo->getTotal(2, $this->shippingFee),
            'total_shipping' => $this->shippingFee,
            'total_paid' => 0,
            'tax' => $this->cartRepo->getTax(),
            'notes' => $request->ordernote
        ]);

        if (env('ACTIVATE_SHIPPING') == 1) {
            $shipment = Shippo_Shipment::retrieve($this->shipmentObjId);

            $details = [
                'shipment' => [
                    'address_to' => json_decode($shipment->address_to, true),
                    'address_from' => json_decode($shipment->address_from, true),
                    'parcels' => [json_decode($shipment->parcels[0], true)]
                ],
                'carrier_account' => $this->carrier->carrier_account,
                'servicelevel_token' => $this->carrier->servicelevel->token
            ];

            $transaction = Shippo_Transaction::create($details);

            if ($transaction['status'] != 'SUCCESS'){
                Log::error($transaction['messages']);
                return redirect()->route('checkout.index')->with('error', 'There is an error in the shipment details. Check logs.');
            }

            $orderRepo = new OrderRepository($order);
            $orderRepo->updateOrder([
                'courier' => $this->carrier->provider,
                'label_url' => $transaction['label_url'],
                'tracking_number' => $transaction['tracking_number']
            ]);
        }

        Cart::destroy();

        return view('front.checkout-success', compact('order'));
    }
}