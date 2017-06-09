<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <title>@yield('title', '我就說不是改我了!!')</title>
    {{-- mete區 --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- 引入Styles --}}
    <link rel="stylesheet" href="{{ asset('include/bootstrap/css/bootstrap.min.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('include/font-awesome/css/font-awesome.min.css') }}" media="screen">
    {{-- Material Design fonts --}}
    {{--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">--}}
    {{--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/icon?family=Material+Icons">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/fonts/family-roboto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/fonts/family-material-icons.css') }}">
    {{-- Bootstrap Material Design --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('include/bootstrap-material/css/ripples.min.css') }}">
    {{-- iziModal.min.css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('include/izimodal/css/iziModal.min.css') }}" media="screen">

    {{-- 個人Styles --}}
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('css')

</head>
<body id="app-layout">

    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    {{-- JavaScripts --}}
    <script src="{{ asset('include/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('include/jquery/jquery.ujs.js') }}"></script>
    <script src="{{ asset('include/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('include/bootstrap-material/js/material.min.js') }}"></script>
    <script src="{{ asset('include/bootstrap-material/js/ripples.min.js') }}"></script>
    <script src="{{ asset('include/izimodal/js/iziModal.min.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    @yield('js')
</body>
</html>
