<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Glorya Beauty')</title>
    <meta name="description" content="@yield('description', '')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dripicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glorya-services.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @stack('styles')
</head>
<body>
    @include('includes.header')
    
        
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif
    
    @yield('content')
    
    @include('includes.footer')

    <!-- JS here -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('js/js_isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="{{ asset('js/paroller.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/element-in-view.js') }}"></script>
    <script src="{{ asset('js/one-page-nav-min.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    <!-- Auto-hide alerts after 5 seconds -->
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
    @stack('scripts')
</body>
</html>
