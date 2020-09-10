@extends('layouts.front.app')

@section('css')
<link rel="stylesheet" href="{{ asset('user/assets/global/plugins/jquery-ui/jquery-ui.min.css') }}">
<style>
 .blog .carousel-indicators {
left: 0;
top: auto;
bottom: -40px;

}

/* The colour of the indicators */
.blog .carousel-indicators li {
background: #a3a3a3;
border-radius: 50%;
width: 8px;
height: 8px;
}

.blog .carousel-indicators .active {
background: #707070;
}
</style>
@endsection

@section('title', 'SmylUSA - Locations')

@section('content')
    <div class="slider-container slider-container-full-height rev_slider_wrapper">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider
            data-plugin-options="{'delay': 9000, 'sliderLayout': 'fullscreen', 'fullScreenOffset': '104px', 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,576], 'navigation' : {'arrows': { 'enable': true, 'hide_under': 767, 'style': 'slider-arrows-style-1 slider-arrows-dark' }}}">
            <ul>

                <li data-transition="fade">
                    <img src="{{ asset('assets/img/2.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-kenburns="on" data-duration="12000" data-ease="Linear.easeNone"
                        data-scalestart="110" data-scaleend="100" data-offsetstart="-250 -100" class="rev-slidebg">


                    <div class="tp-caption text-color-dark font-primary font-weight-bold"
                        data-frames='[{"delay":"+1100","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                        data-basealign="slide" data-x="left" data-hoffset="['73','73','73','73']" data-y="center"
                        data-voffset="['-30','-30','-30','-30']" data-fontsize="['65','65','65','77']"
                        data-lineheight="['70','70','70','82']" data-mask_in="x:0px;y:0px;">Find us near your<br>
                        location</div>

                    <a class="tp-caption btn btn-rounded btn-primary font-weight-semibold"
                        href="#start"
                        data-frames='[{"delay":"+1300","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                        data-basealign="slide" data-x="left" data-hoffset="['75','75','75','75']" data-y="center"
                        data-voffset="['115','115','115','150']" data-whitespace="nowrap"
                        data-fontsize="['13','14','14','40']" data-paddingtop="['13','14','14','40']"
                        data-paddingbottom="['13','13','13','40']" data-paddingleft="['50','50','50','90']"
                        data-paddingright="['50','50','50','90']">SmylUSA Facility</a>

                </li>

            </ul>
        </div>
        <div style="opacity:0;" id="start">hellp</div>
    </div>
    
    <br><br><br>
    <section id="" class="section bg-light pt-4 pb-5">

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 mb-4">
                @include('layouts.errors-and-messages')
                <div class="row">
                    <div class="col-sm-12">
                        @if(!$facility)
                        <h1 style="color:#2388ed" class="text-center">Select a SmylUSA location</h1>
                        @else
                        <h1 style="color:#2388ed" class="text-center">Selected Location and beneath that the address</h1>
                        @endif
                    </div>
                    <!--<div class="col-md-3"></div>-->
                    <div class="col-sm-6">
                        <div class="form-group">
                        @if(!isset($facility))
                            <select class="form-control" style="border: 1px solid #c3c3c3" name="facility" id="facility">
                                <option value="" selected>Select Location</option>
                                @foreach($states as $state)
                                <option value="{{ $state }}" >{{ $state }}</option>
                                @endforeach
                            </select>
                        @else 
                            <select name="weekday" id="weekday" class="form-control" style="border: 1px solid #c3c3c3">
                                <option value="" selected>Select Date</option>
                                @php($j = 0)
                                @for($i = 0; $i<=14; $i++) @php($date=date('D, M d', strtotime('+'.$i . " day" ))) @php($day=date('l',
                                    strtotime('+'.$i . " day" ))) <option value="{{ date('Y-m-d', strtotime($date)) }}" data-j="{{ $day }}"
                                    data-dates="{{ isset($dates[$day]) ? $dates[$day] : null }}" @if(isset($dates[$day]) && $dates[$day] == 1) disabled @endif>@if(isset($dates[$day]) && $dates[$day] == 1) Closed - {{ $date }}
                                    @else {{ $date }} @endif</option>
                                    @php($j++)
                            
                                    @if($j % 7 == 0)
                                    @php($j = 0)
                                    @endif
                                @endfor
                            </select>
                        @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="renderFacilityTimespan"></div>
                    </div>
                    <div class="col-sm-12">
                        <div class="ShowForm"></div>
                    </div>
                </div>
                
                <br>
                @if(isset($facility))
                <div class="row" style="margin: 20px auto;">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h2 style="text-primary">{{ $facility->name }}</h2>
                        <p style="font-size: 16px;">{{  $facility->city . ", " . $facility->state . ", " . $facility->address }}</p>
                        <p style="font-size: 16px;">Tel: <a href="tel:{{$facility->phone }}">{{ $facility->phone}}</a></p>
                        @if(count($facility_timeslots) > 0)
                        <p style="font-size: 16px;"><b>Hours</b></p>
                        <ul class="list-group">
                            @foreach($facility_timeslots as $key => $slot)
                            <li class="list-group-item">
                                <span>{{ App\Traits\GetWeekday::weekday($slot->weekday, true) }}</span>
                                <span style="padding-left: 50px; float:right">
                                    @if($slot->is_closed == 1) Closed @else 
                                    {{ date('h:i A', strtotime($slot->start_time)) . ' - '. date('h:i A', strtotime($slot->end_time)) }}
                                    @endif
                                </span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <p style="font-size: 16px;">Parking: {{ $facility->parking_available == 1 ? "Yes" : "No"}}</p>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-12" style="margin: 30px auto;">
                        <input type="hidden" id="latitude" value="{{  $facility->latitude }}">
                        <input type="hidden" id="longitude" value="{{  $facility->longitude }}">
                        <div class="map" id="map" style="height: 280px;"></div>
                    </div>
                </div>
                @endif
                
                <div id="showLocations"></div>

            </div>
            <div class="col-sm-2"></div>


        </div>
    </section>
