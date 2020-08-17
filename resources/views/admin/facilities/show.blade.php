@extends('layouts.admin.app')

@section('css')
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
    <style>
        .timeTable td, .timeTable th {
            padding: 10px;
        }
    </style>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
    <form method="POST" action="{{ route('admin.facilities.updateTime', $facility->facility_id) }}">
        @csrf
        <div class="box-header with-border">
            <h3 class="box-title">
                Facility - {{ $facility->name }}
            </h3>
        </div>
        <div class="box-body">
            <table class="timeTable" style="width: 100%;">
                <thead>
                    <tr style="padding: 5px;">
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Is Closed</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr style="padding: 5px; border: 1px solid;">
                        <td style="width: 30%">Monday</td> 
                        <td>
                            <div class="input-group">
                            <input type="text" class="form-control timepicker" name="start[0]" value="{{ isset($timeslots[0]) ? $timeslots[0]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="end[0]" value="{{ isset($timeslots[0]) ? $timeslots[0]['end_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input type="checkbox" name="closed[0]" value="1" {{ (isset($timeslots[0]) && $timeslots[0]['is_closed'] == 1) ? "checked" : "" }}>
                        </td> 
                        <td>
                            <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 0]) }}" class="btn btn-info">Update Spans</a>
                        </td>
                    </tr>

                    <tr style="padding: 5px; border: 1px solid;">
                        <td style="width: 30%">Tuesday</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="start[1]" value="{{ isset($timeslots[1]) ? $timeslots[1]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="end[1]" value="{{ isset($timeslots[1]) ? $timeslots[1]['end_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input type="checkbox" name="closed[1]" value="1" {{ (isset($timeslots[1]) && $timeslots[1]['is_closed'] == 1) ? "checked" : "" }}>
                        </td>
                        <td>
                            <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 1]) }}" class="btn btn-info">Update Spans</a>
                        </td>
                        
                    </tr>

                    <tr style="padding: 5px; border: 1px solid;">
                        <td style="width: 30%">Wednesday</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="start[2]" value="{{ isset($timeslots[2]) ? $timeslots[2]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="end[2]" value="{{ isset($timeslots[2]) ? $timeslots[2]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input type="checkbox" name="closed[2]" value="1" {{ (isset($timeslots[2]) && $timeslots[2]['is_closed'] == 1) ? "checked" : "" }}>
                        </td>
                        <td>
                            <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 2]) }}" class="btn btn-info">Update Spans</a>
                        </td>
                    </tr>

                    <tr style="padding: 5px; border: 1px solid;">
                        <td style="width: 30%">Thursday</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="start[3]" value="{{ isset($timeslots[3]) ? $timeslots[3]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="end[3]" value="{{ isset($timeslots[3]) ? $timeslots[3]['end_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input type="checkbox" name="closed[3]" value="1" {{ (isset($timeslots[3]) && $timeslots[3]['is_closed'] == 1) ? "checked" : "" }}>
                        </td>
                        <td>
                            <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 3]) }}" class="btn btn-info">Update Spans</a>
                        </td>
                    </tr>

                    <tr style="padding: 5px; border: 1px solid;">
                        <td style="width: 30%">Friday</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="start[4]" value="{{ isset($timeslots[4]) ? $timeslots[4]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="end[4]" value="{{ isset($timeslots[4]) ? $timeslots[4]['end_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input type="checkbox" name="closed[4]" value="1" {{ (isset($timeslots[4]) && $timeslots[4]['is_closed'] == 1) ? "checked" : "" }}>
                        </td>
                        <td>
                            <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 4]) }}" class="btn btn-info">Update Spans</a>
                        </td>
                    </tr>

                    <tr style="padding: 5px; border: 1px solid;">
                        <td style="width: 30%">Saturday</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="start[5]" value="{{ isset($timeslots[5]) ? $timeslots[5]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="end[5]" value="{{ isset($timeslots[5]) ? $timeslots[5]['end_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input type="checkbox" name="closed[5]" value="1" {{ (isset($timeslots[5]) && $timeslots[5]['is_closed'] == 1) ? "checked" : "" }}>
                        </td>
                        <td>
                            <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 5]) }}" class="btn btn-info">Update Spans</a>
                        </td>
                    </tr>

                    <tr style="padding: 5px; border: 1px solid;">
                        <td style="width: 30%">Sunday</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="start[6]" value="{{ isset($timeslots[6]) ? $timeslots[6]['start_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="end[6]" value="{{ isset($timeslots[6]) ? $timeslots[6]['end_time'] : "" }}">
                            
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input type="checkbox" name="closed[6]" value="1" {{ (isset($timeslots[6]) && $timeslots[6]['is_closed'] == 1) ? "checked" : "" }}>
                        </td>
                        <td>
                            <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 6]) }}" class="btn btn-info">Update Spans</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection

@section('js')
<script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
<script>
//Timepicker
$('.timepicker').timepicker({
    showInputs: false
});
</script>
@endsection