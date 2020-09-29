@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/login.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="resetpassword">
    {{-- slider  --}}
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
            <div class="col-12 mt-3 mb-2 pwd-action">
                <h1 class="title">Generate New Password</h1>
                <h1 class="title hidden">Reset Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg col-12 mt-3 mb-2 sign-in-left">
                <div class="card sign-in-card">
                    <h4 class="color-blue">Sign in Password</h4>
                    <div class="signin-form mt-xxl-6">
                        <form class="row" action="{{ route('verifyEmail', $code) }}" role="form" method="get">
                            {{ csrf_field() }}
                            <input id="email" type="email" class="form-control bg-light border-0 rounded text-1" name="email" value="jayrjoshi8@gmail.com" required autofocus>

                            <div class="col-12 form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control input-gray" name="password" id="password" placeholder="New Password">
                            </div>
                            <div class="col-12 form-group">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control input-gray" name="password_confirmation" id="password-confirm" placeholder="Confirm New Password">
                            </div>
                            <div class="col-12 text-left btn-signin mt-xl-4 my-3">
                               <!--  <a href="{{ url('/loginform') }}" class="btn btn-primary btn-lg text-center">Sign In</a> -->
                                <button type="submit" class="btn btn-primary btn-lg text-center">Sign In</button>
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
    $(document).ready(function() {

    });
</script>
@endpush