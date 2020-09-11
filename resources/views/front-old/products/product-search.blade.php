@extends('layouts.front.app')

@section('content')

@include('front.categories.sidebar-category')


<main style="background: url({{ asset('img/bg-2.jpeg') }}); background-size: 300px;padding-top: 100px;">
    <!-- breadcrumb area start -->
    
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <!-- shop main wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- product item list wrapper start -->
                        <div class="shop-product-wrap grid-view row mbn-30">
                            @foreach ($products as $product)
                            <!-- product single item start -->
                            <div class="col-md-4 col-sm-6">
                                <!-- product grid start -->
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="#" data-toggle="modal" data-target="#quick_view{{ $product->id }}">
                                            <img class="pri-img" src="{{ $product->cover2 }}" width="270" height="182" alt="product">
                                            <img class="sec-img" src="{{ $product->cover2 }}" width="270" height="182" alt="product">
                                        </a>
                                    </figure>
                                    <div class="product-caption text-center">
                                    
                                   <div class="product-disk" >
                                        <h6 class="product-name">
                                            <a
                                                href="{{ route('front.get.product', $product->slug) }}">{{ $product->name }}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular pull-left">$ {!! $product->price !!}</span>
                                        </div>
                                   </div>  
                                   <div class="product-btn">
                                        <div class="button-group">
                                        
                                        <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product" value="{{ $product->id }}">
                                            
                                            <div class="quantity-cart-box d-flex align-items-center">
                                                    <button id="add-to-cart-btn" type="submit" class="btn btn-cart2" style="padding: 0px 10px;border-radius: 0px;">
                                                        <i class="fa fa-cart-plus"></i> Add to cart</button>
                                            </div>
                                        </form>
                                         <button href="#" data-toggle="modal" data-target="#quick_view{{ $product->id }}" class="home-prod" style="background: #222;width: 113px;margin-right: 6px;margin-top: 5px;"><span data-toggle="tooltip" title=""
                                                    data-original-title="Quick View"><i class="fa fa-angle-double-down" style="color: #fff"></i></span></button>
                                    </div>
                                    </div> 
                                </div>
                                </div>
                                <!-- product grid end -->
                            </div>
                            @endforeach
                            <!-- product single item start -->


                        </div>
                        <!-- product item list wrapper end -->

                        @if($products->count() > 12)
                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center">
                            {{ $products->links() }}
                        </div>
                        @endif
                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
                <div class="col-lg-12 order-1 order-lg-2">
                    @foreach($faqs as $faq)
                    @php($category = strtolower(str_replace(",", "", str_replace(" ","",$faq->category->name))))
                <a href="{{ url('/faq#' . $category) }}">{{  $faq->question }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
</main>


@foreach($products as $product)
<!-- Quick view modal start -->
<div class="modal" id="quick_view{{  $product->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- product details inner end -->
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-large-slider">
                                <img class="pro-large-img img-zoom" style="max-height: 340px" src="{{ $product->cover }}" alt="product">
                            </div>
                            <div class="pro-nav slick-row-10 slick-arrow-style">
                                @foreach($product->images as $image)
                                <div class="pro-nav-thumb">
                                    <img src="{{ $image->cover }}" alt="product-details" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-details-des">
                                <h3 class="product-name">{{ $product->name }}</h3>
                                <div class="price-box">
                                    <span class="price-regular pull-left">$ {!! $product->price !!}</span> &nbsp;&nbsp; - 15 Sachets
                                </div>
                                <p class="pro-desc">{!! $product->description !!}</p>
                                <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product" value="{{ $product->id }}">
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">Qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" name="quantity" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <button id="add-to-cart-btn" type="submit" class="btn btn-cart2">
                                                <i class="fa fa-cart-plus"></i> Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                                    <div class="clearfix"></div>
                                    <div class="like-icon">
                                        <a class="pinterest"
                                            href="{{ route('front.get.product',  $product->slug) }}">Product Detail</a>
                                        <a class="facebook" href="{{ route('faq') }}">FAQ</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- product details inner end -->
            </div>
        </div>
    </div>
</div>
@endforeach


<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
@endsection