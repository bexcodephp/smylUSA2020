@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">New Facility</h3>
            </div>
            <form action="{{ route('admin.facilities.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Facility Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Facility Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" placeholder="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Facility Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" placeholder="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" placeholder="address" class="form-control" value="{{ old('address') }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Zipcode <span class="text-danger">*</span></label>
                                        <input type="text" name="zipcode" id="zipcode" placeholder="zipcode" class="form-control"
                                            value="{{ old('zipcode') }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
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
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">City <span class="text-danger">*</span></label>
                                        <input type="text" required name="city" id="city" placeholder="city" class="form-control"
                                            value="{{ old('city') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="map" id="map" style="height: 355px;"></div>
                        </div>
                    </div>

                    <div class="row">
                       
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="image">Facility Image </label>
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

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="status">Parking Available </label>
                                <select name="parking_available" required id="parking_available" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.facilities.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection


@section('js')
    <script>
        var marker;
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 12,
              center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();

            $('#address').blur(function(){
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
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFwwS2kdFZZ2xk-zTShxSofwKP4wqqUYY&callback=initMap"></script>
@endsection