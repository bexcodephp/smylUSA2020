@extends('layouts.admin.app')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/operator/emp.css') }}">
@endpush 
@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="row">
            <div class="col mb-2">
                <label>Name:</label>
                <div class="lbl-input">{{$employee->fname." ".$employee->lname}}</div>
            </div>
            <div class="col mb-2">
                <label>Email:</label>
                <div class="lbl-input">{{$employee->email}}</div>
            </div>
            <div class="col mb-2">
                <label>Phone:</label>
                <?php
                    $number = $employee->phone;
                    $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "+1 ($1) $2 $3", $number);
                ?>
                <div class="lbl-input">{{$formatted_number}}</div>
            </div>
            <div class="col mb-2">
                <label>Home address</label>
                <div class="lbl-input">{{$employee->home_address}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-2 address-tab">
                <label>Location:</label>
                <div class="lbl-input">
                    <ol>
                    <?php 
                        $locationsArray = json_decode($employee->location_associated, true);
                        
                     ?>
                    @foreach ($facilities as $location) 
                        <?php 
                            
                            if ($locationsArray != 0 || $locationsArray != null || $locationsArray != '') {
                                if(in_array($location->facility_id,$locationsArray)){
                                    
                        ?>
                            <li>
                                {{ $location->address }}, {{ $location->city }}, {{ $location->state }} - {{ $location->zipcode }}
                            </li>
                        <?php

                                }
                            }
                        ?>                                
                    @endforeach
                    </ol>
                </div>
            </div>
        </div>
        
        <label>License Certificates:</label>
        <div class="licence-wrapper">
                        <?php
                            
                            $files =  $employee->license_certificates;
                            $files = json_decode($files); 
                            //dd($files);
                            $licence = 1;
                            foreach($files as $file){
                                ?>
                                <div class="licence-div" id="licence_div{{$licence}}">
                                    <?php
                                    $extension = pathinfo(storage_path('/employee/operators/license_certificates'.$file), PATHINFO_EXTENSION);
                                    if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
                                    //echo $file;
                                    ?>
                                    
                                    <a onclick="viewCertificates('{{ $file }}','{{$extension}}')" class="licence-doc">
                                        <!-- <img src="{{ asset('images/licence.png')}}" > -->
                                        <img src="{{ url('storage/'.$file) }}" width="100">
                                        <span class="licence-name">{{ "licence".$licence++}}</span>
                                    </a>
                                    <!-- <a onclick="deleteCertificate('{{ $file }}')" class="licence-del"><i class="fa fa-times"></i></a> -->
                            <?php
                                    }else{
                            ?>
                                    <a onclick="viewCertificates('{{ $file }}','{{$extension}}')" class="licence-doc">
                                        <!-- <img src="{{ asset('images/icon_pdf.png')}}"> -->
                                        <img src="{{ url('storage/'.$file) }}" width="100">
                                        <span class="licence-name">{{ "licence".$licence++}}</span>
                                    </a>
                                    <!-- <a onclick="deleteCertificate('{{ $file }}')" class="licence-del"><i class="fa fa-times"></i></a> -->
                            <?php
                                    }
                                    ?>
                                </div>
                                <?php

                            }
                        ?>
                    </div>
        <label>Status:</label>
        {{ Config::get('constants.STATUS.'.$employee->status) }}
    </section>
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
    <!-- /.content -->


<script>

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

</script>

@endsection
