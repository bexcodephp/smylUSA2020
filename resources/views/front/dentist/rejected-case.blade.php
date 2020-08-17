
@extends('layouts.front.dentist')

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
                            <h1>Dentist Portal
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
                                <div class="portlet box red">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-check"></i>Rejected Cases </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th>Patient Name </th>
                                                        <th> Notes</th>
                                                        <th>Order Status </th>
                                                        <th>Shipment Status </th>
                                                        <th>Shipped On </th>
                                                        <th>Created at </th>
                                                        <th> Action </th>
                                            
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($voodoo as $key => $case)
                                                    <tr>
                                                        <td> {{ ++$key }} </td>
                                            
                                                        <td> {{ optional(optional($case->order)->customer)->name }} </td>
                                                        <td>{{ $case->notes }}</td>
                                                        <td>{{ $case->order_status }}</td>
                                                        <td>{{ $case->shipment_delivered_at }}</td>
                                                        <td>{{ $case->shipment_status }}</td>
                                                        <td>{{ date('d-m-Y H:i:s', strtotime($case->created_at)) }}</td>
                                                        <td>
                                                            @if($case->doctor_approval_url)
                                                            <a href="{{ $case->doctor_approval_url }}"><i class="fa fa-eye"></i></a>
                                                            @endif
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
