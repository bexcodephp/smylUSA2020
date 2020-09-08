@section('content')
<div role="main" class="main">
      <section class="page-header mb-0" style="background-color: #2388ed;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h1 class="font-weight-bold" style="color: #fff">Product Details</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">

                </ul>
            </div>
        </div>
    </div>
</section>
    <div class="container">

        <br>
        <br><br><br>
        
        <div class="row mb-5">
            <div class="col-md-5 mb-5 mb-md-0">
                
                <div class="owl-carousel owl-theme manual dots-style-2 nav-style-2 nav-color-dark mb-3" id="thumbGalleryDetail">
                    @if(count($images) > 0)
                    @foreach($images as $image)
                    <div>
                        <img alt="Product Image" src="{{ asset('storage/'. $image->src) }}" class="img-fluid">
                    </div>
                    @endforeach
                    @else 
                    <img src="{{ asset('storage/'.$product->cover) }}" class="img-fluid" alt="">
                    @endif
                </div>
                <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                    @foreach($images as $image)
                    <div>
                        <span class="d-block">
                            <img alt="Product Image" src="{{ asset('storage/'. $image->src) }}" class="img-fluid">
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7">
                <h2 class="line-height-1 font-weight-bold mb-2">{{ $product->name }}</h2>
                <div class="product-info-rate d-flex mb-3">
                    <i class="fas fa-star text-color-default mr-1"></i>
                    <i class="fas fa-star text-color-default mr-1"></i>
                    <i class="fas fa-star text-color-default mr-1"></i>
                    <i class="fas fa-star text-color-default mr-1"></i>
                    <i class="fas fa-star text-color-default"></i>
                </div>
            <span class="price font-primary text-4"><strong class="text-color-dark">$ {{ $product->sale_price }}</strong></span>
                <!-- <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$20</strong></span> -->
                <!--<div class="col-md-3" style="padding-right:200px !important;">-->
                <p class="mt-4" style="width:inherit;">
                    {!! $product->description !!}
                </p>
                <!--</div>-->
                <hr class="my-4">
                <ul class="list list-unstyled">
                    <li>AVAILABILITY: <strong>@if($product->quantity > 0) Available @else Out Of Stock @endif</strong></li>
                    <li>SKU: <strong>{{ $product->sku }}</strong></li>
                </ul>
                <hr class="my-4">
                @if($product->quantity > 0)
                <form action="{{ route('cart.store') }}"  class="shop-cart d-flex align-items-center" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="product" value="{{ $product->id }}">
                    <div class="quantity">
                        <input type="button" value="-" class="minus">
                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="2">
                        <input type="button" value="+" class="plus">
                    </div>
                    <button type="submit" class="add-to-cart btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-h-2 btn-fs-2 ml-3">ADD TO CART</button>
                </form>
                @endif
                <hr class="my-4">
            </div>
        </div>
    </div>
    <section class="section bg-light mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="font-weight-bold text-4 mb-4">Related Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProducts as $product)
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="product portfolio-item portfolio-item-style-2">
                        <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                            <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                <a href="{{ route('front.get.product', $product->slug) }}">
                                    <img src="{{ asset('storage/'.$product->cover) }}" class="img-fluid" alt="">
                                </a>
                                <span class="image-frame-action">
                                  <form action="{{ route('cart.store') }}" class="form-inline cartForm" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                        
                                        <div class="quantity-cart-box d-flex align-items-center">
                                                <button id="add-to-cart-btn" type="submit" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2"> ADD TO CART</button>
                                        </div>
                                    </form>
                                </span>
                            </span>
                        </div>
                        <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                            <div class="product-info-title">
                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="{{ route('front.get.product', $product->slug) }}">{{ $product->name }}</a></h3>
                                <span class="price font-primary text-4"><strong class="text-color-dark"> {{ config('cart.currency_symbol') .  $product->price }}</strong></span>
                                <!-- <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$69</strong></span> -->
                            </div>
                            <div class="product-info-rate d-flex">
                                <i class="fas fa-star text-color-default mr-1"></i>
                                <i class="fas fa-star text-color-default mr-1"></i>
                                <i class="fas fa-star text-color-default mr-1"></i>
                                <i class="fas fa-star text-color-default mr-1"></i>
                                <i class="fas fa-star text-color-default"></i>									
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection