@extends('layouts.front.app')

@section('title', 'SmylUSA -  - Bring Your Smile On')
	
@section('css')
@endsection

@section('content')
<div role="main">
	<div class="slider-container slider-container-full-height rev_slider_wrapper">
		<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'sliderLayout': 'fullscreen', 'fullScreenOffset': '104px', 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,576], 'navigation' : {'arrows': { 'enable': true, 'hide_under': 767, 'style': 'slider-arrows-style-1 slider-arrows-dark' }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 35, 'h_offset': 0}}}">
			<ul>
				<li data-transition="fade">
					<img src="{{ asset('assets/img/slides/multi-purpose/slide-17-1.jpg') }}"  
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
						data-lineheight="['70','70','70','82']">Get a Smile <br> that you’ll love.</div>

					<a class="tp-caption btn btn-rounded btn-primary font-weight-semibold"
						href="{{ url('landing-page') }}"
						data-frames='[{"delay":"+1300","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
						data-basealign="slide"
						data-x="left" data-hoffset="['75','75','75','75']"
						data-y="center" data-voffset="['115','115','115','150']"
						data-whitespace="nowrap"
						data-fontsize="['13','14','14','40']"
						data-paddingtop="['13','14','14','40']"
						data-paddingbottom="['13','13','13','40']"
						data-paddingleft="['50','50','50','90']"
						data-paddingright="['50','50','50','90']"> Get Started</a>
					
				</li>
				<li data-transition="fade">
					<img src="{{ asset('assets/img/slides/multi-purpose/slide-17-2.jpg') }}"  
						alt=""
						data-bgposition="center center" 
						data-bgfit="cover" 
						data-bgrepeat="no-repeat" 
						data-kenburns="on" 
						data-duration="12000" 
						data-ease="Linear.easeNone" 
						data-scalestart="110" 
						data-scaleend="100" 
						data-offsetstart="-250 -100" 
						class="rev-slidebg">


					<div class="tp-caption text-color-dark font-primary font-weight-bold"
						data-frames='[{"delay":"+1100","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
						data-basealign="slide"
						data-x="left" data-hoffset="['73','73','73','73']"
						data-y="center" data-voffset="['-30','-30','-30','-30']"
						data-fontsize="['65','65','65','77']"
						data-lineheight="['70','70','70','82']"
						data-mask_in="x:0px;y:0px;">Smile More<br> Confidently.</div>

					<a class="tp-caption btn btn-rounded btn-primary font-weight-semibold"
						href="{{ url('landing-page') }}"
						data-frames='[{"delay":"+1300","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
						data-basealign="slide"
						data-x="left" data-hoffset="['75','75','75','75']"
						data-y="center" data-voffset="['115','115','115','150']"
						data-whitespace="nowrap"
						data-fontsize="['13','14','14','40']"
						data-paddingtop="['13','14','14','40']"
						data-paddingbottom="['13','13','13','40']"
						data-paddingleft="['50','50','50','90']"
						data-paddingright="['50','50','50','90']"> Get Started</a>
					
				</li>
				
			</ul>
		</div>
	</div>
	<section id="aboutus" class="section pb-lg-0">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="overflow-hidden">
					</div>
					<div class="overflow-hidden mb-3">
						<h2 class="word-rotator letters type font-weight-bold text-5 mb-0 appear-animation"
							data-appear-animation="maskUp" data-appear-animation-delay="200">
							<span>Our Mission</span>
							
						</h2>
					</div>
					<div class="overflow-hidden mb-3">
						<p class="lead mb-0 appear-animation" data-appear-animation="maskUp"
							data-appear-animation-delay="400">To brighten people’s Smyl, self-confidence and charisma. To offer cost-effective aligner, teeth whitening and dental impression services that are accessible, easy to manage and customizable. To offer people a new, safe, and easy to administer treatment for teeth straightening and whitening services.</p>
					</div>

					<br>
					
					<a href="{{ url('about-us') }}"
						class="btn btn-outline btn-rounded btn-primary btn-v-3 btn-h-4 font-weight-bold mb-0 appear-animation"
						data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">MORE ABOUT US</a>
				</div>
				

				<div class="col-md-7">
					<img src="{{ asset('assets/img/others/desktop-concept-1.png') }}" class="img-fluid concept-pos-1" alt="" />
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container-fluid p-0">
				<div class="row text-center mb-4">
					<div class="col">
						<br>
						<h2 class="font-weight-bold">Why choose SmylUSA?</h2><br>
						<!-- <p class="lead">Lorem ipsum dolor sit a met, consectetur adipiscing elit.</p> -->
					</div>
				</div>
				
			<div class="row appear-animation" data-appear-animation="fadeInRightShorter">
			    	<div class="col-md-3 mx-auto mb-4 mb-md-0">
					<div class="icon-box icon-box-style-3">
						<div class="icon-box-icon">
							<img width="100" src="{{ asset('assets/vendor/linear-icons/Quality-Icon.svg') }}" alt="" data-icon
								data-plugin-options="{'color': '#2388ED', 'animated': true, 'delay': 800}" />
						</div>
						<div class="icon-box-info">
							<div class="icon-box-info-title">
								<h4 class="font-weight-bold">Quality</h4>
							</div>
							<p>We use the latest technology to design our customized aligners. Clear aligners with a comfortable fit designed with the highest quality materials.</p>
							
						</div>
					</div>
				</div>
			
				<div class="col-md-3 mx-auto mb-4 mb-md-0">
					<div class="icon-box icon-box-style-3">
						<div class="icon-box-icon">
							<img width="100" src="{{ asset('assets/vendor/linear-icons/Convenience-Icon.svg') }}" alt="" data-icon data-plugin-options="{'color': '#2388ED', 'animated': true, 'delay': 800}" />
						</div>
						<div class="icon-box-info">
							<div class="icon-box-info-title">
								<h4 class="font-weight-bold">Convenience</h4>
							</div>
							<p>Our services at your doorstep. Avoid the hassle of appointments and routine visits to the clinic. Easy to use impression kit delivered right at your doorstep. </p>
							
						</div>
					</div>
				</div>
					<div class="col-md-3 mx-auto mb-4 mb-md-0">
					<div class="icon-box icon-box-style-3">
						<div class="icon-box-icon">
							<img width="100" src="{{ asset('assets/vendor/linear-icons/Affordaiblity-Icon.svg') }}" alt="" data-icon data-plugin-options="{'color': '#2388ED', 'animated': true, 'delay': 400}"/>
						</div>
						<div class="icon-box-info">
							<div class="icon-box-info-title">
								<h4 class="font-weight-bold">Affordability</h4>
							</div>
							<p>Offering you our services at an affordable price. After the completion of your treatment plan, you will get a free kit along with final products. </p>
							
						</div>
					</div>
				</div>
			
				
			</div>
		</div>
	</section>
	<section id="start" class="section bg-light pt-4 pb-5">
		<div class="container">
				<div class="row text-center mb-4">
					<div class="col">
						<h2 class="font-weight-bold">How It Works?</h2>
						<!-- <p class="lead">Lorem ipsum dolor sit a met, consectetur adipiscing elit.</p> -->
					</div>
				</div>
			<div class="row">
				<div class="col">
					<div class="steps steps-primary steps-style-2">
						<div class="dots appear-animation" data-appear-animation="fadeIn"
							data-appear-animation-delay="1200">
							<img class="dots-mask" src="{{ asset('assets/img/svg/steps-dots-bg-light.svg') }}" alt="" />
							<div class="dots-color"></div>
							<div class="dots-color-dark"></div>
						</div>
						<div class="item appear-animation" data-appear-animation="stepsFadeInUp"
							data-plugin-options="{'accY': -200}">
							<h4 class="item-title howitworks font-weight-bold"><span class="numbertitle">1.</span>Impression</h4>
							<p>The first step of our process is to get your teeth impression.</p>
							<!--<a class="learn-more" href="{{ url('how-it-works') }}">Learn More <i class="fas fa-angle-right"></i></a>-->
						</div>
						<div class="item appear-animation" data-appear-animation="stepsFadeInUp"
							data-appear-animation-delay="300" data-plugin-options="{'accY': -200}">
							<h2 class="item-title howitworks"><span class="numbertitle">2.</span>Alignment</h2>
							<p>Upon your approval of the design, we deliver the aligners at your doorstep.</p>
							
						</div>
						<div class="item appear-animation" data-appear-animation="stepsFadeInUp"
							data-appear-animation-delay="600" data-plugin-options="{'accY': -200}">
							<h2 class="item-title howitworks"><span class="numbertitle">3.</span>Follow-up</h2>
							<p>Regular follow-ups for our customers.</p>
							<!--<a class="learn-more" href="{{ url('how-it-works') }}">Learn More <i class="fas fa-angle-right"></i></a>-->
						</div>
					</div>
				</div>
			</div>
			<div class = "row">
			  
			    <div class= "col-md-3"></div>
			    <div class= "col-md-6 justify-content-center" style = "text-align:center;">
			          <a class="learn-more" href="{{ url('how-it-works') }}">Learn More <i class="fas fa-angle-right"></i></a>
			    </div>
			    <div class= "col-md-3"></div>
			</div>
		</div>
	</section>
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

