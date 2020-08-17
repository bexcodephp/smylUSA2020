<?php

namespace App\Http\Controllers\Admin\Orders;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Shop\Orders\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Shop\Couriers\Courier;
use GuzzleHttp\RequestOptions;
use App\Shop\Customers\Customer;
use App\Shop\Employees\Employee;
use App\Mail\AssignOrderToDentist;
use App\Models\OrderTreatmentPlan;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\OrderTreatmentPlanImage;
use App\Shop\OrderStatuses\OrderStatus;
use Illuminate\Support\Facades\Validator;
use App\Shop\Orders\Repositories\OrderRepository;
use App\Mail\sendOrderShipEmailToCustomerMailable;
use App\Shop\Couriers\Repositories\CourierRepository;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Addresses\Transformations\AddressTransformable;
use App\Shop\OrderStatuses\Repositories\OrderStatusRepository;
use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\OrderStatuses\Repositories\Interfaces\OrderStatusRepositoryInterface;

class OrderController extends Controller
{
    use AddressTransformable;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepo;

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
    private $productRepository;

    /**
     * @var OrderStatusRepositoryInterface
     */
    private $orderStatusRepo;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        CourierRepositoryInterface $courierRepository,
        AddressRepositoryInterface $addressRepository,
        CustomerRepositoryInterface $customerRepository,
        OrderStatusRepositoryInterface $orderStatusRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->orderRepo = $orderRepository;
        $this->courierRepo = $courierRepository;
        $this->addressRepo = $addressRepository;
        $this->customerRepo = $customerRepository;
        $this->orderStatusRepo = $orderStatusRepository;
        $this->productRepository = $productRepository;

        $this->middleware(['permission:update-order, guard:employee'], ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->orderRepo->listOrders('created_at', 'desc');

        if (request()->has('q')) {
            $list = $this->orderRepo->searchOrder(request()->input('q') ?? '');
        }

        $orders = $this->orderRepo->paginateArrayResults($this->transFormOrder($list), 10);

        return view('admin.orders.list', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $orderId
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        $order = $this->orderRepo->findOrderById($orderId);
        $order->courier = $this->courierRepo->findCourierById($order->courier_id);
        $order->address = $this->addressRepo->findAddressById($order->address_id);

        $orderRepo = new OrderRepository($order);

        $items = $orderRepo->listOrderedProducts();

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, env('VOODOO_PATH')."/orders?internal_id=".$orderId);
        // // $headers = [
        // //     'API-Key: pk_prod_OMiAhIXMq3xwpyaxViwaWCnk6LTrVMcZ',
        // //     'API-Secret: sk_prod_RakulAlcv3w3eTJpqj2UClHL18onswbE'
        // // ];
        // $headers = [
        //     'API-Key: pk_test_OzCDkLC5VS6ulNLAWYkFjbzbf6H3fJeg',
        //     'API-Secret: sk_test_HHbQOMl748mOsZ4b1cJqFLfLcZ7xn6YA'
        // ];
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // // Receive server response ...
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $output = curl_exec($ch);

        // curl_close ($ch);

        // $response = json_decode($output);

        return view('admin.orders.show', [
            'order' => $order,
            'statuses' => $this->orderStatusRepo->listOrderStatuses(),
            'items' => $items,
            'customer' => $this->customerRepo->findCustomerById($order->customer_id),
            'currentStatus' => $this->orderStatusRepo->findOrderStatusById($order->order_status_id),
            'payment' => $order->payment,
            'user' => auth()->guard('employee')->user()
        ]);
    }

    /**
     * @param $orderId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($orderId)
    {
        $order = $this->orderRepo->findOrderById($orderId);
        $order->courier = $this->courierRepo->findCourierById($order->courier_id);
        $order->address = $this->addressRepo->findAddressById($order->address_id);

        $orderRepo = new OrderRepository($order);

        $items = $orderRepo->listOrderedProducts();

        return view('admin.orders.edit', [
            'statuses' => $this->orderStatusRepo->listOrderStatuses(),
            'order' => $order,
            'items' => $items,
            'customer' => $this->customerRepo->findCustomerById($order->customer_id),
            'currentStatus' => $this->orderStatusRepo->findOrderStatusById($order->order_status_id),
            'payment' => $order->payment,
            'user' => auth()->guard('employee')->user()
        ]);
    }

    /**
     * @param Request $request
     * @param $orderId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $orderId)
    {
        $order = $this->orderRepo->findOrderById($orderId);

        $orderRepo = new OrderRepository($order);

        if ($request->has('total_paid') && $request->input('total_paid') != null) {
            $orderData = $request->except('_method', '_token');
        } else {
            $orderData = $request->except('_method', '_token', 'total_paid');
        }

        if($request->has('order_status_id') && $request->order_status_id == 4) //Shipped
        {
            Mail::to($order->customer)->send(new sendOrderShipEmailToCustomerMailable($order));
        }
        $orderRepo->updateOrder($orderData);

        return redirect()->route('admin.orders.edit', $orderId);
    }

    /**
     * Generate order invoice
     *
     * @param int $id
     * @return mixed
     */
    public function generateInvoice(int $id)
    {
        $order = $this->orderRepo->findOrderById($id);


        $data = [
            'order' => $order,
            'detail' => $order->detail,
            'products' => $order->products,
            'customer' => $order->customer,
            'courier' => $order->courier,
            'address' => $this->transformAddress($order->address),
            'status' => $order->orderStatus,
            'payment' => $order->paymentMethod
        ];

        return view('emails.admin.OrderNotificationEmail', $data);

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('invoices.orders', $data)->stream();
        return $pdf->stream();
    }

