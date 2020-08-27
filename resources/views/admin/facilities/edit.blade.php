@extends('layouts.admin.app')

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
    @include('layouts.errors-and-messages')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Facility</h3>
        </div>
        <form action="{{ route('admin.facilities.update', $facility->facility_id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                @method('PUT')
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Facility Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                                value="{{ $facility->name }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Facility Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" placeholder="email" class="form-control"
                                value="{{ $facility->email }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Facility Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" placeholder="phone" class="form-control"
                                value="{{ $facility->phone }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" placeholder="address"
                                        class="form-control" value="{{ $facility->address }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Zipcode <span class="text-danger">*</span></label>
                                    <input type="text" name="zipcode" id="zipcode" placeholder="zipcode"
                                        class="form-control" value="{{ $facility->zipcode }}">
                                </div>
                            </div>

                            <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Latidue <span class="text-danger">*</span></label>
                                    <input type="text" readonly required name="latitude" id="latitude"
                                        placeholder="latitude" class="form-control" value="{{ $facility->latitude }}">
                                </div>
                            </div> -->
                            
                            <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Lontitude <span class="text-danger">*</span></label>
                                    <input type="text" readonly required name="longitude" id="longitude"
                                        placeholder="longitude" class="form-control" value="{{ $facility->longitude }}">
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">City <span class="text-danger">*</span></label>
                                    <input type="text" required name="city" id="city"
                                        placeholder="city" class="form-control" value="{{ $facility->city }}">
                                </div>
                            </div> -->
                            
                            <input type="hidden" name="latitude" id="latitude" value="{{ $facility->latitude }}">
                            <input type="hidden" name="longitude" id="longitude" value="{{ $facility->longitude }}">
                            <input type="hidden" id="state_id" value="{{ $facility->state }}">
                            <input type="hidden" id="city_id" value="{{ $facility->city }}">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select id="state" name="state" class="form-control">
                                        <option value="">Select state</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">City <span class="text-danger">*</span></label>
                                    <select id="city" name="city" name="city" class="form-control">
                                        <option value="">Select city</option>
                                    </select>
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
                    <!-- <div class="col-sm-3">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control" value="{{ $facility->state }}">
                        </div>
                    </div> -->

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="image">Facility Image </label>
                            <img src="/storage/app/public/{{ $facility->image }}" width="100"/>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="status">Status </label>
                            <select name="is_active" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.facilities.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection


@section('js')
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&sensor=false&&libraries=geometry,places"></script>

<script>
    var marker;

    $(document).ready(function(){

        $('#state').val($('#state_id').val());

        $('#state').on('change', function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    url:'../getcity',
                    type:'post',
                    data:{
                        '_token':'{{csrf_token()}}',
                        'state_id':stateID
                    },
                    success:function (data) {
                        var obj = Object();

                        obj = jQuery.parseJSON(data);

                        $('#city').html("");

                        for(var i=0;i<obj.length;i++)
                        {
                            $('#city').append('<option value="'+obj[i].city_id+'">'+obj[i].city_name+'</option>')
                        }
                    }
                })
            }else{
                $('#city').html('<option value="">Select state first</option>'); 
            }
        });

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });


    });

    function GetCity()
    {
        var stateID = $('#state_id').val();
        
        if(stateID){
            $.ajax({
                url:'../getcity',
                type:'post',
                data:{
                    '_token':'{{csrf_token()}}',
                    'state_id':stateID
                },
                success:function (data) {
                    var obj = Object();

                    obj = jQuery.parseJSON(data);

                    $('#city').html("");

                    for(var i=0;i<obj.length;i++)
                    {
                        $('#city').append('<option value="'+obj[i].city_id+'">'+obj[i].city_name+'</option>')
                    }
                    
                    $('#city').val($('#city_id').val());
                }
            })
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    }

    GetCity();

    initAutocomplete(parseFloat(document.getElementById('latitude').value),parseFloat(document.getElementById('longitude').value));

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

        $('#address').blur(function(){
            geocodeAddress(geocoder, map);
        });
    }

        // var numDeltas = 100;
        // var delay = 10; //milliseconds
        // var i = 0;
        // var deltaLat;
        // var deltaLng;

        // function transition(result){
        //     i = 0;
        //     deltaLat = (result[0] - position[0])/numDeltas;
        //     deltaLng = (result[1] - position[1])/numDeltas;
        //     moveMarker();
        // }

        // function moveMarker(){
        //     position[0] += deltaLat;
        //     position[1] += deltaLng;
        //     var latlng = new google.maps.LatLng(position[0], position[1]);
        //     marker.setTitle("Latitude:"+position[0]+" | Longitude:"+position[1]);
        //     marker.setPosition(latlng);
        //     if(i!=numDeltas){
        //     i++;
        //     setTimeout(moveMarker, delay);
        //     }
        // }

        //   $('#address').blur(function(){
        //     geocodeAddress(geocoder, map);
        //   });


    
          function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function(results, status) {
              if (status === 'OK') {
                if(marker && marker.setMap)
                {
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
            initAutocomplete(position.coords.latitude,position.coords.longitude);
        }

        function initAutocomplete(latitude,longitude) {
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

            marker = new google.maps.Marker({
                map: map,
                position: {lat: latitude, lng: longitude}
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

            //addYourLocationButton(map, marker);
        }

        // document.addEventListener("DOMContentLoaded", function(event) {
        //     GetCurrentLocation();
        // });
</script>
<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&callback=initMap"></script> -->
@endsection