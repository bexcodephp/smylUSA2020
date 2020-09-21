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
                <h1 class="title">Forgot Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg col-12 mt-3 mb-2 sign-in-left">
                <div class="card sign-in-card">
                    <h4 class="color-blue">Please enter your email address to recover password for your account.</h4>
                    <div class="signin-form mt-3">
                        <form class="row" role="form" method="post">
                            <div class="col-12 form-group">
                                <label>Email Id</label>
                                <input type="email" class="form-control input-gray" id="" placeholder="Enter Register Email-Id">
                            </div>
                            <div class="col-12 text-left btn-signin mt-xl-4 my-3">
                               <!--  <a href="{{ url('/loginform') }}" class="btn btn-primary btn-lg text-center">Sign In</a> -->
                                <button type="submit" class="btn btn-primary btn-lg text-center">Submit</button>
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