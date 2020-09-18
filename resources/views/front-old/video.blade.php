@extends('layouts.front.app')

@section('title', 'Products')

@section('content')
<div role="main">
    <div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
</div>
<section id="start" class="section bg-light pt-4 pb-5">
    <div class="container">
        <div class="row text-center mb-4">	
            <div class="col"><br><br>
                <h4 class="font-weight-bold" style='color:grey'>THREE EASY STEPS</h4>
            </div>
        </div><br>

        <div class="row text-center mb-4">
            <div class="col">
                <h4 style='color:grey'>STEP 1</h4>					
                <h1  style='color:#2388ed'>Impression</h1>
                <img src="{{ asset('assets/img/step 1.gif')}}"
                class="img-fluid" alt="Responsive image">
                <h4 style='color:grey'>The first step of our process is to get your teeth impression.<br>For your
                convenience, we provide you with two options. You can visit SmylUSA <br>for a 5
                minute scan or send us your teeth impression from your location. For this
                purpose, we provide you <br>with our impression kit which is designed to suit your
                needs. Once the process is underway, <br>our licensed orthodontist will design your
                digitalized treatment plan accordingly.
                </h4>
            </div>
        </div>
        <br><br>
        <div class="row text-center mb-4">
            <div class="col">		
                <h4 style='color:grey'>STEP 2</h4>					
                <h1  style='color:#2388ed'>Alignment</h1>
                <img src="{{ asset('assets/img/step 2.gif')}}"
                class="img-fluid" alt="Responsive image">
                <h4 style='color:grey'>Upon your approval of the design, we deliver the aligners at <br>your doorstep.
                You can then simply proceed with your guided treatment plan.</h4>									
            </div>
        </div>	
        <br><br>
        <div class="row text-center mb-4">
            <div class="col" >
                <h4 style='color:grey'>STEP 3</h4>
                <h1 style='color:#2388ed'>Follow-up</h1>
                <img src="{{ asset('assets/img/step 3.gif')}}" class="img-fluid" alt="Responsive image">								
                <h4 style='color:grey'>Once you are done with your treatment and have that perfect smile<br> in place, you can place an order for a set of retainers.<br> You can also contact us freely in
                case you need our whitening treatment.</h4>											
            </div>
        </div>
    </div>
</section>





<section class="parallax section section-height-4 call-to-action overlay overlay-show overlay-op-8 call-to-action-text-light call-to-action-text-background"
data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('assets/img/generic/generic-square-2.jpg')}}">
<span class="text-background font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp"
    data-appear-animation-delay="800">IT'S EASY</span>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-9">
            <div class="call-to-action-content text-center text-md-left appear-animation"
                data-appear-animation="fadeInLeftShorter">
                <h2 class="font-weight-semibold"> Let's do this.</h2>
                <p class="font-weight-light mb-0">Your new smile is waiting. Don’t leave it hanging.</p>
            </div>
        </div>
        <div class="col-md-3 col-lg-3">
            <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
                <a href="#"
                    target="_blank"
                    class="btn btn-light btn-outline btn-rounded btn-3 btn-icon-effect-1 font-weight-bold btn-h-5 btn-v-4">
                    <span >
                        <span>AM I CANDIDATE?</span>
                        
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
</section>
</div>
			 <br>
@endsection