@extends('layouts.front.app')

@section('title', 'SmylUSA - Contact')

@section('content')
<div role="main">
    <div class="slider-container slider-container-full-height rev_slider_wrapper">
<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'sliderLayout': 'fullscreen', 'fullScreenOffset': '104px', 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,576], 'navigation' : {'arrows': { 'enable': false, 'hide_under': 767, 'style': 'slider-arrows-style-1 slider-arrows-dark' }, 'bullets': {'enable': false, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 35, 'h_offset': 0}}}">
<ul>
<li data-transition="fade">
    <img src="{{ asset('assets/img/slides/multi-purpose/slide-17-5.jpg') }}"  
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
        data-lineheight="['70','70','70','82']">HERE'S HOW IT WORKS<br></div>

    <div class="tp-caption text-color-dark font-primary "
        data-frames='[{"delay":"+1200","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
        data-basealign="slide"
        data-x="left" data-hoffset="['75','75','75','75']"
        data-y="center" data-voffset="['35','35','35','35']"
        data-fontsize="['28','28','28','40']"
        data-lineheight="['28','28','28','45']">In 3 easy steps, <br>SmylUSA delivers the smile you'll love.</div>

    <a class="tp-caption btn btn-rounded btn-primary font-weight-semibold"
        href="#start"
        data-frames='[{"delay":"+1300","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
        data-basealign="slide"
        data-x="left" data-hoffset="['75','75','75','75']"
        data-y="center" data-voffset="['115','115','115','150']"
        data-whitespace="nowrap"
        data-fontsize="['13','14','14','40']"
        data-paddingtop="['13','14','14','40']"
        data-paddingbottom="['13','13','13','40']"
        data-paddingleft="['50','50','50','90']"
        data-paddingright="['50','50','50','90']">LEARN MORE</a>
    
</li>

</ul>

</div>
<div id="start" style="opacity:0;"> Testing </div>
</div>




<section id="" class="section bg-light pt-4 pb-5">
<div class="container">
<div class="row text-center mb-4">	
<div class="col"><br><br>
    <h2 class="font-weight-bold">THREE EASY STEPS</h2>
</div>
</div><br>
<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 order-1 p-0">
            <div class="card border-0 h-100 py-5">
                <div class="card-body p-5 appear-animation" data-appear-animation="fadeInRightShorter">
                    <h2 class="font-weight-bold text-5 mb-3" style='color: #2388ed'>1. Let's make a good impression</h2>
                    <p class="opacity-7 mb-4">The first step of our process is to get your teeth impression.
                    For your convenience, we provide you with two options. You can visit SmylUSA
                    for a 15 to 20 minutes scan or send us your teeth impression from your location. For this purpose, we provide you
                    with our impression kit which is designed to suit your needs. 
</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 order-2 p-0">
            
            <div class="image-frame min-height-300 h-100" 
                ><img src="{{ asset('assets/img/17.jpg') }}" class="img-fluid" alt="Responsive image"></div>
        </div>
        <div class="col-md-6 order-4 order-md-3 p-0">
            <div class="image-frame min-height-300 h-100"> <img src="{{ asset('assets/img/12.jpg') }}" class="img-fluid" alt="Responsive image"></div>
        </div>
        <div class="col-md-6 order-3 order-md-4 p-0">
            <div class="card border-0 h-100 py-5">
                <div class="card-body p-5 appear-animation" data-appear-animation="fadeInLeftShorter">
                    <h2 class="font-weight-bold  text-5 mb-3" style='color: #2388ed'>2. Get set for alignment</h2>
                    <p class=" opacity-7 mb-4">Upon your approval of the design, we deliver the aligners at your doorstep. You can then simply proceed with your guided treatment plan. In addition to this, we also send you our exclusive teeth whitening kit so that you can use it simultaneously, reaching towards your dream smile.</p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 order-5 p-0">
            <div class="card border-0 h-100 py-5">
                <div class="card-body p-5 appear-animation" data-appear-animation="fadeInRightShorter">
                    <h2 class="font-weight-bold  text-5 mb-3" style='color: #2388ed'>3. Don't forget to follow-up</h2>
                    <p class=" opacity-7 mb-4">Once you are done with your treatment and have that perfect smile
                    in place, you can place an order for a set of retainers.
                    You can also contact us freely in case you need our whitening treatment.</p>
                    
                </div>
            </div>
        </div>
            <div class="col-md-6 order-6 p-0">
                <div class="image-frame min-height-300 h-100"><img src="{{ asset('assets/img/15.jpg') }}" class="img-fluid" alt="Responsive image"></div>
            </div>
    </div>
