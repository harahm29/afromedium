<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
    <style>
        small.help-block {
            color: red !important;
        }

        .pointer-events-none {
            z-index: 11 !important;

        }

    </style>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/notify.css') }}" /> --}}
    @notifyCss
    @stack('css')

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>

<body>

    <!--wrapper-->
    <div class="wrapper">

        @include('layouts.sidebar')

        @include('layouts.header')
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @stack('breadcrumb')

                @yield('content')

            </div>
        </div>
        <!--end page wrapper -->
        @include('layouts.footer')
    </div>
    <!--end wrapper-->
    <x:notify-messages />
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

    <!--notification js -->
    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>

    <!--app JS-->
    @stack('js')

    <script src="{{ asset('assets/js/app.js') }}"></script>

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
