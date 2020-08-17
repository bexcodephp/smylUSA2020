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
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-check"></i>Approved Cases </div>
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
                                            <th> Comments </th>
                                            <th> Reports </th>
                                            <th> Confirmation From User </th>
                                            <th>Mark as Complete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($approved_cases as $key => $case)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ optional($case->customer)->name }} </td>
                                            <td> {{ date('d-m-Y', strtotime($case->appointment_date)) }} </td>
                                            <td>Dr. Hamza</td>
                                            <td>Comments</td>
                                            <td>Reports</td>
                                            <td>Confirmation</td>
                                            <td>
                                                <form method="POST" action="{{ route('vendor.updateCaseStatus') }}">
                                                    @csrf
                                                    <input type="hidden" name="appointment_status" value="COMPLETED">
                                                    <input type="hidden" name="appointment_id" value="{{ $case->appointment_id }}">
                                                    <button type="submit" class="btn green-sharp btn-large fa fa-check"></button>
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
</div>
@endsection
