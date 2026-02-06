<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <title>@yield('title', 'Radiology Education')</title>
        <meta name="description" content="@yield('meta_description', 'Radiology Education')">

        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
        <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/apple-touch-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/apple-touch-icon-114x114.png')}}">
        <!-- google fonts preconnect -->

        {{-- Open Graph Meta --}}
        <meta property="og:title" content="@yield('title', 'Radiology Education')">
        <meta property="og:description" content="@yield('meta_description')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->url() }}">

        {{-- Additional Meta --}}
        @stack('meta')

        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" href="{{asset('assets/css/vendors.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/icon.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    </head>
    <body data-mobile-nav-style="classic">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        <!-- javascript libraries -->
        <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/vendors.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
        @stack('scripts')
        <style>
            body{color:#1c1c1c !important;}
            a{color:#1c1c1c !important;}
        </style>
    </body>
</html>
