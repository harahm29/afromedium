<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/istrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assetsx/css/material-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assetsx/css/materialX.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/notify.css') }}" /> --}}
    @notifyCss
    @stack('css')
    <style>
        small.help-block {
            color: red !important;
        }

        .pointer-events-none {
            z-index: 110 !important;

        }

    </style>
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>

<body>

    <div class="yoo-height-b60 yoo-height-lg-b60"></div>
    @include('layouts.header1')
    @include('layouts.sidebar1')
    <x:notify-messages />
    <div class="yoo-content yoo-style1">
        <div class="yoo-height-b30 yoo-height-lg-b30"></div>
        <div class="container">
            @stack('breadcrumb')
            @yield('content')
        </div>
        @include('layouts.footer1')
    </div>


    <!--end wrapper-->


    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/istrap.js') }}"></script>
    <script src="{{ url('assetsx/js/materialX.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

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
    </>
    @endif
    @endif
    @endif

</body>

</html>
