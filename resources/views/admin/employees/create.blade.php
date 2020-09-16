@extends('layouts.admin.app')
<!-- @push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/operator/operator.css') }}">
@endpush -->
@section('content')
    <!-- Main content -->
    <?php 
        $url = $back_url;
        $uri_parts = explode('/', $url);
        $request_url = end($uri_parts);
        // print_r($request_url);
    ?>
    <section class="content">
        <!-- @include('layouts.errors-and-messages') -->
        <div class="box">
            <form action="{{ route('admin.employees.store') }}" method="post" class="form" enctype="multipart/form-data"> 
                <div class="box-body">
                    {{ csrf_field() }}
                    <input id="role" name="role_type" type="hidden" value="{{$request_url}}">
                    <div class="form-group {{ $errors->has('fname') ? 'has-error' : '' }}">
                        <label for="fname">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" value="{{ old('fname') }}">
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('lname') ? 'has-error' : '' }}">
                        <label for="lname">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" value="{{ old('lname') }}">
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{{ old('phone') }}">
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('home_address') ? 'has-error' : '' }}">
                        <label for="phone">Home Address<span class="text-danger">*</span></label>
                        <textarea name="home_address" id="home_address" placeholder="Home Address" class="form-control" value="">{{ old('home_address') }}</textarea>
                        <span class="text-danger">{{ $errors->first('home_address') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('location_associated') ? 'has-error' : '' }}">
                        <label for="location_associated">Location Associated</label>
                        <select name="location_associated[]" id="location_associated" class="form-control select2" multiple>
                            <option value=""></option>
                            
                            @foreach($facilities as $location)
                            {{$select = ""}}
                            @if(old("location_associated"))
                            <?php 
                                if (in_array($location->facility_id, old("location_associated"))) {
                                    $select = 'selected';
                                } else {
                                    $select = "";
                                }
                            ?>
                            @endif
                                <option value="{{ $location->facility_id }}"  {{$select}}>{{ ucfirst($location->name) }}</option>                                
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('location_associated') }}</span>
                    </div>
                    <div >
                        <table id="tableLocation">
                            <thead> 
                                <th>No.</th>                               
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zipcode</th>
                            </thead>
                            <tbody id="add_new_location">                           
                            </tbody>                            
                        </table>
                    </div>
                    <div class="form-group {{ $errors->has('license_certificates') ? 'has-error' : '' }}">
                        <label for="license_certificates">License and Certificates<span class="text-danger">*</span></label>
                        <input type="file" name="license_certificates[]" id="license_certificates" placeholder="license and certificates" multiple >
                        <span class="text-danger">{{ $errors->first('license_certificates') }}</span>
                    </div>                    
                    @include('admin.shared.status-select', ['status' => 0])
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <div class="btn-group">
                            <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    var locationData = '';
    var cntr = 0;
    function getLocation(id) {
        $.post("{{route('admin.get_location')}}",
            {_token :"<?php echo csrf_token() ?>",
            id:id
        },function(data){
            var obj = Object();
            obj = jQuery.parseJSON(data);
            console.log(obj);
            $("#add_new_location").html("");
            locationData ='';
            for(var i=0;i<obj.length;i++)
            {
                cntr++;
                locationData+= '<tr><td>'+(i+1)+'</td>'+
                '<td>'+obj[i]['address']+'</td>'+
                '<td>'+obj[i]['state']+'</td>'+
                '<td>'+obj[i]['city']+'</td>'+
                '<td>'+obj[i]['zipcode']+'</td></tr>';
            }
            console.log(locationData);
            
            $("#add_new_location").html(locationData);
        });
    }

    $('#table-location').DataTable({
        'searching' : false,
        'bSort' : false,
        'columnDefs' : [
            {
                'orderable': false, 'targets' : -1
            }
        ],
        'sorting' : []
    });

</script>
@endsection
