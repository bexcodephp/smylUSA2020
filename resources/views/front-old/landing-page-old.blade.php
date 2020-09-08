@extends('layouts.front.app')

@section('title', 'SmylUSA - Contact')

@section('content')

                <style>
                .zoom {
                /* padding: 50px; */
                /* background-color: green; */
                transition: transform .2s; /* Animation */
                /* width: 200px; */
                /* height: 200px; */
                /* margin: 0 auto; */
                }

                .zoom:hover {
                transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
                }
                
                </style>
            <section class="section call-to-action call-to-action-height-2" style="background-color: #2388ed;">
                <div class="container" >
                    <div class="row">
                        <div class="col-md-9 col-lg-9">
                            <div class="call-to-action-content  text-md-left appear-animation"
                                data-appear-animation="fadeInLeftShorter">
                                <h1 class="font-weight-bold" style="color: white;">Good news, you have <br>options!<br></h1><br>
                               <h4  style="color: white;"> You're one step closer to getting a smile you'll love in 2020.<br> All you have to do is choose how you want to start your
                               <br> smile journey.</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInLeftShorter">
                                
                                <a href="{{ url('locations') }}"
                                    class="btn btn-outline btn-rounded btn btn-4 btn-h-3 btn-icon-effect-1 font-weight-bold" style="border: none;">
                                    <img class="zoom" src="{{ asset('assets/img/card1.jpg') }}" height="370px">
                                    <!-- <span class="wrap">
                                        <span>OUR PORTFOLIO</span>
                                        <i class="fas fa-angle-right"></i>
                                    </span> -->
                                </a>
                            </div>
                            <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInLeftShorter">
                            
                                <form action="{{ route('cart.store') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product" value="17">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" style="cursor: pointer"><img src="{{ asset('assets/img/card2.jpg') }}" class="zoom" height="370px">
                                    </button>
                                </form>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

                <section class="page-header" style="background-color: white;">
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
                                <h1 class="font-weight-bold">Get started with a FREE 30-minute visit.</h1>
                                <h5>30-minute - 3D optical scan of your smile, remote orthodontic evaluation and custom treatment plan.</h5>
                
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <br>
                        <a href="{{ url('locations') }}">
                        <button type="submit" class="btn btn-primary btn-rounded btn-v-5 btn-h-4 font-weight-bold" style="font-size: 18px;">Visit Our Centers</button></a>
                    </div>
                </section>


    <section
        class="parallax section section-height-4 call-to-action overlay overlay-show overlay-op-8 call-to-action-text-light call-to-action-text-background"
        data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('assets/img/1.jpg') }}">
        <span class="text-background font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp"
            data-appear-animation-delay="800">IT'S EASY</span>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9">
                    <div class="call-to-action-content text-center text-md-left appear-animation"
                        data-appear-animation="fadeInLeftShorter">
                        <h2 class="font-weight-semibold">Have you become part of the SmylUSA Family yet?</h2>
                        <p class="font-weight-light mb-0">Join millions of people spreading smiles that make more beatiful.</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
                        <a href="{{ url('login') }}"
                            target="_blank"
                            class="btn btn-light btn-outline btn-rounded btn-3 font-weight-bold btn-h-5 btn-v-4">
    
                            <span>JOIN TODAY</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

                <section class="page-header" style="background-color: white;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="font-weight-bold">See How It Works.</h1>
                               
                          
                <br><br>
                            </div>
                    
                            <iframe height="480" width="500" src="https://www.youtube.com/embed/VEPFvAreQn4?rel=0" style="margin-right: 5%;">
                            </iframe>
                            
                            <iframe height="480" width="500" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0">
                            </iframe>
                        </div>
                    </div>
                    
                </section>

            <br><br>
 			</div>
@endsection
