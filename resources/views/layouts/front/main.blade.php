<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name=”robots” content="index, follow">
    <meta name="description" content="SmylUSA">
    <title>SmylUSA - Bring your smile on</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.5.0/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/large.css') }}">

    {{--  owl carousel  --}}
    <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}" media="screen">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.min.css') }}"  type="text/css" >
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('front/css/fontawesome-all.css') }}">
    {{--  animation css  --}}
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    {{-- normalize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    
    {{-- all common styles --}}
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/preloader.css') }}">
    {{-- responsive --}}
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    @stack('stylesheets')
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <![endif]-->
</head>
<body>
    {{-- preloader  --}}
    @include('layouts.front.preloader')

    {{-- include navbar --}}
    @include('layouts.front.nav')
    {{--  main wrapper  --}}
    <div class="wrapper">
        {{-- include floating button  --}}
        @include('layouts.front.float')
        {{-- main Contents --}}
        @yield('content')
    </div>
    {{-- include footer --}}
    @include('layouts.front.footer')
    {{-- include individual page scripts getting  --}}
    @stack('scripts')
    {{-- only one time - use for script @yield('scripts')  --}}
</body>
</html>
