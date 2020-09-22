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
                        <a href="#step_2" class="nav-link disabled" aria-controls="step_2" id="nav_step_2" role="tab" data-toggle="tab">Step <div class="step-no">2</div></a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#step_3" class="nav-link" aria-controls="step_3" id="nav_step_3" role="tab" data-toggle="tab">Step <div class="step-no">3</div></a>
                    </li>
                    <li role="presentation">
                        <a href="#step_4" class="nav-link" aria-controls="step_4" id="nav_step_4" role="tab" data-toggle="tab">Step <div class="step-no">4</div></a>
                    </li>
                    <li role="presentation">
                        <a href="#step_5" class="nav-link" aria-controls="step_5" id="nav_step_5" role="tab" data-toggle="tab">Step <div class="step-no">5</div></a>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content" id="form-tabContent">
                    {{-- step 1  --}}
                    <form action="" class="tab-pane fade show active py-3 step-1 form_cls" name="step_1" id="step_1" role="tabpanel" aria-labelledby="nav-home-tab" method="post">

                    

                    @csrf
                        {{-- personel Information  --}}
                        <div class="row mt-0">
                            <div class="col-12 mb-2">
                                <h4 class="sub-title color-blue text-bold">Personal Information</h4>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>First Name<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control input-white" id="firstname" placeholder="First Name" value="{{ $customer->first_name }}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Last <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control input-white" id="lastname" placeholder="Last Name" value="{{ $customer->last_name }}">
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Moblie Number<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number" value="{{ $customer->phone }}" class="form-control" />
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Date of Birth<span class="text-danger">*</span></label>
                                <input type="text" name="dob" id="dob" value="{{ $customer->dob ? date('m/d/Y', strtotime($customer->dob)) : null }}" class="form-control input-white" disabled/>
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Patient ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-white" id="patient_id" placeholder="000000" value="{{ $customer->patient_id }}" disabled>
                            </div>
                        </div>
                        {{-- Billing Information  --}}
                        <div class="row mt-3">
                            <div class="col-12 mb-2">
                                <h4 class="sub-title color-blue text-bold">Billing Information</h4>
                            </div>
                            <div class="col-12 form-group">
                                <label>Address 1<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-white" id="address_1" name="address_1" placeholder="Type Your Address" value="{{ $address ? $address->address_1 : null}}">
                            </div>
                            <div class="col-12 form-group">
                                <label>Address 2<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-white" id="address_2" name="address_2" placeholder="Type Your Address" value="{{ $address ? $address->address_2 : null}}">
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>City<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-white" id="city" name="city" placeholder="Your City Name" value="{{ $address ? $address->city : null}}">
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>State<span class="text-danger">*</span></label>
                                <select name="state" id="state" class="form-control">
                                    <option selected value="">Select State</option>
                                    @foreach($statesList as $key => $state)
                                    <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Zip Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-white" name="zipcode" id="zipcode" placeholder="000000" value="{{ $address ? $address->zip : null }}">
                            </div>
                        </div>
                        {{-- Billing Information  --}}
                        <div class="row mt-3">
                            <div class="col-12 mb-2 form-inline">
                                <h4 class="sub-title color-blue text-bold mb-2">Shipping Information</h4>
                                <div class="custom-control custom-checkbox ml-sm-4 ">
                                    <input type="checkbox" class="custom-control-input" id="sameAsBilling">
                                    <label class="custom-control-label color-blue text-bold" for="sameAsBilling"><u>Same As Billing Information</u></label>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label>Address 1</label>
                                <input type="text" name="shipping_address_1" class="form-control input-white shipping_address_1" id="shipping_address_1" placeholder="Type Your Address" value="{{ $address ? $address->address_1 : null}}">
                            </div>
                            <div class="col-12 form-group">
                                <label>Address 2</label>
                                <input type="text" id="shipping_address_2" class="form-control input-white shipping_address_2" name="shipping_address_2" placeholder="Type Your Address" value="{{ $address ? $address->address_2 : null}}">
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>City</label>
                                <input type="text" class="form-control input-white shipping_city" id="shipping_city" name="shipping_city" placeholder="Your City Name" value="{{ $address ? $address->city : null}}">
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>State</label>
                                <select name="shipping_state" id="shipping_state" class="form-control" name="state">
                                    <option selected value="">Select State</option>
                                    @foreach($statesList as $key => $state)
                                    <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control input-white shipping_zipcode" name="shipping_zipcode" id="shipping_zipcode" placeholder="000000" value="{{ $address ? $address->zip : null }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-primary next-tab" id="step1_submit">Next</button>
                            </div>
                        </div>
                    </form>

                    {{-- step 2  --}}
                    <form class="tab-pane fade py-3 step-2 form_cls" id="step_2" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row mt-0">
                            <div class="col-12 mb-2">
                                <h4 class="sub-title color-blue text-bold">Medical History Form</h4>
                                <h4 class="sub-title my-3"><small class="color-gray text-bold">Please fill out this form</small></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 mh-caption">
                                        <p>I have Had a Bone Marrow transplant or treatment of hematological maligancies (blood cancers):</p>
                                    </div>
                                    <div class="col-md-6 select-facility select-option mb-3">
                                        {{--
                                            NOTE: please refer the following site for development -
                                            https://developer.snapappointments.com/bootstrap-select/examples/#customize-menu
                                        --}}
                                        {{-- add "multiple" attribute for multi-selection --}}
                                        <select id="" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                                            <option value="ri">Option 1</option>
                                            <option value="wv">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mh-caption">
                                        <p>I have a branded                                                                   retainer:</p>
                                    </div>
                                    <div class="col-md-6 select-facility select-option mb-3">
                                        <select id="" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                                            <option value="ri">Option 1</option>
                                            <option value="wv">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 text-left">
                                <button type="button" class="btn btn-primary prev-tab" id="step2_prev">Prev</button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-primary skip-tab">Skip</button>
                                <button type="button" class="btn btn-primary next-tab">Next</button>
                            </div>
                        </div>
                    </form>
                    {{-- step 3  --}}
                    <form class="tab-pane fade py-3 step-3 form_cls" id="step_3" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row mt-0">
                            <div class="col-12 mb-2">
                                <h4 class="sub-title color-blue text-bold">Account Information</h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input type="text" class="form-control input-white" id="name_email" placeholder="Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="col p-0">
                                    <label>Password</label>
                                    <button type="button" class="btn btn-link p-0 float-right" id="change_pwd"><u>Change</u></button>
                                </div>
                                <input type="password" class="form-control input-white" id="password" placeholder="Password">
                            </div>
                            <div class="col-12 form-group">
                                <div class="col p-0">
                                    <label class="mr-3">Card Details</label>
                                    <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_change"><u>Change</u></button>
                                    <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_add"><u>Add</u></button>
                                </div>
                                <div class="row">
                                    <div class="col-sm-auto mb-3">
                                        <input type="password" class="form-control input-white" id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-auto mb-3">
                                        <input type="password" class="form-control input-white" id="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 text-left">
                                <button type="button" class="btn btn-primary prev-tab">Prev</button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-primary skip-tab">Skip</button>
                                <button type="button" class="btn btn-primary next-tab">Next</button>
                            </div>
                        </div>
                    </form>
                    {{-- step 4  --}}
                    <form class="tab-pane fade py-3 step-4 form_cls" id="step_4" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row mt-0 pictures">
                            <div class="col-12 align-self-center mb-3">
                                <h4 class="sub-title color-blue text-bold">Pictures</h4>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <h6 class="sub-title-1 color-gray text-bold">Upload Your Smile Pictures</h6>
                                    </div>
                                    <div class="col-sm col-auto align-self-center text-right">
                                        <button type="button" class="btn btn-primary" onclick="btnUploadNewPic()">Upload New</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row row-cols-1 row-cols-md-3">
                                    @foreach($teethImages as $image)
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('storage/'.$image->image) }}" />
                                            <div class="card-body">
                                                <p class="card-text">{{$image->description}}</p>
                                            </div>
                                            <div class="card-footer p-0">
                                                <button type="button" class="btn btn-link btn-edit" onclick="btnEditSmilePic('{{ $image->image }}','{{$image->customer_image_id}}','{{$image->description}}')">Edit</button>
                                                <input type="hidden" name="" id="customer_image" value="{{$image->customer_image_id}}" hidden>
                                                <button type="button" onclick="deleteSmilePictures('{{$image->customer_image_id}}')" data-token="{{ csrf_token() }}" class="btn btn-link btn-delete">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- bite pictures --}}
                       <!--  <div class="row mt-0 bite-pictures">
                            <div class="col-12 align-self-center mb-3">
                                <h4 class="sub-title color-blue text-bold">Bite Pictures</h4>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <h6 class="sub-title-1 color-gray text-bold">Upload Your Bite Pictures</h6>
                                    </div>
                                    <div class="col-sm col-auto align-self-center text-right">
                                        <button type="button" class="btn btn-primary" onclick="btnUploadBitePic()">Upload New</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row row-cols-1 row-cols-md-3">
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('images/products/steps_image_5.png') }}" />
                                            <div class="card-body">
                                                <p class="card-text">Image Description will be here Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et tur. Excepteur sint</p>
                                            </div>
                                            <div class="card-footer p-0">
                                                <button type="button" class="btn btn-link btn-edit" onclick="btnEditBitePic()">Edit</button>
                                                <button type="button" class="btn btn-link btn-delete">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('images/products/steps_image_6.png') }}" />
                                            <div class="card-body">
                                                <p class="card-text">Image not have Description</p>
                                            </div>
                                            <div class="card-footer p-0">
                                                <button type="button" class="btn btn-link btn-edit">Edit</button>
                                                <button type="button" class="btn btn-link btn-delete">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('images/products/image_4_home_page_before_footer.jpg') }}" />
                                            <div class="card-body">
                                                <p class="card-text">Image not have Description</p>
                                            </div>
                                            <div class="card-footer p-0">
                                                <button type="button" class="btn btn-link btn-edit">Edit</button>
                                                <button type="button" class="btn btn-link btn-delete">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-6 text-left">
                                <button type="button" class="btn btn-primary prev-tab">Prev</button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-primary skip-tab">Skip</button>
                                <button type="button" class="btn btn-primary next-tab">Next</button>
                            </div>
                        </div>
                    </form>
                    {{-- step 5  --}}
                    <form class="tab-pane fade py-3 step-5 form_cls" id="step_5" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row mt-0 pictures">
                            <div class="col-12 align-self-center mb-3">
                                <h4 class="sub-title color-blue text-bold">STL Files</h4>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <h6 class="sub-title-1 color-gray text-bold">Your STL Files</h6>
                                    </div>
                                    <!-- <div class="col-sm col-auto align-self-center text-right">
                                        <button type="button" class="btn btn-primary"  onclick="btnUploadStl()">Upload New</button>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('images/products/stl_1.png') }}" onclick="btnEditLtsPic()"/>
                                            <div class="card-body">
                                                <p class="card-text">Image Description will be here Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et tur. Excepteur sint</p>
                                            </div>
                                            <!-- <div class="card-footer p-0 justify-content-center">
                                                <button type="button" class="btn btn-link btn-edit" onclick="btnEditLtsPic()">Edit</button>
                                                <button type="button" class="btn btn-link btn-delete">Delete</button>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('images/products/stl_2.png') }}" />
                                            <div class="card-body">
                                                <p class="card-text">Image not have Description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('images/products/stl_3.png') }}" />
                                            <div class="card-body">
                                                <p class="card-text">Image not have Description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="card h-100 card-2">
                                            <img class="card-img-top" src="{{ asset('images/products/stl_4.png') }}" />
                                            <div class="card-body">
                                                <p class="card-text">Image not have Description</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <button type="button" class="btn btn-primary prev-tab">Prev</button>
                            </div>                            
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-primary next-finish">Finish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
{{-- password change modal  --}}
<div class="modal fade change-pwd-modal" id="change_pwd_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <h4 class="text-bold color-blue">Change Password</h4>
                    </div>
                    <div class="col align-self-center text-right">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-12 form-group mt-3">
                        <label class="text-bold">Old Password</label>
                        <input type="password" class="form-control input-white" id="old_pwd" placeholder="Old Password">
                    </div>
                    <div class="col-12 form-group">
                        <label class="text-bold">New Password</label>
                        <input type="password" class="form-control input-white" id="new_pwd" placeholder="New Password">
                    </div>
                    <div class="col-12 form-group">
                        <label class="text-bold">Re Enter New Password</label>
                        <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Change Card Details modal  --}}
