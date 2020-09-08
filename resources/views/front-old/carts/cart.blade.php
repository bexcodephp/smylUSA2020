@extends('layouts.front.app')

@section('title', 'SmylUSA - Cart')

@section('content')
<div role="main">
<section class="page-header mb-0" style="background-color: #2388ed;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h1 class="font-weight-bold" style="color: #fff">Cart</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">

                </ul>
            </div>
        </div>
    </div>
</section>

    <section class="section pt-0">
        <div class="container">
            @if(count($cartItems) == 0)
<h4>Cart is empty</h4>
            @else
            <div class="row mb-5">
                <div class="col">
                    <form class="shop-cart" method="post" action="{{ route('cart.updateCartQty') }}">

                        @csrf
                        
                        <div class="table-responsive">
                            <table class="shop-cart-table w-100">
                                <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name"><strong>Product</strong></th>
                                        <th class="product-price"><strong>Unit Price</strong></th>
                                        <th class="product-quantity"><strong>Quantity</strong></th>
                                        <th class="product-subtotal"><strong>Total</strong></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($cartItems as $cartItem)

                                    <tr class="cart-item">
                                        <td class="product-remove">
                                            <a href="{{ route('cart.delete', $cartItem->rowId) }}" onclick="return confirm('Are you sure?')"
                                                style="background:none; border: 0; cursor: pointer;"><i class="fas fa-times" aria-label="Remove"></i></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <img src="{{$cartItem->cover}}" class="img-fluid" width="67" alt="" />
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('front.get.product', [$cartItem->product->slug]) }}">{{ $cartItem->name }}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="unit-price">${{ $cartItem->price }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity">
                                                <input type="hidden" name="_method" value="put">
                                                <input type="hidden" name="cart_item[]" value="{{ $cartItem->rowId }}">
                                                <input type="button" value="-" class="minus">
                                                <input type="number" step="1" min="1" name="quantity[]" value="{{ $cartItem->qty }}" title="Qty" class="qty" size="2">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="sub-total"><strong>${{ $cartItem->qty * $cartItem->price }}</strong></span>
                                        </td>
                                    </tr>

                                    @endforeach

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
                                                <div class="col-md-7 text-right px-0">
                                                    <button class="btn btn-dark btn-outline btn-rounded font-weight-bold btn-h-2 btn-v-3"
                                                        type="submit">UPDATE CART</button>
                                                    <a href="{{ route('checkout.index') }}"
                                                        class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">PROCEED TO CHECKOUT</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5">
                    <h2 class="font-weight-bold text-4 mb-3">Cart Totals</h2>
                    <div class="table-responsive">
                        <table class="cart-totals w-100">
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="cart-total-label">Cart Subtotal</span>
                                    </td>
                                    <td>
                                        <span class="cart-total-value">$ {{ $subtotal }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="cart-total-label">Shipping</span>
                                    </td>
                                    <td>
                                        <span class="cart-total-value">${{ $total > 0 ? $shippingFee  : 0}}</span>
                                    </td>
                                </tr>
                                <tr class="border-bottom-0">
                                    <td>
                                        <span class="cart-total-label">Total</span>
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
        </div>
    </section>


</div>
@endsection