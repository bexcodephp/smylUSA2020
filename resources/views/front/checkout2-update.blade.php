@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/cart.css') }}"  type="text/css" >
    <link rel="stylesheet" href="{{ asset('front/css/table-responsive.css') }}"  type="text/css" >
@endpush
@section('content')
<main class="u-ami-candidate">
    {{--  slider  --}}
    <section class="banner">
        <div class="hero-img">
            <div class="item" style="background-image:url('{{ asset('images/products/banner_products.png') }}') ">
                <div class="caption container d-flex h-100 py-5">
                    <div class="my-auto">
                        <h1 class="text-uppercase">Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container py-xxl-6 py-5">
      <form class="row amicandidate-form py-3" id="shopCheckout">
        <div class="col-md-6 mb-md-0 mb-5">
          <h2 class="font-weight-bold mb-3">Shipping information</h2>
          <div class="form-row">
              <div class="form-group col-md-6">
                    <label class="" for="first_name">First Name:</label>
                    <input type="text" class="form-control " name="first_name" id="first_name" readonly value="" required>
              </div>
              <div class="form-group col-md-6">
                    <label class="" for="last_name">Last Name:</label>
                    <input type="text" class="form-control " name="last_name" id="last_name" readonly value="" required>
              </div>
          </div>
          <div class="form-group">
              <label class="" for="email">Email:</label>
              <input type="email" class="form-control " name="email" value="" id="email" required>
          </div>
          <div class="form-group">
              <label class="" for="email">Date Of Birth:</label>
              <input type="text" autocomplete="off" class="form-control datepicker " name="dob" value="" id="dob" required>
          </div>
          <div class="form-row">
              <div class="form-group col">
                  <label class="" for="contact-number">CONTACT NUMBER:</label>
                  <input type="text"  class="form-control " name="phone" value="" id="contact-number" required>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col">
                  <label class=""
                      for="shipping_address">COMPLETE ADDRESS:</label>
                  <input type="text"
              class="form-control " name="address_1" value="" id="shipping_address" required>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col">
                  <label class=""
                      for="shipping_city">CITY / TOWN:</label>
                  <input type="text"
                      class="form-control " name="city" value="" id="shipping_city" required>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col">
                  <label class="" for="shipping_state">State:</label>
                  {{--
                    NOTE: please refer the following site for development -
                    https://developer.snapappointments.com/bootstrap-select/examples/#customize-menu
                --}}
                {{-- add "multiple" attribute for multi-selection --}}
                <div class="select-option">
                    <select name="state_code" id="shipping_state" required class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select State">
                        {{-- @foreach($statesList as $key => $state) --}}
                        <option value=""></option>
                        {{-- @endforeach --}}
                    </select>
                </div>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col">
                  <label class="" for="shipping_zip">Zip:</label>
                  <input type="text" class="form-control " name="zip" id="shipping_zip" value="" required>
              </div>
          </div>
            <h2 class="font-weight-bold mb-3">Billing Address</h2>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="same_billing" checked name="same_billing">
                <label class="form-check-label" for="same_billing">
                   Billing address is same as shipping address
                </label>
            </div>
            <div class="billingData" style="display:none;">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="" for="b_first_name">First Name:</label>
                      <input type="text" class="form-control" name="billing_first_name" id="b_first_name" value="" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="" for="b_last_name">Last Name:</label>
                      <input type="text" class="form-control" name="billing_last_name" id="b_last_name">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="b_contact-number">CONTACT NUMBER:</label>
                      <input type="text" class="form-control" name="billing_phone" value="" id="b_contact-number">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_address">COMPLETE ADDRESS:</label>
                      <input type="text" class="form-control" name="billing_address" value="" id="billing_address">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_city">CITY / TOWN:</label>
                      <input type="text" class="form-control" name="billing_city" value="" id="billing_city">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_state">State:</label>
                      <div class="select-option">
                        <select name="billing_state" id="billing_state"  class="form-control ">
                            <option selected value="" disabled>Select State</option>
                            {{-- @foreach($statesList as $key => $state) --}}
                            <option value=""></option>
                            {{-- @endforeach --}}
                        </select>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_zip">Zip:</label>
                      <input type="text" class="form-control " name="billing_zip" id="billing_zip" value="">
                  </div>
              </div>
            </div>

            <div class="mt-3"><h3 class="text-bold">Payment</h3></div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_type" id="pay_now" value="1" checked="checked">
                <label class="form-check-label" for="pay_now">
                    Pay Now
                </label>
            </div>
            {{-- @if($aligners) --}}
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_type" id="financing" value="0" checked>
                <label class="form-check-label" for="financing">
                    Apply For Financing
                </label>
            </div>
            {{-- @endif --}}
            <div class="payNow mt-3">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="" for="name_on_card">Name On Card:</label>
                      <input type="text" class="form-control " name="name_on_card" id="name_on_card" value="">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="" for="card_number">Card Number:</label>
                      <input type="number" minlength="16" maxlength="16" class="form-control" name="card_number" value="" id="card_number" >
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                      <label class="" for="exp_month">Exp Month:</label>
                      <div class="select-option">
                        <select name="exp_month" id="exp_month" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select State">
                            <option value="" disabled selected>Select Month</option>
                            <option value="1">1 - January</option>
                            <option value="2">2 - February</option>
                            <option value="3">3 - March</option>
                            <option value="4">4 - April</option>
                            <option value="5">5 - May</option>
                            <option value="6">6 - June</option>
                            <option value="7">7 - July</option>
                            <option value="8">8 - August</option>
                            <option value="9">9 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12">12 - December</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group col-md-4">
                        <label class="" for="exp_year">Exp Year:</label>
                        <div class="select-option">
                            <select name="exp_year" id="exp_year" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select State">
                                <option value="" disabled selected>Select Month</option>
                                @for($i = 20; $i<=35; $i++) <option value="{{ $i }}">20{{ $i }}</option> @endfor
                            </select>
                        </div>
                  </div>
                  <div class="form-group col-md-4">
                      <label class="" for="cvc">CVC:</label>
                      <input type="number" minlength="3" maxlength="4" class="form-control " name="cvc" value="" id="cvc" >
                  </div><input type="hidden" name="mf" value="0">
              </div>
          </div>
        </div>
        <div class="col-md-6 mb-md-0 mb-5">
            <h3 class="font-weight-bold text-4">Your Orders</h3>
                <div class="shop-cart">

                    <div class="table-responsive">
                        <table class="shop-cart-table w-100">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name"><strong>Product(s)</strong></th>
                                    <th class="product-price"><strong>Unit Price</strong></th>
                                    <th class="product-quantity"><strong>Qty</strong></th>
                                    <th class="product-subtotal"><strong>Total</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($cartItems as $cartItem)

                                <tr class="cart-item">

                                    <td class="product-thumbnail">
                                        <img src="{{$cartItem->cover}}" class="img-fluid" width="67" alt="" />
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('front.get.product', [$cartItem->product->slug]) }}">{{ $cartItem->name }}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="unit-price">$ {{ $cartItem->price }}</span>
                                    </td>
                                    <td class="product-quantity">

                                        <div class="quantity">
                                            {{ $cartItem->qty }}
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="sub-total"><strong>$ {{ $cartItem->qty * $cartItem->price }}</strong></span>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <br>
                    <h3 class="font-weight-bold text-4 mb-3">Cart Totals</h3>
                    <div class="table-responsive mb-4">
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
                                <tr class="border-bottom-0">
                                    <td>
                                        <span class="cart-total-label">Shipping Fee</span>
                                    </td>
                                    <td>
                                        <span class="cart-total-value">$ {{ $total > 0 ? $shippingFee : 0}}</span>
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
                    <br>
                    <div id="shopPayment">

                    </div>
        </div>
      </form>
    </section>
</main>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
       
    });
  </script>
@endpush
