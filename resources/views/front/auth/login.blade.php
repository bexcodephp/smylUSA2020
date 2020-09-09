@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"  type="text/css" >
@endpush
@section('content')
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
                    <div class="signin-form mt-xxl-6">
                        <form  id="shopLoginSignIn" class="row" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                            <div class="col-12 form-group">
                                <label>Email / User Name</label>
                                <input type="text" class="form-control input-gray" id="name_email" placeholder="Name">
                            </div>
                            <div class="col-12 form-group">
                                <label>Password</label>
                                <input type="password" class="form-control input-gray" id="password" placeholder="Password">
                            </div>
                            <div class="col-12 mt-3 input-remember">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberme">
                                    <label class="custom-control-label" for="rememberme">Remember Me</label>
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
                    <div class="register-form mt-3">
                        <form class="row" method="POST" action="{{ route('register') }}">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control input-white" disabled id="f_name" placeholder="First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control input-white" id="l_name" placeholder="Last Name">
                            </div>
                            <div class="col-12 form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control input-white" id="email" placeholder="Email Address">
                            </div>
                            <div class="col-12 form-group hidden">
                                <label>Password</label>
                                <input type="password" class="form-control input-white" id="r_password" placeholder="Password">
                            </div>
                            <div class="col-12 form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control input-white" id="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-12 text-left btn-register mt-xl-3 my-3">
                                <!-- <a href="{{ url('/loginform') }}" class="btn btn-primary btn-lg text-center">Register Now</a> -->
                                <button type="submit" class="btn btn-primary btn-lg text-center">REGISTER NOW</button>
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
    $(document).ready(function(){

    });
  </script>
@endpush
