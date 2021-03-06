@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/u_products_view.css') }}"  type="text/css" >
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
@endpush
@section('content')
<main class="u-product">
    {{--  slider  --}}
    <section class="banner">
        <div class="bannerslider owl-carousel owl-theme">
            <div class="item" style="background-image:url('{{ asset('images/products/banner_products.png') }}') ">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- product details --}}
    <section class="container selectfacility py-xxl-6 py-5 vh-min-75">
        {{-- title --}}
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="title">Products Details</h1>
            </div>
        </div>
        {{-- product details slider  --}}
        <div class="row">
            {{-- product slider --}}
            <div class="col-md-auto col-12">
                <div class="products-slider" id="products_slider">
                    @foreach($images as $image)
                        <div class="item" data-hash="1">
                            <div class="d-flex products-img-view">
                                <img src="{{ asset('storage/'. $image->src) }}" />
                            </div>
                        </div>
                        <!-- <div class="item" data-hash="2">
                            <div class="d-flex products-img-view">
                                <img src="{{asset('/images/products/image_2_home_page_before_footer.jpg')}}" />
                            </div>
                        </div> -->
                    @endforeach
                </div>
                <div class="btn-group btn-group-justified products-slider-nav" id="products_slider_nav" role="group" aria-label="Justified button group">
                    @foreach($images as $image)
                    <div class="item" data-slick-index="1">
                        <img src="{{ asset('storage/'. $image->src) }}" />
                    </div>
                    @endforeach
                   <!--  <div class="item" data-slick-index="2">
                        <img src="{{asset('/images/products/image_2_home_page_before_footer.jpg')}}" />
                    </div> -->
                </div>
            </div>
            {{-- product slider details --}}
            <div class="col-lg col-12">
                <div class="product-slider-contents" id="product_slider_contents">
                    {{-- content 1 --}}
                    <div data-slick-index="1">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-bold">{{ $product->name }}</h5>
                            </div>
                            {{-- rating --}}
                            <div class="col-12 text-left align-self-center">
                                {{--
                                    NOTE ->>
                                    "Sequence of rating selection star is in reverse order"
                                --}}
                                <!-- <div class="rating mb-2" id="rating">
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
                                </div> -->
                            </div>
                            {{-- price --}}
                            <div class="col-12 rp-price align-self-center mb-3">
                                <h6 class="text-left m-0 color-blue text-bold"><span class="mr-1">&#36;</span>{{ $product->sale_price }}</h6>
                            </div>
                            {{-- product description --}}
                            <div class="col-12 product-desc align-self-center mb-md-4 mb-3">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="product-available  py-3">
                                    <h5 class="color-blue">Availablity&nbsp;:<span class="text-bold color-gray ml-2">@if($product->quantity > 0) Available @else Out Of Stock @endif</span></h5>
                                    <h5 class="color-blue mb-0">SKU&nbsp;:<span class="text-bold color-gray ml-2">{{ $product->sku }}</span></h5>
                                </div>
                            </div>
                            @if($product->quantity > 0)
                            <form action="{{ route('cart.store') }}"  class="shop-cart d-flex align-items-center" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="product" value="{{ $product->id }}">
                                <div class="col-12">
                                    <div class="product-add-cart d-flex">
                                        <div class="input-group product-cart-select ">
                                            <div class="input-group-prepend">
                                                <button class="btn" type="button" id="button-addon1"><i class="fas fa-minus"></i></button>
                                            </div>
                                            <input type="text" name="quantity" id="product-quantity" class="form-control" value="1" />
                                            <div class="input-group-append">
                                                <button class="btn" type="button" id="button-addon2"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="mx-4">
                                            <button type="submit" class="btn btn-primary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
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
            <div class="row" id="related_products">
                {{--  content 1  --}}
                @foreach($relatedProducts as $product)
                <div class="col-lg-3 col-sm-6 col-12 mb-lg-0 mb-3 r-product">
                    <div class="card product-card">
                        <div class="card-header p-0">
                            <img src="{{ asset('storage/'.$product->cover) }}" class="card-img-top" alt="product">
                        </div>
                        <div class="card-body text-center p-0">
                            <div class="col-12 card-title">
                                <a href="{{ route('front.get.product', $product->slug) }}">
                                    <h5 class="m-0">{{ $product->name }}</h5>
                                </a>
                            </div>
                            <div class="rp-price-rate d-flex flex-wrap py-3">
                                <div class="col-6 text-left align-self-center">
                                    {{--
                                        NOTE ->>
                                        "Sequence of rating selection star is in reverse order"
                                    --}}
                                    <!-- <div class="rating" id="rating">
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
                                    </div> -->
                                </div>
                                <div class="col-6 rp-price align-self-center">
                                    <h6 class="text-right m-0 color-blue text-bold"><span class="mr-1">&#36;</span>{{$product->price}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <form action="{{ route('cart.store') }}" class="form-inline cartForm" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary btn-add-cart text-bold">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#button-addon2").click(function(){
            var proQty = parseInt($("#product-quantity").val());
            proQty++;
            $("#product-quantity").val(proQty);
        });
        $("#button-addon1").click(function(){

            var proQty = parseInt($("#product-quantity").val());
            if(proQty > 1) {
                proQty--;
                $("#product-quantity").val(proQty);
            }
        })

        var owl = $('.bannerslider');
        owl.owlCarousel({
            loop: false,
            items: 1,
            navigation : false,
            autoplay: false,
            mouseDrag: false,
            touchDrag: false,
        });
        // main slider
        $('#products_slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            infinite: false,
            fade: true,
            cssEase: 'linear',
            asNavFor: '#products_slider_nav'
        });
        // bottom products thumbnail slider navigation
        $('#products_slider_nav').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '#products_slider',
            dots: true,
            arrows: false,
            focusOnSelect: true,
            infinite: false,
            variableWidth: true,
            centerMode: false,
            centerPadding: '10px',
        });


        // related products
        $('#related_products').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
@endpush
