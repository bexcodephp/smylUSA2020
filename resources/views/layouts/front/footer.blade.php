<footer class="container-fluid pt-md-5 pt-3">
    <div class="footerlogo">
        <figcaption>
            <img src="{{ asset('images/products/logo.png') }}" />
        </figcaption>
    </div>
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <p>SmylUSA will help you get your perfect smile in 6-8 months. We provide you customized aligners at your doorstep. We are providing you an option that promises convenience and affordability.</p>
                <h6>Follow Us</h6>
                <ul class="list-group list-group-horizontal footersocial">
                    <li class="list-group-item">
                        <a id="" class="btn fb" href="#" role="button">
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a id="" class="btn twitter" href="#" role="button">
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a id="" class="btn insta" href="#" role="button">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 followus">
                <h6>Follow Us</h6>
                <div class="list-group">
                    <a href="{{ url('/') }}" class="list-group-item list-group-item-action">HOME</a>
                    <a href="{{ url('/aboutus') }}" class="list-group-item list-group-item-action">ABOUT US</a>
                    <a href="{{ url('/works') }}" class="list-group-item list-group-item-action">HOW IT WORKS</a>
                    <a href="{{ url('/pricing') }}" class="list-group-item list-group-item-action">PRICING</a>
                    <a href="{{ url('/locations') }}" class="list-group-item list-group-item-action">LOCATIONS</a>
                    <a href="{{ url('/products') }}" class="list-group-item list-group-item-action">PRODUCTS</a>
                    <a href="{{ url('/contactus') }}" class="list-group-item list-group-item-action">CONTACT</a>
                </div>
            </div>
            <div class="col-md-4 contactus">
                <h6>Contact Us</h6>
                <ul class="navbar-nav">
                    <li class="nav-item mb-3">
                        <div class="media">
                            <img src="{{ asset('images/icons/phone_top_of_the_website.png') }}" class="float-left mr-2" />
                            <div class="d-flex flex-column">
                                <small class="clr_blue">Phone Number</small>
                                <small>813-860-5677</small>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mb-3">
                        <div class="media">
                            <img src="{{ asset('images/icons/email_top_of_the_website.png') }}" class="float-left mr-2" />
                            <div class="d-flex flex-column">
                                <small class="clr_blue">Email Address</small>
                                <small>info@smylusa.com</small>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mb-3">
                        <div class="media">
                            <img src="{{ asset('images/icons/location_icon_top_of_the_website.png') }}" class="float-left mr-2" />
                            <div class="d-flex flex-column">
                                <small class="clr_blue">Location</small>
                                <small>8761 N 56th<br/>St #290757 Tampa,<br/>33617</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="copyright py-3 mt-4 text-center">
        <small class=" m-0">
            Terms & Conditions<span class="mx-3">&#124;</span>Privacy Policy<span class="mx-3">&#124;</span>Copyrights © 2020. All Rights Reserved by SmylUSA
        </small>
    </div>
</footer>
{{-- scripts --}}
{{-- <script src="/js/app.js"></script> --}}
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-4.5.0/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('front/js/scripts-front.js') }}"></script>
{{-- @stack('scripts') --}}
