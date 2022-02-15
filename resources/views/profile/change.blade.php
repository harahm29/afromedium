@extends('layouts.master')
@section('title', 'Change Password')
@push('breadcrumb')
    <h1 class="h3 mb-3">Change Password</h1>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                <a class="list-group-item list-group-item-action " href="{{ route('profile.setting') }}">
                    Account
                </a>
                <a class="list-group-item list-group-item-action active"  href="{{ route('profile.change.pwd') }}" >
                    Password
                </a>

            </div>
        </div>
    </div>

    <div class="col-md-9 col-xl-10">
        <div class="tab-content">

            <div class="tab-pane fade show active" id="password" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Change Password</h5>

                        <form class="needs-validation" id="create_user" method="POST" action="{{ route('profile.change.store') }}">
                         @csrf
                            @if ($user)
                            <input type="hidden" name="id" value="{{ base64_encode($user->id) }}" />
                            @endif

                            <div class="form-group mb-3">
                                <label for="inputPasswordCurrent" class="form-label">Current password</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="inputPasswordCurrent" required>

                            </div>
                            <div class="form-group mb-3">
                                <label for="inputPasswordNew" class="form-label">New password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="inputPasswordNew">
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputPasswordNew2" class="form-label">Verify password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="inputPasswordNew2" required name="confirm_password">
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet"
        href="{{ url('/assets/plugins/bootstrapvalidator-0.5.2/css/bootstrapValidator.min.css') }}" />

@endpush
@push('js')

    <script src="{{ url('/assets/plugins/bootstrapvalidator-0.5.2/js/bootstrapValidator.min.js') }}"></script>
    <script>
        $(function() {
            $('#create_user').bootstrapValidator()
        });
    </script>
@endpush
