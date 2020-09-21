@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/table-responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/patient/patient-profile.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/sidebar.css') }}" type="text/css">
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
                <form class="card">
                    <div class="card-header" id="heading_p_info">
                        <div class="mb-0 d-flex align-items-center">
                            <h2 class="card-title color-blue text-bold mb-0">Personal Information</h2>
                            <div class="ml-auto">
                                <button class="btn btn-primary ml-auto" type="button">Update</button>
                                <button class="btn btn-link px-2 ml-md-2 ml-auto btn-collapse" type="button" data-toggle="collapse" data-target="#p_info" aria-expanded="true" aria-controls="p_info">
                                    <i class="fas fa-angle " aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="p_info" class="collapse show" aria-labelledby="heading_p_info" data-parent="#accordion_profile">
                        <div class="card-body">
                            <div class="col-sm-6 form-group">
                                <label>First Name<span class="text-danger">*</span></label>
                                <input type="text" name="firstname" class="form-control input-white" id="firstname" placeholder="First Name" value="">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Last <span class="text-danger">*</span></label>
                                <input type="text" name="lastname" class="form-control input-white" id="lastname" placeholder="Last Name" value="">
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Moblie Number<span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number" value="" class="form-control" />
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Date of Birth<span class="text-danger">*</span></label>
                                <input type="text" name="dob" id="dob" value="" class="form-control input-white" disabled />
                            </div>
                            <div class="col-lg-4 col-sm-6 form-group">
                                <label>Patient ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control input-white" id="patient_id" placeholder="000000" value="" disabled>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
<script src="{{ asset('front/js/sidebar.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
@endpush