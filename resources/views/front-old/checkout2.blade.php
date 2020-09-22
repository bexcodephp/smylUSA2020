@extends('layouts.front.app')
@section('title', 'SmylUSA - Checkout')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<style>
    .nav-tabs li.active {
        background: #2388ED;
    }

    .nav-tabs li {
        padding: 10px;
    }

    .nav-tabs li.active a {
        color: white;
    }
</style>
<div role="main">
        <section class="page-header mb-0" style="background-color: #2388ed;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <h1 class="font-weight-bold" style="color: #fff">Checkout</h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">

                        </ul>
                    </div>
                </div>
            </div>
        </section>

            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            @include('layouts.errors-and-messages')
                                <form method="POST" id="shopCheckout"  action="{{ route('checkout.store') }}">
                                    @csrf
                                    <div class="row mb-5">
                                        <div class="col-md-6 mb-5 mb-md-0">
                                            <h2 class="font-weight-bold mb-3">Shipping information</h2>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="text-color-dark font-weight-semibold"
                                                        for="first_name">First Name:</label>
                                                    <input type="text"
                                                        class="form-control line-height-1 bg-light-5" name="first_name" id="first_name" value="{{ $customer ? $customer->first_name : null }}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-color-dark font-weight-semibold"
                                                        for="last_name">Last Name:</label>
                                                    <input type="text"
                                                        class="form-control line-height-1 bg-light-5" name="last_name" id="last_name" @if($customer) readonly @endif value="{{ $customer ? $customer->last_name : null }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-color-dark font-weight-semibold" for="email">Email:</label>
                                                <input type="email" class="form-control line-height-1 bg-light-5" name="email" value="{{ $customer ? $customer->email : null }}"
                                                    id="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-color-dark font-weight-semibold" for="email">Date Of Birth:</label>
                                                <input type="text" autocomplete="off" class="form-control datepicker line-height-1 bg-light-5" name="dob" value=""
                                                    id="dob" required>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold" for="contact-number">CONTACT NUMBER:</label>
                                                    <input type="text"  class="form-control line-height-1 bg-light-5" name="phone" value="{{ $customer ? $customer->phone : null }}"
                                                        id="contact-number" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold"
                                                        for="shipping_address">COMPLETE ADDRESS:</label>
                                                    <input type="text"
                                                class="form-control line-height-1 bg-light-5" name="address_1" value="{{ $address ? $address->address_1 : null }}"
                                                        id="shipping_address" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold"
                                                        for="shipping_city">CITY / TOWN:</label>
                                                    <input type="text"
                                                        class="form-control line-height-1 bg-light-5" name="city" value="{{ $address ? $address->city : null }}"
                                                        id="shipping_city" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold" for="shipping_state">State:</label>
                                                    <select name="state_code" id="shipping_state" required class="form-control line-height-1 bg-light-5">
                                                        <option selected value="" disabled>Select State</option>
                                                        @foreach($statesList as $key => $state)
                                                        <option value="{{ $key }}" @if($address ? $address->state_code : null == $key) selected @endif>{{ $state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold" for="shipping_zip">Zip:</label>
                                                    <input type="text" class="form-control line-height-1 bg-light-5" name="zip" id="shipping_zip" value="{{ $address ? $address->zip : null }}" required>
                                                </div>
                                            </div>
                                            <h2 class="font-weight-bold mb-3">Billing Address</h2>
                                            <p>
                                                <label><input type="checkbox" checked name="same_billing" id="same_billing"> Billing address is same as shipping address </label>
                                            </p>
                                            <div class="billingData" style="display:none;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="text-color-dark font-weight-semibold" for="b_first_name">First Name:</label>
                                                        <input type="text" class="form-control line-height-1 bg-light-5" name="billing_first_name" id="b_first_name"
                                                            value="{{ $customer ? $customer->billing_first_name : null }}" >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-color-dark font-weight-semibold" for="b_last_name">Last Name:</label>
                                                        <input type="text" class="form-control line-height-1 bg-light-5" name="billing_last_name" id="b_last_name"
                                                            value="{{ $customer ? $customer->billing_last_name : null }}" >
                                                    </div>
                                                </div>
                                                <div class="form-row">

                                                    <div class="form-group col">
                                                        <label class="text-color-dark font-weight-semibold" for="b_contact-number">CONTACT NUMBER:</label>
                                                        <input type="text" class="form-control line-height-1 bg-light-5" name="billing_phone"
                                                            value="{{ $address ? $address->billing_phone : null }}" id="b_contact-number" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="text-color-dark font-weight-semibold" for="billing_address">COMPLETE ADDRESS:</label>
                                                        <input type="text" class="form-control line-height-1 bg-light-5" name="billing_address"
                                                            value="{{ $address ? $address->billing_address : null }}" id="billing_address" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="text-color-dark font-weight-semibold" for="billing_city">CITY / TOWN:</label>
                                                        <input type="text" class="form-control line-height-1 bg-light-5" name="billing_city"
                                                            value="{{ $address ? $address->billing_city : null }}" id="billing_city" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="text-color-dark font-weight-semibold" for="billing_state">State:</label>
                                                        <select name="billing_state" id="billing_state"  class="form-control line-height-1 bg-light-5">
                                                            <option selected value="" disabled>Select State</option>
                                                            @foreach($statesList as $key => $state)
                                                            <option value="{{ $key }}" @if($address ? $address->billing_state : null == $key) selected @endif>{{ $state }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="text-color-dark font-weight-semibold" for="billing_zip">Zip:</label>
                                                        <input type="text" class="form-control line-height-1 bg-light-5" name="billing_zip" id="billing_zip"
                                                            value="{{ $address ? $address->billing_zip : null }}" >
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="font-weight-bold text-4">Payment</h3>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="payment_type" id="pay_now" value="1" checked="checked">
                                                    Pay Now
                                                </label>
                                            </div>
                                            @if($aligners)
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="payment_type" id="financing" value="0">
                                                    Apply For Financing
                                                </label>
                                            </div>
                                            @endif
                                            <div class="payNow" style="display: block;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="text-color-dark font-weight-semibold" for="name_on_card">Name On Card:</label>
                                                        <input type="text" class="form-control line-height-1 bg-light-5" name="name_on_card" id="name_on_card" value=""
                                                            >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-color-dark font-weight-semibold" for="card_number">Card Number:</label>
                                                        <input type="number" minlength="16" maxlength="16" class="form-control line-height-1 bg-light-5"
                                                            name="card_number" value="" id="card_number" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="text-color-dark font-weight-semibold" for="exp_month">Exp Month:</label>
                                                        <select name="exp_month" class="form-control line-height-1 bg-light-5" id="exp_month">
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
                                                    <div class="form-group col-md-4">
                                                        <label class="text-color-dark font-weight-semibold" for="exp_year">Exp Year:</label>
                                                        <select name="exp_year" id="exp_year" class="form-control line-height-1 bg-light-5">
                                                            <option value="" disabled selected>Select Month</option>
                                                            @for($i = 20; $i<=35; $i++) <option value="{{ $i }}">20{{ $i }}</option> @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="text-color-dark font-weight-semibold" for="cvc">CVC:</label>
                                                        <input type="number" minlength="3" maxlength="4" class="form-control line-height-1 bg-light-5" name="cvc"
                                                            value="" id="cvc" >
                                                    </div><input type="hidden" name="mf" value="0">
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
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

                                    </div>
                                    <div class="showPaymentPlan" style="display: none;">
                                        <div class="row">
                                        <div class="card-deck mb-3 text-center" style="width: 100%">

                                            <div class="card mb-4 shadow-sm">

                                                <div class="card-body">
                                                    <h3 style="border: 1px solid #D3D3D3;border-radius:5px;text-align:center;background:#D3D3D3;"> $149.9 /
                                                        mo
                                                    </h3>
                                                    <p style="border: 1px solid #D3D3D3;text-align:center;">12 Months</p>
                                                    <table class="table-borderless" style="text-align:right;border:none!important;" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td>Annual Percentage Rate:</td>
                                                                <td>0.00%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>One-time Setup Fee:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Service Charges:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Cost:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total of Payments :</td>
                                                                <td>$1,799.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card mb-4 shadow-sm">

                                                <div class="card-body">
                                                    <h3 style="border: 1px solid #D3D3D3;border-radius:5px;text-align:center;background:#D3D3D3;"> $99.94 /
                                                        mo
                                                    </h3>
                                                    <p style="border: 1px solid #D3D3D3;text-align:center;">18 Months</p>
                                                    <table class="table-borderless" style="text-align:right;border:none!important;" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td>Annual Percentage Rate:</td>
                                                                <td>0.00%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>One-time Setup Fee:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Service Charges:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Cost:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total of Payments :</td>
                                                                <td>$1,799.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card mb-4 shadow-sm">

                                                <div class="card-body">
                                                    <h3 style="border: 1px solid #D3D3D3;border-radius:5px;text-align:center;background:#D3D3D3;"> $74.96 /
                                                        mo
                                                    </h3>
                                                    <p style="border: 1px solid #D3D3D3;text-align:center;">24 Months</p>
                                                    <table class="table-borderless" style="text-align:right;border:none!important;" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td>Annual Percentage Rate:</td>
                                                                <td>0.00%</td>
                                                            </tr>
                                                            <tr>
                                                                <td>One-time Setup Fee:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Service Charges:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Cost:</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total of Payments :</td>
                                                                <td>$1,799.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3"
                                            type="submit">PLACE ORDER</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>


        </div>
@endsection

@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        var dateToday = new Date();
        $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: dateToday,
        });
    } );
    $('#pay_now').click(function(e){
        $('.payNow').show();
        $('.showPaymentPlan').hide();
    });
    $('#financing').click(function(e){
        $('.payNow').hide();
        $('.showPaymentPlan').show();
    });

    $('#same_billing').change(function(e){
        e.preventDefault();
        if($(this).is(":checked"))
        {
            $('.billingData').hide();
        }else{
            $('.billingData').show();
        }
    });

</script>
@endsection
