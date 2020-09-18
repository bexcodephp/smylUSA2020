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
            <h3 class="box-title">Edit Facility</h3>
        </div>
        <form action="{{ route('admin.facilities.update', $facility->facility_id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                @method('PUT')
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Facility Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Facility name" class="form-control" value="{{ $facility->name }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="name">Facility Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" placeholder="email" class="form-control" value="{{ $facility->email }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="name">Facility Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" placeholder="phone" class="form-control" value="{{ $facility->phone }}" onkeypress='return restrictAlphabets(event)'>
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
                                    <input type="text" name="address" id="address" placeholder="address" class="form-control" value="{{ $facility->address }}">
                                     <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                                    <label for="name">Zipcode <span class="text-danger">*</span></label>
                                    <input type="text" name="zipcode" id="zipcode" placeholder="zipcode" class="form-control" value="{{ $facility->zipcode }}" onkeypress='return restrictAlphabets(event)'>
                                    <span class="text-danger">{{ $errors->first('zipcode') }}</span>
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
                                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <select id="state" name="state" class="form-control">
                                        <option value="">Select state</option>
                                        <?php 
                                            $state_arr = array();
                                        ?>

                                        @foreach ($states as $state)
                                            <?php 
                                                $state_arr[$state->state_name] = $state->state_id;
                                            ?>
                                            <option id="opt_state_{{ $state->state_id }}" value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                </div>
                            </div>
                            
                            <input type="hidden" id="state_name" value="<?php echo $state_arr[$facility->state]; ?>">

                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                                    <label for="name">City <span class="text-danger">*</span></label>
                                    <select id="city" name="city" name="city" class="form-control">
                                        <option value="">Select city</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    <input id="my-input-searchbox" name="searchbox_location" type="text" placeholder="Search Location Here">
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
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">Facility Image</label>
                            <img src="{{ url('storage/'.$facility->image) }}" width="100"/>
                            <input type="file" name="image" id="image" class="form-control">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">Status<span class="text-danger">*</span></label>
                            <select name="is_active" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>
                    </div>
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
                        <?php //dd(config('constants.WEEKDAYS'));?>
                        <tbody>
                            @foreach(config('constants.WEEKDAYS') as $key =>$days)
                            <tr style="padding: 5px; border: 1px solid;">
                                <td style="width: 30%">{{ $days }}</td> 
                                <td>
                                    <div class="input-group">
                                    <input type="text" class="form-control timepicker" name="start[{{$key}}]" value="{{ isset($timeslots[$key]) ? $timeslots[$key]['start_time'] : '' }}">
                                    
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="end[{{$key}}]" value="{{ isset($timeslots[$key]) ? $timeslots[$key]['end_time'] : '' }}">
                                    
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </td> 
                                <td>
                                    <input type="checkbox" name="closed[{{$key}}]" value="1" {{ (isset($timeslots[$key]) && $timeslots[$key]['is_closed'] == 1) ? "checked" : '' }} >
                                </td> 
                                <!-- <td>
                                    <a href="{{ route('admin.facilities.updateSpan', [$facility->facility_id, 0]) }}" class="btn btn-info">Update Spans</a>
                                </td>  -->
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.facilities.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
                <!-- End time slot-->
            
            <!-- Start Non availability section -->
            <h2>Non-availability Hours</h2>
            <button type="button" name="add" id="addNaHours" class="btn btn-primary">ADD</button>
                <div class="box-body">
                    <table class="timeTable" style="width: 100%;">
                        <thead>
                            <tr style="padding: 5px;">                                
                                <th>Date</th>
                                <!-- <th>Day</th> -->
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php //dd(config('constants.WEEKDAYS'));?>
                        <tbody>
                            @foreach($nontimeslots as $key =>$days)
                            <?php //dd($days['date']);?>
                            <tr style="padding: 5px; border: 1px solid;" id="tr_{{$days['id']}}">
                                <td>
                                <input type="date" name="date[{{$key}}]" class="form-control" value="{{$days['date']}}" id="date_{{$key}}">
                                </td> 
                                <!-- <td style="width: 30%"></td>  -->
                                <td>
                                    <div class="input-group">
                                    <input type="text" class="form-control timepicker" name="start[{{$key}}]" value="{{ isset($days['start_time']) ? $days['start_time'] : '' }}" id="start_time_{{$key}}">
                                    
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="end[{{$key}}]" value="{{ isset($days['end_time']) ? $days['end_time'] : '' }}" id="end_time_{{$key}}">
                                    
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </td>                                
                                <td>
                                <button onclick="updateNonAvailabilityHours('{{ $days["id"] }}','{{ $key }}');" type="button" id="updateNaHours" class="btn mx-2 w-auto btn-edit">update</button>
                                    <button onclick="deleteNonAvailabilityHours('{{ $days["id"] }}');" type="button" class="btn btn-link mx-2 w-auto btn-trash text-red"><i class="fa fa-trash fa-lg"></i></button>
                                </td> 
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
        
        <!-- End Non availability section   -->

            
    </div>
    <!-- /.box -->
    
</section>

<!-- Start modal  -->
<div class="modal fade modal-upload-docs" id="modal_upload_docs" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase btn_blue" id="exampleModalLabel">Add Non-Availability Hours</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <form action="{{ url('admin.facilities.addNonAvailabilityTime', $facility->facility_id) }}" id="addNonAvailabilityTime" method="post">
                        {{ csrf_field() }}
                        <div class="form-row px-2">
                            <div class="input-group col-auto mr-2">
                                <label>Date:</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="input-group col-auto mr-2">
                                <label>From :</label>
                                <input type="text" class="form-control timepicker" name="start_time">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                            </div>
                            <div class="input-group col-auto mr-2">
                                <label>To :</label>
                                <input type="text"  class="form-control timepicker" name="end_time">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                            </div> 
                            <div class="col btn-filter">
                                <button type="submit" name="submit" class="btn btn-primary" id="saveNaHours">submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
           <!-- end modal  -->
<!-- /.content -->
@endsection


@section('js')
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&sensor=false&&libraries=geometry,places"></script>

<script>
    var marker;

    $(document).ready(function(){
        $('#addNaHours').on('click', function () {
            $('#modal_upload_docs').modal('show');
        });        

        $('#modal_upload_docs').on('hidden.bs.modal', function (e) {
            // do something...
        });
        
        $('#state').val($('#state_name').val());

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
                            $('#city').append('<option value="'+obj[i].city_name+'">'+obj[i].city_name+'</option>')
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
        var stateID = $('#state_name').val();
        
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
                        $('#city').append('<option value="'+obj[i].city_name+'">'+obj[i].city_name+'</option>')
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

    function deleteNonAvailabilityHours(id){
        if (confirm('Are you want to delete?')) {            
            $.ajax({
                url:'../deleteNaHours/'+id,
                type:'delete',
                data:{
                    '_token':'{{csrf_token()}}',
                    'id':id
                },
                success:function (data) {
                    $("#tr_"+id).hide();
                }
            });
        }else{
            return false;
        }
    }

    function updateNonAvailabilityHours(id,index){
        var date = $("#date_"+index).val(); 
        var start_time = $("#start_time_"+index).val(); 
        var end_time = $("#end_time_"+index).val(); 
        $.ajax({
            url:'../updateNaHours/'+id,
            type:'post',
            data:{
                '_token':'{{csrf_token()}}',
                'id':id,
                'date':date,
                'start_time':start_time,
                'end_time':end_time
            },
            success:function (data) {
                alert('success');
            }
        })
    }

    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    }
</script>

<script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script>
    //Timepicker
    $('.timepicker').timepicker({
        showInputs: false        
    });
    </script>
<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&callback=initMap"></script> -->
@endsection