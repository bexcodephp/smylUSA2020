@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/sidebar.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/table-responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/patient/patient-orders.css') }}" type="text/css">
@endpush
@section('content')

@include('layouts.front.sidebar-p')
<main class="main-aside patient-order col-lg col-12 px-lg-5">
    <section class="py-xxl-5 py-4">
        <div class="col-12 mb-4">
            <h3 class="card-title color-blue text-bold">My Orders</h3>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <!-- Pictures -->
                <table id="table_my_order" class="table hover w-100 table-borderless col_tbl">
                    <thead>
                        <tr>
                            <th>Si No.</th>
                            <th>Date of purchase</th>
                            <th>Total amount paid</th>
                            <th>Payment method</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                        <tr>
                            <td data-label="Si No.">
                                <div>{{ ++$key }}</div>
                            </td>
                            <td data-label="Date of purchase">
                                <div>{{ $order->created_at->format('d-m-Y') }}</div>
                            </td>
                            <td data-label="Total amount paid">
                                <div>{{ config('cart.currency_symbol').$order->total_paid }}</div>
                            </td>
                            <td data-label="Payment method">
                                <div>
                                    <span class="span-paid">{{ $order->orderStatus->name }}</span>
                                    <!-- <span class="span-finance">Financing</span> -->
                                </div>
                            </td>
                            <td data-label="Action">
                                <div>
                                    <button class="btn btn-link p-0 text-underline" type="button" onclick="btnViewDetail('{{$order->reference}}')">View Details</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
{{-- View picture modal  --}}
<div class="modal fade view-order-details-modal" id="view_order_details_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row justify-content-center" id="order_data">
                    <div class="col-12 align-self-center mb-3">
                        <div class="row">
                            <div class="col-md-5 order-left-div">
                                <h4 class="sub-title-1 color-blue text-bold text-left mb-3" id="">Order</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <p>Order Number</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{ $order->order_no }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Order Date</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{ $order->created_at->format('d-m-Y') }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Order Status</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{ $order->orderStatus->name }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Order Amount</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{ config('cart.currency_symbol'). $order->total_paid }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Note</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{ $order->notes }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7  shipping-right-div">
                                <h4 class="sub-title-1 color-blue text-bold text-left mb-3" id="">Shipping Details</h4>
                                <div class="row">
                                    <div class="col-4">
                                        <p>Name</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $order->customer->name }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Phone</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $order->address->phone }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $order->customer->email }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Country</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $order->address->country->name }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>City</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $order->address->city }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Address</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $order->address->address_1 }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Code</p>
                                    </div>
                                    <div class="col-8">
                                        <p>jhoned123</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <h4 class="sub-title-1 color-blue text-bold mb-3" id="">Order Details</h4>
                        <div class="table-responsive">
                            <!-- Pictures -->
                            <table id="table_view_order" class="table hover w-100 table-borderless col_tbl">
                                <thead>
                                    <tr>
                                        <th>Si No.</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->detail as $key => $detail)
                                    <tr>
                                        <td data-label="Si No.">
                                            <div>{{ ++$key }}</div>
                                        </td>
                                        <td data-label="Product">
                                            <div>{{ $detail->product_name }}</div>
                                        </td>
                                        <td data-label="Qty">
                                            <div>{{ $detail->quantity }}</div>
                                        </td>
                                        <td data-label="Price">
                                            <div>{{ config('cart.currency_symbol').$detail->product_price }}</div>
                                        </td>
                                        <td data-label="Total">
                                            <div>{{ config('cart.currency_symbol').$detail->quantity * $detail->product_price }}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('front/js/sidebar.js') }}"></script>
<script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_my_order').DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "ordering": true,
            "bAutoWidth": true
        });
        $('#table_view_order').DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": true,
            "ordering": true,
            "bAutoWidth": true
        });
    });

    function btnViewDetail(referance) {
        $("#order_data").html("");
        $.ajax({
                url:'orders/'+referance,
                type:'GET',
                data:{
                    _token:'{{csrf_token()}}',
                    referance:referance
                },
                success:function (order) {
                    var orderData = `
                    <div class="col-12 align-self-center mb-3">
                        <div class="row">
                            <div class="col-md-5 order-left-div">
                                <h4 class="sub-title-1 color-blue text-bold text-left mb-3" id="">Order</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <p>Order Number</p>
                                    </div>
                                    <div class="col-6">
                                        <p>`+order.order_no+`</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Order Date</p>
                                    </div>
                                    <div class="col-6">
                                        <p>`+order.created_at+`</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Order Status</p>
                                    </div>
                                    <div class="col-6">
                                        <p>`+order.order_status.name+`</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Order Amount</p>
                                    </div>
                                    <div class="col-6">
                                        <p>`+order.total_paid+`</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Note</p>
                                    </div>
                                    <div class="col-6">
                                        <p>`+order.notes+`</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7  shipping-right-div">
                                <h4 class="sub-title-1 color-blue text-bold text-left mb-3" id="">Shipping Details</h4>
                                <div class="row">
                                    <div class="col-4">
                                        <p>Name</p>
                                    </div>
                                    <div class="col-8">
                                        <p>`+order.customer.name+`</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Phone</p>
                                    </div>
                                    <div class="col-8">
                                        <p>`+order.address.phone+`</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-8">
                                        <p>`+order.customer.email+`</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Country</p>
                                    </div>
                                    <div class="col-8">
                                        <p>`+order.address.country.name+`</p>
                                    </div>
                                    <div class="col-4">
                                        <p>City</p>
                                    </div>
                                    <div class="col-8">
                                        <p>`+order.address.city+`</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Address</p>
                                    </div>
                                    <div class="col-8">
                                        <p>`+order.address.address_1+`</p>
                                    </div>
                                    <div class="col-4">
                                        <p>Code</p>
                                    </div>
                                    <div class="col-8">
                                        <p>jhoned123</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <h4 class="sub-title-1 color-blue text-bold mb-3" id="">Order Details</h4>
                        <div class="table-responsive">
                            <table id="table_view_order" class="table hover w-100 table-borderless col_tbl">
                                <thead>
                                    <tr>
                                        <th>Si No.</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                order.detail.forEach(detail => {
                                    orderData += `<tr>
                                        <td data-label="Si No.">
                                            <div>1</div>
                                        </td>
                                        <td data-label="Product">
                                            <div>`+detail.product_name+`</div>
                                        </td>
                                        <td data-label="Qty">
                                            <div>`+detail.quantity+`</div>
                                        </td>
                                        <td data-label="Price">
                                            <div>`+detail.product_price+`</div>
                                        </td>
                                        <td data-label="Total">
                                            <div>`+detail.quantity * detail.product_price+`</div>
                                        </td>
                                    </tr>`;
                                });

                                orderData += `</tbody>
                            </table>
                        </div>
                    </div>
                    `;
                    console.log(orderData);

                    $("#order_data").append(orderData);
                    // console.log(data);
                }
        });
        $('#view_order_details_modal').modal('show');
    }
</script>
@endpush