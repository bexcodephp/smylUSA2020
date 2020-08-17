@extends('layouts.front.app')

@section('title', 'SmylUSA - Contact')

@section('content')
<div role="main">
    <div class="slider-container slider-container-full-height rev_slider_wrapper">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'sliderLayout': 'fullscreen', 'fullScreenOffset': '104px', 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,576], 'navigation' : {'arrows': { 'disable': true, 'hide_under': 767, 'style': 'slider-arrows-style-1 slider-arrows-dark' }}}">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('assets/img/1.jpg') }}"  
                        alt=""
                        data-bgposition="center center" 
                        data-bgfit="cover" 
                        data-bgrepeat="no-repeat" 
                        data-kenburns="on" 
                        data-duration="12000" 
                        data-ease="Linear.easeNone" 
                        data-scalestart="110" 
                        data-scaleend="100" 
                        data-offsetstart="250 100" 
                        class="rev-slidebg">

                

                    <div class="tp-caption text-color-dark font-primary font-weight-bold"
                        data-frames='[{"delay":"+1100","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                        data-basealign="slide"
                        data-x="left" data-hoffset="['75','75','75','75']"
                        data-y="center" data-voffset="['-30','-30','-30','-30']"
                        data-fontsize="['65','65','65','77']"
                        data-lineheight="['70','70','70','82']">Pricing made easy.<br><br></div>

                    <div class="tp-caption text-color-dark font-primary font-weight-thin"
                        data-frames='[{"delay":"+1200","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                        data-basealign="slide"
                        data-x="left" data-hoffset="['75','75','75','75']"
                        data-y="center" data-voffset="['35','35','35','35']"
                        data-fontsize="['28','28','28','40']"
                        data-lineheight="['28','28','28','45']"><b>We believe a smile you'll love shouldn't cost<br>a fortune. Flexible plans available.</b></div>
                    
                </li>
           
                
            </ul>
        </div>
    </div>
<br>
<br><br>
<div class="container pt-3">
<div class="row text-center mb-4">
<div class="col">
	<h2 class="font-weight-bold">Our Pricing</h2><br>
	<h4 class="font-weight-bold">We offer two easy ways to pay, and either way it's less expensive than other options.</h4>
</div>
</div>

<div class="row justify-content-center mb-5 pb-3">

<div class="col-md-7 col-lg-4 mb-4 mb-lg-0">

		<div class="card card-style-1 overflow-hidden rounded">
			<div class="card-body p-0">
				<div class="pricing-table pricing-table-style-1 p-0">
					<div class="plan plan-most-popular border-0 m-0">
						<div class="plan-title bg-primary">
							<h3>ONE TIME PAYMENT</h3>
					
						</div>
						
						<div class="plan-detail">
							<ul>
								<li style="font-size:14px !important;">Easy one-time payment option <br><strong>You save 20%</strong><br> Get your custom clear aligner shipped <br> 
							to your doorstep with  <br> premium teeth whitening kit <br> <strong>Includes Teeth Impression Kit</strong></p></li>
								
								
								
							</ul>
							<a href="{{ url('landing-page') }}" class="btn btn-rounded btn-3 btn-v-4 btn-primary font-weight-bold">Get Started
								</a>
						</div>
					</div>
				</div>
			</div>
		</div>

</div>

<div class="col-md-7 col-lg-4">

	<div class="card card-style-1 overflow-hidden rounded">
		<div class="card-body p-0">
			<div class="pricing-table pricing-table-style-1 p-0">
				<div class="plan plan-most-popular border-0 m-0">
					<div class="plan-title bg-primary">
						<h3>MONTHLY INSTALLMENTS</h3>
						
					</div>
					
					<div class="plan-detail">
						<ul>
							<li style="font-size:14px !important;">Easy monthly payment plan <br>  No credit checks, no forms to fill out <br><strong>$200 Deposit, $ 70-90/month for 24 months </strong><br> <strong>Total: $2360</strong><br> Get your custom clear aligner
