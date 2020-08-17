@extends('layouts.admin.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
<style>
    .input-group{
        width: 85%; 
    }
    .removeSpan{
        float: right;
        margin-top: -30px;
    }
</style>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Facility - {{ $facility->name }}<br> Weekday - {{ App\Traits\GetWeekday::weekday($weekday, true) }}</h3>
            <div class="box-tools">
                <button type="button" id="addNewSpan" data-rowid="{{ $spans->count() + 1 }}" class="btn btn-success">Add New Span</button>
            </div>
            </div>
            <form action="{{ route('admin.facilities.updateFacilityTimespan', [$facility->facility_id, $weekday]) }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <ul class="list-group">
                                @foreach($spans as $key => $span)
                                <li class="list-group-item" id="span_{{ $key }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="span[]" value="{{ date('H:i A', strtotime($span->timespan)) }}">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                    <button type="button" class="removeSpan btn btn-xs btn-danger" data-removeid="{{ $key }}"><i class="fa fa-remove"></i></button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.facilities.show', $facility->facility_id) }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
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

$('#addNewSpan').click(function(e){
    var row = $(this).data('rowid');
    var html = '<li class="list-group-item" id="span_'+row+'">';
        html += '<div class="input-group">';
        html +=    '<input type="text" class="form-control timepicker" name="span[]">';
        html +=    '<div class="input-group-addon">';
        html +=     '   <i class="fa fa-clock-o"></i>';
        html +=    '</div>';
        html +='</div>';
        html +='<button type="button" class="removeSpan btn btn-xs btn-danger" data-removeid="'+row+'"><i class="fa fa-remove"></i></button>';
    html += '</li>';

    $('ul.list-group').append(html);

    $(this).data('rowid', row + 1);

    $('.timepicker').timepicker({
        showInputs: false
    });
});

$(document).on('click', '.removeSpan', function(e){
    var row = $(this).data('removeid');
    $('#span_' + row).remove();
});
</script>
@endsection