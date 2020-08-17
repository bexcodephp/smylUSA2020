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
                <h1 class="font-weight-bold">Verify Email</h1>

            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('layouts.errors-and-messages')
            </div>
            <div class="col-md-12 mb-5 mb-md-0">
                <div class="bg-default rounded p-5">
                    <div>
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif
                    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        @if (Route::has('verification.resend'))
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
@endsection