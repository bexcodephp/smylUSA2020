@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/login.css') }}" type="text/css">
@endpush
@section('content')
<main class="thankyou">
    <section class="container d-flex">
        <div class="row justify-content-center m-auto">
            <div class="col-12 align-self-center">
                <h1 class="my-3 text-center text-uppercase text-bold color-blue">Thank you</h1>
                <h4 class="my-3 text-center">Thank you for registering with SmylUSA. We have sent you an email.<br />Please check your email and complete your registration process.</h4>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
<script type="text/javascript"></script>
@endpush