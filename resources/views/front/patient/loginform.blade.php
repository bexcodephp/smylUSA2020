@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/patient/loginform.css') }}"  type="text/css" >
@endpush
@section('content')
<style type="text/css">
    form .error {
        color: #ff0000;
    }
</style>
<main class="patient-login-first">
    {{-- slider  --}}
    <section class="banner">
        <div class="hero-img">
            <div class="item" style="background-image:url('{{ asset('images/products/ourvalues.png') }}') ">
                <div class="caption container d-none h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">Am I A Candidate</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-2">
                <h1 class="title">FILL THIS INFORMATION</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-xxl-5 mb-md-3 mb-3">
                {{-- links for tab content panel  --}}
                <ul class="nav nav-tabs tablist" id="myTabs" role="tablist">
                    <li role="presentation" class="">
                        <a href="#step_1" class="nav-link active" aria-controls="step_1" id="nav_step_1" role="tab" data-toggle="tab">Step <div class="step-no">1</div></a>
                    </li>
                    <li role="presentation">
                        <a href="#step_2" class="nav-link " aria-controls="step_2" id="nav_step_2" role="tab" data-toggle="tab">Step <div class="step-no">2</div></a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#step_3" class="nav-link disabled" aria-controls="step_3" id="nav_step_3" role="tab" data-toggle="tab">Step <div class="step-no">3</div></a>
                    </li>
                    <li role="presentation">
                        <a href="#step_4" class="nav-link disabled" aria-controls="step_4" id="nav_step_4" role="tab" data-toggle="tab">Step <div class="step-no">4</div></a>
                    </li>
                    <li role="presentation">
                        <a href="#step_5" class="nav-link disabled" aria-controls="step_5" id="nav_step_5" role="tab" data-toggle="tab">Step <div class="step-no">5</div></a>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content" id="form-tabContent">
                    {{-- step 1  --}}
                        @include('front.patient.step1')
                    {{-- step 2  --}}
                        @include('front.patient.step2')
                    {{-- step 3  --}}
                        @include('front.patient.step3')
                    {{-- step 4  --}}
                        @include('front.patient.step4')                    
                    {{-- step 5  --}}                    
                        @include('front.patient.step5')                                        
                </div>
            </div>
        </div>
    </section>
</main>

{{-- ADD/EDIT New SMILE/BITE picture modal  --}}
<div class="modal fade upload-new-pic-modal pic-modal" id="upload_new_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
               
                <form class="row justify-content-center" action="{{ route('user.updateTeethImages') }}" method="POST" role="form" id="smilepictures" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 align-self-center mb-3 text-center">
                        <input type="hidden" name="doc_id_name" id="doc_id_hid">
                        <h4 class="sub-title-1 color-blue text-bold" id="title_add_smile">Add New Smile Picture</h4>
                        <h4 class="sub-title-1 color-blue text-bold" id="title_edit_smile">Edit New Smile Picture</h4>
                        <!-- <h4 class="sub-title-1 color-blue text-bold hidden" id="title_add_bite">Add New Bite Picture</h4> -->
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100 card-2 mx-auto">
                            <img class="card-img-top mx-auto" id="doc_src" />
                            <div class="card-body p-0">
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col hidden">
                                <input type="text" class="form-control" id="input_upload_pictures_name" />
                            </div>
                            <div class="col-auto">
                                <div class="custom-file browse-file-btn">
                                    <input type="file" class="custom-file-input" name="image" id="teethpic"> 
                                    <label class="custom-file-label" for="input_upload_pictures" aria-describedby="upload_pictures"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <!-- <button type="submit" class="btn btn-primary btn-edit" id="upload_pictures">Upload</button> -->
                        <button type="submit" class="btn btn-primary" id="upload_pictures" name="submit" value="submit">Upload New Image</button>
                        <button type="submit" class="btn btn-primary" id="edit_pictures" name="save" value ="save">Update Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Upload New STL File picture modal  --}}
<div class="modal fade upload-new-stl-pic-modal pic-modal" id="upload_new_stl_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <form class="row justify-content-center">
                    <div class="col-12 align-self-center mb-3 text-center">
                        <h4 class="sub-title-1 color-blue text-bold" id="title_add_stl">Add New STL File</h4>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100 card-2 mx-auto">
                            <img class="card-img-top mx-auto" src="{{ asset('images/products/steps_image_5.png') }}" />
                            <div class="card-body p-0">
                                <textarea class="form-control" name="" id="" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="input_upload_pictures_name" />
                            </div>
                            <div class="col-auto">
                                <div class="custom-file browse-file-btn">
                                    <input type="file" class="custom-file-input" id="input_upload_pictures">
                                    <label class="custom-file-label" for="input_upload_pictures" aria-describedby="upload_pictures"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary btn-edit" id="upload_stl_pictures">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="{{asset('js/patient/medicalform.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
@endpush
