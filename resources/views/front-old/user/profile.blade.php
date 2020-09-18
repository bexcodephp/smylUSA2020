@extends('layouts.front.user')

@section('css')
<link rel="stylesheet" href="{{ asset('user/assets/global/plugins/jquery-ui/jquery-ui.min.css') }}">
<link href="{{ asset('user/assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .ui-datepicker-month, .ui-datepicker-year {
        color: black;
    }
</style>
@endsection
@section('content')
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>User | Account Settings
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
                                                <img src="{{ asset('storage/'. auth()->user()->avatar) }}" class="img-responsive" alt=""> </div>
                                            <!-- END SIDEBAR USERPIC -->
                                            <!-- SIDEBAR USER TITLE -->
                                            <div class="profile-usertitle">
                                                <div class="profile-usertitle-name"> {{  auth()->user()->name }} </div>
                                                @if(auth()->user()->patient_id)
                                                <div class="profile-usertitle-name"> {{  auth()->user()->patient_id }} </div>
                                                @endif
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
                                    <div class="profile-content portlet-body">
                                        @include('layouts.errors-and-messages')
                                        <div class="row">
                                            {{--  NEW CHANGES  --}}
                                            <div class="col-xs-12 ">
                                                <div class="caption caption-md portlet light">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <h3 class="caption-subject font-blue-madison bold uppercase">Profile Account</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{--  personal information  --}}
                                            <div class="col-md-6">
                                                <div class="portlet light ">
                                                    <h4>Personal Info</h4>
                                                    <form class="form-inline" role="form" action="{{ route('user.personal_info') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" name="first_name" required value="{{ $user->first_name }}" class="form-control" disabled /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Last Name</label>
                                                            <input type="text" name="last_name" required value="{{ $user->last_name }}" class="form-control" disabled /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Date Of Birth</label>
                                                            <input type="text" name="dob" required value="{{ $user->dob ? date('m/d/Y', strtotime($user->dob)) : null }}" class="form-control datepicker" disabled /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile Number</label>
                                                            <input type="text" placeholder="+1 646 580 DEMO (6284)" required name="phone" value="{{ $user->phone }}"
                                                                class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="email" placeholder="Email" readonly class="form-control" value="{{ $user->email }}"  disabled/> </div>
                                                        <div class="margiv-top-10 btn-submit-form">
                                                            <button type="submit" class="btn green"> Save Changes </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{--  account information  --}}
                                            <div class="col-md-6">
                                                <div class="portlet light ">
                                                    <h4>Account Informaion</h4>
                                                    <form class="form-inline" action="{{ route('updatePassword') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password</label>
                                                            <div class="input-group input-btn-append">
                                                                <input type="password" name="password" class="form-control" />
                                                                <button type="button" class="btn btn-append" id="chnage_pwd"><i class="fas fa-edit"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="change-pwd hide" id="input_pwd">
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label>
                                                                <input type="password" name="new_password" class="form-control" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label>
                                                                <input type="password" name="new_password_confirmation" class="form-control" />
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label class="control-label">Card Details</label>
                                                            <input type="text" id="carddetail" name="carddetail" class="form-control" disabled value="123545656"/>
                                                        </div>
                                                        <div class="margin-top-10 btn-submit-form">
                                                            <button type="submit" class="btn green"> Change Password </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{--  shipping address  --}}
                                            <div class="col-md-6">
                                                <div class="portlet light ">
                                                    <h4>Shipping Address</h4>
                                                    <form role="form" action="{{ route('user.address_info') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="control-label">Address</label>
                                                        <input type="text" name="address_1" value="{{ $address ? $address->address_1 : null}}" class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">City</label>
                                                            <input type="text" name="city" value="{{ $address ? $address->city : null}}" class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">State</label>
                                                            <select name="state_code" id="state" required class="form-control">
                                                                <option selected value="" disabled>Select State</option>
                                                                @foreach($statesList as $key => $state)
                                                                <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Zipcode</label>
                                                            <input type="text" name="zip" value="{{ $address ? $address->zip : null }}" class="form-control" value="" /> </div>
                                                        <div class="margiv-top-10 btn-submit-form">
                                                            <button type="submit" class="btn green"> Save Changes </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{--  Billing Address  --}}
                                            <div class="col-md-6">
                                                <div class="portlet light ">
                                                    <h4>Billing Address</h4>
                                                    <form role="form" action="{{ route('user.address_info') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="control-label">Address</label>
                                                        <input type="text" name="address_1" value="{{ $address ? $address->address_1 : null}}" class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">City</label>
                                                            <input type="text" name="city" value="{{ $address ? $address->city : null}}" class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">State</label>
                                                            <select name="state_code" id="state" required class="form-control">
                                                                <option selected value="" disabled>Select State</option>
                                                                @foreach($statesList as $key => $state)
                                                                <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Zipcode</label>
                                                            <input type="text" name="zip" value="{{ $address ? $address->zip : null }}" class="form-control" value="" /> </div>
                                                        <div class="margiv-top-10 btn-submit-form">
                                                            <button type="submit" class="btn green"> Save Changes </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{--  Change Profile picutre  --}}
                                            <div class="col-md-6">
                                                <div class="portlet light avtarpic">
                                                    <h4>Avatar Picture</h4>
                                                    <form action="{{ route('user.updateAvatar') }}" method="POST" role="form" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    {{--  <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="avatar">
                                                                    </span>  --}}
                                                                    {{--  NEW  --}}
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                                                        <label class="custom-file-label" for="avatar">Select Image</label>
                                                                    </div>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="margin-top-10 btn-submit-form">
                                                            <button type="submit" class="btn green"> Submit </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{--  Change Profile picutre  --}}
                                            <div class="col-md-6">
                                                <div class="portlet light ">
                                                    <h4>Upload Pictures of Your Teeths</h4>
                                                    <div class="teeth-pics">
                                                    @foreach($teeth_images as $image)
                                                    <div class="teeth-pic" style="margin: 10px auto;">
                                                        <div class="" style="position: relative">
                                                            <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail">
                                                            <a href="{{ route('user.removeTeethImage', $image->customer_image_id) }}" class="cross" style="position: absolute;
                                                                right: 10px;
                                                                top: 10px;
                                                                background: white;
                                                                padding: 2px;
                                                                border-radius: 14px;
                                                                font-weight: bold;">X</a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    </div>
                                                    <form style="margin-top: 30px;" action="{{ route('user.updateTeethImages') }}" method="POST" role="form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"  name="images[]" multiple required id="teethpic"> 
                                                                        <label class="custom-file-label" for="teethpic">Select Image</label>
                                                                    </div>
                                                                    {{--  <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="images[]" multiple required> </span>  --}}
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="margin-top-10 btn-submit-form">
                                                            <button type="submit" class="btn green"> Submit </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  NEW CHANGES END  --}}

                                        {{-- ==================================================================== --}}
                                        
                                        {{--  OLD CHANGES START --}}

                                        {{-- <div class="row">
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
                                                                <a href="#tab_1_11" data-toggle="tab">Shipping Info</a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_21" data-toggle="tab">Upload Pictures</a>
                                                            </li>
                                                            <li>
                                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>
                                                    <div class="portlet-body">
                                                        @include('layouts.errors-and-messages')
                                                        <div class="tab-content">
                                                            
                                                            <div class="tab-pane active" id="tab_1_1">
                                                                <form role="form" action="{{ route('user.personal_info') }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="control-label">First Name</label>
                                                                        <input type="text" name="first_name" required value="{{ $user->first_name }}" class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Last Name</label>
                                                                        <input type="text" name="last_name" required value="{{ $user->last_name }}" class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Date Of Birth</label>
                                                                        <input type="text" name="dob" required value="{{ $user->dob ? date('m/d/Y', strtotime($user->dob)) : null }}" class="form-control datepicker" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mobile Number</label>
                                                                        <input type="text" placeholder="+1 646 580 DEMO (6284)" required name="phone" value="{{ $user->phone }}"
                                                                            class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="email" placeholder="Email" readonly class="form-control" value="{{ $user->email }}" /> </div>
                                                                    <div class="margiv-top-10">
                                                                        <button type="submit" class="btn green"> Save Changes </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            

                                                            <div class="tab-pane" id="tab_1_11">
                                                                <form role="form" action="{{ route('user.address_info') }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="control-label">Address</label>
                                                                    <input type="text" name="address_1" value="{{ $address ? $address->address_1 : null}}" class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">City</label>
                                                                        <input type="text" name="city" value="{{ $address ? $address->city : null}}" class="form-control" /> </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">State</label>
                                                                        <select name="state_code" id="state" required class="form-control">
                                                                            <option selected value="" disabled>Select State</option>
                                                                            @foreach($statesList as $key => $state)
                                                                            <option value="{{ $key }}" @if( $address && $address->state_code == $key) selected @endif>{{ $state }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Zipcode</label>
                                                                        <input type="text" name="zip" value="{{ $address ? $address->zip : null }}" class="form-control" value="" /> </div>
                                                                    <div class="margiv-top-10">
                                                                        <button type="submit" class="btn green"> Save Changes </button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            
                                                            <div class="tab-pane" id="tab_1_2">
                                                                <h4>Upload Avatar</h4>
                                                                <form action="{{ route('user.updateAvatar') }}" method="POST" role="form" enctype="multipart/form-data">
                                                                @csrf
                                                                    <div class="form-group">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" name="avatar"> </span>
                                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="margin-top-10">
                                                                        <button type="submit" class="btn green"> Submit </button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="tab-pane" id="tab_1_21">
                                                            <h4>Upload Pictures of your Teeths</h4>
                                                            <div class="row">
                                                                @foreach($teeth_images as $image)
                                                                <div class="col-sm-3" style="margin: 10px auto;">
                                                                    <div class="" style="position: relative">
                                                                        <img src="{{ asset('storage/'.$image->image) }}" class="img-thumbnail">
                                                                        <a href="{{ route('user.removeTeethImage', $image->customer_image_id) }}" class="cross" style="position: absolute;
                                                                            right: 10px;
                                                                            top: 10px;
                                                                            background: white;
                                                                            padding: 2px;
                                                                            border-radius: 14px;
                                                                            font-weight: bold;">X</a>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <form style="margin-top: 30px;" action="{{ route('user.updateTeethImages') }}" method="POST" role="form" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="images[]" multiple required> </span>
                                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="margin-top-10">
                                                                    <button type="submit" class="btn green"> Submit </button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                            
                                                            
                                                            <div class="tab-pane" id="tab_1_3">
                                                                <form action="{{ route('updatePassword') }}" method="POST">
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
                                                            
                                                            
                                                           
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
        @endsection


    @section('js')
        <script src="{{ asset('user/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
            let date = new Date();
            $('.datepicker').datepicker({
                maxDate: date,
                changeYear: true,
                changeMonth: true,
            });
        </script>

        {{--  New Script  --}}
        <script>
            alert();
            $(document).ready(function(){
                $("#chnage_pwd").click(function(){
                    $('#chnage_pwd i').toggleClass('fa-edit fa-window-close');
                    $('#input_pwd').toggleClass('hide show');
                });
            });
            $(window).load(function() {
                var str = $("#carddetail").val();
                var str1 = str.replace(/\d(?=\d{3})/g, "*");
                $("#carddetail").val(str1); 
            });
        </script>
    @endsection