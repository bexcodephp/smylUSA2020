@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('front/css/u_products.css') }}" type="text/css">
@endpush
@section('content')
<main class="products">
    {{-- slider  --}}
    <section class="banner">
        <div class="bannerslider owl-carousel owl-theme">
            <div class="item" style="background-image:url('{{ asset("images/products/banner_products.png") }}')">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container selectfacility py-xxl-6 py-5 vh-min-75">
        {{-- title --}}
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="title">Our Products</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-3 col-12 nav-product mb-md-0 mb-3">
                <div class="card">
                    <div class="col text-md-left text-center py-3">
                        <h5 class="subtitle mb-0">Categories</h5>
                    </div>
                    <div class="nav flex-column nav-pills" id="nav_content_products" role="tablist" aria-orientation="vertical">
                        {{--
                            NOTE:
                            set class name for isotop in data filter
                        --}}

                        <button data-filter="*" type="button" class="btn nav-link is-selected">All</button>
                        @foreach($categories as $key => $category)
                        <button data-filter=".{{$category->name}}" type="button" class="btn nav-link">{{$category->name}}</button>
                        {{-- <button data-filter=".products" type="button" class="btn nav-link">Products</button>--}}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-9 col-12 tab-content-products">
                <div class="tab-content row" id="product_display">
                    {{-- NOTE:for isotop add class name as per the diffrentiation --}}
                    {{--  content 1  --}}
                    @foreach($products as $key => $product)
                            <div class="col mb-3 r-product element-item {{$product->cat_name}}">
                            <div class="card product-card">
                                {{--NOTE:
                                    set id title="id_name" attribute for popover displaying div--}}
                                <a class="card-header popover-set p-0" title="popover_content_{{$product->id}}" href="{{ route('front.get.product', $product->slug) }}">
                                    <img src="{{ asset('storage/'.$product->cover) }}" class="card-img-top" alt="product">
                                </a>
                                <div class="card-body text-center p-0">
                                    <div class="col-12 card-title">
                                        <a  href="{{ route('front.get.product', $product->slug) }}"><h5 class="m-0">{{ $product->name }}</h5></a>
                                    </div>
                                    <div class="rp-price-rate d-flex flex-wrap py-3">
                                        <div class="col-6 text-left align-self-center">
                                            <div class="rating hidden-imp" id="rating">
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
                                            <h6 class="text-right m-0 color-blue text-bold"><span class="mr-1">&#36;</span>{{ $product->price }}</h6>
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
                                {{--NOTE:set id for individual popover OR tooltip box--}}
                                <div class="popover-content" id="popover_content_{{$product->id}}">
                                    <div class="popover-details">
                                        {{--  change content START  --}}
                                        <div class="popover-caption">
                                            <p>{!! $product->description !!}</p>
                                            {{-- <div class="product-available py-2">
                                                <h5 class="color-blue">Availablity&nbsp;:<span class="text-bold color-gray ml-2">Available</span></h5>
                                                <h5 class="color-blue mb-0">SKU:<span class="text-bold color-gray ml-2">{{ $product->sku }}</span></h5>
                                            </div> --}}
                                        </div>
                                        {{--  change content END --}}
                                        {{--  left bottom arrow  --}}
                                        <img src="{{asset('images/icons/arrow_cross_bottom.png')}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- popover display START FOR Dynamic purpose for each products --}}
                {{-- popover display END--}}
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')

<script type="text/javascript" src="{{asset('/plugins/isotope/isotope.pkgd.min.js')}}"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var owl = $('.bannerslider');
        owl.owlCarousel({
            loop: false,
            items: 1,
            navigation: false,
            autoplay: false,
            mouseDrag: false,
            touchDrag: false,
        });
        // init Isotope
        var $grid = $('#product_display').isotope({});
        // filter items on button click for Isotop
        $('#nav_content_products').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
            $('#nav_content_products .btn').removeClass('is-selected');
            $(this).addClass('is-selected');
        });


        function checkWidth() {
            var windowWidth = $(window).width();
            var windowHeight = $(window).height();
            if (windowWidth >= 1025) {
                $('.popover-set').tooltip({
                    content: function() {
                        return $('#' + $(this).attr('title')).html();
                    },
                    track: true,
                    position: {
                        collision: "none",
                        my: "left bottom",
                        at: "center bottom",
                    },
                });
            }
        }
        // Execute on load
        checkWidth();
        // Bind event listener
        $(window).resize(checkWidth);


        //--------------------------------
        //  end of document ready function
    });
</script>
@endpush