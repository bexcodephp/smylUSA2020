@extends('layouts.front.app')

@section('title', 'SmylUSA - Contact')

@section('content')
<section class="page-header" style="background-color: #2388ed;">
    <div class="container">
    
        <div class="row">
            <div class="col-md-12">
                <!-- <h1 class="font-weight-bold">Smile Assessment Form</h1> -->

                    <h1 class="font-weight-bold" style="color:white; font-size: 42px;">Free 30-Seconds Smile Assessment</h1>
                    <br>
                    

            </div>
        </div>
    </div>
</section>

        </div>
    </section>

    <section class="section">
        

        <div class="container">

            <h3 style="">Take 30 seconds to answer these questions and find out if SmylUSA is
                right for you.</h2>
            <div class="row align-items-center">
                
                
                    <br>
                    <!-- <div class="col-md-4"></div> -->
                    <div class="col-md-6" style="margin-right: auto; margin-left: auto;">
                        
                    <form id="shopLoginRegister" action="{{ route('assessmentForm') }}" method="post">
                        <div class="form-row">
<br><br>
                            <div class="row">
                                <h3>Why are you thinking about straightening your teeth?</h3><br><br>
                                <div class="styled-select clearfix"> 
                                    <br>
                                    <select class="wide" name="reason" required style="width: 500px; height: 50px; background-color: transparent;">
                                        <option value="">Please Select</option>
                                        <option value="1">I am getting married</option>
                                        <option value="2">I am looking for or starting a new job</option>
                                        <option value="3">I'd generally like straighter teeth</option>
                                        <option value="4">I want to feel more confident</option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <style>
                                .buttons {
                                    background: transparent;
                                    color: white;
                                    padding: 15px 20px;
                                    text-align: center;
                                    text-decoration: none;
                                    display: inline-block;
                                    font-size: 16px;
                                    margin: 4px 2px;
                                    cursor: pointer;
                                    border-radius: 12px;
                                    width: 100px;
                                }
                            
                                .buttons1 {
                                    color: #808080;
                                    border: 2px solid #e7e7e7;
                                }
                            
                                .buttons:active,
                                .buttons:focus,
                                .buttons:visited {
                                    outline: none;
                                }
                            
                                .mytab {
                                    font-family: arial, sans-serif;
                                    border-collapse: collapse;
                                    width: 100%;
                                }
                            
                                .mytd {
                                    border: none;
                                    padding: 15px;
                                    width: 50%;
                                }
                            </style>
                            
                            
                            <script>
                                function colorchange1() {

                                    document.getElementById('y02').style.background = "#2388ed";
                                    document.getElementById('y02').style.color = "white";
                                    document.getElementById('n02').style.background = "white";


                                }

                                function colorchange2() {

                                    document.getElementById('y02').style.background = "white";
                                    document.getElementById('n02').style.color = "white";
                                    document.getElementById('n02').style.background = "#2388ed";

                                }
                            </script>
                            
                            <div class="row">
                                <h3>Have you worn braces or invisible aligners in the past?</h3>
                            
                            
                            
                                <table class="mytab">
                            
                                    <tr class="myrow">
                            
                                        <td class="mytd">
                                            <label style="font-size: 20px; padding-right: 20px">
                                                <input type="radio" name="worn_braces" required value="1" >
                                                Yes
                                            </label>
                                            
                                            <label style="font-size: 20px;">
                                                <input type="radio" name="worn_braces" required value="0" >
                                                No
                                            </label>
{{-- 
                                            <input type="radio" onclick="colorchange1()" id="y02" class="buttons buttons1" value="Yes" />
                                            <input type="radio" onclick="colorchange2()" id="n02" class="buttons buttons1" value="No" /> --}}
                                        </td>
                                    </tr>
                            
                            
                            
                                </table>

                            <!-- <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterName">NAME:</label>
                                <input type="text" value="" class="form-control bg-light-5 border-0 rounded" name="name" id="shopLoginRegisterName" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterEmail">EMAIL ADDRESS:</label>
                                <input type="email" value="" class="form-control bg-light-5 border-0 rounded" name="email" id="shopLoginRegisterEmail" required>
                            </div> -->
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="row">
                                <h3>Choose the option that best describes your biggest concern with your smile:</h3>
                                <div class="styled-select clearfix">
                                    <br><br>
                                    <select class="wide" name="concern" required style="width: 500px; height: 50px; background-color: transparent;">
                                        <option value="">Please Select</option>
                                        <option value="1">Fix a spacing issue</option>
                                        <option value="2">Fix a crowding issue
                                        </option>
                                        <option value="3">Fix a bite problem(overbite, underbite, or crossbite)</option>
                                        <option value="4">Generally straighter teeth</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterUsername">USERNAME:</label>
                                <input type="text" value="" class="form-control bg-light-5 border-0 rounded" name="username" id="shopLoginRegisterUsername" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterPhone">PHONE:</label>
                                <input type="email" value="" class="form-control bg-light-5 border-0 rounded" name="phone" id="shopLoginRegisterPhone" required>
                            </div> -->
                        </div>
                        <br><br>
                        <div class="form-row">
                            <!-- <div class="form-group col-lg-6"> -->
                                <div class="row">
                                    <h3>Of the images below, which one best describes your teeth crowding?</h3>
                                
                                
                                
                                
                                    <label>
                                <br><br>
                                        <input type="radio" required name="teeth_crowding" value="small" checked>
                                        <img src="{{ asset('assets/img/img1.jpg') }}" height="150" width="150">
                                    </label>
                                
                                    <label style="margin-left: 2%;">
                                        <br><br>
                                        <input type="radio" required name="teeth_crowding" value="big">
                                        <img src="{{ asset('assets/img/img2.jpg')}}" height="150" width="150">
                                
                                    </label>
                                
                                    <label style="margin-left: 2%;">
                                        <br><br>
                                        <input type="radio" required name="teeth_crowding" value="big">
                                        <img src="{{ asset('assets/img/img3.jpg') }}" height="150" width="150">
                                
                                    </label>
                                
                                <!-- </div> -->
                                <!-- <label class="text-color-dark" for="shopLoginRegisterPassword">PASSWORD:</label>
                                <input type="password" value="" class="form-control bg-light-5 border-0 rounded" name="username" id="shopLoginRegisterPassword" required> -->
                            </div>
                            <!-- <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterPassword2">RE-ENTER PASSWORD:</label>
                                <input type="password" value="" class="form-control bg-light-5 border-0 rounded" name="password" id="shopLoginRegisterPassword2" required>
                            </div> -->
                        </div>

                        <br><br>
                        <div class="form-row">
                            <!-- <div class="form-group col-lg-6"> -->
                            <div class="row">
                                <h3>Of the images below, which one best describes your teeth Spacing?</h3>
                        
                        
                        
                        
                                <label>
                                    <br><br>
                                    <input type="radio" required name="teeth_spacing" value="small" checked>
                                    
                                    <img src="{{ asset('assets/img/img4.jpg') }}" height="160px" width="160px">
                                </label>
                        
                                <label style="margin-left: 2%;">
                                    <br><br>
                                    <input type="radio" required name="teeth_spacing" value="big">
                                    
                                    <img src="{{ asset('assets/img/img5.jpg') }}" height="160px" width="160px">
                        
                                </label>
                        
                                <label style="margin-left: 2%;">
                                    <br><br>
                                    <input type="radio" required name="teeth_spacing" value="big">
                                    
                                    <img src="{{ asset('assets/img/img6.jpg') }}" height="160px" width="160px">
                        
                                </label>
                        
                                <!-- </div> -->
                                <!-- <label class="text-color-dark" for="shopLoginRegisterPassword">PASSWORD:</label>
                                                                    <input type="password" value="" class="form-control bg-light-5 border-0 rounded" name="username" id="shopLoginRegisterPassword" required> -->
                            </div>
                            <!-- <div class="form-group col-lg-6">
                                                                    <label class="text-color-dark" for="shopLoginRegisterPassword2">RE-ENTER PASSWORD:</label>
                                                                    <input type="password" value="" class="form-control bg-light-5 border-0 rounded" name="password" id="shopLoginRegisterPassword2" required>
                                                                </div> -->
                        </div>

                        <br><br>
                        <div class="form-row">
                        <!-- <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterName">Zip Code:</label>
                                <input type="text" value="" class="form-control bg-light-5 border-0 rounded" name="name" id="shopLoginRegisterName" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="text-color-dark" for="shopLoginRegisterEmail">Email:</label>
                                <input type="email" value="" class="form-control bg-light-5 border-0 rounded" name="email" id="shopLoginRegisterEmail" required>
                            </div> -->
                            <div class="row">
                                <h3>Enter your zip code (to make sure you're in our service area).</h3>
                                <div class="col-md-6">

                                    <br>
                                    <!-- <div class="form-group"> -->
                                    <input class="form" type="text" required name="zip_code" id="check_in" placeholder="  Zip Code" style="width:500px; height: 50px;">
                                    <!-- </div> -->
                                </div>
                            </div>
                            </div>
                            <br><br>
                            <div class="form-row">
                            <h3>Enter your email address to get results.</h3>
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <div class="form-group"> -->
                                        <br>
                                    <input class="form" type="text" name="email" required id="check_out" placeholder="Email Address" style="width:500px; height: 50px;">
                                    <!-- </div> -->
                                </div>
                            </div>

                        </div>
                        
                        <div class="form-row">
                            <div class="col text-right">
<br><br>
                        <div class="header-button d-none d-sm-flex ml-3">
                            <button type="submit" class="btn btn-outline btn-rounded btn-primary btn-4 btn-icon-effect-1" >
                                <span style="font-size: 18px;">GET YOUR RESULTS</span>
                            </button>
                        </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                    </div>
                    <!-- <div class="col-md-3"></div> -->
                
            </div>
        </div>
    </section>

</div>
@endsection
