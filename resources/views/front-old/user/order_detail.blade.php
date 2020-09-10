@extends('layouts.front.user')

@section('content')
<!-- BEGIN CONTENT -->
           <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>User Portal - Order detail
                            <!-- <small>dashboard & statistics</small> -->
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                    <!-- BEGIN PAGE TOOLBAR -->
                    <div class="page-toolbar">
                        <!-- BEGIN THEME PANEL -->
                        <div class="btn-group btn-theme-panel">
                            <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">

                            </a>

                        </div>
                        <!-- END THEME PANEL -->
                    </div>
                    <!-- END PAGE TOOLBAR -->
                </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container">
                    <!-- BEGIN PAGE BREADCRUMBS -->

                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <br><br>
                    <div class="page-content-inner">
                      <div class="row">
                    
                        <div class="col-md-6">
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                    
                                        <span class="caption-subject font-green-sharp bold uppercase">Order</span>
                                    </div>
                    
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                    
                    
                                        <div class="tab-pane active" id="portlet_tab3">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-stripped">
                                                    <tbody>
                                                        <tr>
                                                            <th>Order #</th>
                                                            <td>{{ $order->order_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order Date</th>
                                                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order Status</th>
                                                            <td>{{ $order->orderStatus->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order Amount</th>
                                                            <td>{{ config('cart.currency_symbol'). $order->total_paid }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Notes</th>
                                                            <td>{{ $order->notes }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                    
                                        <span class="caption-subject font-green-sharp bold uppercase">Shipping Detail</span>
                                    </div>
                    
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                    
                    
                                        <div class="tab-pane active" id="portlet_tab3">
                                           <div class="table-responsive">
                                            <table class="table table-bordered table-stripped">
                                                <tbody>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $order->customer->name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Phone</th>
                                                        <td>{{ $order->address->phone }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $order->customer->email }}</td>
                                                    </tr>


                                                    <tr>
                                                        <th>Country</th>
                                                        <td>{{ $order->address->country->name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>City</th>
                                                        <td>{{ $order->address->city }}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{ $order->address->address_1 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-check"></i>Order Detail </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th> Sr# </th>
                                                        <th> Product </th>
                                                        <th> Qty </th>
                                                        <th> Price </th>
                                                        <th> Total </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->detail as $key => $detail)
                                                    <tr>
                                                        <td>{{ ++$key }} </td>
                                                        <td>{{ $detail->product_name }} </td>
                                                        <td>{{ $detail->quantity }} </td>
                                                        <td>{{ config('cart.currency_symbol').$detail->product_price }} </td>
                                                        <td>{{ config('cart.currency_symbol').$detail->quantity * $detail->product_price }} </td>
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
                    <!-- END PAGE CONTENT INNER -->
                </div>
            </div>
            <!-- END PAGE CONTENT BODY -->
            <!-- END CONTENT BODY -->
        </div>
    @endsection
