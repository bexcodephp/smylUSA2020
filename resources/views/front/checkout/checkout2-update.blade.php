@extends('layouts.front.main')
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('front/css/table-responsive.css') }}"  type="text/css" >
    <link rel="stylesheet" href="{{ asset('front/css/checkout.css') }}"  type="text/css" >
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
      @include('layouts.errors-and-messages')
      <form class="row amicandidate-form py-3" id="shopCheckout" action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="col-md-6 mb-md-0 mb-5">
            <h2 class="font-weight-bold mb-3">Shipping Information</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="" for="first_name">First Name</label>
                    <input type="text" class="form-control " name="first_name" id="first_name" value="{{ $customer ? $customer->first_name : null }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="" for="last_name">Last Name</label>
                    <input type="text" class="form-control " name="last_name" id="last_name" value="{{ $customer ? $customer->last_name : null }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="" for="email">Email</label>
                <input type="email" class="form-control " name="email" value="{{ $customer ? $customer->email : null }}" id="email" required>
            </div>
            <div class="form-group">
                <label class="" for="email">Date Of Birth</label>
                <input type="text" autocomplete="off" class="form-control datepicker " name="dob" value="{{ old('dob')}}" id="dob"  required>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="" for="contact-number">Contact Number</label>
                    <input type="text"  class="form-control " name="phone" value="{{ $customer ? $customer->phone : null }}" id="contact-number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="" for="shipping_address">Complete Address</label>
                    <input type="text"
                class="form-control " name="address_1" value="{{ $address ? $address->address_1 : null }}" id="shipping_address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="" for="shipping_city">City / Town</label>
                    <input type="text" class="form-control " name="city" value="{{ $address ? $address->city : null }}" id="shipping_city" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="" for="shipping_state">State</label>
                    {{--
                        NOTE please refer the following site for development -
                        https://developer.snapappointments.com/bootstrap-select/examples/#customize-menu
                    --}}
                    {{-- add "multiple" attribute for multi-selection --}}
                    <div class="select-option">
                      <select name="state_code" id="shipping_state" required class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" title="Select State">
                            <option selected value="" disabled>Select State</option>
                          @foreach($statesList as $key => $state)
                          <option value="{{ $key }}" @if($address ? $address->state_code : null == $key) selected @endif>{{ $state }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="" for="shipping_zip">Zip</label>
                    <input type="text" class="form-control " name="zip" id="shipping_zip" value="{{ $address ? $address->zip : null }}" required>
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
                      <label class="" for="b_first_name">First Name</label>
                      <input type="text" class="form-control" name="billing_first_name" id="b_first_name" value="{{ $customer ? $customer->billing_first_name : null }}" >
                  </div>
                  <div class="form-group col-md-6">
                      <label class="" for="b_last_name">Last Name</label>
                      <input type="text" class="form-control" name="billing_last_name" id="b_last_name" value="{{ $customer ? $customer->billing_last_name : null }}">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="b_contact-number">Contact Number</label>
                      <input type="text" class="form-control" name="billing_phone" value="{{ $address ? $address->billing_phone : null }}" id="b_contact-number">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_address">Complete Address</label>
                      <input type="text" class="form-control" name="billing_address" value="{{ $address ? $address->billing_address : null }}" id="billing_address">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_city">City / Town</label>
                      <input type="text" class="form-control" name="billing_city" value="{{ $address ? $address->billing_city : null }}" id="billing_city">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_state">State</label>
                      <div class="select-option">
                        <select name="billing_state" id="billing_state"  class="form-control line-height-1 bg-light-5">
                          <option selected value="" disabled>Select State</option>
                          @foreach($statesList as $key => $state)
                          <option value="{{ $key }}" @if($address ? $address->billing_state : null == $key) selected @endif>{{ $state }}
                          </option>
                          @endforeach
                      </select>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col">
                      <label class="" for="billing_zip">Zip</label>
                      <input type="text" class="form-control " name="billing_zip" id="billing_zip" value="{{ $address ? $address->billing_zip : null }}">
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
                      <label class="" for="name_on_card">Name On Card</label>
                      <input type="text" class="form-control " name="name_on_card" id="name_on_card" value="{{ old('name_on_card')}}">
                  </div>
                  <div class="form-group col-md-6">
                      <label class="" for="card_number">Card Number</label>
                      <input type="text" minlength="16" maxlength="16" class="form-control" name="card_number" value="{{ old('card_number')}}" id="card_number" >
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                      <label class="" for="exp_month">Exp Month</label>
                      <div class="select-option">
                        <select name="exp_month" id="exp_month" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" >
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
                        <label class="" for="exp_year">Exp Year</label>
                        <div class="select-option">
                            <select name="exp_year" id="exp_year" class="selectpicker form-control show-tick" data-actions-box="true" data-style="btn-outline-primary" >
                                <option value="" disabled selected>Select Year</option>
                                @for($i = 20; $i<=35; $i++) <option value="{{ $i }}">20{{ $i }}</option> @endfor
                            </select>
                        </div>
                  </div>
                  <div class="form-group col-md-4">
                      <label class="" for="cvc">CVC</label>
                      <input type="text" minlength="3" maxlength="4" class="form-control " name="cvc" value="" id="cvc" >
                  </div><input type="hidden" name="mf" value="0">
              </div>
          </div>
        </div>
        <div class="col-md-6 mb-md-0 mb-5">
            <h3 class="font-weight-bold text-4">Your Orders</h3>
            <div class="shop-cart-table-div mt-md-4">
                <div class="table-responsive">
                    <table class="table shop-cart-table w-100 col_tbl">
                        <thead>
                            <tr>
                                <th class="product-name col-auto" colspan="2">Product(s)</th>
                                <th class="product-price col-auto">Unit Price</th>
                                <th class="product-quantity col-auto">Qty</th>
                                <th class="product-subtotal col-auto">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $cartItem)
                            <tr class="cart-item">
                                <td class="product-thumbnail col-auto" data-label="Image">
                                    <div>
                                        <img src="{{$cartItem->cover}}" class="img-fluid" width="70" alt="" />
                                    </div>
                                </td>
                                <td class="product-name col-auto" data-label="Product Name">
                                    <div><a href="{{ route('front.get.product', [$cartItem->product->slug]) }}">{{ $cartItem->name }}</a></div>
                                </td>
                                <td class="product-price col-auto" data-label="Unit Price">
                                    <div class="unit-price">${{ $cartItem->price }}</div>
                                </td>
                                <td class="product-quantity col-auto" data-label="Qty">
                                    <div class="quantity">{{ $cartItem->qty }}</div>
                                </td>
                                <td class="product-subtotal col-auto" data-label="Total">
                                    <div class="sub-total">${{ $cartItem->qty * $cartItem->price }}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <h3 class="font-weight-bold text-4 my-4 ">Cart Totals</h3>
            <div class="table-responsive mb-4">
                <table class="table cart-totals w-100">
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-total-label text-bold">Cart Subtotal</div>
                            </td>
                            <td>
                                <div class="cart-total-value">${{ $subtotal }}</div>
                            </td>
                        </tr>
                        <tr class="border-bottom-0">
                            <td>
                                <div class="cart-total-label text-bold">Shipping Fee</div>
                            </td>
                            <td>
                                <div class="cart-total-value">${{ $total > 0 ? $shippingFee : 0}}</div>
                            </td>
                        </tr>
                        <tr class="border-bottom-0">
                            <td>
                                <div class="cart-total-label text-bold">Total</div>
                            </td>
                            <td>
                                <div class="cart-total-value text-color-primary color-blue text-bold">$ {{$total}}</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="shopPayment">
                <div class="col text-right">
                    <button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3"
                        type="submit">PLACE ORDER</button>
                </div>
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
