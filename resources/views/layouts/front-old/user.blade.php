<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SmylUSA | User Portal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
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
        <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
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
            <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

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
                        <a href="{{ url('accounts') }}">
                            <img src="{{ asset('assets/img/logo.png') }}" width="150" height="100" alt="logo"
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
                            
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                    data-close-others="true">
                                    <img alt="" class="img-circle" src="{{ asset('storage/'. auth()->user()->avatar) }}">
                            <span class="username username-hide-mobile">{{ auth()->user()->name }} @if(auth()->user()->patient_id) <br> Patient Id: {{ auth()->user()->patient_id }} @endif</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ route('profile') }}">
                                             My Profile </a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ url('calendar') }}">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li> --}}
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
                    <div class="hor-menu " style="width: 100%;">
                        <ul class="nav navbar-nav" style="width: 100%;">
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="{{ url('accounts') }}"> Dashboard
                                    <span class="arrow"></span>
                                </a>
        
                            </li>
                            <li class="menu-dropdown mega-menu-dropdown  ">
                                <a href="#"> Orders
                            
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class="">
                                    <a href="{{ route('orders') }}" class="nav-link ">
                                            Order History</a>
                                    </li>
                                    <li class="">
                                    <a href="{{ url('products') }}" class="nav-link ">
                                            Order Now</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('locations') }}" class="nav-link">
                                             Order at location

                                        </a>
                                    </li>
                                
                                </ul>
        
                            </li>
                            <li class="menu-dropdown mega-menu-dropdown  ">
                                <a href="#"> FAQs
                            
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class="">
                                    <a href="http://www.lequydonhanoi.edu.vn/upload_images/S%C3%A1ch%20ngo%E1%BA%A1i%20ng%E1%BB%AF/Rich%20Dad%20Poor%20Dad.pdf" class="nav-link ">
                                            Guide Book</a>
                                    </li>
                                    <li>
                                    <a href="{{ route('resources') }}" class="nav-link">
                                             All Resources
                                        </a>
                                    </li>
                                
                                </ul>
        
                            </li>
                            <li>
                                <a href="{{ url('profile') }}" class="nav-link">
                                    My Profile
                                </a>
                            </li>
                           <li class="pull-right">
                            <a href="{{ route('cart.index') }}" class="nav-link">
                                View Cart
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
        @include('layouts.front.footer_inner')