@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/sidebar.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/patient/patient-profile.css') }}" type="text/css">
<style type="text/css">
    form .error {
        color: #ff0000;
    }
</style>
@endpush
@section('content')

@include('layouts.front.sidebar-p')
<main class="main-aside patient-profile col-lg col-12 px-lg-5">
    <section class="py-xxl-5 py-4">
        <div class="col-12 mb-4">
            <h3 class="card-title color-blue text-bold">My Profile</h3>
        </div>
        <div class="col-12">
            <div class="accordion" id="accordion_profile">
                <form class="card" role="form" id="myprofile" action="{{ route('user.personal_info') }}" method="POST">
                    @csrf
                    <div class="card-header" id="heading_p_info">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Personal Information</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <button type="submit" class="btn btn-primary ml-auto">Update</button>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse" type="button" data-toggle="collapse" data-target="#p_info" aria-expanded="true" aria-controls="p_info"><i class="fas fa-angle" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="p_info" class="collapse show" aria-labelledby="heading_p_info" data-parent="#accordion_profile">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>First Name<span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control input-white" id="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Last Name<span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control input-white" id="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Moblie Number<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" placeholder="Phone Number" value="{{ $user->phone }}" class="form-control" />
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                    <input type="text" name="dob" id="dob" class="form-control input-white" value="{{ $user->dob ? date('m/d/Y', strtotime($user->dob)) : null }}" disabled />
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Patient ID<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-white" name="patient_id" id="patient_id" placeholder="000000" value="{{ $user->patient_id }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Account Information -->
                <form class="card account-info">
                    <div class="card-header" id="heading_acc_info">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Account Information</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <button class="btn btn-primary ml-auto" type="button">Update</button>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse collapsed" type="button" data-toggle="collapse" data-target="#acc_info" aria-expanded="false" aria-controls="acc_info"><i class="fas fa-angle" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="acc_info" class="collapse" aria-labelledby="heading_acc_info" data-parent="#accordion_profile">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control input-gray" id="name_email" placeholder="Name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col p-0">
                                        <label>Password</label>
                                        <button type="button" class="btn btn-link p-0 float-right" id="change_pwd"><u>Change</u></button>
                                    </div>
                                    <input type="password" class="form-control input-gray" id="password" placeholder="Password">
                                </div>
                                <div class="col-12 form-group">
                                    <div class="col p-0">
                                        <label class="mr-3">Card Details</label>
                                        <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_change"><u>Change</u></button>
                                        <button type="button" class="btn btn-link p-0 mx-3" id="btn_card_detail_add"><u>Add</u></button>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-auto mb-3">
                                            <input type="password" class="form-control input-gray" id="password" placeholder="Password">
                                        </div>
                                        <div class="col-sm-auto mb-3">
                                            <input type="password" class="form-control input-gray" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Billing Information -->
                <form class="card billing-info" id="billing_info">
                    @csrf
                    <div class="card-header" id="heading_bill_info">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Billing Information</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">                                
                                <!-- <button class="btn btn-primary ml-auto" type="submit" id="billing_info_update">Update</button> -->

                                <input type="button" class="btn btn-primary ml-auto" value="Update" id="billing_info_update"/>

                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse collapsed" type="button" data-toggle="collapse" data-target="#bill_info" aria-expanded="false" aria-controls="bill_info">
                                    <i class="fas fa-angle " aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="bill_info" class="collapse" aria-labelledby="heading_bill_info" data-parent="#accordion_profile">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-12 form-group">
                                    <label>Address 1<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-gray" id="billing_address_1" name="billing_address_1" placeholder="Type Your Address" value="{{ $address ? $address->billing_address_1 : null}}">
                                </div>
                                <div class="col-12 form-group">
                                    <label>Address 2<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-gray" id="billing_address_2" name="billing_address_2" placeholder="Type Your Address" value="{{ $address ? $address->billing_address_2 : null}}">
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>City<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-gray" id="billing_city" name="billing_city" placeholder="Your City Name" value="{{ $address ? $address->billing_city : null}}">
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group select-option input-gray">
                                    <label>State<span class="text-danger">*</span></label>
                                    <select id="billing_state" name="billing_state" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                                        <option selected value="">Select State</option>
                                        @foreach($statesList as $key => $billing_state)
                                        <option value="{{ $key }}" @if( $address && $address->billing_state == $key) selected @endif>{{ $billing_state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Zip Code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-gray" name="billing_zip" id="billing_zip" placeholder="000000" value="{{ $address ? $address->billing_zip : null }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Shipping Information -->
                <form class="card shipping-info" id="shipping_info">
                    @csrf
                    <div class="card-header" id="heading_ship_info">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Shipping Information</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <button class="btn btn-primary ml-auto" type="button" id="ship_info_update">Update</button>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse collapsed" type="button" data-toggle="collapse" data-target="#ship_info" aria-expanded="false" aria-controls="ship_info">
                                    <i class="fas fa-angle " aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="ship_info" class="collapse" aria-labelledby="heading_ship_info" data-parent="#accordion_profile">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-12 form-group">
                                    <label>Address 1</label>
                                    <input type="text" name="address_1" class="form-control input-gray address_1" id="address_1" placeholder="Type Your Address" value="{{ $address ? $address->address_1 : null}}">
                                </div>
                                <div class="col-12 form-group">
                                    <label>Address 2</label>
                                    <input type="text" id="address_2" class="form-control input-gray address_2" name="address_2" placeholder="Type Your Address" value="{{ $address ? $address->address_2 : null}}">
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control input-gray city" id="city" name="city" placeholder="Your City Name" value="{{ $address ? $address->city : null}}">
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group select-option input-gray">
                                    <label>State</label>
                                    <select id="state_code" name="state_code" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Option">
                                        <option selected value="">Select State</option>
                                            @foreach($statesList as $key => $state)
                                            <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-6 form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control input-gray" name="zip" id="zip" placeholder="000000" value="{{ $address ? $address->zip : null }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Medical History Form -->
                <form class="card med-history-form">
                    <div class="card-header" id="heading_m_history_form">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Medical History Form</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse collapsed" type="button" data-toggle="collapse" data-target="#m_history_form" aria-expanded="false" aria-controls="m_history_form">
                                    <i class="fas fa-angle " aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="m_history_form" class="collapse" aria-labelledby="heading_m_history_form" data-parent="#accordion_profile">
                        <div class="row row-cols-1 row-cols-md-3">
                            <!-- image 1 -->
                            <div class="col mb-4">
                                <div class="h-100 card-2 card-doc">
                                    <img class="card-img-top" id="img_prv" />
                                    <div class="card-footer p-0">
                                        <button type="button" class="btn btn-link btn-view p-0" onclick="btnViewMedicalForm()">View</button>
                                        <a href="#" class="btn btn-link btn-delete p-0">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <!-- image 2 -->
                        </div>
                    </div>
                </form>
                <!-- Profile Picture -->
                <form class="card profile-picture" id="update_profile">
                    @csrf
                    <div class="card-header" id="heading_prof_pic">
                        <div class="mb-0 d-sm-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Profile Picture</h2>
                            <div class="ml-sm-auto d-flex mt-md-0 mt-3">
                                <div class="form-inline flex-md-wrap flex-nowrap">
                                    <div><input type="text" class="form-control disp-file-name h-auto input-gray" id="file_name" placeholder=".jpeg, .png"></div>
                                    <div class="custom-file browse-file-btn ml-2">
                                        <input type="file" class="custom-file-input" name="avatar" id="img_file_upid"> 
                                        <span id="mgs_ta"></span>
                                        <label class="custom-file-label" for="input_upload_pictures" aria-describedby="upload_pictures"></label>
                                    </div>
                                </div>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse collapsed" type="button" data-toggle="collapse" data-target="#prof_pic" aria-expanded="false" aria-controls="prof_pic">
                                    <i class="fas fa-angle " aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="prof_pic" class="collapse" aria-labelledby="heading_prof_pic" data-parent="#accordion_profile">
                        <div class="row row-cols-1 row-cols-md-3">
                            <!-- image 1 -->
                            <div class="col mb-4">
                                <div class="h-100 card-2 card-doc">
                                    <img class="card-img-top" src="{{ asset('storage/'.$user->avatar) }}" />
                                    <div class="card-footer p-0">
                                        <button type="button" class="btn btn-link btn-view p-0" onclick="btnReplaceProfilePic('{{ $user->avatar }}','{{$user->id}}')">Replace</button>
                                        <!-- <a href="#" class="btn btn-link btn-delete p-0">Delete</a> -->
                                        <button type="button" onclick="deleteProfilePictures('{{$user->id}}')" data-token="{{ csrf_token() }}" class="btn btn-link btn-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <!-- image 2 -->
                        </div>
                    </div>
                </form>
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
{{-- ADD/EDIT New picture modal Profile picture --}}
<div class="modal fade upload-new-prof-pic-modal pic-modal" id="upload_new_prof_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <form class="row justify-content-center" action="{{ route('user.updateProfilePicture') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 align-self-center mb-3 text-center">
                        <h4 class="sub-title-1 color-blue text-bold" id="title_add_smile">Edit New Profile Picture</h4>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card h-100 card-2 mx-auto">
                            <!-- <img class="card-img-top mx-auto" id="" src="{{ asset('images/icons/person_male.png') }}" /> -->
                            <img class="card-img-top mx-auto" id="doc_src" />
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control h-auto disp-file-name" id="input_upload_pictures_name" />
                            </div>
                            <div class="col-auto">
                                <div class="custom-file browse-file-btn">
                                    <input type="file" class="custom-file-input" name="avatar" id="teethpic">
                                    <label class="custom-file-label" for="input_upload_pictures" aria-describedby="input_upload_prof_picture"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary" id="edit_pictures" name="save" value ="save">Update Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- View medical form --}}
<div class="modal fade view-document-modal pic-modal" id="view_document_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <form class="row justify-content-center" action="" method="POST" role="form" enctype="multipart/form-data">
                    <div class="col-12 align-self-center mb-3 text-center">
                        <h4 class="sub-title-1 color-blue text-bold" id="title_add_smile">View Document</h4>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="" src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- <div class="col-12 text-center">
                        <div class="custom-file browse-file-btn">
                            <input type="file" class="custom-file-input" name="images[]" id="input_upload_prof_picture">
                            <label class="custom-file-label" for="input_upload_pictures" aria-describedby="input_upload_prof_picture"></label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-edit" id="">Upload</button>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('front/js/sidebar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
        // change password modal
        $('#change_pwd').on('click', function() {
            $('#change_pwd_modal').modal('show')
        });
        // change btn_card_detail_change modal
        $('#btn_card_detail_change').on('click', function() {
            $('#card_detail_change_modal').modal('show')
        });
        // ADD card detail  modal
        $('#btn_card_detail_add').on('click', function() {
            $('#card_detail_add_modal').modal('show')
        });

    });

    function btnViewMedicalForm() {
        $('#view_document_modal').modal('show');
    }

    function btnReplaceProfilePic(doc_name,doc_id) {
        $('#upload_new_prof_pic_modal').modal('show');
        $("#doc_src").show();
        $('#doc_src').attr('src', window.location.origin+'/storage/'+doc_name);
    }

    $("#myprofile").validate({
        // Specify validation rules
        rules: {
            first_name: "required",
            last_name: "required",    
            phone: {
                required: true,
                digits: true,
                maxlength: 10,
            },
        },
        messages: {
            first_name: {
                required: "Please enter first name",
            },      
            last_name: {
                required: "Please enter last name",
            },     
            phone: {
                required: "Please enter phone number",
                digits: "Please enter valid phone number",
                maxlength: "Phone number field accept only 10 digits",
            },
            
        },
    });

    //Shipping Information update
    $('#ship_info_update').on('click', function () {
        var shippingdetail = new FormData($('#shipping_info')[0]);
        $.ajax({
            url: '/profile/address-info',
            type: "POST",
            data: shippingdetail,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // console.log(data);
                // alert("Shipping Information update");
            },
            error: function() {
                
            }
        });
    });

    //billing Information update
    $('#billing_info_update').on('click', function () {
        var billingdetail = new FormData($('#billing_info')[0]);
        $.ajax({
            url: '/profile/billing-info',
            type: "POST",
            data: billingdetail,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // console.log(data);
                // alert("Billing Information update");
            },
            error: function() {
                
            }
        });
    });

    // profile Picture 
    $('#img_file_upid').on('change',function(ev){
        var image_detail = new FormData($('#update_profile')[0]);
        $.ajax({
            url: '/profile/update-avatar',
            type: "POST",
            data: image_detail,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                location.reload();
                // alert("success");
            },
            error: function() {     
            }
        });
    });

    // $("#billing_info").validate({
    //     // Specify validation rules
    //     rules: {
    //         billing_address_1:"required",
    //         billing_address_2: "required",
    //         billing_city : "required",
    //         billing_state : "required",
    //         billing_zip : "required",
    //     },
    //     messages: {
    //         billing_address_1: {
    //             required: "Please enter your billing address",
    //         },
    //         billing_address_2: {
    //             required: "Please enter your billing address",
    //         },
    //         billing_city: {
    //             required: "Please enter your billing city",
    //         }, 
    //         billing_state: {
    //             required: "Please select your billing state",
    //         },
    //         billing_zip: {
    //             required: "Please enter your billing zip code",
    //         },   
    //     },
    //     submitHandler: function(form) {
    //       form.submit();
    //     }
    // });

    $('#billing_info').validate({

    rules: {
            billing_address_1:"required",
            billing_address_2: "required",
            billing_city : "required",
            billing_state : "required",
            billing_zip : "required",
        },
        messages: {
            billing_address_1: {
                required: "Please enter your billing address",
            },
            billing_address_2: {
                required: "Please enter your billing address",
            },
            billing_city: {
                required: "Please enter your billing city",
            }, 
            billing_state: {
                required: "Please select your billing state",
            },
            billing_zip: {
                required: "Please enter your billing zip code",
            },   
        },
        submitHandler: function(form) {
            form.submit();
        }
});
    function deleteProfilePictures(opId){
            _opId = opId;
            const swalWithBootstrapButtons = swal.mixin({
            confirmButtonClass: 'btn btn-info',
            cancelButtonClass: 'btn btn-info',
            buttonsStyling: true,
        })
    
        swalWithBootstrapButtons({
            title: '',
            text: "Are you sure you want to Delete this smile pictures?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: false
        }).then((result) => {
            if (result.value) {
                var date = moment();
                var newDate = date.format("YYYY-MM-DD hh:mm:ss");
                console.log(newDate);
                $.ajax({
                    url: 'profile/delete-profile-images/'+_opId,
                    type: 'get',
                    success: function(data){
                      location.reload();
                        // console.log(data);
                    }
                });
            }
            else if(result.dismiss === swal.DismissReason.cancel)
                {
                
                }
            })
        }
</script>
@endpush