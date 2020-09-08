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
    {{-- all common styles --}}

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slider.css') }}">
    {{-- responsive --}}
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    @stack('stylesheets')
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <![endif]-->
</head>
<body>
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
