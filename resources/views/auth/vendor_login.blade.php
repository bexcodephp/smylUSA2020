@extends('layouts.front.app')

@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <!-- <li><a href="{{ url('/') }}">Home</a></li> -->
                    <li class="active"></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">Vendor Login / Singup</h1>

            </div>
        </div>
    </div>
</section>

        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @include('layouts.errors-and-messages')
                </div>
                <div class="col-md-6 col-lg-5 col-xl-4 mb-5 mb-md-0">
                    <div class="bg-primary rounded p-5">
                        <span class="top-sub-title text-color-light-2">ALREADY A MEMBER?</span>
                        <h2 class="text-color-light font-weight-bold text-4 mb-4">Sign In</h2>

                        <form  id="shopLoginSignIn" role="form" method="POST" action="{{ route('vendor_login') }}">
                        {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col mb-2">
                                    <label class="text-color-light-2" for="shopLoginSignInEmail">EMAIL / USERNAME</label>
                                    <input type="email" value="" maxlength="100" class="form-control bg-light border-0 rounded text-1" name="email" id="shopLoginSignInEmail" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="text-color-light-2" for="shopLoginSignInPassword">PASSWORD</label>
                                    <input type="password" value="" class="form-control bg-light border-0 rounded text-1" name="password" id="shopLoginSignInPassword" required>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="form-group col">
                                    <div class="form-check checkbox-custom checkbox-custom-transparent checkbox-default">
                                        <input class="form-check-input" type="checkbox" id="shopLoginSignInRemember">
                                        <label class="form-check-label text-color-light-2" for="shopLoginSignInRemember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col text-right">
                                    <a href="{{ route('password.request') }}" class="forgot-pw text-color-light-2 d-block">Forgot password?</a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col text-right">
                                    <input type="hidden" name="user_type" value="vendor">
                                    <button type="submit" class="btn btn-dark btn-rounded btn-v-3 btn-h-3 font-weight-bold">SIGN IN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 col-xl-8 pt-3">
                    <span class="top-sub-title">NEW USER</span>
                    <h2 class="font-weight-bold text-4 mb-1">Don't have an account? Register Now!</h2>
                    <br>
                    <form  id="shopLoginRegister" role="form" method="POST" action="{{ route('vendor_register') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterName">NAME:</label>
                                <input type="text" value="" class="form-control bg-light-5 border-0 rounded" name="name" id="shopLoginRegisterName" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterEmail">EMAIL ADDRESS:</label>
                                <input type="email" value="" class="form-control bg-light-5 border-0 rounded" name="email" id="shopLoginRegisterEmail" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterPhone">PHONE:</label>
                                <input type="text" value="" placeholder = "+1 (123) 456–7890" class="form-control bg-light-5 border-0 rounded" name="phone" id="shopLoginRegisterPhone" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterPassword">PASSWORD:</label>
                                <input type="password" value="" class="form-control bg-light-5 border-0 rounded" name="password" id="shopLoginRegisterPassword" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col text-right">
                                <input type="hidden" name="user_type" value="vendor">
                                <button type="submit" class="btn btn-primary btn-rounded btn-v-3 btn-h-3 font-weight-bold">REGISTER NOW</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
