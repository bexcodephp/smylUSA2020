
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
                                <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
                                                    <span data-counter="counterup" data-value="{{ $appointments->count() * 25 }}">{{$appointments->count() * 25 }}</span>
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
                                <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <span data-counter="counterup" data-value="{{ $appointments->count() }}">{{ $appointments->count() }}</span>
                                                </h3>
                                                <small>FULFILLED PATIENTS</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-check"></i>
                                            </div>
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
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-check"></i>Fulfilled Patients </div>

                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Appointment #</th>
                                                        <th> Patient Name </th>
                                                        <th> Appointment Date</th>
                                                        <th> Commission Earned At</th>
                                                        <th> Earning </th>
                                            
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($appointments as $key => $appointment)
                                                    <tr>
                                                        <td> {{ ++$key }} </td>
                                                        <td> {{ $appointment->appointment_id }} </td>
                                                        <td> {{ $appointment->customer->name }} </td>
                                                        <td> {{ date('D, d M', strtotime($appointment->appointment_date)) }} </td>
                                                        <td> {{ date('D, d M', strtotime($appointment->fulfill_date)) }} </td>
                                                        <td>$25</td>
                                            
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
