<!-- END PRE-FOOTER -->
<!-- BEGIN INNER FOOTER -->
<footer id="footer" class="footer-hover-links-light mt-0" data-plugin-image-background
    data-plugin-options="{'imageUrl': '{{ asset('assets/img/footer/background-1.png') }}', 'bgPosition': 'center 100%'}">
    <div class="container">

        <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <a href="{{ url('/') }}" class="logo">
                    <img alt="EZY Website Template" class="img-fluid mb-3"
                        src="{{ asset('assets/img/logo.png') }}" width="150">
                </a>
                <p>SmylUSA will help you get your perfect smile in 6-8 months. We provide you customized aligners at
                    your doorstep.
                    We are providing you an option that promises convenience and affordability.</p>
                <ul class="list list-icon list-unstyled">
                    <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span class="text-color-light">Address:</span>8761 N 56th St #290757 Tampa, FL 33617</li>
                    <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span class="text-color-light">Phone:</span> <a
                            href="tel:+813-860-5677">813-860-5677</a></li>
                    <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span class="text-color-light">Email:</span> <a
                            href="mailto: info@smylusa.com" class="link-underline-light"> info@smylusa.com</a></li>
                </ul>
            </div>
            <div class="col-lg-3 mb-4 mb-lg-0">
                <h2 class="text-3 mb-3">LEARN MORE</h2>
                <ul class="list list-icon list-unstyled">
                    <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a
                            href="{{ route('howitworks') }}">How
                            It Works?</a></li>
                    <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a
                            href="{{ route('pricing') }}">Pricing
                        </a></li>
                    <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a
                            href="{{ route('locations') }}">Locations
                        </a></li>
                    <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a
                            href="{{ route('front.get.product_all') }}">Order
                            Now</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row text-center text-md-left align-items-center">
                <div class="col-md-7 col-lg-8">
                    <ul class="social-icons social-icons-transparent social-icons-icon-light social-icons-lg">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank"
                                title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank"
                                title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank"
                                title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-5 col-lg-4">
                    <p class="text-md-right pb-0 mb-0">Copyrights © 2020. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="{{ asset('user/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{ asset('user/assets/global/plugins/excanvas.min.js')}}"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('user/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"
    type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
    type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
    type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('user/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('user/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"
    type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('user/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/pages/scripts/form-wizard.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('user/assets/layouts/layout3/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/layouts/layout3/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('user/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
@yield('js')
</body>

</html>