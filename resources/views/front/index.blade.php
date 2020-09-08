@extends('layouts.front.main')

@section('title', 'SmylUSA -  - Bring Your Smile On')
	
@section('css')
@endsection
@extends('layouts.front.main')
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
			
				<div class="col-md-7">
					<img src="{{ asset('assets/img/others/desktop-concept-1.png') }}" class="img-fluid concept-pos-1" alt="" />
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		
	</section>
	
</div>
@endsection

@section('js')
	
@endsection
@extends('layouts.front.footer')