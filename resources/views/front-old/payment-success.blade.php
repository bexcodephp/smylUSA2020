@extends('layouts.front.app')
@section('title', 'SmylUSA - Payment Success')
@section('content')
<div role="main" class="main bg-light-5">

            <div class="row justify-content-center text-center py-5 mt-5 mb-3 d-flex p-2">
                <div class="col-sm-6 col-sm-offset-3 pt-4 mt-5">
                    <h1 class="font-weight-bold text-6  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Thank you for payment !<strong class="d-block font-weight-bold text-17"></strong>
                    </h1>
                    <h3 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" > <br> Order No: {{ $order->order_no }}</h3>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Estimated Total: ${{ $order->estimate_total }}
                    </h4>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Initial Paid: ${{ $order->initial_payment }}
                    </h4>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Current Balance: ${{ $order->current_balance }}
                    </h4>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Number of Payments: {{ $order->number_payments }}
                    </h4>
                    <h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        Next Payment Amount: ${{ $order->payment_amount }}
                    </h4>
                    <!--<h4 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">-->
                    <!--    Next Payment Date: {{ $order->day_of_month. ' '.date('M ', strtotime("+1 month")) }}-->
                    <!--</h4>-->
                    
                    <h5 class="justify-content  appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="400"><br> Best Regards,<br>Customer Care<br>SmylUSA <br> {{ config('app.order_email') }}
                    </h5>
                </div>

            </div>
     
</div>

@endsection