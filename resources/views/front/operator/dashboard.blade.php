@extends('layouts.front.operator')

@section('css')
<link href="{{ asset('user/assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Pharma Rep Portal
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
                    <div class="col-sm-7">
                    <div class=" col-md-6 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 ">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="{{ $fulfilled_appointments * 25 }}">{{ $fulfilled_appointments * 25 }}</span>
                                        <small class="font-green-sharp">$</small>
                                    </h3>
                                    <small>TOTAL COMMISSION</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-pie-chart"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class=" col-md-6 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 ">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-red-haze">
                                        <span data-counter="counterup" data-value="{{ $fulfilled_appointments }}">{{ $fulfilled_appointments }}</span>
                                    </h3>
                                    <small>FULFILLED PATIENTS</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-check"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 ">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-blue-sharp">
                                        <span data-counter="counterup" data-value="{{ $appointments }}">{{ $appointments }}</span>
                                    </h3>
                                    <small>PATIENTS IN MY LOCATION</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                    <div class="col-sm-5">
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
                                        <div class="slimScrollDiv"
                                            style="position: relative; overflow: hidden; width: auto; height: 339px;">
                                            <div class="scroller" style="height: 339px; overflow: hidden; width: auto;"
                                                data-always-visible="1" data-rail-visible="0" data-initialized="1">
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
                                            </div>
                                            <div class="slimScrollBar"
                                                style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 155.931px;">
                                            </div>
                                            <div class="slimScrollRail"
                                                style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END TABS-->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <span data-counter="counterup" data-value="276"></span>
                                                </h3>
                                                <small>NEW USERS</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div> -->
                </div>
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        
                        <!-- END PORTLET-->
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