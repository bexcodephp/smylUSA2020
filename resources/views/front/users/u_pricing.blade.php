@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/u_pricing.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="u-pricing">
    {{--  slider  --}}
    <section class="banner">
      <div class="bannerslider owl-carousel owl-theme">
          <div class="item" style="background-image:url('{{ asset("images/products/banner_pricing.jpg") }}')">
              <div class="caption container d-flex h-100 py-5">
                  <div class="my-auto">
                      <h1 class="text-uppercase">PRICING MADE EASY.</h1>
                      <h2 class="text-bold mb-3">Your smile is priceless,</h2>
                      <h4 class="text-bold">But it shouldn’t cost you a fortune to<br/>the perfect one.</h4>
                      <h4 class="text-bold">We offer affordable and flexible plans.</h4>
                  </div>
              </div>
          </div>
      </div>
    </section>
    {{-- our pricing --}}
    <section class="container ourprice py-xxl-6 py-5">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="title">how it works</h1>
                <h2 class="subtitle my-4">We have offer two easy ways to pay</h2>
            </div>
            <div class="col-md-6 mb-md-2 mb-5">
                <div class="card text-center ml-md-auto">
                    <div class="card-header">
                        <h4 class="card-title">One Time Payment</h4>
                    </div>
                    <div class="card-body">
                        <h5>$1999</h5>
                        <p>Easy one-time payment option</p>
                        <h5>You save 20%</h5>
                        <p>Get your custom clear aligner shipped to your doorstep with premium teeth whitening kit Includes Teeth Impression Kit</p>
                    </div>
                    <div class="card-footer">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-md-2 mb-4">
                <div class="card text-center mr-auto-md">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Installments</h4>
                    </div>
                    <div class="card-body">
                        <h5>$70- $90/ month</h5>
                        <p>Easy monthly payment plan<br/>No credit checks, no forms to fill out</p>
                        <h5>$200 Deposit, <br/>$ 70-90/month for 24 months ($2360 total).</h5>
                        <p>Get your custom clear aligner shipped to your doorstep</p>
                    </div>
                    <div class="card-footer">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- how it works --}}
    <section class="container-fluid hiworks py-xxl-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="title">how it works</h1>
                </div>
                <div class="col-12">
                    <div class="row justify-content-between">
                        <div class="col-md-12 hiworks1 slidein media">
                            <div class="hiworksimg"></div>
                            <div class="media-body mx-3">
                                <h4 class="text-left">1. Teeth Impression</h4>
                                <p class="text-left">The first step of our process is to take a teeth impression.<br/>1.&nbsp;Home Impression Kit<br/>2.&nbsp;Visit a SmylUSA facility for a free Scan</p>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-auto hiworks2 hiwarrow hiworks2arrow slidein"></div>
                        <div class="col-12"></div>
                        <div class="col-md-5 hiworks2 slidein media">
                            <div class="hiworksimg"></div>
                            <div class="media-body mx-3">
                                <h4 class="text-left">2. Aligners Delivery</h4>
                                <p class="text-left">Upon approval of your design, we will deliver the aligners at your doorstep.</p>
                            </div>
                        </div>
                        <div class="col-md-auto hiworks3 hiwarrow hiworks3arrow slidein"></div>
                        <div class="col-md-5 hiworks3 slidein media">
                            <div class="hiworksimg"></div>
                            <div class="media-body mx-3">
                                <h4 class="text-left">3. Professional Support</h4>
                                <p class="text-left">Regular follow-ups with our customer service executives.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- related product --}}
    <section class="container-fluid related-product py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="title">Related Products</h1>
                </div>
            </div>
            <div class="row">
                {{--  content 1  --}}
                <div class="col-lg-3 col-sm-6 col-12 mb-lg-0 mb-3 r-product">
                    <div class="card product-card">
                        <div class="card-header p-0">
                            <img src="{{asset('images/products/product_1.png')}}" class="card-img-top" alt="product">
                        </div>
                        <div class="card-body text-center p-0">
                            <div class="col-12 card-title">
                                <h5 class="m-0">Impression Kit</h5>
                            </div>
                            <div class="rp-price-rate d-flex flex-wrap py-3">
                                <div class="col-6 text-left align-self-center">
                                    {{--
                                        NOTE ->>
                                        "Sequence of rating selection star is in reverse order"
                                    --}}
                                    <div class="rating" id="rating">
                                        <input type="radio" name="rating" value="5" id="5">
                                        <label for="5"></label>
                                        <input type="radio" name="rating" value="4" id="4">
                                        <label for="4"></label>
                                        <input type="radio" name="rating" value="3" id="3">
                                        <label for="3"></label>
                                        <input type="radio" name="rating" value="2" id="2">
                                        <label for="2"></label>
                                        <input type="radio" name="rating" value="1" id="1">
                                        <label for="1"></label>
                                    </div>
                                </div>
                                <div class="col-6 rp-price align-self-center">
                                    <h6 class="text-right m-0 color-blue text-bold"><span class="mr-1">&#36;</span>XXX.XX</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-primary btn-add-cart text-bold">Add to Cart</button>
                        </div>
                    </div>
                </div>
                {{--  content 2  --}}
                <div class="col-lg-3 col-sm-6 col-12 mb-lg-0 mb-3 r-product">
                    <div class="card product-card">
                        <div class="card-header p-0">
                            <img src="{{asset('images/products/product_2.png')}}" class="card-img-top" alt="product">
                        </div>
                        <div class="card-body text-center p-0">
                            <div class="col-12 card-title">
                                <h5 class="m-0">Retainers</h5>
                            </div>
                            <div class="rp-price-rate d-flex flex-wrap py-3">
                                <div class="col-6 text-left align-self-center">
                                    {{--
                                        NOTE ->>
                                        "Sequence of rating selection star is in reverse order"
                                    --}}
                                    <div class="rating" id="rating">
                                        <input type="radio" name="rating" value="5" id="5">
                                        <label for="5"></label>
                                        <input type="radio" name="rating" value="4" id="4">
                                        <label for="4"></label>
                                        <input type="radio" name="rating" value="3" id="3">
                                        <label for="3"></label>
                                        <input type="radio" name="rating" value="2" id="2">
                                        <label for="2"></label>
                                        <input type="radio" name="rating" value="1" id="1">
                                        <label for="1"></label>
                                    </div>
                                </div>
                                <div class="col-6 rp-price align-self-center">
                                    <h6 class="text-right m-0 color-blue text-bold"><span class="mr-1">&#36;</span>XXX.XX</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-primary btn-add-cart text-bold">Add to Cart</button>
                        </div>
                    </div>
                </div>
                {{--  content 3  --}}
                <div class="col-lg-3 col-sm-6 col-12 mb-lg-0 mb-3 r-product">
                    <div class="card product-card">
                        <div class="card-header p-0">
                            <img src="{{asset('images/products/generic_square_2.jpg')}}" class="card-img-top" alt="product">
                        </div>
                        <div class="card-body text-center p-0">
                            <div class="col-12 card-title">
                                <h5 class="m-0">Aligner</h5>
                            </div>
                            <div class="rp-price-rate d-flex flex-wrap py-3">
                                <div class="col-6 text-left align-self-center">
                                    {{--
                                        NOTE ->>
                                        "Sequence of rating selection star is in reverse order"
                                    --}}
                                    <div class="rating" id="rating">
                                        <input type="radio" name="rating" value="5" id="5">
                                        <label for="5"></label>
                                        <input type="radio" name="rating" value="4" id="4">
                                        <label for="4"></label>
                                        <input type="radio" name="rating" value="3" id="3">
                                        <label for="3"></label>
                                        <input type="radio" name="rating" value="2" id="2">
                                        <label for="2"></label>
                                        <input type="radio" name="rating" value="1" id="1">
                                        <label for="1"></label>
                                    </div>
                                </div>
                                <div class="col-6 rp-price align-self-center">
                                    <h6 class="text-right m-0 color-blue text-bold"><span class="mr-1">&#36;</span>XXX.XX</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-primary btn-add-cart text-bold">Add to Cart</button>
                        </div>
                    </div>
                </div>
                {{--  content 4  --}}
                <div class="col-lg-3 col-sm-6 col-12 mb-lg-0 mb-3 r-product">
                    <div class="card product-card">
                        <div class="card-header p-0">
                            <img src="{{asset('images/products/product_3.png')}}" class="card-img-top" alt="product">
                        </div>
                        <div class="card-body text-center p-0">
                            <div class="col-12 card-title">
                                <h5 class="m-0">Teeth Whitening Kit</h5>
                            </div>
                            <div class="rp-price-rate d-flex flex-wrap py-3">
                                <div class="col-6 text-left align-self-center">
                                    {{--
                                        NOTE ->>
                                        "Sequence of rating selection star is in reverse order"
                                    --}}
                                    <div class="rating" id="rating">
                                        <input type="radio" name="rating" value="5" id="5">
                                        <label for="5"></label>
                                        <input type="radio" name="rating" value="4" id="4">
                                        <label for="4"></label>
                                        <input type="radio" name="rating" value="3" id="3">
                                        <label for="3"></label>
                                        <input type="radio" name="rating" value="2" id="2">
                                        <label for="2"></label>
                                        <input type="radio" name="rating" value="1" id="1">
                                        <label for="1"></label>
                                    </div>
                                </div>
                                <div class="col-6 rp-price align-self-center">
                                    <h6 class="text-right m-0 color-blue text-bold"><span class="mr-1">&#36;</span>XXX.XX</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <button type="button" class="btn btn-primary btn-add-cart text-bold">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Join the SmylUSA Family --}}
    <section class="container-fluid smile-bottom-bg py-xxl-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="titleinverse">Join the SmylUSA Family.</h1>
                </div>
                <div class="col-xxl-8 col-md-6">
                    <h2>
                        Take the free online smile assessment to see if you are a candidate and get started on your journey.
                    </h2>
                </div>
                <div class="col-xxl-4 col-md-6 align-self-end text-center">
                    <a name="" id="" class="btn btn-primary inverse" href="#" role="button">Get Started</a>
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
    });
</script>
@endpush
