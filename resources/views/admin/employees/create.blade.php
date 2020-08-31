@extends('layouts.admin.app')
<!-- @push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/operator/operator.css') }}">
@endpush -->
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
                        <label for="phone">Home Address<span class="text-danger">*</span></label>
                        <textarea name="home_address" id="home_address" placeholder="Home Address" class="form-control" value="">{{ old('home_address') }}</textarea>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="license_certificates">License and Certificates<span class="text-danger">*</span></label>
                        <input type="file" name="license_certificates[]" id="license_certificates" placeholder="license and certificates" class="form-control" multiple >
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
$(document).ready(function() {
    $("#tableLocation").hide();
    $("#location_associated").change(function () {   
        $("#tableLocation").show();     
        var prevSelect = $("#MultiSelect_Preview").select2();
        prevSelect.val($(this).val()).trigger('change');
        var id=$(this).val();
        getLocation(id);
    });
    $("#license_certificates").change(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length) > 3){
            alert("You are only allowed to upload a maximum of 3 files");
        }
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
