@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"  type="text/css" >
@endpush
@section('content')
<style type="text/css">
    form .error {
        color: #ff0000;
    }
</style>
<main class="login">
    {{--  slider  --}}
    <section class="banner">
        <div class="hero-img">
            <div class="item" style="background-image:url('{{ asset('images/products/banner_location.jpg') }}') ">
                <div class="caption container d-flex h-100 py-5">
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
                <h1 class="title">SIGN IN / REGISTER</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg col-12 mt-3 mb-2 sign-in-left">
                <div class="card sign-in-card">
                    <h4 class="sign-in-title">Already a Member?</h4>
                    <h4 class="color-blue">Sign in</h4>
                    <div class="mt-xxl-6">
                        <!-- @include('layouts.errors-and-messages') -->
                    </div>
                    <div class="signin-form mt-xxl-6">
                        <form  id="shopLoginSignIn" class="row" role="form" method="POST" action="{{ url('login') }}">
                            {{ csrf_field() }}
                            <div class="col-12 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label>Email / User Name</label>
                                <input type="text" class="form-control input-gray" name="email" placeholder="Email address">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-12 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label>Password</label>
                                <input type="password" class="form-control input-gray" name="password" placeholder="Password">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="col-12 mt-3 input-remember">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shopLoginSignInRemember">
                                    <label class="custom-control-label" for="shopLoginSignInRemember">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-12 text-left forgot-pwd">
                                <a href="#" class="btn-link">Forgot Password?</a>
                            </div>
                            <div class="col-12 text-left btn-signin mt-xl-4 my-3">
                                <button type="submit" class="btn btn-dark btn-rounded btn-v-3 btn-h-3 font-weight-bold">SIGN IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg col-12 mb-2 sign-in-right">
                <div class="card register-card">
                    <h4 class="sign-in-title">New User</h4>
                    <h4 class="color-blue">Don't Have an account? Register Now!</h4>
                    <div class="mt-xxl-6">
                        <!-- @include('layouts.errors-and-messages') -->
                    </div>
                    <div class="register-form mt-3">
                        <form id="shopLoginRegister" class="row" method="POST" role="form" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="col-md-6 form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control input-white" id="f_name" placeholder="First Name" required>
                                {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="col-md-6 form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control input-white" id="l_name" placeholder="Last Name" required>
                            </div>
                            <div class="col-12 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label>Email Address</label>
                                <input type="text" name="email" id="UserEmail" class="form-control input-white" placeholder="Email Address">
                            </div>
                            <div class="col-12 form-group hidden {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control input-white" id="r_password" placeholder="Password" required>
                            </div>
                            <div class="col-12 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control input-white" id="phone" placeholder="Phone Number" onkeypress='return restrictAlphabets(event)'>
                            </div>
                            <div class="col-12 text-left btn-register mt-xl-3 my-3">           
                                <button type="submit" class="btn btn-primary btn-lg text-center" id="btn-submit">REGISTER NOW</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
<script type="text/javascript">
    function LoginP()
    {   
        alert("{{ route('patientlogin') }}");
        var formdata = new FormData($('#login_form')[0]);
        formdata.append('_token','<?php echo csrf_token() ?>');
            $.ajax({
                url: "{{ route('patientlogin') }}",
                type: "POST",
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {                   
                    var obj = Object();
                    obj = jQuery.parseJSON(data);
                    
                    if(obj.status_code == 200)
                    {
                        //location.reload();
                    }
                    else
                    {
                        alert(obj.message);
                    }
                },
                error: function() {
                }
            });
    }

    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    }

    $(document).ready(function() { 
        $('#btn-submit').click(function() {  
        $(".error").hide();
        var hasError = false;
        var firstname = $("#f_name").val();
        var lastname = $("#l_name").val();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddressVal = $("#UserEmail").val();
        var phoneReg = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var phoneVal = $("#phone").val();

        if(!firstname) {
          $("#f_name").after('<span class="error">First Name is required.</span>');
          hasError = true;
        }

        if(!lastname) {
          $("#l_name").after('<span class="error">Last Name is required.</span>');
          hasError = true;
        }

        if(emailaddressVal == '') {
            $("#UserEmail").after('<span class="error">Email is required.</span>');
            hasError = true;
        } else if(!emailReg.test(emailaddressVal)) {
            $("#UserEmail").after('<span class="error">The email must be a valid email address.</span>');
            hasError = true;
        }

        if(phoneVal == '') {
            $("#phone").after('<span class="error">Phone Number is required.</span>');
            hasError = true;
        } else if(!phoneReg.test(phoneVal)) {
            $("#phone").after('<span class="error">Phone Number is required and must be a numeric and 10 digit.</span>');
            hasError = true;
        }

        if(hasError == true) { return false; }
        });
    });

</script>

@endpush
