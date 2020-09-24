@extends('layouts.front.main')
@push('stylesheets')
<link rel="stylesheet" href="{{ asset('front/css/sidebar.css') }}" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.16/mediaelementplayer.min.css" />

<link rel="stylesheet" href="{{ asset('front/css/patient/patient-resources.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('front/css/chatbox.css') }}" type="text/css">
@endpush
@section('content')

@include('layouts.front.sidebar-p')
<main class="main-aside patient-resources col-lg col-12 px-lg-5">
  <section class="py-xxl-5 py-4">
    <div class="row  all-cards">
      <div class="col-xl-8 col-md-6 mb-4 card-first">
        <div class="card mb-3 p-md-4 p-3">
          <div class="row">
            <!-- video 1 -->
            <div class="col-xl-6 d-flex flex-column">
              <div>
                <video id="player1" preload="none" height="240" class="video-player p-0 col">
                  <source type="video/youtube" src="http://www.youtube.com/watch?v=nOEw9iiopwI" />
                </video>
              </div>
              <div class="caption mb-3">
                <h3 class="card-title text-bold color-blue mt-3">Impression Kit</h3>
                <p>How to use the impression kit to take your dental impression</p>
              </div>
              <div class="mb-3 mt-auto">
                <button class="btn btn-primary" type="button">Download Guidebook</button>
              </div>
            </div>
            <!-- video 2 -->
            <div class="col-xl-6 d-flex flex-column">
              <div>
                <video class="video-player p-0 col" id="" poster="http://www.mediaelementjs.com/images/big_buck_bunny.jpg">

                </video>
              </div>
              <div class="caption mb-3">
                <h3 class="card-title text-bold color-blue mt-3">Dental Scanning Process</h3>
                <p>Check our the video to understand the whole scanning process</p>
              </div>
              <div class="mb-3 mt-auto">
                <button class="btn btn-primary" type="button">Download Guidebook</button>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-3 p-md-4 p-3">
          <div class="row">
            <!-- video 3 -->
            <div class="col-xl-6 mb-3 d-flex flex-column">
              <div>
                <video class="video-player p-0 col" id="" poster="http://www.mediaelementjs.com/images/big_buck_bunny.jpg">
                  <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/CastVideos/mp4/BigBuckBunny.mp4" type="video/mp4">
                </video>
              </div>
              <div class="caption mb-3">
                <h3 class="card-title text-bold color-blue mt-3">SmylUSA Clear Aligners Journey</h3>
                <p>Check out this video to understand the whole journey to your perfect smile</p>
              </div>
              <div class="mb-3 mt-auto">
                <button class="btn btn-primary" type="button">Download Guidebook</button>
              </div>
            </div>
            <!-- video 4 -->
            <div class="col-xl-6 mb-3 d-flex flex-column">
              <div>
                <video class="video-player p-0 col" id="" poster="http://www.mediaelementjs.com/images/big_buck_bunny.jpg">
                  <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/CastVideos/mp4/BigBuckBunny.mp4" type="video/mp4">
                </video>
              </div>
              <div class="caption mb-3">
                <h3 class="card-title text-bold color-blue mt-3">Dental Scanning Process</h3>
                <p>Check our the video to understand the whole scanning process</p>
              </div>
              <div class="mb-3 mt-auto">
                <button class="btn btn-primary" type="button">Download Guidebook</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md col-12 mb-4 card-notification">
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
              <li class="list-group-item list-group-item-action">
                <a href="#">
                  <div class="d-flex w-100">
                    <p class="mb-1 nf-caption">You have updated personal information.</p>
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
              <li class="list-group-item list-group-item-action">
                <a href="#">
                  <div class="d-flex w-100">
                    <p class="mb-1 nf-caption">You have updated personal information.</p>
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
              <li class="list-group-item list-group-item-action">
                <a href="#">
                  <div class="d-flex w-100">
                    <p class="mb-1 nf-caption">You have updated personal information.</p>
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
              <li class="list-group-item list-group-item-action">
                <a href="#">
                  <div class="d-flex w-100">
                    <p class="mb-1 nf-caption">You have updated personal information.</p>
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
@include('front.dashboard.patientChat')
{{-- View Document modal  --}}
<div class="modal fade view-pic-modal" id="view_pic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-12 align-self-center mb-3 text-center">
            <h4 class="sub-title-1 color-blue text-bold" id="title_add_stl">View Document</h4>
          </div>
          <div class="col-12 mb-4">
            <div class="card h-100 card-2 mx-auto">
              <img class="card-img-top mx-auto" src="{{ asset('images/products/steps_image_5.png') }}" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('front/js/sidebar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.16/mediaelement.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.16/mediaelement-and-player.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('video').mediaelementplayer({
      features: ['playpause', 'progress', 'current', 'duration', 'tracks', 'volume', 'fullscreen']
    });
    // $('#btn_open_chat').click(function() {
    //   $('#list_chat').slideToggle();
    // });
  });
</script>
@endpush