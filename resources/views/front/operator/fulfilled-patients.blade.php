@extends('layouts.front.operator')

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
                                            <th> Email Address </th>
                                            <th> Appointment Date</th>
                                            <th> Appointment Time</th>
                                            <th> Location</th>
                                            <th> Reports </th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($appointments as $key => $appointment)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $appointment->appointment_id }} </td>
                                            <td> {{ $appointment->customer->name }} </td>
                                            <td> {{ $appointment->customer->email }} </td>
                                            <td> {{ date('D, d M', strtotime($appointment->appointment_date)) }} </td>
                                            <td> {{ date('h:i A', strtotime($appointment->schedule_time)) }} </td>
                                            <td> {{ $appointment->facility->name }} </td>
                                            <td>
                                                Reports
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
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->
</div>
@endsection
