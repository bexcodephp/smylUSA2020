@extends('layouts.front.user')

@section('content')
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
                                @if($medical_form)
                                <div class="col-sm-12">
                                    <div class="alert alert-danger">
                                        <a href="{{ route('medical_form') }}">Please fill out your information.</a>
                                    </div>
                                </div>
                                @endif
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
                                                <p> What are you waiting for? Order your next aligners today to keep on embarking on a new journey towards a happier, healthier and fresh smile. This will allow you to keep track of your progress and not worry as we provide you the best smile there is.
                                                </p>
                                                <!-- <img src="img/step 1.gif" height="170px"> -->

                                                <p>

                                                    <a class="btn blue" href="{{ route('front.get.product_all') }}" target="_blank"> Place an order </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">

                                            <span class="caption-subject font-green-sharp bold uppercase">Order At location</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            
                                           
                                            <div class="tab-pane active" id="portlet_tab3">
                                                <p> What are you waiting for? Visit our nearest location to place an order for your better smile.
                                                </p>
                                                <!-- <img src="img/step 1.gif" height="170px"> -->

                                                <p>

                                                    <a class="btn blue" href="{{ route('locations') }}" target="_blank"> Order At Location </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="col-md-6 col-sm-6">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                                            <i class="icon-notification font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Notifications</span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body">
                                        <!--BEGIN TABS-->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;"><div class="scroller" style="height: 339px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                                                    <ul class="feeds">
                                                        @foreach($notifications as $notify)
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> {{ $notify->message }}
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> {{ $notify->created_at->diffForHumans() }} </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 183px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 155.931px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                            </div>
                                            <div class="tab-pane" id="tab_1_2">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 290px;"><div class="scroller" style="height: 290px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                                    <ul class="feeds">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New order received </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 10 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Order #24DOP4 has been rejected.
                                                                            <span class="label label-sm label-danger "> Take action
                                                                                <i class="fa fa-share"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                            </div>
                                        </div>
                                        <!--END TABS-->
                                    </div>
                                </div>
                                <!-- END PORTLET-->
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
                                                                        href="{{ route('front.get.product', $product->slug) }}" style="text-decoration: none;">{{ $product->name }}</a>
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
           
        </div>
@endsection
