@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/u_getstarted.css') }}" type="text/css" >
@endpush
@section('content')
<main class="u-get-started">
    {{--  slider  --}}
    <section class="banner">
        <div class="hero-img">
            <div class="item">
                <div class="caption container d-flex h-100 py-5">
                    <div class="col-md-auto col-sm-6 my-auto gs-left-content">
                        <h1 class="text-uppercase text-white">YOU DID GREAT!!</h1>
                        <h2 class="text-white remove-br">You are just 3 steps away<br/><span></span>from the Smile you’ll love.</h2>
                    </div>
                    <div class="col gs-banner-img align-self-center">
                        <div class="row justify-content-center">
                            <div class="col-auto mb-md-0 mb-3">
                                <img src="{{asset('images/products/getstarted_1.png')}}" />
                            </div>
                            <div class="col-auto mb-md-0 mb-3">
                                <img src="{{asset('images/products/getstarted_2.png')}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  Three Easy Steps  --}}
    <section class="container py-xxl-6 py-5 steps">
        <div class="row">
            <div class="col-12 mb-3"><h1 class="title">How to get started</h1></div>
            <div class="col-12 my-md-4 my-3">
                <div class="row">
                    {{--  content  --}}
                    <div class="col-xl-5 col-lg-5 col-md-6 step-media">
                        <div class=" my-3">
                            <div class="media">
                                <img src="{{asset('/images/products/works_icon_step_1.png')}}" class="mr-3" alt="step1">
                                <div class="media-body">
                                    <h4 class="mt-0 text-bold"><span class="clr_blue pr-2">1.</span>Teeth Impression</h4>
                                </div>
                            </div>
                            <div class="media-content mt-3">
                                <p>The first step of our process is to take a teeth impression.</p>
                                <p class="mb-0"><span class="pr-2">1.</span>Order Home Impression Kit</p>
                                <p><span class="pr-2">2.</span>Visit a SmylUSA facility for a free Scan</p>
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
                                    <h4 class="mt-0 text-bold"><span class="clr_blue pr-2">2.</span>Aligners Delivery</h4>
                                </div>
                            </div>
                            <div class="media-content mt-3">
                                <p>Upon approval of your design, we will deliver the aligners at your doorstep. </p>
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
                                    <h4 class="mt-0 text-bold"><span class="clr_blue pr-2">3.</span>Professional Support</h4>
                                </div>
                            </div>
                            <div class="media-content mt-3">
                                <p>Regular follow-ups with our customer service executives</p>
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
            <div class="col-12 my-md-4 my-3 text-center btn-submit-get-started">
                <button type="button" class="btn btn-primary mx-3 mb-md-0 mb-2">Order Impression Kit</button>
                <button type="button" class="btn btn-primary mx-3 mb-md-0 mb-2">Book an Appointment</button>
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
