@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/u_locations.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="u-location">
    {{--  slider  --}}
    <section class="banner">
        <div class="bannerslider owl-carousel owl-theme">
            <div class="item" style="background-image:url('{{ asset("images/products/banner_location.jpg") }}')">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-capitalize">find us Near You</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  select facility  --}}
    <section class="container selectfacility py-xxl-6 py-5 vh-min-75">
        {{-- title --}}
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="title">Select a SmylUSA facility</h1>
            </div>
        </div>
        {{-- select option --}}
        <div class="row">
            <div class="col-md-6 select-facility select-option">
                {{--
                    NOTE: please refer the following site for development -
                    https://developer.snapappointments.com/bootstrap-select/examples/#customize-menu
                --}}
                {{-- add "multiple" attribute for multi-selection --}}
                <select id="select_facility" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select Location">
                    <option value="ri">RI</option>
                    <option value="wv" >WV</option>
                    <option value="fl">FL</option>
                </select>
            </div>
        </div>
        {{-- display address --}}
        <div class="row my-xxl-6 my-4">
            {{-- content 1 --}}
            <div class="col-12 location-details ri mb-4" id="ri">
                <div class="row">
                    {{-- address title --}}
                    <div class="col-12 mb-3">
                        <h5 class="subtitle">RI</h5>
                    </div>
                    {{-- address contents --}}
                    <div class="col-12 location-address">
                        <div class="row">
                            {{-- add address 1 --}}
                            <div class="col-md-6 mb-4">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 2 --}}
                            <div class="col-md-6 mb-4">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 3 --}}
                            <div class="col-md-6 mb-4">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 4 --}}
                            <div class="col-md-6 mb-4">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 5 --}}
                            {{-- add address 6 --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- content 2 --}}
            <div class="col-12 location-details wv mb-4" id="wv">
                <div class="row">
                    {{-- address title --}}
                    <div class="col-12 mb-3">
                        <h5 class="subtitle">WV</h5>
                    </div>
                    {{-- address contents --}}
                    <div class="col-12 location-address">
                        <div class="row">
                            {{-- add address 1 --}}
                            <div class="col-md-6 mb-3">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 2 --}}
                            <div class="col-md-6 mb-3">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 3 --}}

                            {{-- add address 4 --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- content 3 --}}
            <div class="col-12 location-details fl mb-4" id="fl">
                <div class="row">
                    {{-- address title --}}
                    <div class="col-12 mb-3">
                        <h5 class="subtitle">FL</h5>
                    </div>
                    {{-- address contents --}}
                    <div class="col-12 location-address">
                        <div class="row">
                            {{-- add address 1 --}}
                            <div class="col-md-6 mb-3">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 2 --}}
                            <div class="col-md-6 mb-3">
                                <div class="location-content">
                                    <h5>Benzer Pharmacy</h5>
                                    <p>Address: 265 Waterman St, Providence, 02906</p>
                                </div>
                            </div>
                            {{-- add address 3 --}}
                            {{-- add address 4 --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Ready. Set. smile --}}
    <section class="container-fluid smile-bottom-bg py-xxl-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="titleinverse">Ready. Set. smile</h1>
                </div>
                <div class="col-xxl-8 col-md-6">
                    <h2>
                        Take the free online smile assessment to see if you are a candidate and get started on your journey.
                    </h2>
                </div>
                <div class="col-xxl-4 col-md-6 align-self-end text-center">
                    <a  id="" class="btn btn-primary inverse" href="{{ url('/candidate') }}" role="button">Am I Candidate</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        var owl = $('.bannerslider');
        owl.owlCarousel({
            loop:false,
            items:1,
            navigation : false,
            autoplay: false,
            mouseDrag: false,
            touchDrag: false,
        });

        // select option
        $('#select_facility').selectpicker();
        $("#select_facility").change(function(){
            $(this).find("option:selected").each(function(){
                //alert('ddd');
                var optionValue = $(this).attr("value");
                // console.log(optionValue);
                if(optionValue){
                    // alert("if..."+optionValue);
                    $(".location-details").not("." + optionValue).hide();
                    $("." + optionValue).show();
                }
                else{
                    // alert("else"+optionValue);
                    $(".location-details").hide();
                }

            });
        }).change();
    });
</script>
@endpush
