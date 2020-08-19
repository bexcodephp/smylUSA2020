@extends('layouts.admin.app')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/operator/operator.css') }}">
@endpush
@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.employees.store') }}" method="post" class="form" enctype="multipart/form-data"> 
                <div class="box-body">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="fname">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" value="{{ old('fname') }}">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" value="{{ old('lname') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="location_associated">Location Associated </label>
                        <select name="location_associated[]" id="location_associated" class="form-control select2" multiple>
                            <option></option>
                            @foreach($facilities as $location)
                                <option id="" value="{{ $location->facility_id }}">{{ ucfirst($location->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div >
                        <table class="table">
                            <thead  > 
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
                    <div class="form-group">
                        <label for="license_certificates">License and Certificates</label>
                        <input type="file" name="license_certificates" id="license_certificates" placeholder="license and certificates" class="form-control">
                    </div>
                    
                    @include('admin.shared.status-select', ['status' => 0])
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <div class="btn-group">
                            <a href="{{ route('admin.employees.index') }}" class="btn btn-default">Back</a>
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
$(document).ready(function() {
    $("#location_associated").change(function () {        
        var prevSelect = $("#MultiSelect_Preview").select2();
        prevSelect.val($(this).val()).trigger('change');
        var id=$(this).val();
        getLocation(id);
    });
});
</script>
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
                    //var no = i++;
                    // $("#add_new_location").append('<div class="form-row mb-2"> <div class="col ml-1 mr-2"> <p>Address: '+obj[i]['address']+'</p></div>'
                    // +'<div class="col mr-2"> <p>State: '+obj[i]['state']+'</p> </div><div class="col mr-2"> <p>City: '+obj[i]['city']+
                    // '</p> </div><div class="col mr-2"> <p>Zipcode: '+obj[i]['zipcode']+'</p> </div></div>');

                   
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
</script>
@endsection