</div>



	<div class="container mb-5 pb-3"></div>
	<div class="row text-center mb-4">
		<div class="col">
			<h2 class="font-weight-bold">Your smiles making life around you more beautiful.</h2>
			<!-- <p class="lead">Lorem ipsum dolor sit a met, consectetur adipiscing elit.</p> -->
		</div>
	</div>
	<div class="row align-items-center mb-4">
		<div class="col-12 col-md-8 col-lg-9">
			<ul id="portfolioLoadMoreFilter"
				class="nav sort-source justify-content-center justify-content-md-start mb-4 mb-md-0"
				data-sort-id="portfolio" data-option-key="filter"
				data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
				<li class="nav-item" data-option-value="*"><a class="nav-link active" href="#"></a></li>
	
				<li class="nav-item" data-option-value=".brands"><a class="nav-link text-uppercase" href="#"></a></li>
	
				<li class="nav-item" data-option-value=".design"><a class="nav-link text-uppercase" href="#"></a></li>
	
				<li class="nav-item" data-option-value=".web"><a class="nav-link text-uppercase" href="#"></a></li>
	
				<li class="nav-item" data-option-value=".ads"><a class="nav-link text-uppercase" href="#"></a></li>
			</ul>
		</div>
	
	</div>
	<div class="row">
		<div class="col-12 pl-3">
			<div class="sort-destination-loader sort-destination-loader-showing">
				<ul id="portfolioLoadMoreWrapper" class="portfolio-list sort-destination" data-sort-id="portfolio"
					data-total-pages="3">
					<li class="col-12 col-md-6 col-lg-4 p-0 isotope-item brands">
						<div class="portfolio-item hover-effect-3d appear-animation" data-appear-animation="fadeInUpShorter"
							data-plugin-options="{'accY' : -50}">
							<!-- <a href="portfolio-detail.html"> -->
								<!-- <span class="image-frame image-frame-style-1 image-frame-effect-1"> -->
									<span class="image-frame-wrapper">
										<img src="{{ asset('assets/img/projects/generic/project-22.jpg') }}" class="img-fluid" alt="">
										<span class="image-frame-inner-border"></span>
										<span class="image-frame-action">
											<!-- <span class="image-frame-action-icon"> -->
												<!-- <i class="lnr lnr-link text-color-light"></i> -->
											</span>
										</span>
									</span>
								</span>
							<!-- </a> -->
						</div>
					</li>
					<li class="col-12 col-md-6 col-lg-4 p-0 isotope-item ads">
						<div class="portfolio-item hover-effect-3d appear-animation" data-appear-animation="fadeInUpShorter"
							data-appear-animation-delay="200" data-plugin-options="{'accY' : -50}">
							<!-- <a href="portfolio-detail.html"> -->
								<!-- <span class="image-frame image-frame-style-1 image-frame-effect-1"> -->
									<span class="image-frame-wrapper">
										<img src="{{ asset('assets/img/projects/generic/project-21.jpg') }}" class="img-fluid" alt="">
										<span class="image-frame-inner-border"></span>
										<span class="image-frame-action">
											<!-- <span class="image-frame-action-icon"> -->
												<!-- <i class="lnr lnr-link text-color-light"></i> -->
											</span>
										</span>
									</span>
								</span>
							<!-- </a> -->
						</div>
					</li>
					<li class="col-12 col-md-6 col-lg-4 p-0 isotope-item design">
						<div class="portfolio-item hover-effect-3d appear-animation" data-appear-animation="fadeInUpShorter"
							data-appear-animation-delay="400" data-plugin-options="{'accY' : -50}">
							<!-- <a href="portfolio-detail.html"> -->
								<!-- <span class="image-frame image-frame-style-1 image-frame-effect-1"> -->
									<span class="image-frame-wrapper">
										<img src="{{ asset('assets/img/projects/generic/project-17.jpg') }}" class="img-fluid" alt="">
										<span class="image-frame-inner-border"></span>
										<span class="image-frame-action">
											<!-- <span class="image-frame-action-icon"> -->
												<!-- <i class="lnr lnr-link text-color-light"></i> -->
											</span>
										</span>
									</span>
								</span>
							<!-- </a> -->
						</div>
					</li>
					<li class="col-12 col-md-6 col-lg-4 p-0 isotope-item brands">
						<div class="portfolio-item hover-effect-3d appear-animation" data-appear-animation="fadeInUpShorter"
							data-plugin-options="{'accY' : -50}">
							<!-- <a href="portfolio-detail.html"> -->
								<!-- <span class="image-frame image-frame-style-1 image-frame-effect-1"> -->
									<span class="image-frame-wrapper">
										<img src="{{ asset('assets/img/projects/generic/project-15.jpg') }}" class="img-fluid" alt="">
										<span class="image-frame-inner-border"></span>
										<span class="image-frame-action">
											<!-- <span class="image-frame-action-icon"> -->
												<!-- <i class="lnr lnr-link text-color-light"></i> -->
											</span>
										</span>
									</span>
								</span>
							<!-- </a> -->
						</div>
					</li>
					<li class="col-12 col-md-6 col-lg-4 p-0 isotope-item web">
						<div class="portfolio-item hover-effect-3d appear-animation" data-appear-animation="fadeInUpShorter"
							data-appear-animation-delay="200" data-plugin-options="{'accY' : -50}">
							<!-- <a href="portfolio-detail.html"> -->
								<!-- <span class="image-frame image-frame-style-1 image-frame-effect-1"> -->
									<span class="image-frame-wrapper">
										<img src="{{ asset('assets/img/projects/generic/project-6.jpg') }}" class="img-fluid" alt="">
										<span class="image-frame-inner-border"></span>
										<span class="image-frame-action">
											<!-- <span class="image-frame-action-icon"> -->
												<!-- <i class="lnr lnr-link text-color-light"></i> -->
											</span>
										</span>
									</span>
								</span>
							<!-- </a> -->
						</div>
					</li>
					<li class="col-12 col-md-6 col-lg-4 p-0 isotope-item ads">
						<div class="portfolio-item hover-effect-3d appear-animation" data-appear-animation="fadeInUpShorter"
							data-appear-animation-delay="400" data-plugin-options="{'accY' : -50}">
							<!-- <a href="portfolio-detail.html"> -->
								<!-- <span class="image-frame image-frame-style-1 image-frame-effect-1"> -->
									<span class="image-frame-wrapper">
										<img src="{{ asset('assets/img/projects/generic/project-18.jpg') }}" class="img-fluid" alt="">
										<span class="image-frame-inner-border"></span>
										<span class="image-frame-action">
											<!-- <span class="image-frame-action-icon"> -->
												<!-- <i class="lnr lnr-link text-color-light"></i> -->
											</span>
										</span>
									</span>
								</span>
							<!-- </a> -->
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-12 mb-4 d-flex justify-content-center">
			<div id="portfolioLoadMoreLoader" class="portfolio-load-more-loader">
				<div class="bounce-loader">
					<div class="bounce1"></div>
					<div class="bounce2"></div>
					<div class="bounce3"></div>
				</div>
			</div>
	
			{{-- <button id="portfolioLoadMore" type="button"
				class="btn btn-primary btn-rounded btn-wide-5 btn-icon-effect-2 outline-none font-weight-semibold text-0">
				<span>LOAD MORE</span>
				<i class="fas fa-ellipsis-h"></i>
			</button> --}}
		</div>
	</div>
<section class="parallax section section-height-4 call-to-action overlay overlay-show overlay-op-8 call-to-action-text-light call-to-action-text-background"
	data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ asset('assets/img/generic/generic-square-2.jpg') }}">
	<span class="text-background font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp"
		data-appear-animation-delay="800">IT'S EASY</span>
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-lg-9">
				<div class="call-to-action-content text-center text-md-left appear-animation"
					data-appear-animation="fadeInLeftShorter">
					<h2 class="font-weight-semibold"> Ready. Set. Smile.</h2>
					<p class="font-weight-light mb-0">Take the free online smile assessment to see if you are a candidate and get started on your journey.</p>
				</div>
			</div>
			<div class="col-md-3 col-lg-3">
				<div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
				<a href="{{ url('assessment-form') }}"
						target="_blank"
					class="btn btn-light btn-outline btn-rounded btn-3 font-weight-bold btn-h-5 btn-v-4">

							<span>AM I A CANDIDATE?</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
@endsection

@section('js')
	
@endsection