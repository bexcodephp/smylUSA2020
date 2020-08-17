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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                    
                        <input type="hidden" name="token" value="{{ $token }}">
                    
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="text-color-light-2">E-Mail Address</label>
                    
                                <input id="email" type="email" class="form-control bg-light border-0 rounded text-1" name="email" value="{{ $email or old('email') }}"
                                    required autofocus>
                    
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                        </div>
                    
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="text-color-light-2">Password</label>
                    
                                <input id="password" type="password" class="form-control bg-light border-0 rounded text-1" name="password" required>
                    
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                        </div>
                    
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="text-color-light-2">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control bg-light border-0 rounded text-1" name="password_confirmation" required>
                    
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-dark btn-rounded btn-v-3 btn-h-3 font-weight-bold">RESET PASSWORD</button>
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

