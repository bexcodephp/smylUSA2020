
@extends('layouts.front.vendor')

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
                <h1>Designer Portal
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
                    @include('layouts.errors-and-messages')
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-check"></i>Complete Cases </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Patient Name </th>
                                            <th> Appointment Date </th>
                                            <th>Doctor</th>
                                            <th> Status </th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($completed_cases as $key => $case)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ optional($case->customer)->name }} </td>
                                            <td> {{ date('d-m-Y', strtotime($case->appointment_date)) }} </td>
                                        <td>{{  optional($case->dentist)->name}}</td>
                                            <td>{{ $case->appointment_status }}</td>
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
