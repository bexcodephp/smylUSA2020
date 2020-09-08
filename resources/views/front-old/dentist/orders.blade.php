
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
                        <div class="page-content-inner">
                            <div class="row">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-check"></i>My Orders </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Patient Name </th>
                                                        <th> Date </th>
                                                        <th> Comments </th>
                                                        <th> Reports </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> 1 </td>
                                                        <td> Aiman Khan </td>
                                                        <td> 12/12/12 </td>
                                                        <td> Simple teeth </td>
                                                        <td><a href=""> View Report </a></td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td> 2 </td>
                                                        <td> Minal Khan </td>
                                                        <td> 12/11/14 </td>
                                                        <td> Use A type Aligners </td>
                                                        <td><a href=""> View Report </a></td>
                                                    
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
                    </div>
                </div>
        @endsection