</div>

</div>
</section>

<section class="section">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
<h2 class="word-rotator letters type font-weight-bold text-5 mb-3">
<span style="">Smile. It's easier than you</span>
<span class="word-rotator-words waiting">
<b class="is-visible">think.</b>
<b>believe.</b>
<b>dreamed.</b>
</span>
</h2>
</div>
<p class="lead mb-3 appear-animation" data-appear-animation="fadeInUpShorter"
data-appear-animation-delay="300">We've got good news. Smiling is contagious and everyone is joining the club. So, what are you waiting for? All you have
to do is take our online smile assessment and embark on a new journey. It is that simple. SmylUSA helps deliver a smile
you'll love safely, discreetly, and without requiring in-person monthly visits. Let us help you spread joy & happiness
around you. The more the smiles, the merrier.</p>

</div>
<div class="col-10 col-md-5 mx-auto ml-md-auto appear-animation" data-appear-animation="fadeInUpShorter"
data-appear-animation-delay="500">
<div class="particles d-flex align-items-center pr-0 pr-lg-3 pr-xl-5">
<svg class="svg-particles d-none d-sm-block" xmlns="http://www.w3.org/2000/svg"
viewBox="0 0 493.72 405.79">
<g class="g-particles g-particles-group-1 appear-animation"
data-appear-animation="expandParticles" data-appear-animation-delay="500">
<line class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10" x1="150.28"
    y1="108.35" x2="159.03" y2="102.1" />
<line class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10" x1="325.51"
    y1="118.98" x2="334.26" y2="112.73" />
<line class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10" x1="483.33"
    y1="94.52" x2="492.08" y2="88.27" />
<line class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10" x1="321.14"
    y1="279.22" x2="329.89" y2="272.97" />
<line class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10" x1="148.47"
    y1="279.22" x2="157.22" y2="272.97" />
<line class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10" x1="11.14"
    y1="305.17" x2="19.89" y2="298.92" />
</g>
<g class="g-particles g-particles-group-2 appear-animation"
data-appear-animation="expandParticles" data-appear-animation-delay="800">
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M51.78,105.64s-.37-12.75,5.25-3.5.38,7.13,0,7.13"
    transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M229.34,103.24s-.37-12.75,5.25-3.5.38,7.12,0,7.12"
    transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M401,103.24s-.37-12.75,5.25-3.5.38,7.12,0,7.12" transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M401,274.1s-.37-12.75,5.25-3.5.38,7.13,0,7.13" transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M227.33,276.14s-.37-12.75,5.25-3.5.38,7.13,0,7.13"
    transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M55.49,276.14s-.37-12.75,5.25-3.5.38,7.13,0,7.13"
    transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M97.76,41.59s-2.5,4.83,2.83,2.33.67,2.67.67,2.67"
    transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M448.14,22.85s-2.5,4.83,2.83,2.33.67,2.67.67,2.67"
    transform="translate(-3.14 -1.85)" />
<path class="cls-1" fill="none" stroke="#969da0" stroke-miterlimit="10"
    d="M246,44.18s.1,5.85,4.41-.28,2.26,1.66,2.26,1.66"
    transform="translate(-3.14 -1.85)" />
</g>
<g class="g-particles g-particles-group-3 appear-animation"
data-appear-animation="expandParticles" data-appear-animation-delay="1100">
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="4.77" cy="151" r="1.14"
    transform="translate(-108.51 45.76) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="149.72" cy="30.16" r="1.14"
    transform="translate(19.39 112.85) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="304.7" cy="3.48" r="1.14"
    transform="translate(83.64 214.63) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="495.22" cy="155.04" r="1.14"
    transform="translate(32.28 393.74) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="315.2" cy="163.8" r="1.14"
    transform="translate(-26.64 269.01) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="153.42" cy="344.7" r="1.14"
    transform="translate(-201.94 207.59) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="249.61" cy="406" r="1.14"
    transform="translate(-217.11 293.57) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="313.32" cy="336.94" r="1.14"
    transform="translate(-149.62 318.39) rotate(-45)" />
