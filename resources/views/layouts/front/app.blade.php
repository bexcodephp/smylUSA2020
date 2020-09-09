<!DOCTYPE html>
<html  class="gap-outside">

<head>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Favicon.png')}}">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SmylUSA - Bring Your Smile On</title>
    
    <meta property="og:title" content="SMYLUSA - Bring Your Smile On" />
    <meta property="og:type" content="health - smulusa" />
    <meta property="og:description" content="SMYLUSA - Bring Your Smile On" />
    <meta property="og:url" content="https://smylusa.com/" />
    <meta property="og:image" content="https://smylusa.com/assets/img/logo-small.png" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,900%7COpen+Sans:300,400,600,700,800"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linear-icons/css/linear-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">

   
    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/navigation.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme-elements.css') }}">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/vendor/modernizr/modernizr.min.js') }}"></script>

    @yield('css')
</head>

<body>
    <div class="body">
        <header id="header"
            data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 0, 'stickySetTop': '0px', 'stickyChangeLogo': false}">
            <div class="header-body">
                	<div class="header-top">
						<div class="header-top-container container-fluid">
							<div class="header-row">
								<div class="header-column justify-content-start top-header">
									<span class="d-none d-sm-flex align-items-center">
										<i class="fas fa-map-marker-alt mr-1"></i>
										8761 N 56th St #290757 Tampa, FL 33617
									</span>
									<span class="d-none d-sm-flex align-items-center ml-4">
										<i class="fas fa-phone mr-1"></i>
										<a href="tel:+ 813-860-5677"> 813-860-5677</a>
									</span>
								</div>
								<div class="header-column justify-content-end">
                                    <div class="mini-cart order-4">
                                        <div class="mini-cart-icon">
                                            <img src="{{ asset('assets/img/icons/cart-bag.svg') }}" class="img-fluid" alt="" />
                                            <span class="badge badge-primary rounded-circle">{{ count($cartContent['cart']) }}</span>
                                        </div>
                                        <div class="mini-cart-content">
                                            <div class="inner-wrapper bg-light rounded">
                                                @php($sum = 0)
                                                @if(count($cartContent) > 0)
                                                <div class="mini-cart-product">
                                                    {{-- @php(dd($cartContent)) --}}
                                                    @foreach($cartContent['cart'] as $cartItem)
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="text-color-default font-secondary text-1 mt-3 mb-0">{{ $cartItem->name }}</h2>
                                                            <strong class="text-color-dark">
                                                                <span class="qty">{{ $cartItem->qty }}x</span>
                                                                <span class="product-price">{{ config('cart.currency_symbol') }}
                                                                    {{ $cartItem->price }}</span>
                                                            </strong>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="product-image">
                                                                <form action="{{ route('cart.destroy', $cartItem->rowId) }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="delete">
                                                                    <button type="submit"
                                                                        class="btn btn-light btn-rounded justify-content-center align-items-center" style="position: absolute;
                                        top: -11px;
                                        right: -12px;
                                        padding: 0;
                                        width: 22.4px;
                                        width: 1.4rem;
                                        height: 22.4px;
                                        height: 1.4rem;
                                        border: 1px solid #e9ecef;
                                        -webkit-box-shadow: 0px 0px 30px -8px rgba(0, 0, 0, 0.5);
                                        box-shadow: 0px 0px 30px -8px rgba(0, 0, 0, 0.5);"><i class="fas fa-times"></i></button>
                                                                </form>
                                                                {{-- <a href="{{ route('front.get.product', [$cartItem->product->slug]) }}" class="btn
                                                                btn-light btn-rounded justify-content-center align-items-center"></a> --}}
                                                                <img src="{{$cartItem->cover}}" class="img-fluid rounded" width="67" alt="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php($sum += $cartItem->price * $cartItem->qty)
                                                    @endforeach
                                                </div>
                                                <div class="mini-cart-total">
                                                    <div class="row">
                                                        <div class="col">
                                                            <strong class="text-color-dark">TOTAL:</strong>
                                                        </div>
                                                        <div class="col text-right">
                                                            <strong class="total-value text-color-dark">{{ config('cart.currency_symbol') }}{{ $sum }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mini-cart-actions">
                                                    <div class="row">
                                                        <div class="col pr-1">
                                                            <a href="{{ url('cart') }}" class="btn btn-dark font-weight-bold rounded text-0">VIEW CART</a>
                                                        </div>
                                                        <div class="col pl-1">
                                                            <a href="{{ url('checkout') }}"
                                                                class="btn btn-primary font-weight-bold rounded text-0">CHECKOUT</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
									<ul class="header-top-social-icons social-icons social-icons-transparent d-none d-md-block">
										<li class="social-icons-facebook">
											<a href="https://www.facebook.com/SMYLUSA-110466483789005/?modal=admin_todo_tour" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
										</li>
										<li class="social-icons-twitter">
											<a href="https://twitter.com/smylusa" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
										</li>
										<li class="social-icons-instagram">
											<a href="https://instagram.com/smylusa?igshid=12utpxi18rjiw" target="_blank" title="Instragram"><i class="fab fa-instagram"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
                <div class="header-container container-fluid">
                    <div class="header-row">
                        <div class="header-column justify-content-start">
                            <div class="header-logo">
                            <a href="{{ url('/') }}">
                                    <img alt="EZ" width="175" height="125" src="{{ asset('assets/img/logo.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-nav">
                                <div
                                    class="header-nav-main header-nav-main-uppercase header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav flex-column flex-lg-row" id="mainNav">
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{ (request()->is('/')) ? 'active' : '' }}" href="{{  url('/') }}">
                                                    Home
                                                </a>

                                            </li>
                                            <li class="dropdown ">
                                            <a class="dropdown-item dropdown-toggle {{ (request()->is('about-us')) ? 'active' : '' }}" href="{{ url('about-us') }}">
                                                    ABOUT US
                                                </a>
                                            </li>
                                             <li class="dropdown ">
                                            <a class="dropdown-item dropdown-toggle {{ (request()->is('how-it-works')) ? 'active' : '' }}" href="{{ url('how-it-works') }}">
                                                    HOW IT WORKS
                                                </a>
                                            </li>

                                            <li class="dropdown" >
                                            <a class="dropdown-item dropdown-toggle {{ (request()->is('pricing')) ? 'active' : '' }}" href="{{ url('pricing') }}">
                                                    PRICING
                                                </a>
                                            </li>

                                            <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ (request()->is('locations')) ? 'active' : '' }}" href="{{ url('locations') }}">
                                                    LOCATIONS
                                                </a>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{ (request()->is('products')) ? 'active' : '' }}" href="{{ url('products') }}">
                                                    PRODUCTS
                                                </a>
                                            </li>

                                            <li class="dropdown dropdown-mega ">
                                            <a class="dropdown-item dropdown-toggle {{ (request()->is('contact-us')) ? 'active' : '' }}" href="{{ url('contact-us') }}">
                                                    CONTACT
                                                </a>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-button d-none d-sm-flex ml-3">
                                    <a href="{{ url('assessment-form') }}"
                                        class="btn btn-outline btn-rounded btn-primary btn-4 btn-icon-effect-1"
                                        target="_blank">

                                        <span>AM I A CANDIDATE?</span>
                                        <!-- <i class="fas fa-shopping-cart"></i> -->
                                    </a>
                                </div>
                                <div class="header-button d-none d-sm-flex ml-3">
                                    @guest
                                        
                                    <a href="{{ url('login') }}"
                                        class="btn btn-outline btn-rounded btn-primary btn-4 btn-icon-effect-1"
                                        target="_blank">
                                        <span>SIGN IN</span>
                                        <!-- <i class="fas fa-shopping-cart"></i> -->
                                    </a>
                                </div>
                                @else
                                <a href="{{ route('accounts') }}" class="btn btn-outline btn-rounded btn-primary btn-4 btn-icon-effect-1" target="_blank">
                                    <span>My Account</span>
                                    <!-- <i class="fas fa-shopping-cart"></i> -->
                                </a>
                                @endguest
                                <button class="header-btn-collapse-nav ml-3" data-toggle="collapse"
                                    data-target=".header-nav-main nav">
                                    <span class="hamburguer">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="close">
                                        <span></span>
                                        <span></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')

        <footer id="footer" style="margin-top: 30px; margin: 0px;" class="footer-hover-links-light mt-0" data-plugin-image-background
		data-plugin-options="{'imageUrl': '', 'bgPosition': 'center 100%'}">
		<div class="container-fluid">
	
			<div class="row">
				<div class="col-lg-5 mb-4 mb-lg-0">
					<a href="{{ url('/') }}" class="logo">
						<img alt="SymlUSa" class="img-fluid mb-3" src="{{ asset('assets/img/logo-white.png') }}">
					</a>
					<p>SmylUSA will help you get your perfect smile in 6-8 months. We provide you customized aligners at your doorstep.
						We are providing you an option that promises convenience and affordability.</p>
					<ul class="list list-icon list-unstyled">
						<li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span
								class="text-color-light">Address:</span>8761 N 56th St #290757 Tampa, FL 33617</li>
						<li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span
								class="text-color-light">Phone:</span> <a href="tel:+813-860-5677">813-860-5677</a></li>
						<li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span
								class="text-color-light">Email:</span> <a href="mailto: info@smylusa.com"
								class="link-underline-light"> info@smylusa.com</a></li>
					</ul>
				</div>
				<div class="col-lg-3 mb-4 mb-lg-0 mt-5">
					<h2 class="text-3 mb-3">USEFUL LINKS</h2>
					<ul class="list list-icon list-unstyled">
					
						<li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{ url('contact-us') }}">Contact
								Us</a></li>
						<li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{ url('how-it-works') }}">How it Works</a></li>
						<li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{ url('products') }}">Products</a></li>
						<li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{ url('locations') }}">Locations</a></li>
					</ul>
				</div>
				<div class="col-lg-3 mt-5">
					<ul class="social-icons social-icons-transparent social-icons-icon-light social-icons-lg">
						<li class="social-icons-facebook"><a href="https://www.facebook.com/SMYLUSA-110466483789005/?modal=admin_todo_tour" target="_blank"
								title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
						<li class="social-icons-twitter"><a href="https://twitter.com/smylusa" target="_blank"
								title="Twitter"><i class="fab fa-twitter"></i></a></li>
						<li class="social-icons-instagram"><a href="https://instagram.com/smylusa?igshid=12utpxi18rjiw" target="_blank"
								title="Instagram"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container-fluid">
				<div class="row text-center text-md-left align-items-center">
					<div class="col-md-7 col-lg-8">
	
					</div>
					<div class="col-md-5 col-lg-4">
						<p class="text-md-right pb-0 mb-0">Copyrights © 2020. All Rights Reserved by SmylUSA</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
        
        <!-- Vendor -->
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/common/common.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.validation/jquery.validation.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/isotope/jquery.isotope.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/vide/vide.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/vivus/vivus.min.js') }}"></script>
        
        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        
        <!-- Current Page Vendor and Views -->
        <script src="{{ asset('assets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
        
        <!-- Theme Custom -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        
        <script src="{{ asset('assets/js/theme.init.js') }}"></script>
        <script src="{{ asset('assets/js/examples/examples.gallery.js') }}"></script>

        @yield('js')
        <script id="mcjs">
            !function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/fd79cb00a31108a0d1b7332eb/911eab9abdd2350eb678141ce.js");
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156444177-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-156444177-1');
        </script>

        </body>
        </html>