    /**
     * @param Collection $list
     * @return array
     */
    private function transFormOrder(Collection $list)
    {
        $courierRepo = new CourierRepository(new Courier());
        $customerRepo = new CustomerRepository(new Customer());
        $orderStatusRepo = new OrderStatusRepository(new OrderStatus());

        return $list->transform(function (Order $order) use ($courierRepo, $customerRepo, $orderStatusRepo) {
            $order->courier = $courierRepo->findCourierById($order->courier_id);
            $order->customer = $customerRepo->findCustomerById($order->customer_id);
            $order->status = $orderStatusRepo->findOrderStatusById($order->order_status_id);
            return $order;
        })->all();
    }

    public function destroy($id)
    {
        $order= Order::find($id);
        $order->detail()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index')->with(['message' => 'Order deleted']);
    }

    public function voodoo()
    {
        $voodoo = OrderTreatmentPlan::with(['order' => function ($query) {
            $query->with(['customer','orderHistory', 'dentist']);
        }])
        ->latest()
        ->get();
//        return $voodoo;
        $doctors=Employee::all();
        $states= array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming");


        return view('admin.orders.voodoo', compact('voodoo','states'));
    }
    public function StateDentist(Request $request){
        $dentists=Employee::where('state',$request->state)->where('status', 1)->get();
        $html=view('admin.orders.dentists',compact('dentists'))->render();
        return $html;
    }
    public function assignedTo(Request $request){
//        return $request;
        $order=Order::where('id',$request->order_id)->first();
        $order->assigned_dentist=$request->dentist;
        $order->save();

        $dentist = Employee::find($request->dentist);

        Mail::to($dentist)->send(new AssignOrderToDentist($order));

        return redirect()->back()->with(['message' => 'Dentist assigned']);

    }

    public function voodooApi(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'order_type' => 'required',
            'patient_name' => 'required',
            'internal_id' => 'required',
            'shipping_name' => 'required',
            'shipping_street1' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with(['message' => $validator->errors()->first(), 'status' => 0]);
        }

        @ini_set('upload_max_size' , '256M');
        // @ini_set('upload_max_size' , '256M');

        $order = Order::find($request->order_id);
        $patient_photos = [];
        $storagePath = asset('storage/') . '/';

        if($request->TreatmentPlan_patient_photos)
        {
            foreach($request->TreatmentPlan_patient_photos as $photo)
            {
                $patient_photos[] = $storagePath . $photo->storeAs('photos', uniqid() .'.'. $photo->getClientOriginalExtension(), ['disk' => 'public']);
            }
        }

        if($request->scan_patient_photos)
        {
            foreach($request->scan_patient_photos as $photo)
            {
                $patient_photos[] = $storagePath . $photo->storeAs('photos', uniqid() .'.'. $photo->getClientOriginalExtension(), ['disk' => 'public']);
            }
        }

        $xrays = [];
        if($request->TreatmentPlan_xrays)
        {
            foreach ($request->TreatmentPlan_xrays as $photo) {
                $xrays[] = $storagePath . $photo->storeAs('photos', uniqid() .'.'. $photo->getClientOriginalExtension(), ['disk' => 'public']);
            }
        }

        if($request->scan_xrays)
        {
            foreach ($request->scan_xrays as $photo) {
                $xrays[] = $storagePath . $photo->storeAs('photos', uniqid() .'.'. $photo->getClientOriginalExtension(), ['disk' => 'public']);
            }
        }

        $rxform = null;
        if($request->hasFile('TreatmentPlan_rx_form')){
                $rxform = $storagePath . $request->file('TreatmentPlan_rx_form')->storeAs('photos', uniqid() .'.'. $request->file('TreatmentPlan_rx_form')->getClientOriginalExtension(), ['disk' => 'public']);
        }
        if($request->hasFile('scan_rx_form')){
                $rxform = $storagePath . $request->file('scan_rx_form')->storeAs('photos', uniqid() .'.'. $request->file('scan_rx_form')->getClientOriginalExtension(), ['disk' => 'public']);
        }

        $upper_scan = [];
        if($request->scan_upper_scan_obj)
        {
            foreach($request->scan_upper_scan_obj as $upperScan)
                $upper_scan[] = $storagePath . $upperScan->storeAs('photos', uniqid() .'.'. $upperScan->getClientOriginalExtension(), ['disk' => 'public']);
        }

