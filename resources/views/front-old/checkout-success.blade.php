@extends('layouts.front.app')
@section('title', 'SmylUSA - Success')
@section('content')
<div role="main" class="main bg-light-5">
    <section class="section">
        <img src="{{ asset('assets/img/others/lamp-holder.png')}}" class="img-fluid lamp-style-2 position-absolute transform-center-x appear-animation" data-appear-animation="fadeIn" alt="" height="100" width="75"/>
        
        <div class="container">
            <div class="row justify-content-center text-center py-5 mt-5 mb-3 d-flex p-2 bd-highlight">
                <div class="col-md-8 col-lg-6 pt-4 mt-5">
                    <h1 class="font-weight-bold text-6 mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Thank you for placing your order !<strong class="d-block font-weight-bold text-17"></strong>
                    </h1>
                 <h3 class="justify-content mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" > <br> <strong> Your order number is #{{ $order->order_no }}</h3>
                    <h5 class="justify-content mb-5 appear-animation" data-appear-animation="fadeInUpShorter"
                        data-appear-animation-delay="400"> Note: The average shipping time is 2-3 working days. If you do not receive your product during this time, feel free to
                        contact us.<br>
                    </h5>
                <h5 class="justify-content mb-5 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="400"><br> Best Regards,<br>Customer Care<br>SmylUSA <br> {{ config('app.order_email') }}
                </h5>
                    
                    
                <!-- <h5 class="justify-content mb-5 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="400" style="font-family:'Times New Roman', Times, serif;"><br>Customer Care,<br>
                </h5>
                <h5 class="justify-content mb-5 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="400" style="font-family:'Times New Roman', Times, serif;"><br>SmylUSA <br>
                </h5> -->

                
                </div>
            </div>
        </div>
    </section>		
</div>

@endsection