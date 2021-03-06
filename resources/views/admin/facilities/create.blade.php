@extends('layouts.admin.app')

@section('css')
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}">
<style>
    .timeTable td,
    .timeTable th {
        padding: 10px;
    }

    .start-time-error {
        display: none;
        color: red;
    }

    .end-time-error {
        display: none;
        color: red;
    }
</style>
@endsection


@section('content')
<style>
    #my-input-searchbox {
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
        font-size: 15px;
        border-radius: 3px;
        border: 0;
        margin-top: 10px;
        width: 270px;
        height: 40px;
        text-overflow: ellipsis;
        padding: 0 1em;
    }
</style>
<!-- Main content -->
<section class="content">
    <!-- @include('layouts.errors-and-messages') -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">New Facility</h3>
        </div>
        <form action="{{ route('admin.facilities.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Facility Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Facility name" class="form-control" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="name">Facility Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" placeholder="email" class="form-control" value="{{ old('email') }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="name">Facility Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" placeholder="phone" class="form-control" value="{{ old('phone') }}" onkeypress='return restrictAlphabets(event)'>
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="name">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" placeholder="address" class="form-control" value="{{ old('address') }}">
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                                    <label for="name">Zipcode <span class="text-danger">*</span></label>
                                    <input type="text" name="zipcode" id="zipcode" placeholder="zipcode" class="form-control" value="{{ old('zipcode') }}" onkeypress='return restrictAlphabets(event)'>
                                    <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                </div>
                            </div>

                            <!-- <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Latidue <span class="text-danger">*</span></label>
                                        <input type="text" readonly required name="latitude" id="latitude" placeholder="latitude" class="form-control" value="{{ old('latitude') }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Lontitude <span class="text-danger">*</span></label>
                                        <input type="text" readonly required name="longitude" id="longitude" placeholder="longitude" class="form-control" value="{{ old('longitude') }}">
                                    </div>
                                </div> -->

                            <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                            <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">

                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <!-- <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}"> -->
                                    <select id="state" class="form-control">
                                        <option value="">Select state</option>
                                        @foreach ($states as $state)
                                        <option id="opt_state_{{ $state->state_id }}" value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                    <input type="hidden" id="state_name" name="state" />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                                    <label for="name">City <span class="text-danger">*</span></label>
                                    <!-- <input type="text" required name="city" id="city" placeholder="city" class="form-control"
                                            value="{{ old('city') }}"> -->

                                    <select id="city" name="city" name="city" class="form-control">
                                        <option value="">Select city</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <input id="my-input-searchbox" type="text" placeholder="Search Location Here">
                        <div class="map" id="map" style="height: 355px;"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">Facility Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">Status<span class="text-danger">*</span> </label>
                            <select name="is_active" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>
                    </div>

                    <!-- <div class="col-sm-3">
                            <div class="form-group">
                                <label for="status">Parking Available </label>
                                <select name="parking_available" required id="parking_available" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div> -->
                </div>
            </div>

            <!-- Start time slot-->
            <h2>Hours of operation<span class="text-danger">*</span></h2>
            <div class="box-body">
                <table class="timeTable" style="width: 100%;">
                    <thead>
                        <tr style="padding: 5px;">
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Is Closed</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <?php ?>
                    <tbody id="weekdays_body">
                        @foreach(config('constants.WEEKDAYS') as $key =>$days)
                        <tr style="padding: 5px; border: 1px solid;">
                            <td style="width: 30%">{{ $days }}</td>
                            <input type="" id="selectday" value="{{ $days }}" hidden>
                            <td>
                                <div class='input-group date non-timepicker' id='starttime{{$key}}' data-id="{{$key}}">
                                    <input type='text' class="form-control start" id="start_time_{{$key}}" name="start[{{$key}}]" value="{{ old('start[$key]') }}" required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    <span class="start-time-error">{{ $days }} Start time is required</span>
                                </div>
                            </td>

                            <td>
                                <div class='input-group date non-timepicker' id='endtime{{$key}}' data-id="{{$key}}">
                                    <input type='text' class="form-control end" id="end_time_{{$key}}" name="end[{{$key}}]" value="{{ old('start[$key]') }}" required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    <span class="end-time-error">{{ $days }} End time is required</span>
                                </div>
                            </td>

                            <td>
                                <input type="checkbox" name="closed[{{$key}}]" value="1">
                            </td>
                            <!-- <td>
                                    <a class="btn btn-info">Update Spans</a>
                                </td>  -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End time slot-->

            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.facilities.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" id="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection

@section('js')
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&callback=initMap&sensor=false&
libraries=geometry,places"></script> -->

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&sensor=false&&libraries=geometry,places"></script>

