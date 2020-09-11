<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SmylUSA | Operator Portal</title>
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
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('user/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('user/assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('user/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('user/assets/layouts/layout3/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user/assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('user/assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/theme.css')}}"> --}}
        <!-- <link rel="stylesheet" href="css/theme-elements.css"> -->
        
        <!-- Current Page CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/layers.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/navigation.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
        
        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}">
        
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        
        <!-- Head Libs -->
        <script src="{{ asset('assets/vendor/modernizr/modernizr.min.js') }}"></script>
        <link rel="shortcut icon" href="{{ asset('assets/favicon.ico')}}" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
                        <a href="{{ route('operator.dashboard') }}">
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
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            {{-- <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
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
                                        <a href="{{ route('operator.profile') }}">
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
                            <!-- END USER LOGIN DROPDOWN -->
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
                                <a href="{{ route('operator.dashboard') }}"> Dashboard
                                    <span class="arrow"></span>
                                </a>
                        
                        
                            </li>
                            <li class="menu-dropdown mega-menu-dropdown  ">
                                <a href="#"> Patients
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" active">
                                        <a href="{{ route('operator.patient-in-location') }}" class="nav-link  active">
                                            <i class="icon-user"></i>Patients in my Location</a>
                                    </li>
                                    <li class=" ">
                                        <a href="{{ route('operator.fulfilled-patients') }}" class="nav-link  ">
                                            <i class="icon-check"></i> Fulfilled Patients
                                            <!-- <span class="badge badge-success">1</span> -->
                                        </a>
                                    </li>
                        
                                </ul>
                        
                            </li>
                            <li class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                <a href="{{ route('operator.commission') }}"> Comissions
                                    <span class="arrow"></span>
                                </a>
                        
                            </li>
                            {{-- <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="javascript:;"> What's New?
                                    <span class="arrow"></span>
                                </a>
                        
                            </li> --}}
                        
                        
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