        $lower_scan = [];
        if($request->scan_lower_scan_obj)
        {
            foreach($request->scan_lower_scan_obj as $lowerScan)
                $lower_scan[] = $storagePath . $lowerScan->storeAs('photos', uniqid() .'.'. $lowerScan->getClientOriginalExtension(), ['disk' => 'public']);
        }

        // foreach($request->)
        // $request->file->store('products', ['disk' => 'public']);

        $voodoo = [
        'treatment_plan' => [
            'arches' => $request->TreatmentPlan_arches,
            'impressions' => $request->TreatmentPlan_impressions_scans != "scans" ? true : false,
            'scans' => [
                'uppers' => $upper_scan,
                'lowers' => $lower_scan,
            ],
            'patient_photos' => $patient_photos,
            'xrays' => $xrays,
            'rx_form' => $rxform,
            'include_retainer' => $request->include_retainer == null ? false : true,
            'notes' => $request->TreatmentPlan_impressions_scans != "scans" ? $request->TreatmentPlan_notes : $request->scan_notes,
            'require_patient_approval' => false
        ],
        'patient_name' => optional($order->customer)->name,
        'doctor' => $request->doctor,
        'patient_id' => "$order->customer_id",
        'requires_ipr' => false,
        'internal_id' => "$order->id",
        'notes' => $request->notes,
        "shipping_address" => [
            "name" => $request->shipping_name,
            "street1" => $request->shipping_street1,
            "city" => $request->shipping_city,
            "state" => $request->shipping_state,
            "zip" => $request->shipping_zip,
            "country" => $request->country,
            "phone" => $request->shipping_phone,
            "email" => $request->shipping_email
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('VOODOO_PATH')."/orders/planning");
        curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS,$voodoo);

        // In real life you should use something like:
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($voodoo));


        $headers = [
            'API-Key: pk_prod_OMiAhIXMq3xwpyaxViwaWCnk6LTrVMcZ',
            'API-Secret: sk_prod_RakulAlcv3w3eTJpqj2UClHL18onswbE'
        ];
        // $headers = [
        //     'API-Key: pk_test_OzCDkLC5VS6ulNLAWYkFjbzbf6H3fJeg',
        //     'API-Secret: sk_test_HHbQOMl748mOsZ4b1cJqFLfLcZ7xn6YA'
        // ];


        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);



        $response = json_decode($server_output);

        if(!$response){
            // dd($server_output, $response, $voodoo, json_encode($voodoo));
            return redirect()->back()->with(['message' => $server_output, 'status' => 0]);
        }


        //Save data in order treatment planning

        $treatment = OrderTreatmentPlan::create([
            'voodoo_order_id' => $response->id,
            'order_id' => $order->id,
            'doctor' => $request->doctor,
            'notes' => $request->notes,
            'order_type' => $request->order_type,
            'is_impression' => $request->TreatmentPlan_impressions_scan != "scans" ? 1 : 2,
            'arches' => $request->TreatmentPlan_arches,
            'rx_form' => $rxform,
            'treatment_notes' => $request->TreatmentPlan_notes,
            'order_status' => $response->status,
            'shipment_carrier' => isset($response->shipment) ? $response->shipment->carrier : null,
            'shipment_service' => isset($response->shipment) ? $response->shipment->service : null,
            'shipment_status' => isset($response->shipment) ? $response->shipment->status : null,
            'shipment_tracking_code' => isset($response->shipment) ? $response->shipment->tracking_code : null,
            'shipment_delivered_at' => isset($response->shipment) ? $response->shipment->delivered_at : null,
            'order_created_at' => $response->created_at,
            'order_ship_by' => $response->ship_by
        ]);

        foreach($xrays as $xray)
        {
            OrderTreatmentPlanImage::create([
                'order_treatment_id' => $treatment->order_treatment_plan_id,
                'image_for' => 'xray',
                'image' =>  $xray
            ]);
        }

        foreach($patient_photos as $patient_photo)
        {
            OrderTreatmentPlanImage::create([
                'order_treatment_id' => $treatment->order_treatment_plan_id,
                'image_for' => 'patient_photo',
                'image' =>  $patient_photo
            ]);
        }

        OrderTreatmentPlanImage::create([
            'order_treatment_id' => $treatment->order_treatment_plan_id,
            'image_for' => 'rx_form',
            'image' =>  $rxform
        ]);

        foreach($upper_scan as $upper)
        {
            OrderTreatmentPlanImage::create([
                'order_treatment_id' => $treatment->order_treatment_plan_id,
                'image_for' => 'upper_scan',
                'image' =>  $upper
            ]);
        }

        foreach($lower_scan as $lower)
        {
            OrderTreatmentPlanImage::create([
                'order_treatment_id' => $treatment->order_treatment_plan_id,
                'image_for' => 'lower_scan',
                'image' =>  $lower
            ]);
        }


        return redirect()->back()->with(['message' => 'Order placed.']);
    }


    public function updateTrackingNumber(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->tracking_number = $request->tracking_number;
        $order->save();

        return response()->json(true);
    }
    public function details(Request $request){
        $detail=OrderHistory::where('order_id',$request->id)->first();
        $html=view('admin.orders.details',compact('detail'))->render();
        return $html;

    }
}
