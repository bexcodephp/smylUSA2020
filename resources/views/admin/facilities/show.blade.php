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
        
        <!-- <div class="box-header with-border">
            <h3 class="box-title">
                Facility - Non-availability Time Slot
            </h3>
        </div> -->
        
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