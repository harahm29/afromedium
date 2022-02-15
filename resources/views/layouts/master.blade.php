<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">
    <meta name="author" content="Hybron">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <link rel="canonical" href="{{url('/')}}" />
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico')}}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{{ asset('admin/css/light.css')}}" rel="stylesheet">
    {{-- <script src="{{ asset('admin/js/settings.js')}}"></script> --}}
    <!-- END SETTINGS -->
    {{-- @notifyCss --}}
    <link class="js-stylesheet" href="{{ asset('admin/css/notify.css')}}" rel="stylesheet">
    @stack('css')
    <style>
        small.help-block {
            color: red !important;
        }

        .pointer-events-none {
            z-index: 11 !important;

        }

    </style>
</head>


<body data-theme="defult" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        @include('layouts.sidebar')

        <div class="main">
            @include('layouts.header')



            <main class="content">
                <div class="container-fluid p-0">
                    @stack('breadcrumb')
                    @yield('content')
                </div>
            </main>
            @include('layouts.footer')

        </div>
    </div>
    <x:notify-messages />
    <script src="{{ asset('admin/js/app.js')}}"></script>
    @stack('js')

    @notifyJs
    @if(Auth::user()->user_id)
    @if(findU(Auth::user()->user_id))
    @if(findU(Auth::user()->user_id)->id==Auth::user()->user_id)
    <script>
        $(document).ready(function() {
            get_single_chat();
            setInterval(function() {
                get_single_chat();
            }, 12000);
        });
       function get_single_chat() {

         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('chat.msgcount') }}",
            type: "POST",
            dataType: "json",
            // processData: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id": "{{ Auth::user()->id }}",
            },
            success: function(data) {
                var data = JSON.parse(JSON.stringify(data));
                //console.log(data);
                if (data.error == '') {
                    $('#single_chat_count').text(data.data);
                }else{
                    $('#single_chat_count').text('0');
                }
            }
        });

        }
    </script>
    @endif
    @endif
    @endif

</body>

</html>
