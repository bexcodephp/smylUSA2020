@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <style>
        .table.table-striped th input{
            max-width: 145px;
            width:100%;
        }
    </style>
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($appointments)
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Appointments</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Appointment#</th>
                                <th>Patient Name</th>
                                <th>Facility</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->appointment_id }}</td>
                                <td><a href="{{ route('admin.customers.show', $appointment->customer_id) }}">{{ optional($appointment->customer)->name }}</a></td>
                                <td><a href="{{ route('admin.facilities.edit', $appointment->facility_id) }}">{{ optional($appointment->facility)->name }}</a></td>
                                <td>{{ date('d/m/Y', strtotime($appointment->appointment_date)) }}</td>
                                <td>{{ $appointment->schedule_time }}</td>
                                <td>{{ $appointment->appointment_status }}</td>
                                <td></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
