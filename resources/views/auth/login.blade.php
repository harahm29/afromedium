@extends('layouts.blank_master')
@section('title', 'Login')
<!--wrapper-->
@section('content')
    <main class="content d-flex p-0">
        <div class="container d-flex flex-column">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">



                        <div class="card">
                            <div class="text-center mt-4">
                                <h1 class="h2">Welcome back, {{ config('app.name', 'Laravel') }}</h1>
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="m-sm-4">
                                    {{-- <div class="text-center">
                                        <img src="{{ asset('assets/images/logo-img_new.png') }}" alt="Chris Wood"
                                            class="img-fluid mx-auto d-block" width="200" height="200" />
                                    </div> --}}
                                    <form class="requires-validation" method="POST" action="{{ route('login') }}"
                                        id="login-from">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                type="email" name="email" placeholder="Enter your email"
                                                id="inputEmailAddress" value="{{ old('email') }}" required
                                                autocomplete="email" data-bv-notempty="true"
                                                data-bv-notempty-message="The email address is required and cannot be empty"
                                                data-bv-emailaddress="true"
                                                data-bv-emailaddress-message="The email address is not a valid" autofocus />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Password</label>
                                            <input
                                                class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                                type="password" placeholder="Enter your password" name="password" required
                                                autocomplete="current-password" id="password" data-bv-notempty="true"
                                                data-bv-notempty-message="The password is required and cannot be empty"
                                                data-bv-stringlength="true" data-bv-stringlength-min="8"
                                                data-bv-stringlength-message="The password must have at least 8 characters" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                        @if (Route::has('password.request'))
                                            <small>
                                                <a
                                                    href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                            </small>
                                        @endif
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input"
                                                    name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label text-small"
                                                    for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ url('/assets/plugins/bootstrapvalidator-0.5.2/css/bootstrapValidator.min.css') }}" />
    <style>
        .body_bg {
            /* The image used */
            background-image: url("{{ asset('admin/img/bg/img_parallax.jpg') }}");
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        label.form-label {
            color: white;
        }

        .card {
            background: rgb(55 53 51 / 73%) !important;
        }

        h1,
        p {
            color: white !important;
        }

    </style>
@endpush
@push('js')
    <script src="{{ url('/assets/plugins/bootstrapvalidator-0.5.2/js/bootstrapValidator.min.js') }}"></script>


    <script>
        $(function() {
            $('#login-from').bootstrapValidator();
        });
    </script>
@endpush
