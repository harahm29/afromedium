@extends('layouts.app')
@section('title', 'Profile Setting')

@push('breadcrumb')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

        <div class="ps-3">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
                </ol>
            </nav>
        </div>

    </div>

@endpush

@section('content')

    <div class="container">
        <div class="yoo-uikits-heading">
            <h2 class="yoo-uikits-title">Profile Setting</h2>
        </div>
    </div>
    <div class="yoo-height-b30 yoo-height-lg-b30"></div>

    <div class="main-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form class="row g-3 needs-validation" id="create_user" method="POST"
                        action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($user)
                            <input type="hidden" name="id" value="{{ base64_encode($user->id) }}" />
                        @endif

                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group level-up"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Profile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" name="profile" class="dropify" @if (isset($user))
                                    @if (isset($user->profile))
                                        data-default-file="{{ asset('assets/profile/') . '/' . $user->profile }}"
                                        value="{{ $user->profile }}"
                                    @else
                                        data-default-file="{{ asset('assets/profile/user.jpg') }}"
                                    @endif
                                @else
                                    data-default-file="{{ asset('assets/profile/user.jpg') }}"
                                    @endif
                                    data-min-height="200"
                                    data-max-height="740"
                                    data-min-width="200"
                                    data-max-width="750"
                                    data-max-file-size="1M"
                                    />

                                    @if (isset($user))
                                        @if (isset($user->profile))
                                            <input type="hidden" name="old_profile" value="{{ $user->profile }}">
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="fname" @if ($user) @if ($user->fname) value="{{ $user->fname }}" @endif @endif
                                        id="inputFirstName">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="lname" @if ($user) @if ($user->lname) value="{{ $user->lname }}" @endif @endif
                                        id="inputLastName">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" name="email" @if ($user) @if ($user->email) value="{{ $user->email }}" @endif @endif
                                        id="inputPhone" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="tel" class="form-control" name="phone" maxlength="11" minlength="10"
                                        pattern="\d*" @if ($user) @if ($user->phone) value="{{ $user->phone }}" @endif @endif id="inputPhone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Country</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="country" @if ($user) @if ($user->country) value="{{ $user->country }}" @endif @endif
                                        id="inputcountry">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="city" @if ($user) @if ($user->city) value="{{ $user->city }}" @endif @endif
                                        id="inputCity">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="state" @if ($user) @if ($user->state) value="{{ $user->state }}" @endif @endif
                                        id="inputState">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Zip code</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="zip_code" @if ($user) @if ($user->zip_code) value="{{ $user->zip_code }}" @endif @endif
                                        id="inputZip">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea class="form-control" id="inputAddress" name="address"
                                        placeholder="Address..." rows="3">@if ($user) @if ($user->address){{ $user->address }}@endif @endif</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet"
        href="{{ url('/assets1/plugins/bootstrapvalidator-0.5.2/css/bootstrapValidator.min.css') }}" />
    <link rel="stylesheet" href="{{ url('/assets1/plugins/dropify/css/dropify.min.css') }}" />
@endpush
@push('js')

    <script src="{{ url('/assets1/plugins/bootstrapvalidator-0.5.2/js/bootstrapValidator.min.js') }}"></script>
    <script src="{{ url('/assets1/plugins/dropify/js/dropify.min.js') }}"></script>

    <script>
        $(function() {
            $('#create_user').bootstrapValidator();
            $('.dropify').dropify();
        });
    </script>
@endpush
