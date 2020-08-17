<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SmylUSA | Vendor Portal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('user/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('user/assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('user/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('user/assets/layouts/layout3/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('user/assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
        <!-- END THEME LAYOUT STYLES -->
            {{-- <link rel="stylesheet" href="{{ asset('assets/css/theme.css')}}"> --}}
            <!-- <link rel="stylesheet" href="css/theme-elements.css"> -->
            
            <!-- Current Page CSS -->
            <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/settings.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/layers.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/navigation.css') }}">
            
            <!-- Skin CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}">
            
            <!-- Theme Custom CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
            
            <!-- Head Libs -->
            <script src="{{ asset('assets/vendor/modernizr/modernizr.min.js') }}"></script>
            <link rel="shortcut icon" href="{{ asset('assets/favicon.ico')}}" />

            @yield('css')
            </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-boxed">
        <!-- BEGIN HEADER -->
        
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ route('vendor.dashboard') }}">
                            <img src="{{ asset('assets/img/logo-small.png') }}" width="150" height="100" alt="logo"
                                class="logo">
        
                        </a>
                    </div>
                    
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            {{-- <li class="dropdown dropdown-extended dropdown-notification dropdown-dark"
                                id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default">7</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>You have
                                            <strong>12 pending</strong> tasks</h3>
                                        <a href="app_todo.html">view all</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="true">
                                    <i class="icon-calendar"></i>
                                    <span class="badge badge-default">3</span>
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                    <li class="external">
                                        <h3>You have
                                            <strong>12 pending</strong> tasks</h3>
                                        <a href="app_todo_2.html">view all</a>
                                    </li>
                                </ul>
                            </li> --}}
                            <!-- END TODO DROPDOWN -->
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="true">
                                    <img alt="" class="img-circle" src="{{ asset('storage/' . auth()->guard('employee')->user()->avatar) }}">
                                    <span class="username username-hide-mobile">{{ auth()->guard('employee')->user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ route('vendor.profile') }}">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a class="" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Log Out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">
                            <li class="menu-dropdown classic-menu-dropdown ">
                            <a href="{{ route('vendor.dashboard') }}"> Dashboard
                                    <span class="arrow"></span>
                                </a>
                        
                        
                            </li>
                        
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="{{ route('vendor.new-case') }}"> New Cases
                                    <span class="arrow"></span>
                                </a>
                        
                            </li>
                            <li class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                <a href="{{ route('vendor.case-sent') }}"> Cases Sent for Approval
                                    <span class="arrow"></span>
                                </a>
                        
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="{{ route('vendor.approved-case') }}"> Approved Cases
                                    <span class="arrow"></span>
                                </a>
                        
                            </li>
                        
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="{{ route('vendor.completed-case') }}"> Completed Cases
                                    <span class="arrow"></span>
                                </a>
                        
                            </li>
                        
                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            
                @yield('content')

        </div>
        <!-- END PRE-FOOTER -->
        <!-- BEGIN INNER FOOTER -->
        <footer id="footer" class="footer-hover-links-light mt-0" data-plugin-image-background
            data-plugin-options="{'imageUrl': '{{ asset('assets/img/footer/background-1.png') }}', 'bgPosition': 'center 100%'}">
            <div class="container">
        
                <div class="row">
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <a href="{{ url('/') }}" class="logo">
                            <img alt="EZY Website Template" class="img-fluid mb-3" src="{{ asset('assets/img/logo-footer.png') }}">
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
                                    href="https://themeforest.net/item/ezy-responsive-multipurpose-html5-template/21814871">How
                                    It Works?</a></li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="contact-us-2.html">Pricing
                                </a></li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="contact-us-3.html">Locations
                                </a></li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="#">Order Now</a></li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="#">Get Support</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h2 class="text-3 mb-3">LATEST NEWS</h2>
                        <div class="mb-3">
                            <p class="mb-1"><a href="blog-single-post.html" class="d-block">Get started on a smile you'll love
                                    by taking our free smile assessment.</a></p>
                            <a href="blog-single-post.html" class="font-tertiary font-style-italic text-color-light">21st
                                December 2019</a>
                        </div>
                        <div>
                            <p class="mb-1"><a href="blog-single-post.html" class="d-block">Find out which aligners are right
                                    for you.</a></p>
                            <a href="blog-single-post.html" class="font-tertiary font-style-italic text-color-light">23rd
                                December 2019</a>
                        </div>
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
        <script src="{{ asset('user/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('user/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('user/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('user/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('user/assets/layouts/layout3/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/layouts/layout3/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('user/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>