<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dating app &amp;">
    <meta name="author" content="Hybron">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | {{ config('app.name', 'Laravel') }} </title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet" />
    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{{ asset('admin/css/light.css') }}" rel="stylesheet" />
    {{-- <script src="{{asset('admin/js/settings.js')}}"></script> --}}



    <!--plugins-->
    @notifyCss
    @stack('css')
    <style>
        small.help-block {
            color: red !important;
        }

        .pointer-events-none {
            z-index: 101 !important;

        }

    </style>

</head>

<body class="body_bg" data-theme="default" data-layout="fluid" data-sidebar-position="left"
    data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            @yield('content')
        </main>
    </div>
    <x:notify-messages />
    <script src="{{ asset('admin/js/app.js') }}"></script>

    <!--app JS-->
    @stack('js')
    @notifyJs

</body>

</html>
