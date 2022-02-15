@extends('layouts.master')
@section('title', 'Change Password')

@push('breadcrumb')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
    </div>
@endpush

@section('content')
    <div class="main-body">

    </div>
@endsection

@push('css')
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" />

@endpush
@push('js')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <script src="{{ url('/assets/plugins/bootstrapvalidator-0.5.2/js/bootstrapValidator.min.js') }}"></script>
    <script>
        $(function() {
            $('#create_user').bootstrapValidator()
        });
    </script>
@endpush
