@extends('layouts.front.app')

@section('title', 'Products')

@section('content')
<div role="main">
    <section class="page-header mb-0" style="background-color: #2388ed;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h1 class="font-weight-bold" style="color: #fff">Products</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">

                </ul>
            </div>
        </div>
    </div>
</section>

    <div class="container">
        <div class="row">
        <aside class="sidebar col-md-4 col-lg-3 order-2 order-md-1 mt-4">
							<div class="accordion accordion-default accordion-toggle accordion-style-1" role="tablist">
						
								<div class="card">
									<div class="card-header accordion-header" role="tab" id="categories">
										<h5 class="mb-0">
											<a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories">Categories</a>
										</h5>
									</div>
									<div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
										<div class="card-body">
											<ul class="list list-unstyled mb-0">
												<li><a href="#">Products</a></li>
												<li><a href="#">Services</a></li>
										
											</ul>
										</div>
									</div>
								</div>
							
							</div>
						</aside>
		<div class="col-md-8 col-lg-9 order-1 order-md-2 mb-5 mb-md-0">
        <ul class="nav sort-source mb-3" data-sort-id="products" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
            <li class="nav-item" data-option-value="*"><a class="nav-link active" href="#"></a></li>

            <li class="nav-item" data-option-value=".accessories"><a class="nav-link text-uppercase" href="#"></a></li>

            <li class="nav-item" data-option-value=".clothes"><a class="nav-link text-uppercase" href="#"></a></li>

            <li class="nav-item" data-option-value=".hats"><a class="nav-link text-uppercase" href="#"></a></li>

            <li class="nav-item" data-option-value=".shoes"><a class="nav-link text-uppercase" href="#"></a></li>
        </ul>

        <div class="sort-destination-loader sort-destination-loader-showing">
            <div class="portfolio-list sort-destination" data-sort-id="products">

                @foreach($products as $key => $product)
                <div class="col-sm-4 col-md-4 p-0 isotope-item accessories" style="margin-left: 10%; position: absolute; left: 0px; top: 0px;">
                    <div class="product portfolio-item portfolio-item-style-2">
                        <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                            <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                <a  href="{{ route('front.get.product', $product->slug) }}">
                                    <img src="{{ asset('storage/'.$product->cover) }}" class="img-fluid" alt="">
                                </a>
                                <span class="image-frame-action">
                                    <form action="{{ route('cart.store') }}" class="form-inline cartForm" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                    
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <button id="add-to-cart-btn" type="submit"
                                                class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2"> ADD TO CART</button>
                                        </div>
                                    </form>
                                </span>
                            </span>
                        </div>
                        <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                            <div class="product-info-title">
                                <h3 class="text-color-default text-2 line-height-1 mb-1"><a  href="{{ route('front.get.product', $product->slug) }}">{{ $product->name }}</a></h3>
                                <span class="price font-primary text-4"><strong class="text-color-dark">${{ $product->sale_price }}</strong></span>
                                <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">${{ $product->price }}</strong></span>
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

                {{-- <div class="col-sm-6 col-md-4 p-0 isotope-item accessories" style="margin-left: 10%; position: absolute; left: 487px; top: 0px;">
                    <div class="product portfolio-item portfolio-item-style-2">
                        <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                            <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                <a href="shop-product-detail-right-sidebar.html">
                                    <img src="{{ asset('assets/img/products/product-2.jpg')}}" class="img-fluid" alt="">
                                </a>
                                <span class="image-frame-action">
                                    <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                </span>
                            </span>
                        </div>
                        <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                            <div class="product-info-title">
                                <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Teeth Whitening Kit</a></h3>
                                <span class="price font-primary text-4"><strong class="text-color-dark">$19</strong></span>
                                <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$70</strong></span>
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
                </div> --}}

            </div>
        </div>
        </div>
    </div>
</div>
</div>
@endsection