<br>  shipped to your doorstep</p></li>
							
							
							
						</ul>
					<a href="{{ url('landing-page') }}" class="btn btn-rounded btn-3 btn-v-4 btn-primary font-weight-bold">Get Started
							</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


</div>

</div>
<!--<div class="container pt-3">-->
<!--<div class="row text-center mb-4">-->
<!--    <div class="col">-->
<!--        <h2 class="font-weight-bold">Our Pricing</h2><br>-->
<!--        <h4 class="font-weight-bold">We offer two easy ways to pay, and either way it's 75% less expensive than-->
<!--            other options.</h4>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="row justify-content-center mb-5 pb-3">-->
<!--    	<div class="col-md-7 col-lg-4 mb-4 mb-lg-0">-->
<!--					<div class="overflow-hidden">-->
<!--					</div>-->
<!--					<div class="overflow-hidden mb-3">-->
<!--						<h2 class="word-rotator letters type font-weight-bold text-5 mb-0 appear-animation"-->
<!--							data-appear-animation="maskUp" data-appear-animation-delay="200">-->
<!--							<span>One Time Payment </span>-->
							
<!--						</h2>-->
<!--					</div>-->
<!--					<div class="overflow-hidden mb-3">-->
<!--						<p class="lead mb-0 appear-animation" data-appear-animation="maskUp"-->
<!--							data-appear-animation-delay="400">Easy one-time payment option <br>You save 20%   <br> Get your custom clear aligner shipped <br> -->
<!--                            to your doorstep with  <br> premium teeth whitening kit <br> Includes Teeth Impression Kit</p>-->
<!--                            <br>-->
<!--                            <a href="{{ url('landing-page') }}" target="_blank"-->
<!--                                class="btn btn-dark btn-outline btn-rounded btn-3 font-weight-bold btn-h-5 btn-v-4">-->
                            
<!--                                <span>Get Started</span>-->
                            
<!--                            </a>-->
                 
<!--                    </div>-->
                    
<!--				</div>-->
				
<!--				 	<div class="col-md-7 col-lg-4">-->
<!--					<div class="overflow-hidden">-->
<!--					</div>-->
<!--					<div class="overflow-hidden mb-3">-->
<!--						<h2 class="word-rotator letters type font-weight-bold text-5 mb-0 appear-animation"-->
<!--							data-appear-animation="maskUp" data-appear-animation-delay="200">-->
<!--							<span>  Monthly Installments </span>-->
							
<!--						</h2>-->
<!--					</div>-->
<!--					<div class="overflow-hidden mb-3">-->
<!--						<p class="lead mb-0 appear-animation" data-appear-animation="maskUp"-->
<!--							data-appear-animation-delay="400">Easy monthly payment plan <br>  No credit checks, no forms to fill out <br>$200 Deposit, $ 70-90/month for 24 months <br> ($1999 total). Get your custom clear aligner-->
<!--<br>  shipped to your doorstep</p>-->
<!--<br>-->
                    
<!--                    <a href="{{ url('landing-page') }}" target="_blank"-->
<!--                        class="btn btn-dark btn-outline btn-rounded btn-3 font-weight-bold btn-h-5 btn-v-4" style="margin-top: 25px;">-->
                    
<!--                        <span>Get Started</span>-->

<!--                    </a>-->
<!--                    </div>-->

<!--				</div>-->
<!--</div>-->

<!--</div>-->
<section class="section">
    <div class="container-fluid p-0">
        <div class="row text-center mb-4">
            <div class="col">
                <br>
                <h2 class="font-weight-bold">How to get started</h2><br><br><br>
            </div>
        </div>
        <div class="row appear-animation" data-appear-animation="fadeInRightShorter">
            <div class="col-md-3 mx-auto mb-4 mb-md-0">
                <div class="icon-box icon-box-style-3">
                    <div class="icon-box-icon">
                        <img width="50" src="{{ asset('assets/img/checkup.svg') }}" alt="" data-icon
                            data-plugin-options="{'color': '#2388ED', 'animated': true, 'delay': 400}" />
                    </div>
                    <div class="icon-box-info">
                        <div class="icon-box-info-title">
                            <h4 class="font-weight-bold">1. Teeth Impression</h4>
                        </div>
                        <p>The first step of our process is to take a teeth impression.</p>
                        <ol><li>Order Home Impression Kit </li>
                        <li>Visit a SmylUSA facility for a free Scan</li></ol>
                        <!--<p>One of the options of getting your scan done is by visiting SmylUSA. Through this visit, you can learn more about our-->
                        <!--services and pricing packages. Once you have chosen your plan, your dental scan will only take around 15 minutes. You can-->
                        <!--then get your aligners shipped at your desired location.</p>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-auto mb-4 mb-md-0">
                <div class="icon-box icon-box-style-3">
                    <div class="icon-box-icon">
                        <img width="46" src="{{ asset('assets/img/scooter.svg') }}" alt="" data-icon
                            data-plugin-options="{'color': '#2388ED', 'animated': true, 'delay': 800}" />
                    </div>
                    <div class="icon-box-info">
                        <div class="icon-box-info-title">
                            <h4 class="font-weight-bold">2. Aligners Delivery</h4>
                        </div>
                        <p>Upon approval of your design, we will deliver the aligners at your doorstep </p>
                    </div>
                </div>
            </div>
        
            <div class="col-md-3 mx-auto">
                <div class="icon-box icon-box-style-3">
                    <div class="icon-box-icon">
                        <img width="50" src="{{ asset('assets/img/professions-and-jobs.svg') }}" alt="" data-icon
                            data-plugin-options="{'color': '#2388ED', 'animated': true, 'delay': 1200}" />
                    </div>
                    <div class="icon-box-info">
                        <div class="icon-box-info-title">
                            <h4 class="font-weight-bold">Professional Support</h4>
                        </div>
                        <p>Regular follow-ups with our customer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="section bg-light mt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-bold text-4 mb-4">Related Products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="product portfolio-item portfolio-item-style-2">
                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                        <span
                            class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                            <a href="{{ route('front.get.product', $product->slug) }}">
                                <img src="{{ asset('storage/'.$product->cover) }}" class="img-fluid" alt="">
                            </a>
                            <span class="image-frame-action">
                                <form action="{{ route('cart.store') }}" class="form-inline cartForm" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product" value="{{ $product->id }}">

                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <button id="add-to-cart-btn" type="submit"
                                            class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">
                                            ADD TO CART</button>
                                    </div>
                                </form>
                            </span>
                        </span>
                    </div>
                    <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                        <div class="product-info-title">
                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a
                                    href="{{ route('front.get.product', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            <span class="price font-primary text-4"><strong class="text-color-dark">
                                    {{ config('cart.currency_symbol') .  $product->price }}</strong></span>
                            <!-- <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$69</strong></span> -->
                        </div>
                        <div class="product-info-rate d-flex">
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default"></i>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>




<section class="parallax section section-height-4 call-to-action overlay overlay-show overlay-op-8 call-to-action-text-light call-to-action-text-background"
    data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('assets/img/generic/generic-square-2.jpg') }}">
    <span class="text-background font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp"
        data-appear-animation-delay="800">IT'S EASY</span>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-9">
                <div class="call-to-action-content text-center text-md-left appear-animation"
                    data-appear-animation="fadeInLeftShorter">
                    <h2 class="font-weight-semibold">Join the SmylUSA Family.</h2>
                    <p class="font-weight-light mb-0">Take the free online smile assessment to see if you are a candidate and get started on your journey.</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
                <a href="{{ url('assessment-form') }}"
                        target="_blank"
                        
                        class="btn btn-light btn-outline btn-rounded btn-3 font-weight-bold btn-h-5 btn-v-4">

                            <span>GET STARTED</span>


                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<br>

    </div>
    
@endsection
