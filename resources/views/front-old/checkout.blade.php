<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SmylUSA | User </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <!-- <link rel="stylesheet" href="css/theme-elements.css"> -->

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/rs-plugin/css/navigation.css')}}">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/vendor/modernizr/modernizr.min.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('user/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('user/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('user/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('user/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('user/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('user/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/assets/global/css/components-rounded.min.css') }}" rel="stylesheet" id="style_components"
        type="text/css" />
    <link href="{{ asset('user/assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('user/assets/layouts/layout3/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/assets/layouts/layout3/css/themes/default.min.css') }}" rel="stylesheet" type="text/css"
        id="style_color" />
    <link href="{{ asset('user/assets/layouts/layout3/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />

    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
                        <img src="{{ asset('assets/img/logo-small.png') }}" width="150"
                            height="100" alt="logo" class="logo">

                    </a>
                </div>

                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler"></a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->

                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- END HEADER TOP -->
        <!-- BEGIN HEADER MENU -->

        <!-- END HEADER MENU -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Fill your information in order to proceed to checkout
                            <!-- <small>dashboard & statistics</small> -->
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                    <!-- BEGIN PAGE TOOLBAR -->
                    <div class="page-toolbar">
                        <!-- BEGIN THEME PANEL -->
                        <div class="btn-group btn-theme-panel">
                            <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">

                            </a>

                        </div>
                        <!-- END THEME PANEL -->
                    </div>
                    <!-- END PAGE TOOLBAR -->
                </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container">
                    <!-- BEGIN PAGE BREADCRUMBS -->

                    <!-- END PAGE BREADCRUMBS -->
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="portlet light " id="form_wizard_1">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-red"></i>
                                            <span class="caption-subject font-red bold uppercase">
                                                <span class="step-title"> Step 1 of 4 </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        @include('layouts.errors-and-messages')
                                    <form action="{{ route('checkout.store') }}" class="form-horizontal" id="submit_form" method="POST">
                                        @csrf
                                            <div class="form-wizard">
                                                <div class="form-body">
                                                    <ul class="nav nav-pills nav-justified steps">
                                                        <li>
                                                            <a href="#tab1" data-toggle="tab" class="step">
                                                                <span class="number"> 1 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Medical Form </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab2" data-toggle="tab" class="step">
                                                                <span class="number"> 2 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Profile Setup </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#tab3" data-toggle="tab" class="step">
                                                                <span class="number"> 3 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Payments </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#tab4" data-toggle="tab" class="step">
                                                                <span class="number"> 4 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Confirm </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                                        <div class="progress-bar progress-bar-success"> </div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="alert alert-danger display-none">
                                                            <button class="close" data-dismiss="alert"></button> You
                                                            have some form errors.
                                                            Please check below. </div>
                                                        <div class="alert alert-success display-none">
                                                            <button class="close" data-dismiss="alert"></button> Your
                                                            form validation is
                                                            successful! </div>

                                                        <div class="tab-pane active" id="tab1">
                                                            <h3 class="block">Please fill out this form</h3>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have had a bone
                                                                    marrow transplant or treatment of haematological
                                                                    malignancies (blood cancers):</label>
                                                                <div class="col-md-4">
                                                                    <select name="bone_marrow_transplant" required
                                                                        id="bone_marrow_transplant"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have a branded
                                                                    retainer:</label>
                                                                <div class="col-md-4">
                                                                    <select name="branded_retainer" required
                                                                        id="branded_retainer" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have
                                                                    crowns:</label>
                                                                <div class="col-md-4">
                                                                    <select name="crowns" required id="crowns"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have primary
                                                                    (baby) teeth:</label>
                                                                <div class="col-md-4">
                                                                    <select name="baby_teeth" required id="baby_teeth"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>






                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have
                                                                    bridgework:</label>
                                                                <div class="col-md-4">
                                                                    <select name="bridgework" required id="bridgework"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>





                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have an impacted
                                                                    tooth:</label>
                                                                <div class="col-md-4">
                                                                    <select name="impacted_tooth" required
                                                                        id="impacted_tooth" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have an
                                                                    implant:</label>
                                                                <div class="col-md-4">
                                                                    <select name="implant" required id="implant"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have
                                                                    veneers:</label>
                                                                <div class="col-md-4">
                                                                    <select name="veneers" required id="veneers"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have a recent
                                                                    radiograph of my teeth:</label>
                                                                <div class="col-md-4">
                                                                    <select name="teeth_radiography" required
                                                                        id="teeth_radiography" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you feel pain
                                                                    in any of your teeth?
                                                                    :</label>
                                                                <div class="col-md-4">
                                                                    <select name="feel_pain" required id="feel_pain"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you have any
                                                                    sores or lumps in or near your mouth?</label>
                                                                <div class="col-md-4">
                                                                    <select name="sores_near_mouth" required
                                                                        id="sores_near_mouth" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you currently
                                                                    have any head, neck or jaw injuries?</label>
                                                                <div class="col-md-4">
                                                                    <select name="injury" required id="injury"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you currently
                                                                    experience: jaw clicking, pain, difficulty opening
                                                                    and /or closing or difficulty chewing?</label>
                                                                <div class="col-md-4">
                                                                    <select name="difficulty" required id="difficulty"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Have you noticed
                                                                    any loosening of your teeth or do you have untreated
                                                                    periodontal disease?
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <select name="loosening_teeth" required
                                                                        id="loosening_teeth" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you have any
                                                                    known allergies to any dental materials?
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <select name="known_allergies" required
                                                                        id="known_allergies" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have a history
                                                                    of IV bisphosphonate treatment:
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <select name="history_of_iv_bisphosphonate" required
                                                                        id="history_of_iv_bisphosphonate"
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I am currently on
                                                                    acute corticosteroids or in immunosuppression,
                                                                    chemotherapy, or radiation:
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <select name="acute_corticosteroids" required
                                                                        id="acute_corticosteroids" class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        <option value="yes">Yes</option>
                                                                        <option value="no">No</option>

                                                                    </select>
                                                                </div>
                                                            </div>




                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Cheif Complaint
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <textarea type="text" class="form-control"
                                                                        id="chief_complaint"
                                                                        name="chief_complaint"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- New tab -->


                                                        <div class="tab-pane" id="tab2">
                                                            <h3 class="block">Provide your profile details</h3>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Fullname
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" required
                                                                        name="name"
                                                                        value="{{ auth()->user()->name }}" />
                                                                    <span class="help-block"> Provide your full name
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Phone Number
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" required
                                                                        name="phone"/>
                                                                    <span class="help-block"> Provide your phone number
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Gender
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <div class="radio-list">
                                                                        <label>
                                                                            <input type="radio" name="gender"
                                                                             required value="male" @if(auth()->user()->gender == 'male') checked @endif
                                                                                data-title="Male" />
                                                                            Male </label>
                                                                        <label>
                                                                            <input type="radio" name="gender"
                                                                               required value="female" @if(auth()->user()->gender == 'female') checked @endif
                                                                                data-title="Female" /> Female </label>
                                                                    </div>
                                                                    <div id="form_gender_error"> </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Date Of Birth
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control datepicker" id="dob" required name="dob" value="" />
                                                                    <span class="help-block"> Provide your Date Of Brith </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" id="address" 
                                                                        required name="address_1" value=""/>
                                                                    <span class="help-block"> Provide your street
                                                                        address </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Zipcode
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" id="zip" 
                                                                        required name="zip" value=""/>
                                                                    <span class="help-block"> Zipcode</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City/Town
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" id="city"
                                                                required name="city" value="" />
                                                                    <span class="help-block"> Provide your city or town
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country</label>
                                                                <div class="col-md-4">
                                                                    <select name="country_id" id="country" required
                                                                        class="form-control">
                                                                        <option value=""></option>
                                                                        @foreach($countries as $country)
                                                                            <option value="{{ $country->id }}">
                                                                                {{ $country->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Remarks</label>
                                                                <div class="col-md-4">
                                                                    <textarea class="form-control" rows="3" id="remarks"
                                                                        name="remarks"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane" id="tab3">
                                                            <h3 class="form-section">Credit Card Details</h3>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="name_on_card">Name On Card:</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="name_on_card" id="name_on_card" value="" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="card_number">Card Number:</label>
                                                                <div class="col-md-4">
                                                                    <input type="number" minlength="16" maxlength="16" class="form-control" name="card_number" value=""
                                                                        id="card_number" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="exp_month">Exp Month:</label>
                                                                <div class="col-md-4">
                                                                    <select name="exp_month" class="form-control" id="exp_month">
                                                                        <option value="" disabled selected>Select Month</option>
                                                                        <option value="1">1 - January</option>
                                                                        <option value="2">2 - February</option>
                                                                        <option value="3">3 - March</option>
                                                                        <option value="4">4 - April</option>
                                                                        <option value="5">5 - May</option>
                                                                        <option value="6">6 - June</option>
                                                                        <option value="7">7 - July</option>
                                                                        <option value="8">8 - August</option>
                                                                        <option value="9">9 - September</option>
                                                                        <option value="10">10 - October</option>
                                                                        <option value="11">11 - November</option>
                                                                        <option value="12">12 - December</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="exp_year">Exp Year:</label>
                                                                <div class="col-md-4">
                                                                    <select name="exp_year" id="exp_year" class="form-control">
                                                                        <option value="" disabled selected>Select Month</option>
                                                                    @for($i = 20; $i<=35; $i++)
                                                                    <option value="{{ $i }}">20{{ $i }}</option>
                                                                    @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="cvc">CVC:</label>
                                                                <div class="col-md-4">
                                                                    <input type="number" minlength="3" maxlength="4" class="form-control" name="cvc" value="" id="cvc" >
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="tab-pane" id="tab4">
                                                            <h3 class="block">Confirm your account</h3>
                                                            <h4 class="form-section">Profile</h4>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Fullname:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="fullname">
                                                                        {{ auth()->user()->name }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Email:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="email">
                                                                        {{ auth()->user()->email }}</p>
                                                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Gender:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="gender"
                                                                        id="prev_gender"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Phone:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="phone"
                                                                        id="prev_phone"
                                                                        value="{{ auth()->user()->phone }} "></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="address" id="prev_address"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Zipcode:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="zip" id="prev_zip"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City/Town:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="city"
                                                                        id="prev_city"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="country" id="prev_country"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Remarks:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="remarks" id="prev_remarks"> </p>
                                                                </div>
                                                            </div>
                                                            <h4 class="form-section">Medical form</h4>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have had a bone
                                                                    marrow transplant or treatment of haematological
                                                                    malignancies (blood cancers):</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="bone_marrow_transplant" id="prev_bone_marrow_transplant">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have a branded
                                                                    retainer:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="branded_retainer"
                                                                        id="prev_branded_retainer"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have
                                                                    crowns:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="crowns"
                                                                        id="prev_crowns"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have primary
                                                                    (baby) teeth:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="baby_teeth" id="prev_baby_teeth">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have
                                                                    bridgework:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="bridgework"
                                                                        id="prev_bridgework"> </p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have an impacted
                                                                    tooth:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="impacted_tooth"
                                                                        id="prev_impacted_tooth"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have an
                                                                    implant:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="implant" id="prev_implant"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have
                                                                    veneers:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="veneers" id="prev_veneers"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have a recent
                                                                    radiograph of my teeth:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="teeth_radiography"
                                                                        id="prev_teeth_radiography"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you feel pain
                                                                    in any of your teeth?</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="feel_pain" id="prev_feel_pain"> </p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you have any
                                                                    sores or lumps in or near your mouth?</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="sores_near_mouth" id="prev_sores_near_mouth">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you currently
                                                                    have any head, neck or jaw injuries?</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="injury"
                                                                        id="prev_injury"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you currently
                                                                    experience: jaw clicking, pain, difficulty opening
                                                                    and /or closing or difficulty chewing?</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="difficulty" id="prev_difficulty">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Have you noticed
                                                                    any loosening of your teeth or do you have untreated
                                                                    periodontal disease?</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="loosening_teeth"
                                                                        id="prev_loosening_teeth"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Do you have any
                                                                    known allergies to any dental materials?</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="known_allergies"
                                                                        id="prev_known_allergies"> </p>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I have a history
                                                                    of IV bisphosphonate treatment:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="history_of_iv_bisphosphonate"
                                                                        id="prev_history_of_iv_bisphosphonate"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">I am currently on
                                                                    acute corticosteroids or in immunosuppression,
                                                                    chemotherapy, or radiation:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="acute_corticosteroids"
                                                                        id="prev_acute_corticosteroids"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Cheif
                                                                    Complaint:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static"
                                                                        data-display="chief_complaint"
                                                                        id="prev_chief_complaint"> </p>
                                                                </div>
                                                            </div>




                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn default button-previous">
                                                                <i class="fa fa-angle-left"></i> Back </a>
                                                            {{-- <a href="javascript:;"
                                                                class="btn btn-outline green button-next"> Skip
                                                                <i class="fa fa-angle-right"></i>
                                                            </a> --}}
                                                            <a href="javascript:;"
                                                                class="btn btn-outline green button-next"> Next
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <input type="hidden" name="mf" value="1">
                                                            <input type="hidden" name="payment_type" value="1">
                                                            <a href="javascript:;" class="btn green button-submit">
                                                                Submit & Complete Order
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT INNER -->
                </div>
            </div>
            <!-- END PAGE CONTENT BODY -->
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <div class="page-quick-sidebar">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                            <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                            <span class="badge badge-success">7</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-bell"></i> Alerts </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-info"></i> Notifications </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-speech"></i> Activities </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-settings"></i> Settings </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd"
                            data-wrapper-class="page-quick-sidebar-list">
                            <h3 class="list-heading">Staff</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">8</span>
                                    </div>
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar3.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Bob Nilson</h4>
                                        <div class="media-heading-sub"> Project Manager </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar1.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nick Larson</h4>
                                        <div class="media-heading-sub"> Art Director </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">3</span>
                                    </div>
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar4.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Hubert</h4>
                                        <div class="media-heading-sub"> CTO </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar2.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Wong</h4>
                                        <div class="media-heading-sub"> CEO </div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="list-heading">Customers</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-warning">2</span>
                                    </div>
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar6.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lara Kunis</h4>
                                        <div class="media-heading-sub"> CEO, Loop Inc </div>
                                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="label label-sm label-success">new</span>
                                    </div>
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar7.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ernie Kyllonen</h4>
                                        <div class="media-heading-sub"> Project Manager,
                                            <br> SmartBizz PTL </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar8.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lisa Stone</h4>
                                        <div class="media-heading-sub"> CTO, Keort Inc </div>
                                        <div class="media-heading-small"> Last seen 13:10 PM </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">7</span>
                                    </div>
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar9.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Portalatin</h4>
                                        <div class="media-heading-sub"> CFO, H&D LTD </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar10.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Irina Savikova</h4>
                                        <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">4</span>
                                    </div>
                                    <img class="media-object"
                                        src="{{ asset('user/assets/layouts/layout/img/avatar11.jpg') }}" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Maria Gomez</h4>
                                        <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                        <div class="media-heading-small"> Last seen 03:10 AM </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="page-quick-sidebar-item">
                            <div class="page-quick-sidebar-chat-user">
                                <div class="page-quick-sidebar-nav">
                                    <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                        <i class="icon-arrow-left"></i>Back</a>
                                </div>
                                <div class="page-quick-sidebar-chat-user-messages">
                                    <div class="post out">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar3.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> When could you send me the report ? </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar2.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Its almost done. I will be sending it shortly </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar3.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Alright. Thanks! :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar2.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:16</span>
                                            <span class="body"> You are most welcome. Sorry for the delay. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar3.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> No probs. Just take your time :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar2.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Alright. I just emailed it to you. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar3.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Great! Thanks. Will check it right away. </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar2.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Please let me know if you have any comment. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt=""
                                            src="{{ asset('user/assets/layouts/layout/img/avatar3.jpg') }}" />
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Sure. I will check and buzz you if anything needs to be
                                                corrected. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-quick-sidebar-chat-user-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type a message here...">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn green">
                                                <i class="icon-paper-clip"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                        <div class="page-quick-sidebar-alerts-list">
                            <h3 class="list-heading">General</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number:
                                                        DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-warning"> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="list-heading">System</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number:
                                                        DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-default "> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                        <div class="page-quick-sidebar-settings-list">
                            <h3 class="list-heading">General Settings</h3>
                            <ul class="list-items borderless">
                                <li> Enable Notifications
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                        data-on-color="success" data-on-text="ON" data-off-color="default"
                                        data-off-text="OFF"> </li>
                                <li> Allow Tracking
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="info"
                                        data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Log Errors
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                        data-on-color="danger" data-on-text="ON" data-off-color="default"
                                        data-off-text="OFF"> </li>
                                <li> Auto Sumbit Issues
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning"
                                        data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                <li> Enable SMS Alerts
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                        data-on-color="success" data-on-text="ON" data-off-color="default"
                                        data-off-text="OFF"> </li>
                            </ul>
                            <h3 class="list-heading">System Settings</h3>
                            <ul class="list-items borderless">
                                <li> Security Level
                                    <select class="form-control input-inline input-sm input-small">
                                        <option value="1">Normal</option>
                                        <option value="2" selected>Medium</option>
                                        <option value="e">High</option>
                                    </select>
                                </li>
                                <li> Failed Email Attempts
                                    <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                <li> Secondary SMTP Port
                                    <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                <li> Notify On System Error
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                        data-on-color="danger" data-on-text="ON" data-off-color="default"
                                        data-off-text="OFF"> </li>
                                <li> Notify On SMTP Error
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                        data-on-color="warning" data-on-text="ON" data-off-color="default"
                                        data-off-text="OFF"> </li>
                            </ul>
                            <div class="inner-content">
                                <button class="btn btn-success">
                                    <i class="icon-settings"></i> Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- BEGIN PRE-FOOTER -->
    <footer id="footer" class="footer-hover-links-light mt-0" data-plugin-image-background
        data-plugin-options="{'imageUrl': '{{ asset('user/assets/img/footer/background-1.png') }}', 'bgPosition': 'center 100%'}">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <a href="{{ url('/') }}" class="logo">
                        <img alt="" class="img-fluid mb-3" src="{{ asset('assets/img/logo-footer.png') }}">
                    </a>
                    <p>SmylUSA will help you get your perfect smile in 6-8 months. We provide you customized aligners at
                        your doorstep.
                        We are providing you an option that promises convenience and affordability.</p>
                    <ul class="list list-icon list-unstyled">
                        <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span
                                class="text-color-light">Address:</span> 1234 Street Name, City Name, USA</li>
                        <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span
                                class="text-color-light">Phone:</span> <a href="tel:+1234567890">(123) 456-7890</a></li>
                        <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span
                                class="text-color-light">Email:</span> <a href="mailto:mail@example.com"
                                class="link-underline-light">info@smylusa.com</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h2 class="text-3 mb-3">LEARN MORE</h2>
                    <ul class="list list-icon list-unstyled">
                        <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a
                                href="{{ route('pricing') }}">Pricing
                            </a></li>
                        <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a
                        href="{{ route('locations') }}">Locations
                            </a></li>
                    </ul>
                </div>
                {{-- <div class="col-lg-3">
                    <h2 class="text-3 mb-3">LATEST NEWS</h2>
                    <div class="mb-3">
                        <p class="mb-1"><a href="blog-single-post.html" class="d-block">Get started on a smile you'll
                                love
                                by taking our free smile assessment.</a></p>
                        <a href="blog-single-post.html" class="font-tertiary font-style-italic text-color-light">21st
                            December 2019</a>
                    </div>
                    <div>
                        <p class="mb-1"><a href="blog-single-post.html" class="d-block">Find out which aligners are
                                right
                                for you.</a></p>
                        <a href="blog-single-post.html" class="font-tertiary font-style-italic text-color-light">23rd
                            December 2019</a>
                    </div>
                </div> --}}
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
                        <p class="text-md-right pb-0 mb-0">Copyrights © 2019. All Rights Reserved.</p>
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
<script src="{{ asset('user/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('user/assets/global/plugins/excanvas.min.js') }}"></script> 
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('user/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min') }}.js" type="text/javascript">
    </script>
    <script src="{{ asset('user/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    
    
    <script src="{{ asset('user/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
    
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('user/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('user/assets/pages/scripts/form-wizard.js') }}" type="text/javascript"></script>
        
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('user/assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('user/assets/layouts/layout3/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/layouts/layout3/scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            var dateToday = new Date();
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                maxDate: dateToday,
            });
        } );
        $('input').blur(function(e){
            $('#prev_' + $(this).attr('id')).html($(this).val());
        });

        $('textarea').blur(function(e){
            $('#prev_' + $(this).attr('id')).html($(this).val());
        });

        $('select').change(function(e){
            $('#prev_' + $(this).attr('id')).html($(this).val());
        });
    </script>
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>