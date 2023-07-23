<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="meta_desc" content="@yield('meta_desc')">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('interface/js/owl.carousel.js')}}" ></script>
    <script src="{{ asset('interface/js/owl.carousel-min.js')}}" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('interface/css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('interface/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('interface/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('interface/css/owl.theme.default.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        @include('layouts.inc.interface.navbar')

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('interface/js/jquery-3.6.1.min.js')}}" ></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{ asset('interface/js/ajax.js')}}" ></script>
        <script src="{{ asset('interface/js/jquery-ui.js')}}"></script>
        <script>

            var availableTags = [];
            $.ajax({
                method:"GET",
                url: "/search",
                success: function (response) {
                    // console.log(response)
                    function startAutoComplete(response)
                }
            });
            function startAutoComplete(availableTags)
            $( "#search_product" ).autocomplete({
                source: availableTags
            });

            </script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <main>
            @yield('content')
        </main>
    </div>

    @if (session('status'))
    <script>
        swal("{{session('status')}}")
    </script>
    @endif

    @yield('script')
</body>
</html>
