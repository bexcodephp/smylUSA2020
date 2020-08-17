@extends('layouts.admin.app')

@section('css')
    <style>
        span.select2{
            width: 130px !important;
        }
    </style>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>
                            <a href="{{ route('admin.customers.show', $customer->id) }}">{{$customer->name}}</a> <br />
                            <small>{{$customer->email}}</small> <br />
                            <small>Order#: <strong>{{$order->order_no}}</strong></small><br>
                            <small>Notes: <strong>{{$order->notes}}</strong></small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        @if($order->treatmentPlan == null)
                        <h2><a href="{{route('admin.orders.edit', $order['id'])}}" target="_blank" class="btn btn-primary btn-block">Send Data To Design Company</a></h2>
                        @endif
                        <h2><a href="{{route('admin.orders.invoice.generate', $order['id'])}}" target="_blank" class="btn btn-primary btn-block">Download Invoice</a></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-body table-responsive">
                <h4> <i class="fa fa-shopping-bag"></i> Order Information</h4>
                <table class="table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="padding: 10px 18px" class="col-md-3">Date</th>
                            <th style="padding: 10px 18px" class="col-md-3">Customer</th>
                            <th style="padding: 10px 18px" class="col-md-3">Payment</th>
                            <th style="padding: 10px 18px" class="col-md-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="padding: 10px 18px">{{ date('M d, Y h:i a', strtotime($order['created_at'])) }}</td>
                        <td style="padding: 10px 18px"><a href="{{ route('admin.customers.show', $customer->id) }}">{{ $customer->name }}</a></td>
                        <td style="padding: 10px 18px"><strong>{{ $order['payment'] }}</strong></td>
                        <td style="padding: 10px 18px">
                            <form action="{{ route('admin.orders.update', $order->id) }}" style="display: inline-block" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                <label for="order_status_id" class="hidden">Update status</label>
                                <input type="text" name="total_paid" class="form-control" placeholder="Total paid" style="margin-bottom: 5px; display: none" value="{{ old('total_paid') ?? $order->total_paid }}" />
                                <div class="input-group">
                                    <select name="order_status_id" id="order_status_id" class="form-control select2" style="width: 100px;">
                                        @foreach($statuses as $status)
                                            <option @if($currentStatus->id == $status->id) selected="selected" @endif value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn"><button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-primary">Update</button></span>
                                </div>
                            </form>
                        </td>
                        
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px" class="bg-warning">Subtotal</td>
                        <td style="padding: 10px 18px" class="bg-warning">{{ $order['total_products'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px" class="bg-warning">Tax</td>
                        <td style="padding: 10px 18px" class="bg-warning">{{ $order['tax'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px" class="bg-warning">Discount</td>
                        <td style="padding: 10px 18px" class="bg-warning">{{ $order['discounts'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px"></td>
                        <td style="padding: 10px 18px" class="bg-success text-bold">Order Total</td>
                        <td style="padding: 10px 18px" class="bg-success text-bold">{{ $order['total'] }}</td>
                    </tr>
                    @if($order['total_paid'] != $order['total'])
                        <tr>
                            <td style="padding: 10px 18px"></td>
                            <td style="padding: 10px 18px"></td>
                            <td style="padding: 10px 18px" class="bg-danger text-bold">Total paid</td>
                            <td style="padding: 10px 18px" class="bg-danger text-bold">{{ $order['total_paid'] }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        @if($order)
            <!--@if($order->total != $order->total_paid)-->
            <!--    <p class="alert alert-danger">-->
            <!--        Ooops, there is discrepancy in the total amount of the order and the amount paid. <br />-->
            <!--        Total order amount: <strong>{{ config('cart.currency_symbol') }} {{ $order->total }}</strong> <br>-->
            <!--        Total amount paid <strong>{{ config('cart.currency_symbol') }} {{ $order->total_paid }}</strong>-->
            <!--    </p>-->

            <!--@endif-->
            <div class="box">
                @if(!$items->isEmpty())
                    <div class="box-body table-responsive">
                        <h4> <i class="fa fa-gift"></i> Items</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th class="col-md-2">SKU</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-2">Quantity</th>
                            <th class="col-md-2">Price</th>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->pivot->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <h4> <i class="fa fa-map-marker"></i> Shipping Detail</h4>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>Address 1</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Zip</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $order->address->address_1 }}</td>
                                    <td>{{ $order->address->city }}</td>
                                    <td>
                                        @if(isset($order->address->province))
                                            {{ $order->address->province->name }}
                                        @endif
                                    </td>
                                    <td>{{ $order->address->zip }}</td>
                                    <td>{{ $order->address->country->name }}</td>
                                    <td>{{ $order->address->phone }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-default">Back</a>
                    <!--@if($user->hasPermission('update-order'))<a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>@endif-->
                </div>
            </div>
        @endif

    </section>

    <div class="modal fade" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Tracking Number</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tracking_no">Add Tracking Number</label>
                        <input type="text" id="tracking_no" name="tracking_no" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="updateTrackingNumber btn btn-primary">Save</button>
                </div>
            </div> 
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
@endsection

@section('js')
<script>
$('#order_status_id').change(function(e){
    if($(this).val() == 4)
    {
        $('#modal-default').modal('show');
    }
});

$('.updateTrackingNumber').click(function(e){
    e.preventDefault();
    if($('#tracking_no').val() == "")
    {
        alert("Tracking number can't empty");
        return;
    }
    $.ajax({
        url: "{{ route('admin.orders.updateTrackingNumber') }}",
        type: "POST",
        data: {
            '_token' : "{{ csrf_token() }}",
            'order_id': "{{ $order->id }}",
            'tracking_number' : $('#tracking_no').val()
        },
        success: function(data){
            alert("Tracking number updated");
        },
        error: function(xhr, status, responseText)
        {
            console.log(xhr);
        }
    });
});
    
</script>
@endsection