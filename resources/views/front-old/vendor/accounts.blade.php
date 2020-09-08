@extends('layouts.front.vendor')

@section('content')
<!-- BEGIN CONTENT -->
           <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>User Portal
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
                    <div class="page-content-inner">
                        <div class="row">

                    <div class="col-md-6">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">

                                    <span class="caption-subject font-green-sharp bold uppercase">Order Now</span>
                                </div>

                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">


                                    <div class="tab-pane active" id="portlet_tab3">
                                        <p> What are you waiting for? Order your next aligners today to keep on embarking on a new
                                            journey towards a happier, healthier and fresh smile. This will allow you to keep track of your
                                            progress and not worry as we provide you the best smile there is.
                                        </p>
                                        <!-- <img src="img/step 1.gif" height="170px"> -->

                                        <p>

                                        <a class="btn blue" href="{{ url('products') }}" target="_blank"> Place an order </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                    
                                    <span class="caption-subject font-green-sharp bold uppercase">Order at Location</span>
                                </div>
                    
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                    
                    
                                    <div class="tab-pane active" id="portlet_tab3">
                                        <p> What are you waiting for? Visit our nearest location to place an order for your better smile.   
                                        </p>
                                        <!-- <img src="img/step 1.gif" height="170px"> -->
                    
                                        <p>
                    
                                        <a class="btn blue" href="{{ url('locations') }}" target="_blank"> Order at Location </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                        </div>
                        <div class="row">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-check"></i>Order History </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>Item </th>
                                                    <th> Date </th>
                                                    <th>Quantity</th>
                                                    <th> Price </th>
                                                    <th>Re Order</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> Impression Kit </td>
                                                    <td> 12/12/12 </td>
                                                    
                                                    <td>
                                                        1
                                                    </td>
                                                    
                                                    <td>
                                                        $79
                                                    </td>
                                                   <td><a href=""> Re order </a></td>

                                                </tr>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> Impression Kit </td>
                                                    <td> 12/12/12 </td>
                                                    <td>
                                                        1
                                                    </td>
                                                
                                                    <td>
                                                        $79
                                                    </td>
                                                <td><a href=""> Re order </a></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-toolbar margin-bottom-20" style="float: right;">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">1</button>
                                    <button type="button" class="btn btn-default">2</button>
                                    <button type="button" class="btn btn-default">3</button>
                                    <button type="button" class="btn btn-default">4</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Next</button>
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
    @endsection
