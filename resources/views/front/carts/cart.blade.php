@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/table-responsive.css') }}"  type="text/css" >
    <link rel="stylesheet" href="{{ asset('front/css/cart.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="u-ami-candidate">
    {{--  slider  --}}
    <section class="banner">
        <div class="hero-img">
            <div class="item" style="background-image:url('{{ asset('images/products/banner_products.png') }}') ">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container py-xxl-6 py-5">
      @if(count($cartItems) == 0)
      <div class="row hidden" id="empty-cart">
        <div class="col-12">
          <h4>Cart is empty</h4>
        </div>
      </div>
      @else
      <form class="row amicandidate-form py-3" action="{{ route('cart.updateCartQty') }}" method="post">
        @csrf
        <div class="table-responsive shop-cart-table-div mt-4">
          <table class="table shop-cart-table w-100 col_tbl">
            <thead>
              <tr>
                {{-- <th class="product-remove" data-label="" ></th>
                <th class="product-thumbnail" data-label=""></th> --}}
                <th class="product-name col-auto" colspan="3">Product</th>
                <th class="product-price col-auto">Unit Price</th>
                <th class="product-quantity col-auto">Quantity</th>
                <th class="product-subtotal col-auto">Total</th>
              </tr>
            </thead>
            <tbody>
              {{-- fist cart item --}}
              @foreach($cartItems as $cartItem)
              <tr class="cart-item">
                <td class="product-remove col-auto" data-label="Remove">
                  <div>
                    <button type="button" class="btn color-red">
                      <a href="{{ route('cart.delete', $cartItem->rowId) }}" onclick="return confirm('Are you sure?')"
                          style="background:none; border: 0; cursor: pointer;"><i class="fal fa-trash" aria-label="Remove"></i></a>
                    </button>
                  </div>
                </td>
                <td class="product-thumbnail col-auto" data-label="Product Image">
                  <img src="{{$cartItem->cover}}" class="img-fluid" width="70" alt="" />
                </td>
                <td class="product-name col-auto" data-label="Remove">
                  <a href="{{ route('front.get.product', [$cartItem->product->slug]) }}">{{ $cartItem->name }}</a>
                </td>
                <td class="product-price col-auto" data-label="Price">
                  <span class="unit-price">${{ $cartItem->price }}</span>
                </td>
                <td class="product-quantity col-auto" data-label="Quantity">
                  <div class="quantity">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="cart_item[]" value="{{ $cartItem->rowId }}">
                    {{-- <input type="button" value="-" class="minus">
                    <input type="number" step="1" min="1" name="quantity[]" value="" title="Qty" class="qty" size="2">
                    <input type="button" value="+" class="plus"> --}}


                    <div class="input-group">
                      <div class="input-group-prepend">
                        <button type="button" class="btn input-group-text minus p-2 btn-primary">
                          <i class="far fa-minus-circle"></i>
                        </button>
                      </div>
                      <div class="input-number">
                        <input type="text" step="1" min="1" name="quantity[]" value="{{ $cartItem->qty }}" title="Qty" class="qty form-control" size="2">
                      </div>
                      <div class="input-group-append">
                        <button type="button" class="btn input-group-text plus p-2 btn-primary">
                          <i class="far fa-plus-circle"></i>
                        </button>                        
                      </div>
                    </div>

                  </div>
                </td>
                <td class="product-subtotal col-auto" data-label="Subtotal">
                  <span class="sub-total"><strong>${{ $cartItem->qty * $cartItem->price }}</strong></span>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="border-bottom-0">
                <td colspan="6" class="px-0">
                    <div class="row mx-0">
                        <div class="col-md-5 px-0 mb-3 mb-md-0">
                            {{-- <div class="input-group input-group-style-3 rounded">
                                <input type="text" class="form-control bg-light-5 border-0" placeholder="Enter Coupon Code..."
                                    aria-label="Enter Coupon Code">
                                <span class="input-group-btn bg-light-5 p-1">
                                    <button class="btn btn-primary font-weight-semibold btn-h-3 rounded h-100"
                                        type="submit">APPLY</button>
                                </span>
                            </div> --}}
                        </div>
                        <div class="col-md-7 text-md-right text-center px-0">
                            <button class="btn btn-outline-primary font-weight-bold mb-md-0 mb-3" type="submit">UPDATE CART</button>
                            <a href="{{ route('checkout.index') }}" type="button" class="btn btn-primary font-weight-bold mb-md-0 mb-3">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </form>
      <div class="row justify-content-md-end">
          <div class="col-md-5 col-12 mt-3">
            <h2 class="font-weight-bold text-4 mb-3">Cart Totals</h2>
            <div class="table-responsive">
              <table class="table cart-totals w-100">
                <tbody>
                  <tr>
                    <td>
                      <span class="cart-total-label text-bold">Cart Subtotal</span>
                    </td>
                    <td>
                      <span class="cart-total-value">$ {{ $subtotal }}</span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span class="cart-total-label text-bold">Shipping</span>
                    </td>
                    <td>
                      <span class="cart-total-value">$ {{ $total > 0 ? $shippingFee  : 0}}</span>
                    </td>
                  </tr>
                  <tr class="border-bottom-0">
                    <td>
                      <span class="cart-total-label text-bold">Total</span>
                    </td>
                    <td>
                      <span class="cart-total-value text-color-primary text-4">$ {{$total}}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      @endif
    </section>
</main>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
       
    });
  </script>
@endpush
