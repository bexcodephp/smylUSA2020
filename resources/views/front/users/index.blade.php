@extends('layouts.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="home">
    {{--  slider  --}}
    <section class="banner homebanner">
        <div class="bannerslider owl-carousel owl-theme ">
           <div class="item" style="background-image:url('{{ asset("images/products/slide_17_1.png") }}')">
                {{--  <img src="{{ asset("images/products/slide_17_1.png") }}" class="img-fluid" />  --}}
                <div class="caption container d-flex h-100 py-5 animate__bounceInLeft">
                    <div class="my-auto">
                        <h1 class="">Smile More<br/>Confidently.</h1>
                        <a href="" role="button" class="btn btn-primary my-md-3 my-2">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image:url('{{ asset("images/products/slide_17_2.png") }}')">
                {{--  <img src="{{ asset("images/products/slide_17_2.png") }}" class="img-fluid" />  --}}
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="">Smile More<br/>Confidently.</h1>
                        <a href="" role="button" class="btn btn-primary my-md-3 my-2">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  mission section  --}}
    <section class="container mission py-xxl-6 py-5">
        <div class="row">
            {{-- <div class="col-12 order-1 mb-3"></div> --}}
            <div class="col-xxl-5 col-md-4 align-items-center text-md-left text-center order-md-0 order-0 mb-md-0 mb-2">
                <h1 class="title">our mission</h1>
                <p>To brighten people’s Smyl, self-confidence and charisma. To offer cost-effective aligner, teeth whitening and dental impression services that are accessible, easy to manage and customizable. To offer people a new, safe, and easy to administer treatment for teeth  traightening and whitening services.</p>
                <a name="" id="" class="btn btn-primary" href="#" role="button">More about us</a>
            </div>
            <div class="col-xxl-7 col-md-7 align-items-center align-self-center text-right order-md-1 order-1 mb-md-0 mb-2">
                <img src="{{ asset('images/products/our_mission_image.png') }}" />
            </div>
        </div>
    </section>
    {{--  why choose smylUSA  --}}
    <section class="container whychoose py-xxl-6 py-5">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="title">Why choose smylUSA?</h1>
            </div>
            <div class="col-12">
                <div class="media wchi1">
                    <div class="align-self-center mr-3 mediaimg" style="background-image: url('{{ asset("images/icons/why_chose_icon_1_normal.png") }}')"></div>
                    <div class="media-body my-auto">
                        <h2 class="mt-0">Quality</h2>
                        <p>We use the latest technology to design our customized Clear Aligners. Our Clear Aligners are designed with the highest quality materials to give you a comfort fit and effective results.</p>
                    </div>
                </div>
                <div class="media wchi2">
                    <div class="align-self-center mr-3 mediaimg" style="background-image: url('{{ asset("images/icons/why_chose_icon_2_normal.png") }}')"></div>
                    <div class="media-body my-auto">
                        <h2 class="mt-0">Convenience</h2>
                        <p>Avoid the hassle of appointments and routine visits to the clinic. We deliver easy to use impression kit delivered right at your doorstep and then your customized Clear Aligners are shipped to you at your home.</p>
                    </div>
                </div>
                <div class="media wchi3">
                    <div class="align-self-center mr-3 mediaimg" style="background-image: url('{{ asset('images/icons/why_chose_icon_3_normal.png') }}')"></div>
                    <div class="media-body my-auto">
                        <h2 class="mt-0">Affordability</h2>
                        <p>We offer you our services at an affordable price.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- how it works --}}
    <section class="container-fluid hiworks py-xxl-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="title">how it works</h1>
                </div>
                <div class="col-12">
                    <div class="row justify-content-between">
                        <div class="col-md-3 hiworks1 slidein">
                            <div class="hiworksimg"></div>
                            <h4>1. Impression</h4>
                            <p>The first step of our process is to get your teeth impression.</p>
                        </div>
                        <div class="col-md-auto hiworks2 hiwarrow hiworks2arrow slidein"></div>
                        <div class="col-md-3 hiworks2 slidein">
                            <div class="hiworksimg"></div>
                            <h4>2. Alignment</h4>
                            <p>The first step of our process is to get your teeth impression.</p>
                        </div>
                        <div class="col-md-auto hiworks3 hiwarrow hiworks3arrow slidein"></div>
                        <div class="col-md-3 hiworks3 slidein">
                            <div class="hiworksimg"></div>
                            <h4>3. Follow-Up</h4>
                            <p>The first step of our process is to get your teeth impression.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-right">
                    <a id="" class="btn morebtn" href="{{ url('/works') }}" role="button">
                        Learn More<img src="{{ asset('images/icons/learn_more_aerrow.png') }}" class="ml-2" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- our pricing --}}
    <section class="container ourprice py-xxl-6 py-5">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="title">how it works</h1>
                <h2 class="subtitle my-4">We have offer two easy ways to pay</h2>
            </div>
            <div class="col-md-6 mb-md-2 mb-5">
                <div class="card text-center ml-md-auto">
                    <div class="card-header">
                        <h4 class="card-title">One Time Payment</h4>
                    </div>
                    <div class="card-body">
                        <h5>$1999</h5>
                        <p>Easy one-time payment option</p>
                        <h5>You save 20%</h5>
                        <p>Get your custom clear aligner shipped to your doorstep with premium teeth whitening kit Includes Teeth Impression Kit</p>
                    </div>
                    <div class="card-footer">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-md-2 mb-4">
                <div class="card text-center mr-auto-md">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Installments</h4>
                    </div>
                    <div class="card-body">
                        <h5>$70- $90/ month</h5>
                        <p>Easy monthly payment plan<br/>No credit checks, no forms to fill out</p>
                        <h5>$200 Deposit, <br/>$ 70-90/month for 24 months ($2360 total).</h5>
                        <p>Get your custom clear aligner shipped to your doorstep</p>
                    </div>
                    <div class="card-footer">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- your smile making --}}
    <section class="container smile py-xxl-6 py-5">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="title mb-xxl-3">Your smile is making life around you</h1>
                <h1 class="title smiletitle1">more beautiful.</h1>
            </div>
        </div>
        <div class="row isotop justify-content-center">
            <div class="col-md-4 my-4 isotopimg">
                <figure>
                    <img src="{{ asset('images/products/image_1_home_page_before_footer.jpg') }}" />
                </figure>
            </div>
            <div class="col-md-4 my-3 isotopimg">
                <figure>
                    <img src="{{ asset('images/products/image_2_home_page_before_footer.jpg') }}" />
                </figure>
            </div>
            <div class="col-md-4 my-3 isotopimg">
                <figure>
                    <img src="{{ asset('images/products/image_3_home_page_before_footer.jpg') }}" />
                </figure>
            </div>
            <div class="col-md-4 my-3 isotopimg">
                <figure>
                    <img src="{{ asset('images/products/image_4_home_page_before_footer.jpg') }}" />
                </figure>
            </div>
            <div class="col-md-4 my-3 isotopimg">
                <figure>
                    <img src="{{ asset('images/products/image_5_home_page_before_footer.jpg') }}" />
                </figure>
            </div>
            <div class="col-md-4 my-3 isotopimg">
                <figure>
                    <img src="{{ asset('images/products/image_6_home_page_before_footer.jpg') }}" />
                </figure>
            </div>
        </div>
    </section>
    {{-- Ready. Set. Smile --}}
    <section class="container-fluid smile-bottom-bg py-xxl-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="titleinverse">Ready. Set. Smile</h1>
                </div>
                <div class="col-xxl-8 col-md-6">
                    <h2>
                        Take the free online smile assessment to see if you are a candidate and get started on your journey.
                    </h2>
                </div>
                <div class="col-xxl-4 col-md-6 align-self-end text-center">
                    <a  id="" class="btn btn-primary inverse" href="{{ url('/candidate') }}" role="button">Am I A Candidate</a>
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
            loop:true,
            margin:10,
            items:1,
            navigation : false,
            animateIn: 'animate__fadeInUp',
            animateOut: 'animate__fadeOutDown',
            autoplay: true,
            mouseDrag: false,
        });
    });
  </script>
@endpush
