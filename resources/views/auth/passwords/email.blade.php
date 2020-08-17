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
                <h1 class="font-weight-bold">Reset Password</h1>

            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.errors-and-messages')
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="col-md-6 col-lg-5 col-xl-offset-3 col-xl-4 mb-5 mb-md-0">
                <div class="bg-primary rounded p-5">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col mb-2">
                                <label class="text-color-light-2" for="shopLoginSignInEmail">EMAIL</label>
                                <input type="email" value="" maxlength="100"
                                    class="form-control bg-light border-0 rounded text-1" name="email"
                                    id="shopLoginSignInEmail" required>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col text-right">
                                <button type="submit"
                                    class="btn btn-dark btn-rounded btn-v-3 btn-h-3 font-weight-bold">Send Password Reset Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
@endsection