@if(isset($status))
    @if($status == 1)
        <span style="display: none; visibility: hidden">1</span>
        <button type="button" class="btn btn-link mx-2 w-auto btn-true text-green deactivate" data-id="{{$employee->id}}"><i class="fa fa-check fa-lg"></i></button>
        @else
        <span style="display: none; visibility: hidden">0</span>
        <button type="button" class="btn btn-link mx-2 w-auto btn-false text-red activate " data-id="{{$employee->id}}"><i class="fa fa-times fa-lg"></i></button>
    @endif
@endif
