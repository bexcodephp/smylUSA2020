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
                <div class="lbl-input">{{$employee->phone}}</div>
            </div>
            <div class="col mb-2">
                <label>Location Associated:</label>
                <div class="lbl-input">{{$employee->location_associated}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col mb-2 address-tab">
                <label>Address:</label>
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
                                        <img src="{{ asset('images/licence.png')}}" >
                                        <span class="licence-name">{{ "licence".$licence++}}</span>
                                    </a>
                                    <!-- <a onclick="deleteCertificate('{{ $file }}')" class="licence-del"><i class="fa fa-times"></i></a> -->
                            <?php
                                    }else{
                            ?>
                                    <a onclick="viewCertificates('{{ $file }}','{{$extension}}')" class="licence-doc">
                                        <img src="{{ asset('images/icon_pdf.png')}}">
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
    <!-- /.content -->
@endsection
