@extends('layouts.front.vendor')
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
                                <i class="fa fa-arrow-right"></i>Cases Sent for Approval </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Patient Name </th>
                                            <th> Date </th>
                                            <th> Reports </th>
                                            <th>Name of Doctor</th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pending_cases as $key => $case)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ optional($case->customer)->name }} </td>
                                            <td> {{ date('d-m-Y', strtotime($case->appointment_date)) }} </td>
                                            <!-- <td>Dr. Hamza</td> -->
                                            <td><a href=""> Download Case </a></td>
                                            <td>{{ optional($case->dentist)->name }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('vendor.updateCaseStatus') }}">
                                                    @csrf
                                                    <select name="appointment_status" required id="appointment_status" class="form-control" style="float: left; width: 80%">
                                                        <option value="">Select Status</option>
                                                        <option value="APPROVED">Approved</option>
                                                        <option value="REJECTED">Rejected</option>
                                                    </select>
                                                    <input type="hidden" name="appointment_id" value="{{ $case->appointment_id }}">
                                                    <button type="submit" class="btn green-sharp btn-large fa fa-check" style="float: right;"></button>
                                                </form>
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
</div>        @endsection