<circle class="cls-2" fill="#969da0" stroke="#969da0" cx="148.58" cy="172.2" r="1.14"
    transform="translate(-81.38 153.65) rotate(-45)" />
</g>
<g class="g-particles g-particles-group-4 appear-animation"
data-appear-animation="expandParticles" data-appear-animation-delay="1400">
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="200.87 18.34 197.2 18.34 199.03 21" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="179.66 368.64 180.47 364.7 176.12 365.86" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="369.87 368.64 370.67 364.7 366.31 365.86" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="369.31 5.73 371.83 1.9 367.27 1.65" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="217.7 153.19 210.32 153.19 214.01 158.56" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="385.03 153.19 377.66 153.19 381.34 158.56" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="385.03 324.15 377.66 324.15 381.34 329.52" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="213.01 324.15 205.64 324.15 209.32 329.52" />
<polyline class="cls-3" fill="none" stroke="#969da0"
    points="52.35 324.15 44.98 324.15 48.66 329.52" />
</g>
<g class="g-particles g-particles-group-5 appear-animation"
data-appear-animation="expandParticles" data-appear-animation-delay="1700">
<path class="cls-4" fill="none" stroke="#969da0"
    d="M264.48,188.12s-4,8.83,3.33,6.17,5.67-.5,5.67-.5-1.33,3.67-2.17,3.5"
    transform="translate(-3.14 -1.85)" />
<path class="cls-4" fill="none" stroke="#969da0"
    d="M444.52,179.07s-4,8.83,3.33,6.17,5.67-.5,5.67-.5-1.33,3.67-2.17,3.5"
    transform="translate(-3.14 -1.85)" />
<path class="cls-4" fill="none" stroke="#969da0"
    d="M94.23,196.91s-4,8.83,3.33,6.17,5.67-.5,5.67-.5-1.33,3.67-2.17,3.5"
    transform="translate(-3.14 -1.85)" />
<path class="cls-4" fill="none" stroke="#969da0"
    d="M92.81,369.86s-2.63,6.55,2.19,4.57,3.73-.37,3.73-.37-.88,2.72-1.43,2.6"
    transform="translate(-3.14 -1.85)" />
<path class="cls-4" fill="none" stroke="#969da0"
    d="M269.94,368.71c.06-.09,3.2,5.44,4.68,2,2-4.8,2.54-2.76,2.54-2.76s1.15,2.61.66,2.89"
    transform="translate(-3.14 -1.85)" />
</g>
<g class="g-particles g-particles-group-6 appear-animation"
data-appear-animation="expandParticles" data-appear-animation-delay="2000">
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="8.58 76.55 13.71 78.42 12.58 72.8" />
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="8.58 228.65 13.71 230.53 12.58 224.9" />
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="178.55 238.99 183.68 240.86 182.55 235.24" />
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="349.47 240.53 354.59 242.4 353.47 236.78" />
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="338.72 402.28 343.84 404.15 342.72 398.53" />
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="147.72 399.46 152.84 401.34 151.72 395.71" />
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="482.39 209.27 485.95 213.4 487.71 207.94" />
<polyline class="cls-5" fill="#969da0" stroke="#969da0"
    points="349.58 66.58 354.83 68.06 353.29 62.54" />
</g>
</svg>
<div class="particles-rect bg-primary d-none d-md-block" data-plugin-float-element
data-plugin-options="{'startPos': 'top', 'speed': 4, 'transition': true}"></div>
<img src="{{ asset('assets/img/particles-featured-image.jpg') }}" class="img-fluid" alt="" data-plugin-float-element
data-plugin-options="{'startPos': 'top', 'speed': 4, 'horizontal': true, 'transition': true}" />
</div>
</div>
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
    <h2 class="font-weight-semibold"> So Don’t Wait.</h2>
    <p class="font-weight-light mb-0">Your new smile is just 3 steps away.</p>
</div>
</div>
<div class="col-md-3 col-lg-3">
<div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
    <a href="{{ url('landing-page') }}"
        target="_blank"
        class="btn btn-light btn-outline btn-rounded btn-3 btn-icon-effect-1 font-weight-bold btn-h-5 btn-v-4">
        <span >
            <span>GET STARTED</span>
            
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
