@extends('layouts.front.app')
@section('title', 'SmylUSA - Success')
@section('content')
<div role="main" class="main bg-light-5">

            <div class="row justify-content-center text-center py-5 mt-5 mb-3 d-flex p-2">
                <div class="col-sm-12">
                <h2 class="font-weight-bold appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Thank you for booking your appointment with us!<strong class="d-block font-weight-bold text-17"></strong></h2>
                <h4 class="font-weight-bold appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Your Booking is confirmed !<strong class="d-block font-weight-bold text-17"></strong>
                </h4>
                <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" > <br> An email confirmation has been sent to your email</h4>
                </div>
                <div class="col-sm-6 pt-4 mt-5">
                    <h3 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" > <br> Appointment number: {{ $appointment->appointment_id }}</h3>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Appointment Date: {{ date('D, d, M', strtotime($appointment->weekday)) }}
                    </h4>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Appointment Time: {{ date('H:i A', strtotime($appointment->schedule_time)) }}
                    </h4>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="400">
                        Location: {{ $appointment->facility->city . ", " . $appointment->facility->state . ", " . $appointment->facility->address }}
                    </h4>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Facility Phone:
                        {{ $appointment->facility->phone }}
                    </h4>
                <h5 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="400"><br> Best Regards,<br>Customer Care<br>SmylUSA <br> {{ config('app.order_email') }}
                </h5>

                </div>

                <div class="col-sm-6 pt-4 mt-5">
                    <input type="hidden" id="latitude" value="{{  $appointment->facility->latitude }}">
                    <input type="hidden" id="longitude" value="{{  $appointment->facility->longitude }}">
                    <div class="map" id="map" style="height: 280px;"></div>
                </div>
            </div>
     
</div>

@endsection

@section('js')
<script>
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