</div>




<section
    class="parallax section section-height-4 call-to-action overlay overlay-show overlay-op-8 call-to-action-text-light call-to-action-text-background"
    data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('assets/img/generic/generic-square-2.jpg') }}">
    <span class="text-background font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp"
        data-appear-animation-delay="800">IT'S EASY</span>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9">
                <div class="call-to-action-content text-center text-md-left appear-animation"
                    data-appear-animation="fadeInLeftShorter">
                    <h2 class="font-weight-semibold"> Ready. Set. Smile.</h2>
                    <p class="font-weight-light mb-0">Take the free online smile assessment to see if you are a
                        candidate and get started on your journey.</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
                    <a href="{{ url('assessment-form') }}" target="_blank"
                        class="btn btn-light btn-outline btn-rounded btn-3 font-weight-bold btn-h-5 btn-v-4">

                        <span>AM I CANDIDATE?</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

@endsection

@section('js')
<script src="{{ asset('user/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY"></script>
<script>

   

    var facility_id = '';
    if(facility_id != ""){
        $('#facility').hide();
    }

    $('#facility').change(function(e){

        $.ajax({
            url: "{{ route('getLocations') }}",
            type: "POST",
            data: {
                "state" : $(this).val(),
                '_token' : "{{ csrf_token() }}"
            },
            success: function(data){
                $('#showLocations').html(data);
            },
            error: function(xhr, status, responseText)
            {
                console.log(xhr);
            }
        });
    });

    function getFacilityDates(facility_id)
    {
        $.ajax({
            url: "{{ route('getFacilityTime') }}",
            type: "POST",
            data: {
                "facility_id" : facility_id,
                '_token' : "{{ csrf_token() }}"
            },
            success: function(data){
                $('.renderFacilityTimespan').html("");
                $('.renderDates').html(data);
            },
            error: function(xhr, status, responseText)
            {
                console.log(xhr);
            }
        });
    }

    $(document).on('click', '#weekday', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            if($(this).val() == "") return;
            $.ajax({
                url: "{{ route('getFacilityWeekdaySpan') }}",
                type: "POST",
                data: {
                    "facility_id" : "{{ $facility ? $facility->facility_id : null }}",
                    "weekday" : $(this).val(),
                    '_token' : "{{ csrf_token() }}"
                },
                success: function(data){
                    $('.renderFacilityTimespan').html(data.view);
                    $('.ShowForm').html(data.form);
                },
                error: function(xhr, status, responseText)
                {
                    console.log(xhr);
                }
            });
        });
    $('#blogCarousel').carousel({
        interval: 5000
    });
    var marker;
    function initMap() {

            var lat = parseFloat(document.getElementById('latitude').value);
            var lng = parseFloat(document.getElementById('longitude').value);


            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 12,
              center: {lat: lat, lng: lng}
            });
            var geocoder = new google.maps.Geocoder();

            marker = new google.maps.Marker({
                map: map,
                position: {lat: lat, lng: lng}
            });
        }
        
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&callback=initMap"></script>
@endsection