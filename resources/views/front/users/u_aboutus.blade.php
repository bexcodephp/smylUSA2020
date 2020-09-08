@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/u_aboutus.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="u-aboutus">
    {{--  slider  --}}
    <section class="banner">
        <div class="bannerslider owl-carousel owl-theme ">
           <div class="item" style="background-image:url('{{ asset("images/products/aboutus_banner.png") }}')">
                {{--  <img src="{{ asset("images/products/slide_17_1.png") }}" class="img-fluid" />  --}}
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">About Us</h1>
                        <h2 class="text-bold">What Makes Us Different!</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  mission section  --}}
    <section class="container mission py-xxl-6 py-5">
        <div class="row">
            <div class="col-12 order-1 mb-3"><h1 class="title">our mission</h1></div>
            <div class="col-xxl-5 col-md-4 align-items-center text-md-left text-center order-md-2 order-3 mb-md-0 mb-2">
                <p>To brighten people’s Smyl, self-confidence and charisma. To offer cost-effective aligner, teeth whitening and dental impression services that are accessible, easy to manage and customizable. To offer people a new, safe, and easy to administer treatment for teeth  traightening and whitening services.</p>
                <a name="" id="" class="btn btn-primary" href="#" role="button">More about us</a>
            </div>
            <div class="col-xxl-7 col-md-7 align-items-center align-self-center text-center order-md-3 order-2 mb-md-0 mb-2">
                <img src="{{ asset('images/products/our_mission_image.png') }}" />
            </div>
        </div>
    </section>
    {{--  our vision  --}}
    <section class="container-fluid bg-left-center ourvision height-vh7565 py-xxl-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 ml-sm-auto align-self-center">
                    <div class="ourvision-card bg-center galss-dots my-auto">
                        <div class="my-auto glass-content">
                            <h1 class="title">our vision</h1>
                            <h4>Empowering people by offering them a great Smyl at an affordable price</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  our Values  --}}
    <section class="container-fluid bg-center ourvvalues height-vh7565 py-xxl-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-sm-7 align-self-center  mt-xxl-6">
                    <div class="ourvalue-card bg-center galss-dots">
                        <div class="my-auto glass-content">
                            <h1 class="title">Our Values</h1>
                            <h4>Innovation, Efficiency, Integrity, Reliability, Reputation.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  Dr Nish  --}}
    <section class="container-fluid drnish py-xxl-6 py-5">
        <div class="container d-flex">
            <div class="row align-items-center">
                <div class="col-sm-6 mb-sm-0 mb-4">
                    <div class="drnish-card text-center">
                        <img src="{{ asset('/images/products/drnish.png')}}" class="drnishimg"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="drnish-card">
                        <h1 class="title">Dr. Nish Patel</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
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
        var owl = $('.bannerslider');
        owl.owlCarousel({
            loop:false,
            items:1,
            navigation : false,
            autoplay: false,
            mouseDrag: false,
            touchDrag: false,
        });
    });
  </script>
@endpush
