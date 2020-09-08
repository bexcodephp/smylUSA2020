@extends('layouts.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/u_works.css') }}" type="text/css" >
@endpush
@section('content')
<main class="u-works">
    {{--  slider  --}}
    <section class="banner">
        <div class="bannerslider owl-carousel owl-theme">
           <div class="item" style="background-image:url('{{ asset("images/products/works_banner.png") }}')">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">How it works</h1>
                        <h2 class="text-bold">In Three easy steps<br/>SmylUSA delivers the smile you'll love</h2>
                        <a href="" role="button" class="btn btn-primary my-md-3 my-2">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  Three Easy Steps  --}}
    <section class="container py-xxl-6 py-5 steps">
        <div class="row">
            <div class="col-12 mb-3"><h1 class="title">Three Easy Steps</h1></div>
            <div class="col-12 my-md-4 my-3">
                <div class="row">
                    {{--  content  --}}
                    <div class="col-xl-5 col-lg-5 col-md-6 step-media">
                        <div class=" my-3">
                            <div class="media">
                                <img src="{{asset('/images/products/works_icon_step_1.png')}}" class="mr-3" alt="step1">
                                <div class="media-body">
                                    <h4 class="mt-0 text-bold"><span class="clr_blue pr-2">1.</span>Let's Make a<br/> Good Impression</h4>
                                </div>
                            </div>
                            <div class="media-content mt-3">
                                <p>The first step of our process is to get your teeth impression. For your convenience, we provide you with two options. You can visit SmylUSA for a 15 to 20 minutes scan or send us your teeth impression from your location. For this purpose, we provide you with our impression kit which is designed to suit your needs.</p>
                            </div>
                        </div>
                    </div>
                    {{--  image  --}}
                    <div class="col-xl-auto col-lg-auto col-md-6 step-img">
                        <figure>
                            <img src="{{ asset('/images/products/works_step_1.png') }}" />
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-12 my-md-4 my-3">
                <div class="row">
                    {{--  image  --}}
                    <div class="col-xl-auto col-lg-auto col-md-6 step-img order-md-0 order-1">
                         <figure>
                            <img src="{{ asset('/images/products/works_step_2.png') }}" />
                        </figure>
                    </div>
                    {{--  content  --}}
                    <div class="col-xl-5 col-lg-5 col-md-6 step-media order-md-1 order-0">
                        <div class="step-media my-3">
                            <div class="media">
                                <img src="{{asset('/images/products/works_icon_step_2.png')}}" class="mr-3" alt="step1">
                                <div class="media-body">
                                    <h4 class="mt-0 text-bold"><span class="clr_blue pr-2">2.</span>Get set for<br/>alignment</h4>
                                </div>
                            </div>
                            <div class="media-content mt-3">
                                <p>Upon your approval of the design, we deliver the aligners at your doorstep. You can then simply proceed with your guided treatment plan. In addition to this, we also send you our exclusive teeth whitening kit so that you can use it simultaneously, reaching towards your dream smile.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-md-4 my-3">
                <div class="row">
                    {{--  content  --}}
                    <div class="col-xl-5 col-lg-5 col-md-6 step-media">
                        <div class="step-media my-3">
                            <div class="media">
                                <img src="{{asset('/images/products/works_icon_step_3.png')}}" class="mr-3" alt="step1">
                                <div class="media-body">
                                    <h4 class="mt-0 text-bold"><span class="clr_blue pr-2">3.</span>Don't forget to<br/>follow-up</h4>
                                </div>
                            </div>
                            <div class="media-content mt-3">
                                <p>Once you are done with your treatment and have that perfect smile in place, you can place an order for a set of retainers. You can also contact us freely in case you need our whitening treatment.</p>
                            </div>
                        </div>
                    </div>
                    {{--  image  --}}
                    <div class="col-xl-auto col-lg-auto col-md-6 step-img">
                        <figure>
                            <img src="{{ asset('/images/products/works_step_3.png') }}" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- smile news --}}

    <section class="container-fluid py-xxl-6 py-5 smilenews">
        <div class="container">
            <div class="row justify-content-sm-start justify-content-center">
                <div class="col-md-6 col-9 text-center mb-md-0 mb-5">
                    <figure class="img-corner-blue m-auto">
                        <img src="{{asset('images/products/particles_featured_image.jpg')}}" />
                    </figure>
                </div>
                <div class="col-md-6">
                    <div>
                        <h4 class="text-bold">Smile. It's easier than you think or dreamed</h4>
                        <p>We've got good news. Smiling is contagious and everyone is joining the club. So, what are you waiting for? All you have to do is take our online smile assessment and embark on a new journey. It is that simple. SmylUSA helps deliver a smile you'll love safely, discreetly, and without requiring in-person monthly visits. Let us help you spread joy & happiness around you. The more the smiles, the merrier.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- So don't wait --}}
    <section class="container-fluid smile-bottom-bg py-xxl-6 py-5 mt-xxl-6 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="titleinverse">So, Don’t Wait</h1>
                </div>
                <div class="col-xxl-8 col-md-6">
                    <h2>
                        Your new smile is just 3 steps away.
                    </h2>
                </div>
                <div class="col-xxl-4 col-md-6 align-self-end text-center">
                    <a id="" class="btn btn-primary inverse" href="{{ url('/getstarted') }}" role="button">Get Started</a>
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
