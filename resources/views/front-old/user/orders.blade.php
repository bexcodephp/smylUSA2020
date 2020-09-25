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
                        <h1>User Portal
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
                            <div class="col-sm-12">
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-check"></i>Order History </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="datatable">
                                                <thead>
                                                    <tr>
                                                        <th> Sr# </th>
                                                        <th> Date </th>
                                                        <th> Total Paid </th>
                                                        <th> Payment Method </th>
                                                        <th> Order Status </th>
                                                        <th> Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $key => $order)
                                                    <tr>
                                                        <td>{{ ++$key }} </td>
                                                        <td>{{ $order->created_at->format('d-m-Y') }} </td>
                                                        <td>{{ config('cart.currency_symbol').$order->total_paid }}</td>
                                                        <td>{{ $order->payment }}</td>
                                                        <td> <label style="padding: 3px 10px; border-radius: 5px; background: {{ $order->orderStatus->color }}; color: white">{{ $order->orderStatus->name }}</label></td>
                                                        <td>
                                                        <a href="{{ route('orders.show', $order->reference) }}" class="label label-info" style="color: white;">View Detail</a>
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
                        <div class="row">
                        
                            <div class="col-md-6">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                        
                                            <span class="caption-subject font-green-sharp bold uppercase">Order Now</span>
                                        </div>
                        
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                        
                        
                                            <div class="tab-pane active" id="portlet_tab3">
                                                <p> What are you waiting for? Order your next aligners today to keep on embarking on a new
                                                    journey towards a happier, healthier and fresh smile. This will allow you to keep track of
                                                    your
                                                    progress and not worry as we provide you the best smile there is.
                                                </p>
                                                <!-- <img src="img/step 1.gif" height="170px"> -->
                        
                                                <p>
                        
                                                    <a class="btn blue" href="{{ url('products') }}" target="_blank"> Place an order </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                        
                                            <span class="caption-subject font-green-sharp bold uppercase">Order at Location</span>
                                        </div>
                        
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                        
                        
                                            <div class="tab-pane active" id="portlet_tab3">
                                                <p> What are you waiting for? Visit our nearest location to place an order for your better
                                                    smile.
                                                </p>
                                                <!-- <img src="img/step 1.gif" height="170px"> -->
                        
                                                <p>
                        
                                                    <a class="btn blue" href="{{ url('locations') }}" target="_blank"> Order at Location </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <section class="section bg-light mt-5">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($products as $product)
                                            <div class="col-sm-6 col-md-3 mb-4">
                                                <div class="product portfolio-item portfolio-item-style-2">
                                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                                        <span
                                                            class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                                            <a href="{{ route('front.get.product', $product->slug) }}">
                                                                <img src="{{ asset('storage/'.$product->cover) }}" style="width: 100%;" alt="">
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                                        <div class="product-info-title">
                                                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a
                                                                    href="{{ route('front.get.product', $product->slug) }}"
                                                                    style="text-decoration: none;">{{ $product->name }}</a>
                                                            </h3>
                                                            <span class="price font-primary text-4"><strong class="text-color-dark">
                                                                    {{ config('cart.currency_symbol') .  $product->price }}</strong></span>
                                                            <!-- <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$69</strong></span> -->
                                                        </div>
                                                        <div class="product-info-rate d-flex">
                                                            <i class="fas fa-star text-color-default mr-1"></i>
                                                            <i class="fas fa-star text-color-default mr-1"></i>
                                                            <i class="fas fa-star text-color-default mr-1"></i>
                                                            <i class="fas fa-star text-color-default mr-1"></i>
                                                            <i class="fas fa-star text-color-default"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
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
