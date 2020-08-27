@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div>
            <label>Name:</label>
        </div>
        {{$employee->fname." ".$employee->lname}}
        <label>Email:</label>{{$employee->email}}
        <label>Phone:</label>{{$employee->phone}}
        <label>Location Associated:</label>{{$employee->location_associated}}
        <?php $locationsArray = json_decode($employee->location_associated, true); ?>
        @foreach ($facilities as $location) 
                            <?php 

                                if ($locationsArray != 0 || $locationsArray != null || $locationsArray != '') {
                                    if(in_array($location->facility_id,$locationsArray)){
                                        //$no++;
                            ?>
                                <li>{{ $location->address }}</li>
                            <?php

                                    }
                                }
                            ?>                                
                            @endforeach
        <label>License Certificates:</label>{{$employee->license_certificates}}
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
        <label>Status:</label>{{$employee->status}}
    </section>
    <!-- /.content -->
@endsection
