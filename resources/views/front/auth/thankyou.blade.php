@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/login.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="thankyou">    
    <section class="container">
        <div class="row">
        <h3>Thank you</h3>
        <h3> </h3>
        <h3> </h3><br><br>
            <h3>
                Thank you for registering with SmylUSA. We have sent you an email. 
                Please check your email and complete your registration process.
            </h3>
        <div>
    </section>
</main>
@endsection
@push('scripts')
<script type="text/javascript"></script>
@endpush
