@extends('layouts.master')
@section('title', 'Profile Setting')

@push('breadcrumb')
    <!--breadcrumb-->
    <h1 class="h3 mb-3">Profile Setting</h1>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
            </ol>
        </nav>
    </div>

@endpush

@section('content')
    <div class="row">
        <div class="col-md-3 col-xl-2">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Settings</h5>
                </div>

                <div class="list-group list-group-flush" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account"
                        role="tab">
                        Account
                    </a>
                    <a class="list-group-item list-group-item-action"  href="{{ route('profile.change.pwd') }}" >
                        Password
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">

                    <div class="card">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Account's Private info</h5>
                        </div>
                        <div class="card-body">
                            <form class="" id="create_user" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                             @csrf
                             @if ($user)
                             <input type="hidden" name="id" value="{{ base64_encode($user->id) }}" />
                             @endif
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="inputProfile" class="form-label">Profile Photo</label>
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
                                    <div class="mb-3 col-md-6">
                                        <label for="inputFirstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="inputFirstName"
                                            placeholder="First name" name="fname" @if ($user) @if ($user->fname) value="{{ $user->fname }}" @endif @endif
                                            >
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="inputLastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="inputLastName"
                                            placeholder="Last name"  name="lname" @if ($user) @if ($user->lname) value="{{ $user->lname }}" @endif @endif>
                                    </div>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" @if ($user) @if ($user->email) value="{{ $user->email }}" @endif @endif required>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputnumber4" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="inputnumber4" placeholder="Phone" name="phone" maxlength="11" minlength="10"
                                    pattern="\d*" @if ($user) @if ($user->phone) value="{{ $user->phone }}" @endif @endif>
                                </div>

                                <div class="mb-3">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" @if ($user) @if ($user->address)value="{{ $user->address }}"@endif @endif>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-3">
                                        <label for="inputCountry" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="inputCountry"  name="country" @if ($user) @if ($user->country) value="{{ $user->country }}" @endif @endif>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" class="form-control" id="inputCity" name="city" @if ($user) @if ($user->city) value="{{ $user->city }}" @endif @endif>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for="inputState" class="form-label">State</label>
                                        <input type="text" class="form-control" id="inputState" name="state" @if ($user) @if ($user->state) value="{{ $user->state }}" @endif @endif>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="inputZip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="inputZip" name="zip_code" @if ($user) @if ($user->zip_code) value="{{ $user->zip_code }}" @endif @endif>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="password" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Password</h5>

                            <form>
                                <div class="mb-3">
                                    <label for="inputPasswordCurrent" class="form-label">Current password</label>
                                    <input type="password" class="form-control" id="inputPasswordCurrent">
                                    <small><a href="#">Forgot your password?</a></small>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPasswordNew" class="form-label">New password</label>
                                    <input type="password" class="form-control" id="inputPasswordNew">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPasswordNew2" class="form-label">Verify password</label>
                                    <input type="password" class="form-control" id="inputPasswordNew2">
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ url('/assets/plugins/bootstrapvalidator-0.5.2/css/bootstrapValidator.min.css') }}" />

    <link rel="stylesheet" href="{{ url('/assets/plugins/dropify/css/dropify.min.css') }}" />

@endpush
@push('js')

    <script src="{{ url('/assets/plugins/bootstrapvalidator-0.5.2/js/bootstrapValidator.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/dropify/js/dropify.min.js') }}"></script>

    <script>
        $(function() {
            $('#create_user').bootstrapValidator();
            $('.dropify').dropify();
        });
    </script>
@endpush
