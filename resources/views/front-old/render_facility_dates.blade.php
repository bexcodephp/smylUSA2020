<select name="weekday" id="weekday" class="form-control" style="border: 1px solid #c3c3c3">
    <option value="" selected>Select Date</option>
    @php($j = 0)
    @for($i = 0; $i<=14; $i++)
        @php($date = date('D, M d', strtotime('+'.$i . " day"))) 
        @php($day = date('l', strtotime('+'.$i . " day"))) 
<option value="{{ date('Y-m-d', strtotime($date)) }}" data-j="{{ $day }}" data-dates="{{ $dates[$day] }}" @if($dates[$day] == 1) disabled @endif >@if($dates[$day] == 1) Closed - {{ $date }}  @else {{ $date }} @endif</option>  
@php($j++)

@if($j % 7 == 0)
    @php($j = 0)
@endif
    @endfor
</select>


<script>
$(document).on('click', '#weekday', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    if($(this).val() == "") return;
$.ajax({
    url: "{{ route('getFacilityWeekdaySpan') }}",
    type: "POST",
    data: {
        "facility_id" : $('#facility').val(),
        "weekday" : $(this).val(),
        '_token' : "{{ csrf_token() }}"
    },
    success: function(data){
        $('.renderFacilityTimespan').html(data);
    },
    error: function(xhr, status, responseText)
    {
        console.log(xhr);
    }
    });
});
</script>