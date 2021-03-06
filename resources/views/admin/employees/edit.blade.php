@extends('layouts.admin.app')

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
            <form action="{{ route('admin.employees.update', $employee->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put"> 
                    <input id="role" name="role_type" type="hidden" value="{{$request_url}}"> 
                    <div class="form-group {{ $errors->has('fname') ? 'has-error' : '' }}">
                        <label for="fname">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" value="{!! $employee->fname ?: old('fname')  !!}">
                        <span class="text-danger">{{ $errors->first('fname') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('lname') ? 'has-error' : '' }}">
                        <label for="lname">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" value="{!! $employee->lname ?: old('lname')  !!}">
                        <span class="text-danger">{{ $errors->first('lname') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $employee->email ?: old('email')  !!}">
                        </div>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{!! $employee->phone ?: old('phone')  !!}">
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('home_address') ? 'has-error' : '' }}">
                        <label for="phone">Home Address<span class="text-danger">*</span></label>
                        <textarea name="home_address" id="home_address" placeholder="Home Address" class="form-control">{!! $employee->home_address ?: old('home_address')  !!}</textarea>
                        <span class="text-danger">{{ $errors->first('home_address') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('location_associated') ? 'has-error' : '' }}">
                        <label for="location_associated">Location Associated<span class="text-danger">*</span></label>
                        
                        
                        <select name="location_associated[]" id="location_associated" class="form-control select2" multiple="multiple">
                            <option></option>

                            <?php
                                    
                            ?>

                            @foreach($facilities as $location)
                                <?php 
                                if($employee->location_associated != null){
                                    $location_list = json_decode($employee->location_associated);

                                    if(in_array($location->facility_id,$location_list)){

                                    $select = 'selected'; }
                                     else{ $select = "";} 
                                }
                                else{
                                    $select = '';
                                }
                                ?>
                                <option id="" value="{{ $location->facility_id }}" {{$select}} >{{ ucfirst($location->name) }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('location_associated') }}</span>
                    </div>
                    <div>
                        <table class="tableLocation">
                            <thead> 
                                <th>No.</th>                               
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zipcode</th>
                            </thead>
                            <tbody id="add_new_location">
                            <?php $no=1; ?>
                            @foreach($facilities as $location)
                            <?php 
                                if($employee->location_associated != null)
                                {
                                    if(in_array($location->facility_id,$location_list)){  ?>
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $location->name }}</td>
                                        <td>{{ $location->city }}</td>
                                        <td>{{ $location->state }}</td>
                                        <td>{{ $location->zipcode }}</td>
                                    </tr>
                            <?php 
                                    }
                                } ?>
                            @endforeach                           
                            </tbody>                            
                        </table>
                    </div>
                    <div class="form-group {{ $errors->has('license_certificates') ? 'has-error' : '' }}">
                        <label for="license_certificates">License and Certificates<span class="text-danger">*</span></label>
                        <input type="file" name="license_certificates[]" id="license_certificates" placeholder="license and certificates" class="form-control" multiple > 
                        <span class="text-danger">{{ $errors->first('license_certificates') }}</span>
                    </div>
                    <div class="licence-wrapper">
                        <?php                            
                            $files =  $employee->license_certificates; 
                            $files = json_decode($files); 
                            $licence = 0;

                            foreach($files as $file){
                                $licence++;
                        ?>
                                <div class="licence-div" id="licence_div_{{$licence}}">
                                <?php
                                    $extension = pathinfo(storage_path('/employee/operators/license_certificates'.$file), PATHINFO_EXTENSION);
                                    if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
                                    //echo $file;
                                ?>                                    
                                    <a onclick="viewCertificates('{{ $file }}','{{$extension}}')" class="licence-doc">
                                    	<img src="{{ url('storage/'.$file) }}" width="100">
                                        <span class="licence-name">{{ "licence".$licence}}</span>
                                    </a>
                                    <a onclick="deleteCertificate('{{ $file }}','{{ $employee->id }}','{{ $licence }}');" class="licence-del"><i class="fa fa-times"></i></a>
                            <?php
                                    }else{
                            ?>
                                    <a onclick="viewCertificates('{{ $file }}','{{$extension}}')" class="licence-doc">
                                    	<img src="{{ url('storage/'.$file) }}" width="100">
                                        <!-- <img src="{{ asset('images/icon_pdf.png')}}"> -->
                                        <span class="licence-name">{{ "licence".$licence}}</span>
                                    </a>
                                    <a onclick="deleteCertificate('{{ $file }}','{{ $employee->id }}', '{{ $licence }}');" class="licence-del"><i class="fa fa-times"></i></a>
                            <?php
                                    }
                                    ?>
                                </div>
                                <?php

                            }
                        ?>
                    </div>
                    @include('admin.shared.status-select', ['status' => $employee->status])
                </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ URL::previous() }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

{{-- preview document modal --}}
<div class="modal fade modal-view-docs" id="modal_view_docs" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase btn_blue" id="exampleModalLabel">Document Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body" id="docView">            
            <img id="doc_src" class="modal-docs-img">
            <embed id="doc_src1" class="embed-responsive-item modal-docs-pdf" >
      </div>
    </div>
  </div>
</div>
{{-- End preview document modal --}}
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
    
    $("#license_certificates").change(function(){
        var licCount = $('.licence-div').length;
        if (licCount === 3){
            alert("You need to delete existing files befor you upload. Your upload limit is 3.");
            $("#license_certificates").val('');
        } else if(licCount > 3) {
            alert("You are only allowed to upload a maximum of 3 files");
            $("#license_certificates").val('');
        } else {}
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
                    '<td>'+obj[i]['city']+'</td>'+
                    '<td>'+obj[i]['state']+'</td>'+
                    '<td>'+obj[i]['zipcode']+'</td></tr>';
                }
                console.log(locationData);
                
                $("#add_new_location").html(locationData);
            });
         }

         function viewCertificates(doc_name,type) { 
           
            $('#modal_view_docs').modal('show');

            if(type=='png' || type =='jpeg' || type == 'jpg'){
                $("#doc_src").show();
                $("#doc_src1").hide();
                $('#doc_src').attr('src', window.location.origin+'/storage/'+doc_name);
            }else{
                $("#doc_src1").show();
                $("#doc_src").hide();
                $('#doc_src1').attr('src', window.location.origin+'/storage/'+doc_name);
            }
        }

        function deleteCertificate(fileName,op_id,index){
            var counter = index;            
            $.ajax({
                    url:'../delete_certificate/'+op_id,
                    type:'POST',
                    data:{
                        _token:'{{csrf_token()}}',
                        id:op_id,
                        fileName:fileName
                    },
                    success:function (data) {
                        
                        if(data === "true")
                        {
                            $('#licence_div_'+counter).remove();
                        }
                    }
            });
        }
</script>

@endsection