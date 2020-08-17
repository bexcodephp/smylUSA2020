@if($spans->count() > 0)
<style>
.field-container{
    margin-top: 10px; 
}
.field-container input, .field-container input:focus, .field-container input:active {
    border: 1px solid #c3c3c3;
}
.line-item {
    padding: 14px 0;
    border-top: 1px solid #e0e0e0;
    color: grey;
    font-family: Sofia Black,Helvetica,Arial,sans-serif;
    font-size: 14px;
}
.eyebrow:not(.fa) {
    letter-spacing: .285em;
    font-family: Sofia,Helvetica,Arial,sans-serif;
    font-size: 14px;
    text-transform: uppercase;
}
a.active.facilityTimeSpan{
    background: blue !important;
}
</style>
<div class="row blog" style="margin-bottom: 50px;">
    <div class="col-sm-12">
        <div id="blogCarousel" class="carousel slide" data-ride="carousel">

            <!-- Carousel items -->
            <div class="carousel-inner">

                <div class="carousel-item active" style="padding: 5px 5px;">
                    <div class="row">
                        @foreach($spans as $span)
                            <div class="col-md-6" style="margin-top: 10px;">
                                <a href="#" class="facilityTimeSpan btn btn-primary btn-block @if(in_array($span->timespan, $bookings)) disabled @endif" data-time="{{$span->timespan}}">
                                    {{ date('h:i A', strtotime($span->timespan)) }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!--.row-->
                </div>
                <!--.item-->
            </div>
            <!--.carousel-inner-->
        </div>
    </div>
</div>

<script>
    $('.facilityTimeSpan').click(function(e){
        e.preventDefault();
        $('.facilityTimeSpan').each(function(index, ele){
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        $('#timespan').val($(this).data('time'));
        $('#facility_id').val("{{ $facility_id }}");
        $('#week_no').val($('#weekday').val());
        $('.schedule_time').css('display', 'block');
    });
</script>
@else 
<p style="text-align: center;
    font-weight: bold;
    font-size: 20px;
    color: #e06c6c;text-align: center;
    font-weight: bold;
    font-size: 20px;
    color: white;
    background: #2388ed;
    padding: 6px;">No Time Span Available</p>
@endif