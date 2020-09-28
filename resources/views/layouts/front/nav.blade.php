    <header class="container-fluid">
        <nav class="container navbar navbar-expand-lg  d-flex">
            {{-- responsive view --}}
            <div class="navbar_toggler d-lg-none">
                <a class="navbar-brand  m_navbar_brand_img" href="#">
                    <img src="{{ asset('images/products/logo.png') }}" />
                </a>
                <button class="navbar-toggler collapsed hamburg_icon" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fal fa-bars"></i>
                </button>
            </div>
            {{-- screen view --}}
            <div class="collapse navbar-collapse align-items-center" id="navbarTogglerDemo02">
                <div class="d-flex navbar_content align-items-center">
                    {{-- logo --}}
                    <a class="navbar-brand d-lg-flex d-none " href="#">
                        <img src="{{ asset('images/products/logo.png') }}" />
                    </a>
                    {{-- sub menu - contact bar --}}
                    <div class="ml-md-auto mt-2 mt-lg-0 nav_sub_1 order-lg-1 order-2">
                        <ul class="navbar-nav nav_contact hidden">
                            <li class="nav-item active">
                                <div class="media">
                                    <img src="{{ asset('images/icons/phone_top_of_the_website.png') }}" class="float-left mx-2" />
                                    <div class="d-flex flex-column">
                                        <small class="clr_blue">Phone Number</small>
                                        <small>813-860-5677</small>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <div class="media ml-md-4">
                                    <img src="{{ asset('images/icons/email_top_of_the_website.png') }}" class="float-left mx-2" />
                                    <div class="d-flex flex-column">
                                        <small class="clr_blue">Email Address</small>
                                        <small>info@smylusa.com</small>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <div class="media ml-md-4">
                                    <img src="{{ asset('images/icons/location_icon_top_of_the_website.png') }}" class="float-left mx-2" />
                                    <div class="d-flex flex-column">
                                        <small class="clr_blue">Location</small>
                                        <small>8761 N 56th St #290757 Tampa, FL 33617</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        {{-- sign in  --}}
                        <ul class="navbar-nav nav-sign-in-reg nav-sub-right align-self-center <?php if (Auth::check()) {
                                                                                                    echo "hidden";
                                                                                                } ?>">
                            <li class="nav-item">
                                <div class="media">
                                    <ul class="navbar-nav d-flex flex-lg-row flex-column nav-profile-caption align-self-center">
                                        <li class="nav-item nav-signin">
                                            <a href="{{ url('/login') }}" class="nav-link">Sign In or Register</a>
                                        </li>
                                        {{--
                                        <li class="nav-item nav-or">
                                            <span class="nav-link mx-2">or</span>
                                        </li>
                                        <li class="nav-item nav-register">
                                            <a href="#" class="nav-link">Register</a>
                                        </li>
                                         --}}
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        {{-- profile icon  --}}
                        <ul class="navbar-nav nav-profile nav-sub-right align-self-center <?php if (!Auth::check()) {
                                                                                                echo "hidden";
                                                                                            } ?>">
                            <li class="nav-item">
                                <div class="media">
                                    <ul class="navbar-nav d-flex flex-column nav-profile-caption align-self-center">
                                        <li class="nav-item nav-user-name">
                                            <a class="nav-link" href="{{ url('/profile') }}"><?php if (Auth::check()) {
                                                                                echo Auth::user()->name;
                                                                            } ?></a>
                                        </li>
                                        <?php if (Auth::check()) {?>
                                        <li class="nav-item nav-sign-out">
                                            <a class="nav-link" href="{{ route('logout') }}">Sign Out</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php if (Auth::check()) { ?>
                                    <div class="btn-group nav-profile-icon">
                                        <button type="button" class="btn dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset('storage/'. auth()->user()->avatar) }}" class="nav-profile-img" />
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Profile</button>
                                            <button class="dropdown-item" type="button">Dashboard</button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="nav_wrapper container align-items-center order-lg-2 order-1 absolute">

                        {{-- main navigation bar --}}
                        <ul class="navbar-nav nav_main align-items-center order-md-1 order-0">
                            <li class="nav-item @if (Request::is('/'))  active  @endif">
                                <a class="nav-link" href="{{ url('/') }}">HOME</a>
                            </li>
                            <li class="nav-item @if (Request::is('about'))  active  @endif">
                                <a class="nav-link" href="{{ route('about') }}">ABOUT US</a>
                            </li>
                            <li class="nav-item @if (Request::is('howitworks'))  active  @endif">
                                <a class="nav-link" href="{{ route('howitworks') }}">HOW IT WORKS</a>
                            </li>
                            <li class="nav-item @if (Request::is('pricing'))  active  @endif">
                                <a class="nav-link" href="{{ route('pricing') }}">PRICING</a>
                            </li>
                            <li class="nav-item @if (Request::is('locations'))  active  @endif">
                                <a class="nav-link" href="{{ route('locations') }}">LOCATIONS</a>
                            </li>
                            <li class="nav-item @if (Request::is('products'))  active  @endif">
                                <a class="nav-link" href="{{ url('/products') }}">PRODUCTS</a>
                            </li>
                            <li class="nav-item @if (Request::is('contact'))  active  @endif">
                                <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                            </li>
                        </ul>

                        {{-- social medial --}}
                        <ul class="navbar-nav nav_social ml-md-auto align-items-center order-md-2 order-2">
                            <li class="nav-item">
                                <a class="nav-link icon_fb" href="#">
                                    {{-- <img src="{{ asset('images/icons/menubar_facebook_normal.png') }}" /> --}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link icon_tweet" href="#">
                                    {{-- <img src="{{ asset('images/icons/menubar_tweeter_normal.png') }}" /> --}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link icon_insta" href="#">
                                    {{-- <img src="{{ asset('images/icons/menubar_insta_normal.png') }}" /> --}}
                                </a>
                            </li>
                        </ul>

                        {{-- cart menu --}}
                        <ul class="navbar-nav nav_cart align-items-center order-lg-3">
                            <li class="nav-item">
                                <a class="nav-link icon_cart" href="/cart">
                                    <span class="badge badge-pill">{{ $cartCount }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>