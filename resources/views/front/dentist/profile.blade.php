@extends('layouts.front.dentist')

@section('css')
<link href="{{ asset('user/assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Dentist Portal
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                          
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
                                    <!-- BEGIN PROFILE SIDEBAR -->
                                    <div class="profile-sidebar">
                                        <!-- PORTLET MAIN -->
                                        <div class="portlet light profile-sidebar-portlet ">
                                            <!-- SIDEBAR USERPIC -->
                                            <div class="profile-userpic">
                                                <img src="{{ asset('storage/'. auth()->guard('employee')->user()->avatar) }}" class="img-responsive" alt=""> </div>
                                            <!-- END SIDEBAR USERPIC -->
                                            <!-- SIDEBAR USER TITLE -->
                                            <div class="profile-usertitle">
                                                <div class="profile-usertitle-name"> {{  auth()->guard('employee')->user()->name }} </div>
                                                <div class="profile-usertitle-name"> {{  auth()->guard('employee')->user()->state }} </div>
                                            </div>
                                            <!-- END SIDEBAR USER TITLE -->
                                            <!-- SIDEBAR BUTTONS -->
                                           
                                            <!-- END SIDEBAR BUTTONS -->
                                            <!-- SIDEBAR MENU -->
                                            <div class="profile-usermenu">
                                               
                                            </div>
                                            <!-- END MENU -->
                                        </div>
                                        <!-- END PORTLET MAIN -->
                                        <!-- PORTLET MAIN -->
                                        
                                        <!-- END PORTLET MAIN -->
                                    </div>
                                    <!-- END BEGIN PROFILE SIDEBAR -->
                                    <!-- BEGIN PROFILE CONTENT -->
                                    <div class="profile-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light ">
                                                    <div class="portlet-title tabbable-line">
                                                        <div class="caption caption-md">
                                                            <i class="icon-globe theme-font hide"></i>
                                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                        </div>
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="tab-content">
                                                            <!-- PERSONAL INFO TAB -->
                                                            @include('layouts.errors-and-messages')
                                                            <div class="tab-pane active" id="tab_1_1">
                                                                <form role="form" action="{{ route('dentist.personal_info') }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="control-label">Full Name</label>
                                                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile Number</label>
                                                                        <input type="text" placeholder="+1 646 580 DEMO (6284)" name="phone" value="{{ $user->phone }}"
                                                                            class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="email" placeholder="Email" readonly class="form-control" value="{{ $user->email }}" />
                                                                    </div>
                                                                    <div class="margiv-top-10">
                                                                        <button type="submit" class="btn green"> Save Changes </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            {{-- <div class="tab-pane" id="tab_1_5">
                                                                                                                        <form role="form" action="#">
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="control-label">Name on Card</label>
                                                                                                                                <input type="text" placeholder="John" class="form-control" /> </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="control-label">Card Number</label>
                                                                                                                                <input type="number" placeholder="Card Number" class="form-control" /> </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="control-label">Expiration Date</label>
                                                                                                                                <input type="text" placeholder="MM/YYYY" class="form-control" /> </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <label class="control-label">CVC</label>
                                                                                                                                <input type="number" placeholder="CVC(3 digit code at back of card)" class="form-control" /> </div>
                                                                                                                            
                                                                                                                            <div class="margiv-top-10">
                                                                                                                                <button type="submit" class="btn green"> Save Changes </button>
                                                                                                                            </div>
                                                                                                                        </form>
                                                                                                                    </div> --}}
                                                            <!-- END PERSONAL INFO TAB -->
                                                            <!-- CHANGE AVATAR TAB -->
                                                            <div class="tab-pane" id="tab_1_2">
                                                                <form action="{{ route('dentist.updateAvatar') }}" method="POST" role="form" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            {{-- <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                                                                                                                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                                                                                                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div> --}}
                                                                            <div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" name="avatar"> </span>
                                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="margin-top-10">
                                                                        <button type="submit" class="btn green"> Submit </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END CHANGE AVATAR TAB -->
                                                            <!-- CHANGE PASSWORD TAB -->
                                                            <div class="tab-pane" id="tab_1_3">
                                                                <form action="{{ route('dentist.updatePassword') }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="control-label">Current Password</label>
                                                                        <input type="password" name="password" class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">New Password</label>
                                                                        <input type="password" name="new_password" class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Re-type New Password</label>
                                                                        <input type="password" name="new_password_confirmation" class="form-control" /> </div>
                                                                    <div class="margin-top-10">
                                                                        <button type="submit" class="btn green"> Change Password </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- END CHANGE PASSWORD TAB -->
                                                            <!-- PRIVACY SETTINGS TAB -->
                                                        
                                                            <!-- END PRIVACY SETTINGS TAB -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PROFILE CONTENT -->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
        @endsection
