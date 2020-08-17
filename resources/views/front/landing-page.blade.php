@extends('layouts.front.app')

@section('title', 'SmylUSA - Contact')

@section('content')

     </section>
    
    
    <style>
        .zoom {
            /* padding: 50px; */
            /* background-color: green; */
            transition: transform .2s;
            /* Animation */
            /* width: 200px; */
            /* height: 200px; */
            /* margin: 0 auto; */
        }
    
        .zoom:hover {
            transform: scale(1.05);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
    <section class="section call-to-action call-to-action-height-2" style="background-color: #2388ed;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9">
                    <div class="call-to-action-content  text-md-left appear-animation"
                        data-appear-animation="fadeInLeftShorter">
                        <h1 class="font-weight-bold" style="color: white;">You did great!!</h1><br>
                        <h4 style="color: white;">You are just 3 steps away from the Smile you’ll love.</h4>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInLeftShorter">
    
                        <a href="#"
                            class="btn btn-outline btn-rounded btn btn-4 btn-h-3 btn-icon-effect-1 font-weight-bold"
                            style="border: none;">
                            <img class="" src="{{ asset('assets/img/card1.jpg')}}" height="370px">
                           
                        </a>
                    </div>
                    <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInLeftShorter">
    
                        <a href="#"
                            class="btn btn-outline btn-rounded btn-4 btn-h-3 btn-icon-effect-1 font-weight-bold">
                            <img src="{{ asset('assets/img/card2.jpg')}}" class="" height="370px">
                           
                        </a>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col"><br><br>
                <h2 class="font-weight-bold">HERE'S HOW IT WORKS</h2>
            </div>
        </div><br>
    
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-1 p-0">
                        <div class="card border-0 h-100 py-5">
                            <div class="card-body p-5 appear-animation" data-appear-animation="fadeInRightShorter">
                                <h2 class="font-weight-bold text-5 mb-3" style='color: #2388ed'>1. Let's make a good
                                    impression
                                </h2>
                                <p class="opacity-7 mb-4">The first step of our process is to get your teeth impression.
                                    For your convenience, we provide you with two options. You can visit SmylUSA
                                    for a 15 to 20 minutes scan or send us your teeth impression from your location. For
                                    this
                                    purpose, we provide you
                                    with our impression kit which is designed to suit your needs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-2 p-0">
    
                        <div class="image-frame min-height-300 h-100"><img src="{{ asset('assets/img/17.jpg') }}"
                                class="img-fluid" alt="Responsive image"></div>
                    </div>
                    <div class="col-md-6 order-4 order-md-3 p-0">
                        <div class="image-frame min-height-300 h-100"> <img src="{{ asset('assets/img/12.jpg') }}"
                                class="img-fluid" alt="Responsive image"></div>
                    </div>
                    <div class="col-md-6 order-3 order-md-4 p-0">
                        <div class="card border-0 h-100 py-5">
                            <div class="card-body p-5 appear-animation" data-appear-animation="fadeInLeftShorter">
                                <h2 class="font-weight-bold  text-5 mb-3" style='color: #2388ed'>2. Get set for alignment
                                </h2>
                                <p class=" opacity-7 mb-4">Upon your approval of the design, we deliver the aligners at your
                                    doorstep. You can then simply proceed with your guided treatment plan. In addition to
                                    this,
                                    we also send you our exclusive teeth whitening kit so that you can use it
                                    simultaneously,
                                    reaching towards your dream smile.</p>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-5 p-0">
                        <div class="card border-0 h-100 py-5">
                            <div class="card-body p-5 appear-animation" data-appear-animation="fadeInRightShorter">
                                <h2 class="font-weight-bold  text-5 mb-3" style='color: #2388ed'>3. Don't forget to
                                    follow-up
                                </h2>
                                <p class=" opacity-7 mb-4">Once you are done with your treatment and have that perfect smile
                                    in place, you can place an order for a set of retainers.
                                    You can also contact us freely in case you need our whitening treatment.</p>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-6 p-0">
                        <div class="image-frame min-height-300 h-100"><img src="{{ asset('assets/img/15.jpg') }}"
                                class="img-fluid" alt="Responsive image"></div>
                    </div>
                </div>
            </div>
    
    </div>
    </section>
    
    

    <section class="page-header" style="background-color: white;">
        <div class="col text-center">
            <br>
            <a href="{{ url('product/impression-kit') }}" class="btn btn-primary btn-rounded btn-v-5 btn-h-4 font-weight-bold"
                style="font-size: 18px;">Order Impression Kit</a>
            <a href="{{ url('locations') }}" class="btn btn-primary btn-rounded btn-v-5 btn-h-4 font-weight-bold"
                style="font-size: 18px;">Book an appointment </a>
        </div>
    </section>

    

    <!--<section-->
    <!--        class="parallax section section-height-4 call-to-action overlay overlay-show overlay-op-8 call-to-action-text-light call-to-action-text-background"-->
    <!--        data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('assets/img/1.jpg') }}">-->
    <!--        <span class="text-background font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp"-->
    <!--            data-appear-animation-delay="800">IT'S EASY</span>-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
    <!--                <div class="col-md-9 col-lg-9">-->
    <!--                    <div class="call-to-action-content text-center text-md-left appear-animation"-->
    <!--                        data-appear-animation="fadeInLeftShorter">-->
    <!--                        <h2 class="font-weight-semibold">Have you become part of the SmylUSA Family yet?</h2>-->
    <!--                        <p class="font-weight-light mb-0">Join millions of people spreading smiles that make more beautiful.-->
    <!--                        </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-md-3 col-lg-3">-->
    <!--                    <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">-->
    <!--                        <a href="login.html" target="_blank"-->
    <!--                            class="btn btn-light btn-outline btn-rounded btn-3 font-weight-bold btn-h-5 btn-v-4">-->
        
    <!--                            <span>JOIN TODAY</span>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </section>-->
    
    <br><br>
    </div>
@endsection
