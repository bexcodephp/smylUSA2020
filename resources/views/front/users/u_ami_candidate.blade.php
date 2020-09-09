@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.min.css') }}"  type="text/css" >
    <link rel="stylesheet" href="{{ asset('front/css/u_ami_candidate.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="u-ami-candidate">
    {{--  slider  --}}
    <section class="banner">
        <div class="hero-img">
            <div class="item" style="background-image:url('{{ asset('images/products/banner_location.jpg') }}') ">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">Am I A Candidate</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-12 mt-3 mb-2">
                <h1 class="title">Free 30-Seconds Smile Assessment</h1>
            </div>
            <div class="col-12 mb-2">
                <h3 class="text-bold">Take 30 seconds to answer these questions and find out if SmylUSA is right for you.</h3>
            </div>
        </div>
        <form class="row amicandidate-form py-3">
            {{--  que 1  --}}
            <div class="col-12 mb-5">
                <div class="row que-1">
                    <h3 class="col-12 mb-3">Why are you thinking about straightening your teeth?</h3>
                    <div class="col-md-6 select-option">
                        {{--
                            NOTE: please refer the following site for development -
                            https://developer.snapappointments.com/bootstrap-select/examples/#customize-menu
                        --}}
                        {{-- add "multiple" attribute for multi-selection --}}
                        <select id="que_1_select" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Please Select">
                            <option value="Option1">Option1</option>
                            <option value="Option2">Option2</option>
                        </select>
                    </div>
                </div>
            </div>
            {{--  que 2  --}}
            <div class="col-12 mb-5">
                <div class="row que-2">
                    <h3 class="col-12 mb-3">Have you worn braces or invisible aligners in the past?</h3>
                    <div class="col-md-12 select-option">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="yes" name="que2" class="custom-control-input">
                            <label class="custom-control-label" for="yes">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="no" name="que2" class="custom-control-input">
                            <label class="custom-control-label" for="no">No</label>
                        </div>
                    </div>
                </div>
            </div>
            {{--  que 3  --}}
            <div class="col-12 mb-5">
                <div class="row que-3">
                    <h3 class="col-12 mb-3">Choose the option that best describes your biggest concern with your smile:</h3>
                    <div class="col-md-6 select-option">
                        <select id="que_3_select" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Please Select">
                            <option value="Option1">Option1</option>
                            <option value="Option2">Option2</option>
                        </select>
                    </div>
                </div>
            </div>
            {{--  que 4  --}}
            <div class="col-12 mb-5">
                <div class="row que-4">
                    <h3 class="col-12 mb-3">Of the images below, which one best describes your teeth crowding?</h3>
                    <div class="col-md-12 select-option">
                        <div class="custom-control custom-radio custom-control-inline select-center">
                            <input type="radio" id="teeth_crowding_1" name="que4" class="custom-control-input">
                            <label class="custom-control-label" for="teeth_crowding_1">
                                <img src="{{ asset('/images/products/img1.jpg')}}" class="select-img" />
                            </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline select-center">
                            <input type="radio" id="teeth_crowding_2" name="que4" class="custom-control-input">
                            <label class="custom-control-label" for="teeth_crowding_2">
                                <img src="{{ asset('/images/products/img2.jpg')}}" class="select-img" />
                            </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline select-center">
                            <input type="radio" id="teeth_crowding_3" name="que4" class="custom-control-input">
                            <label class="custom-control-label" for="teeth_crowding_3">
                                <img src="{{ asset('/images/products/img3.jpg')}}" class="select-img"/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            {{--  que 5  --}}
            <div class="col-12 mb-5">
                <div class="row que-5">
                    <h3 class="col-12 mb-3">Of the images below, which one best describes your teeth Spacing?</h3>
                    <div class="col-md-12 select-option">
                        <div class="custom-control custom-radio custom-control-inline select-center">
                            <input type="radio" id="teeth_spacing_1" name="que5" class="custom-control-input">
                            <label class="custom-control-label" for="teeth_spacing_1">
                                <img src="{{ asset('/images/products/img4.jpg')}}" class="select-img" />
                            </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline select-center">
                            <input type="radio" id="teeth_spacing_2" name="que5" class="custom-control-input">
                            <label class="custom-control-label" for="teeth_spacing_2">
                                <img src="{{ asset('/images/products/img5.jpg')}}" class="select-img" />
                            </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline select-center">
                            <input type="radio" id="teeth_spacing_3" name="que5" class="custom-control-input">
                            <label class="custom-control-label" for="teeth_spacing_3">
                                <img src="{{ asset('/images/products/img6.jpg')}}" class="select-img"/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            {{--  que 6  --}}
            <div class="col-12 mb-5">
                <div class="row que-6">
                    <h3 class="col-12 mb-3">Enter your zip code (to make sure you're in our service area).</h3>
                    <div class="col-md-6">
                        <input type="text" id="zipcode_1" class="form-control" placeholder="Zip Code">
                    </div>
                </div>
            </div>
            {{--  que 7  --}}
            <div class="col-12 mb-5">
                <div class="row que-7">
                    <h3 class="col-12 mb-3">Enter your email address to get results.</h3>
                    <div class="col-md-6">
                        <input type="email" id="email" class="form-control" placeholder="Email Address">
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-get-result" type="button">Get Your Results</button>
            </div>
        </form>

    </section>
</main>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.selectpicker').selectpicker();
    });
  </script>
@endpush
