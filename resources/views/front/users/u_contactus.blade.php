@extends('layouts.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/u_contactus.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="u-contactus">
     {{--  slider  --}}
    <section class="banner">
        <div class="hero-img">
            <div class="item" style="background-image:url('{{ asset('images/products/banner_contact_us.png') }}') ">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-wrapper">
        <div class="container contact-detail">
            <div class="row">
                <div class="col-md-7 contact-detail-left">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h1 class="title">Get in Touch With Us</h1>
                        </div>
                        <div class="col-12 mb-3">
                            <p>If you have any further questions or queries,<br/>do not hesitate to get in touch.</p>
                        </div>
                        <div class="col-12">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Subject"></textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-primary text-center">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 contact-detail-right contactus">
                    <ul class="navbar-nav h-100 align-items-center">
                        <li class="nav-item mb-3 my-auto">
                            <div class="media">
                                <img src="{{ asset('images/icons/phone_footer_white.png') }}" class="float-left mr-2" />
                                <div class="d-flex flex-column">
                                    <small class="color-white text-bold">Phone Number</small>
                                    <small>813-860-5677</small>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mb-3 my-auto">
                            <div class="media">
                                <img src="{{ asset('images/icons/email_footer_white.png') }}" class="float-left mr-2" />
                                <div class="d-flex flex-column">
                                    <small class="color-white text-bold">Email Address</small>
                                    <small>info@smylusa.com</small>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mb-3 my-auto">
                            <div class="media">
                                <img src="{{ asset('images/icons/location_icon_footer_white.png') }}" class="float-left mr-2" />
                                <div class="d-flex flex-column">
                                    <small class="color-white text-bold">Location</small>
                                    <small>8761 N 56th<br/>St #290757 Tampa,<br/>33617</small>
                                </div>
                            </div>
                        </li>
                    </ul>
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
