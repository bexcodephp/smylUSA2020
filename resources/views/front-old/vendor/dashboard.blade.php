
@extends('layouts.front.vendor')

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
                            <h1>Designer Portal
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
                        <br><br>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 ">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-blue-sharp">
                                            <span data-counter="counterup" data-value="{{ $fulfilled_cases }}">{{ $fulfilled_cases }}</span>
                                        </h3>
                                        <small>New Cases</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-plus"></i>
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <span data-counter="counterup" data-value="{{ $pending_cases }}">{{ $pending_cases }}</span>
                                                </h3>
                                                <small>Cases Sent for Approval</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-arrow-right"></i>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat2 ">
                                                <div class="display">
                                                    <div class="number">
                                                        <h3 class="font-red-haze">
                                                            <span data-counter="counterup" data-value="{{ $approved_cases }}">{{ $approved_cases }}</span>
                                                        </h3>
                                                        <small>Approved Cases</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="icon-star"></i>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        </div>
                                    <div class="page-content-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 ">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 class="font-green-sharp">
                                                                <span data-counter="counterup" data-value="{{ $completed_cases }}">{{ $completed_cases }}</span>
                                    
                                                            </h3>
                                                            <small>Complete Cases</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-check"></i>
                                                        </div>
                                                    </div>
                                    
                                                </div>
                                            </div>

                                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <span data-counter="counterup" data-value="276"></span>
                                                </h3>
                                                <small>NEW USERS</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                            
<div class="col-md-6 col-sm-6">
    <!-- BEGIN PORTLET-->
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-share font-red-sunglo hide"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">Complete Cases</span>
                <span class="caption-helper"> stats...</span>
            </div>
            <div class="actions">
                <div class="btn-group">
                    <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                        <span class="fa fa-angle-down"> </span>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;"> Daily 
                                <!-- <span class="label label-sm label-default"> past </span> -->
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;"> Weekly 
                                <!-- <span class="label label-sm label-default"> past </span> -->
                            </a>
                        </li>
                        <li class="active">
                            <a href="javascript:;"> Monthly 
                                <!-- <span class="label label-sm label-success"> current </span> -->
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="portlet-body">
            <div id="site_activities_loading" style="display: none;">
                <img src="../assets/global/img/loading.gif" alt="loading"> </div>
            <div id="site_activities_content" class="display-none" style="display: block;">
                <div id="site_activities" style="height: 228px; padding: 0px; position: relative;"> <canvas class="flot-base" width="515" height="228" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 515px; height: 228px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 21px; text-align: center;">DEC</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 74px; text-align: center;">JAN</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 126px; text-align: center;">FEB</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 176px; text-align: center;">MAR</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 231px; text-align: center;">APR</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 282px; text-align: center;">MAY</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 336px; text-align: center;">JUN</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 390px; text-align: center;">JUL</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 439px; text-align: center;">AUG</div><div style="position: absolute; max-width: 51px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 494px; text-align: center;">SEP</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 197px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 149px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">500</div><div style="position: absolute; top: 100px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 52px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1500</div><div style="position: absolute; top: 3px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div></div></div><canvas class="flot-overlay" width="515" height="228" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 515px; height: 228px;"></canvas></div>
            </div>
            <div style="margin: 20px 0 10px 30px">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                        <span class="label label-sm label-success"> Today: </span>
                        <h3>14</h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                        <span class="label label-sm label-info"> This Week: </span>
                        <h3>125</h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                        <span class="label label-sm label-danger"> This Month: </span>
                        <h3>1250</h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                        <span class="label label-sm label-warning"> Total: </span>
                        <h3>7800</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PORTLET-->
</div>

                            <div class="col-md-6 col-sm-6">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                                            <i class="icon-notification font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Notifications</span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body">
                                        <!--BEGIN TABS-->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;"><div class="scroller" style="height: 339px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                                                    <ul class="feeds">
                                                        @foreach($notifications as $notify)
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> {{ $notify->message }}
                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> {{ $notify->created_at->diffForHumans() }} </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 155.931px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                            </div>
                                            <div class="tab-pane" id="tab_1_2">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 290px;"><div class="scroller" style="height: 290px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                                                    <ul class="feeds">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New order received </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> 10 mins </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-danger">
                                                                            <i class="fa fa-bolt"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> Order #24DOP4 has been rejected.
                                                                            <span class="label label-sm label-danger "> Take action
                                                                                <i class="fa fa-share"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 24 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <div class="col1">
                                                                    <div class="cont">
                                                                        <div class="cont-col1">
                                                                            <div class="label label-sm label-success">
                                                                                <i class="fa fa-bell-o"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="cont-col2">
                                                                            <div class="desc"> New user registered </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col2">
                                                                    <div class="date"> Just now </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                            </div>
                                        </div>
                                        <!--END TABS-->
                                    </div>
                                </div>
                                <!-- END PORTLET-->
                            </div>
                            {{-- <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet light ">
                                    <div class="portlet-title">
                                        <div class="caption caption-md">
                                            <i class="icon-bar-chart font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Customer Support</span>
                                            <span class="caption-helper">45 pending</span>
                                        </div>
                                        <div class="inputs">
                                            <div class="portlet-input input-inline input-small ">
                                                <div class="input-icon right">
                                                    <i class="icon-magnifier"></i>
                                                    <input type="text" class="form-control form-control-solid input-circle" placeholder="search...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 338px;"><div class="scroller" style="height: 338px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">
                                            <div class="general-item-list">
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar4.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">3 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-success"></span> Open</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar3.jpg">
                                                            <a href="" class="item-name primary-link">Mark</a>
                                                            <span class="item-label">5 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut
                                                        laoreet. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar6.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">8 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-primary"></span> Closed</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                        nonummy nibh. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar7.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">12 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-danger"></span> Pending</span>
                                                    </div>
                                                    <div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer
                                                        adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                        erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar9.jpg">
                                                            <a href="" class="item-name primary-link">Richard Stone</a>
                                                            <span class="item-label">2 days ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-danger"></span> Open</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet
                                                        dolore magna aliquam erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar8.jpg">
                                                            <a href="" class="item-name primary-link">Dan</a>
                                                            <span class="item-label">3 days ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut
                                                        laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar2.jpg">
                                                            <a href="" class="item-name primary-link">Larry</a>
                                                            <span class="item-label">4 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-success"></span> Open</span>
                                                    </div>
                                                    <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                                </div>
                                            </div>
                                        </div><div class="slimScrollBar" style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 156.499px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                    </div>
                                </div>
                            </div>
                           
                                </div> --}}
                            </div>
                           
                         
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
@endsection
