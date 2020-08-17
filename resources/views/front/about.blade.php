@extends('layouts.front.app')

@section('title', 'SmylUSA - About Us')

@section('content')
    <div role="main">

			<div class="slider-container slider-container-full-height rev_slider_wrapper">
<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'sliderLayout': 'fullscreen', 'fullScreenOffset': '104px', 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,576], 'navigation' : {'arrows': { 'enable': false, 'hide_under': 767, 'style': 'slider-arrows-style-1 slider-arrows-dark' }, 'bullets': {'enable': false, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 35, 'h_offset': 0}}}">
<ul>
<li data-transition="fade">
    <img src="{{ asset('assets/img/slides/multi-purpose/slide-17-12.jpg') }}"  
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
        data-lineheight="['70','70','70','82']">ABOUT US<br></div>
    
</li>

</ul>

</div>
</div>
				<br><br>
				<section class="section py-0">
					<div class="container">
						<div class="row">
							<div class="col-md-6 p-0 appear-animation" data-appear-animation="fadeInLeftShorter">
								<div class="card border-0 h-100 py-5">
									<div class="card-body p-5">
										<h2 class="font-weight-bold text-5 mb-3">Our Mission</h2>
										<p class="opacity-7 mb-4">To brighten people’s Smyl, self-confidence and charisma. To offer cost-effective aligner, teeth whitening and dental impression services that are accessible, easy to manage and customizable. To offer people a new, safe, and easy to administer treatment for teeth straightening and whitening services.</p>
										<!-- <a href="portfolio-sidebar-right.html" class="learn-more font-weight-semibold">OUR PORTFOLIO <i class="fas fa-angle-right"></i></a> -->
									</div>
								</div>
							</div>
							<div class="col-md-6 p-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
								<div class="image-frame min-height-300 h-100" data-plugin-image-background data-plugin-options="{'imageUrl': '{{ asset('assets/img/2.jpg') }}'}"></div>
							</div>
						</div>
					</div>
				</section>
				<section class="section-2 py-0">
					<div class="container">
						<div class="row">
							<div class="col-md-6 order-2 order-md-1 p-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">
								<div class="image-frame min-height-300 h-100" data-plugin-image-background data-plugin-options="{'imageUrl': '{{ asset('assets/img/12.jpg') }}'}"></div>
							</div>
							<div class="col-md-6 order-1 order-md-2 p-0">
								<div class="card-2 border-0 h-100 py-5">
									<div class="card-body p-5 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
										<h2 class="font-weight-bold text-5 mb-3">Our Vision</h2>
										<p class="opacity-7 mb-4">Empowering people by offering them a great Smyl at an affordable price.</p>
										<!-- <a href="contact-us-3.html" class="learn-more font-weight-semibold">SEND A MESSAGE <i class="fas fa-angle-right"></i></a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="section py-0">
					<div class="container">
						<div class="row">
							<div class="col-md-6 p-0 appear-animation" data-appear-animation="fadeInLeftShorter">
								<div class="card border-0 h-100 py-5">
									<div class="card-body p-5">
										<h2 class="font-weight-bold text-5 mb-3">Our Values</h2>
										<p class="opacity-7 mb-4">Innovation, Efficiency, Integrity, Reliability, Reputation.</p>
										<!-- <a href="portfolio-sidebar-right.html" class="learn-more font-weight-semibold">OUR PORTFOLIO <i class="fas fa-angle-right"></i></a> -->
									</div>
								</div>
							</div>
							<div class="col-md-6 p-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
								<div class="image-frame min-height-300 h-100" data-plugin-image-background data-plugin-options="{'imageUrl': '{{ asset('assets/img/value.jpg') }}'}"></div>
							</div>
						</div>
					</div>
				</section>
					<section id="aboutus" class="section pb-lg-0">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="overflow-hidden">
					</div>
					<div class="overflow-hidden mb-3">
						<h2 class="word-rotator letters type font-weight-bold text-5 mb-0 appear-animation"
							data-appear-animation="maskUp" data-appear-animation-delay="200">
							<span> Dr. Nish Patel </span>
							
						</h2>
					</div>
					<div class="overflow-hidden mb-3">
						<p class="lead mb-0 appear-animation" data-appear-animation="maskUp"
							data-appear-animation-delay="400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex.

</p>
					</div>

					<br>
					
				
				</div>
				

				<div class="col-md-7">
					<img src="{{ asset('assets/img/others/dr-nishpatel.png') }}" class="img-fluid concept-pos-1" alt="" />
				</div>
			</div>
		</div>
	</section>
			
				
			</div>
 <br><br>
@endsection

@section('js')
<!-- Examples -->
{{-- <script src="{{ asset('assets/js/examples/examples.portfolio.js') }}"></script> --}}
<script src="{{ asset('assets/js/examples/examples.lightboxes.js') }}"></script>
@endsection