<script>
    var marker;
    $(document).ready(function() {
        $('#state').on('change', function() {
            var stateID = $(this).val();

            // alert($('#opt_state_'+stateID).html());
            $('#state_name').val($('#opt_state_' + stateID).html());

            if (stateID) {
                $.ajax({
                    url: 'getcity',
                    type: 'post',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'state_id': stateID
                    },
                    success: function(data) {
                        var obj = Object();

                        obj = jQuery.parseJSON(data);

                        $('#city').html("");

                        for (var i = 0; i < obj.length; i++) {
                            $('#city').append('<option value="' + obj[i].city_name + '">' + obj[i].city_name + '</option>')
                        }
                    }
                })

                // $.ajax({
                //     type:'POST',
                //     url:'/getcity',
                //     data:'state_id='+stateID,
                //     success:function(html){
                //         $('#city').html(html);
                //     }
                // });
            } else {
                $('#city').html('<option value="">Select state first</option>');
            }
        });

        $(window).keydown(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: {
                lat: -34.397,
                lng: 150.644
            }
        });
        var geocoder = new google.maps.Geocoder();

        $('#address').blur(function() {
            geocodeAddress(geocoder, map);
        });

        // document.getElementById('submit').addEventListener('click', function() {
        //   geocodeAddress(geocoder, map);
        // });


        // google.maps.event.addListener(map, 'click', function(event) {
        //     var result = [event.latLng.lat(), event.latLng.lng()];
        //     transition(result);
        // });

    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status === 'OK') {
                if (marker && marker.setMap) {
                    marker.setMap(null);
                }

                resultsMap.setCenter(results[0].geometry.location);
                marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
                $('#latitude').val(results[0].geometry.location.lat());
                $('#longitude').val(results[0].geometry.location.lng());
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function GetCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        initAutocomplete(position.coords.latitude, position.coords.longitude);
    }

    function initAutocomplete(latitude, longitude) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: latitude,
                lng: longitude
            },
            zoom: 6,
            disableDefaultUI: false,
            MyLocationEnabled: true,
            setMyLocationButtonEnabled: true
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('my-input-searchbox');
        var autocomplete = new google.maps.places.Autocomplete(input);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
        var marker = new google.maps.Marker({
            map: map
        });

        // Bias the SearchBox results towards current map's viewport.
        autocomplete.bindTo('bounds', map);
        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'name']);

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var bounds = new google.maps.LatLngBounds();
            marker.setPosition(place.geometry.location);

            var lat = place.geometry.location.lat();
            $('#latitude').val(lat);
            var lng = place.geometry.location.lng();
            $('#longitude').val(lng);

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
            map.fitBounds(bounds);
        });

        addYourLocationButton(map, marker);
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        GetCurrentLocation();
    });
</script>
<script src="{{asset('js/moment-with-locales.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
    //Timepicker
    // $('#starttime').timepicker({
    //     showInputs: false,
    //     //defaultTime: '09:00 AM'
    // });
    // $('#endtime').timepicker({
    //     showInputs: false,
    //     //defaultTime: '5:00 PM'
    // });

    // $('#endtime').val('');
    // $('#starttime').val('');




    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    }


    function TimePickerCtrl(id) {
        var startTime = $("#start_time_" + id).datetimepicker({
            format: 'hh:mm a'
        });

        var endTime = $(".non-timepicker").datetimepicker({
            format: 'hh:mm a',
            minDate: startTime.data("DateTimePicker").date()
        });

        function setMinDate() {
            return endTime
                .data("DateTimePicker").minDate(
                    startTime.data("DateTimePicker").date()
                );
        }

        var bound = false;

        function bindMinEndTimeToStartTime() {

            return bound || startTime.on('dp.change', setMinDate);
        }

        endTime.on('dp.change', () => {
            bindMinEndTimeToStartTime();
            bound = true;
            setMinDate();
        });
    }

    $(document).ready(function() {
        $('.non-timepicker').on('click', function() {
            var dt = $(this).attr("data-id")
            // alert(dt);
            TimePickerCtrl(dt);
        });
    });

    // $("#submit").on('click', function(){     
    //    // alert("qqq");
    //    var dt = $(this).attr("data-id");
    //    console.log(dt);
    //    // alert(dt);
    //    var fieldname = $("#start_time_"+dt);
    //    console.log(fieldname);
    //    // alert(fieldname);
    //    if(fieldname == ""){
    //        $(".start-time-error").show();     
    //    } 

    //   // if(){
    //   //      $(".end-time-error").show();     
    //   //  }

    // });
</script>
@endsection