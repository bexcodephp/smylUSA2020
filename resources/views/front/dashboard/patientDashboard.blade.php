@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/table-responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/patient/patient-dashboard.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/sidebar.css') }}" type="text/css">
@endpush
@section('content')

@include('layouts.front.sidebar-p')
<main class="main-aside patient-dashboard col-lg col-12 px-lg-5">
  <section class="py-xxl-5 py-4">
    <div class="row row-cols-1 row-cols-lg-3 all-cards">
      <!-- card 1 -->
      <div class="col mb-4 ">
        <!-- card welcome -->
        <div class="card h-100 card-welcome ">
          <div class="card-body">
            <div class="col-12 text-center p-0 my-3">
              <h3 class="card-title text-center text-bold">Welcome</h3>
            </div>
            <div class="col-12 text-center p-0 mb-2">
              <img src="{{ asset('storage/'. auth()->user()->avatar) }}" class="prof-img" />
              <h3 class="text-center text-bold color-blue my-3">{{ auth()->user()->name }}</h3>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <h5 class="text-center text-bold my-2">Patient ID</h5>
              @if(auth()->user()->patient_id)
                <h5 class="text-center my-2">{{  auth()->user()->patient_id }}</h5>
              @endif  
            </div>
            <div class="col-12 text-center p-0 my-3">
              <h5 class="text-center text-bold my-2">Phone Number</h5>
              <?php
                $number = auth()->user()->phone;
                $formatted_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "+1 $1 $2 $3", $number);
              ?>
              <h5 class="text-center my-2">{{ $formatted_number }}</h5>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <h5 class="text-center text-bold my-2">Email ID</h5>
              <h5 class="text-center my-2">{{  auth()->user()->email }}</h5>
            </div>
          </div>
        </div>
        <!-- card rechedule -->
        <div class="card h-100 card-rechedule hidden">
          <div class="card-body">
            <div class="col-12 text-center p-0 my-3">
              <h3 class="card-title text-center">Hi, We’re Excited<br /> to Meet You!</h3>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <p class="text-center my-2">Your appointment is scheduled at 10:00 am EST, June 09, 2020 at 111 S Newport Ave, Tampa FL 33606.</p>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <p class="text-center my-2">During your visit, which will take 30 minutes, you’ll be able to see a 3D image of your teeth. We’ll use that to create your new smile. See your appointment confirmation email for more details, like directions.</p>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <a href="" role="button" class="btn btn-primary btn-lg text-underline">Reschedule</a>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <h5 class="text-center my-2">Or Call us at </h5>
              <h5 class="text-center my-2">888-779-3207</h5>
            </div>
          </div>
        </div>
        <!-- card Explore Products -->
        <div class="card h-100 card-rechedule hidden">
          <div class="card-body">
            <div class="col-12 text-center p-0 my-3">
              <h3 class="card-title text-center">Explore Products</h3>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <p class="text-center my-2">We offer a wide range of products for your Perfect Smile</p>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <a href="" role="button" class="btn btn-primary btn-lg">Explore Now</a>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <h3 class="card-title text-center">Alignment Treatment</h3>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <p class="text-center my-2">Our Clear Aligners are made using the latest and most precise technology available to give you the smile that you’ll love forever.</p>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <a href="" role="button" class="btn btn-primary btn-lg">Order Now</a>
            </div>
          </div>
        </div>
      </div>
      <!-- card 2 -->
      <div class="col mb-4 card-faq">
        <div class="card h-100">
          <div class="card-body">
            <div class="col-12 text-center p-0 my-3">
              <h3 class="card-title text-center text-bold">If you have any questions, we’re happy to answer them</h3>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <p class="m-0">Please find the answers to all your Clear Aligners related questions in our FAQ section.</p>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <a href="{{ route('faq') }}" role="button" class="btn btn-primary btn-150">FAQ</a>
              <!-- <button type="button" class="btn btn-primary">FAQ</button> -->
            </div>
            <div class="col-12 text-center p-0 my-3">
              <p class="m-0">You can also visit our resources page to get additional information about your aligner treatment.</p>
            </div>
            <div class="col-12 text-center p-0 my-3">
              <a href="" role="button" class="btn btn-link text-bold btn-lg text-underline resource-link">Resources</a>
            </div>
          </div>
        </div>
      </div>
      <!-- card 3 -->
      <div class="col mb-4 card-notification">
        <div class="card h-100 ">
          <div class="card-body">
            <div class="col-12 text-center p-0 my-3">
              <h3 class="card-title text-center text-bold">Notifications</h3>
            </div>
            <ul class="list-group scrollbar992">
              <!-- list of notification -->
              <!-- for unreadable notification add "active" class to <li> tag -->
              <li class="list-group-item list-group-item-action active">
                <a href="#">
                  <div class="d-flex w-100">
                    <p class="mb-1 nf-caption">You have updated avatar.</p>
                  </div>
                  <p class="text-muted">1 week ago</p>
                </a>
              </li>
              <li class="list-group-item list-group-item-action">
                <a href="#">
                  <div class="d-flex w-100">
                    <p class="mb-1 nf-caption">You have updated personal information.</p>
                  </div>
                  <p class="text-muted">1 week ago</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@push('scripts')
<script src="{{ asset('front/js/sidebar.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {

  });
</script>
@endpush