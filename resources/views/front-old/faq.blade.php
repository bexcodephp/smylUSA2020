@extends('layouts.front.app')


@section('css')
<style>
    .card-body p a {
        color: #ffa073;
    }
</style>
@endsection

@section('content')
<main style="background: url({{ asset('img/bg-2.jpeg') }}); background-size: 300px;padding-top: 100px;">
        
        <!-- breadcrumb area start -->
        
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-12 col-md-4  faq-nav">
                        <h3 style="margin-bottom: 20px; color: #fff;">Topics</h3>
                    	<ul class="nav nav-pills nav-stacked">
                             @foreach ($faqs as $key => $category)
                                <li><a href="#{{ strtolower(str_replace(",", "", str_replace(" ","",$key))) }}"><span class="glyphicon glyphicon-chevron-right"></span>{{$key}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-8  col-sm-12">
                        <!-- Checkout Login Coupon Accordion Start -->
                        <div class="checkoutaccordion" id="checkOutAccordion">
                            @php($i = 1)
                           @foreach ($faqs as $key => $category)
                                <h3 style="margin-top: 80px; margin-bottom: 20px; color: #fff;" id="{{ strtolower(str_replace(",", "", str_replace(" ","",$key))) }}">{{ $key }}</h3>
                                @foreach($category as $faq)
                                <div class="card">
                                <h5 class=" orange-col" style="background: #090808;"><span data-toggle="collapse" data-target="#faq_{{ $faq->id }}">{{ $i++ . ") " .$faq->question }}</span></h5>
                                    <div id="faq_{{ $faq->id }}" class="collapse black white-col" data-parent="#checkOutAccordion">
                                        <div class="card-body">
                                        <p>{!! $faq->answer !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

@endsection
