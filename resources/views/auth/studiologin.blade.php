@extends('layouts.blank_master')
@section('title', 'Login')
@section('bodycalss', 'bg-login')

<!--wrapper-->
@section('content')
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="{{ asset('assets/images/logo-img.png')}}" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">@if($slug) Studio Owner @endif Sign in </h3>
                                    </div>

                                    <div class="form-body">
                                        <form class="row g-3 requires-validation" method="POST"
                                        @if($slug) action="{{ route('studio-login-check') }}" @else action="{{ route('login') }}" @endif  >
                                            @csrf
                                            @if($slug)
                                            <input type="hidden" name="slug" value="{{$slug}}"/>
                                            @endif
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="inputEmailAddress" placeholder="Email Address" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="valid-feedback">Email field is valid!</div>
                                                <div class="invalid-feedback">Email field cannot be blank!</div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter
                                                    Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password"
                                                        class="form-control border-end-0 @error('password') is-invalid @enderror"
                                                        id="inputChoosePassword" placeholder="Enter Password"
                                                        name="password" required autocomplete="current-password" />

                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                            class="bx bx-hide"></i></a>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="valid-feedback">Password field is valid!</div>
                                                    <div class="invalid-feedback">Password field cannot be blank!</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bx bxs-lock-open"></i>Sign in
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <!--end page wrapper -->
    </div>
    <!--end wrapper-->
@endsection
@push('css')
    <style>
        .invalid-feedback {
            color: #ff606e;
        }

        .valid-feedback {
            color: #2acc80;
        }

    </style>
@endpush
@push('js')
    <script>
        (function() {
            'use strict'
            const forms = document.querySelectorAll('.requires-validation')
            Array.from(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        $(document).ready(function() {
            $("#show_hide_password a").on("click", function(event) {
                event.preventDefault();
                if ($("#show_hide_password input").attr("type") == "text") {
                    $("#show_hide_password input").attr("type", "password");
                    $("#show_hide_password i").addClass("bx-hide");
                    $("#show_hide_password i").removeClass("bx-show");
                } else if (
                    $("#show_hide_password input").attr("type") == "password"
                ) {
                    $("#show_hide_password input").attr("type", "text");
                    $("#show_hide_password i").removeClass("bx-hide");
                    $("#show_hide_password i").addClass("bx-show");
                }
            });
        });
    </script>
@endpush