<div class="modal fade card-detail-change-modal" id="card_detail_change_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <h4 class="text-bold color-blue">Change Card Details</h4>
                    </div>
                    <div class="col align-self-center text-right">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Name On Card</label>
                                <input type="password" class="form-control input-white" id="old_pwd" placeholder="Old Password">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Card Number</label>
                                <input type="password" class="form-control input-white" id="new_pwd" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">Expiry</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">CVV</label>
                            </div>
                            <div class="col form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                            <div class="col-sm col-auto form-group">
                                <img src="{{ asset('images/icons/icon_cvv.png') }}" class="icon-cvv" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Add Card Details modal  --}}
<div class="modal fade card-detail-add-modal" id="card_detail_add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <h4 class="text-bold color-blue">Add New Card</h4>
                    </div>
                    <div class="col align-self-center text-right">
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Name On Card</label>
                                <input type="password" class="form-control input-white" id="old_pwd" placeholder="Old Password">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-bold">Card Number</label>
                                <input type="password" class="form-control input-white" id="new_pwd" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">Expiry</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="text-bold">CVV</label>
                            </div>
                            <div class="col form-group">
                                <input type="password" class="form-control input-white" id="re_new_pwd" placeholder="New Password">
                            </div>
                            <div class="col-sm col-auto form-group">
                                <img src="{{ asset('images/icons/icon_cvv.png') }}" class="icon-cvv" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <div class="col">
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
