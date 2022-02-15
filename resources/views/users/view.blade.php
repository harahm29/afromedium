@extends('layouts.master')
@section('title', 'User View')

@push('breadcrumb')
    <!--breadcrumb-->
    <h1 class="h3 mb-3">View : @if ($user) {{ $user->fname . ' ' . $user->lname }} @endif Info</h1>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{ route('user.index') }}">User Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">View : @if ($user) {{ $user->fname . ' ' . $user->lname }} @endif Info</li>
            </ol>
        </nav>
    </div>
    <!--end breadcrumb-->

@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                    @if ($user)
                        <img src="{{ asset('assets/profile/') . '/' . $user->profile }}" alt="@if ($user) {{ $user->fname . ' ' . $user->lname }} @endif"
                            class="img-fluid rounded-circle mb-2" width="128" height="128" />
                    @else
                        <img src="{{ asset('assets/profile/user.jpg') }}" alt="@if ($user) {{ $user->fname . ' ' . $user->lname }} @endif"
                            class="img-fluid rounded-circle mb-2" width="128" height="128" />
                    @endif
                    <h5 class="card-title mb-0">@if ($user) {{ $user->fname . ' ' . $user->lname }} @endif</h5>

                    @if ($user)
                        @if ($user->user_type == 'main')
                            <div class="text-muted mb-2">Account:Master Admin</div>
                        @else
                            @if ($user->user_id)
                                @if (findUser($user->user_id))
                                    <div class="text-muted mb-2">Account:{{ findUser($user->user_id) }}
                                    </div>
                                @endif
                            @endif

                        @endif
                        @if ($user->user_type == 'admin' || $user->user_type == 'main')
                            <div class="text-muted mb-2">Role:Super Admin</div>
                        @elseif($user->user_type == 'supervisor')
                            <div class="text-muted mb-2">Role:Supervisor</div>
                        @elseif($user->user_type == 'owner')
                            <div class="text-muted mb-2">Role:Studio Owner</div>
                        @elseif($user->user_type == 'user')
                            <div class="text-muted mb-2">Role:User</div>
                        @else
                            <div class="text-muted mb-2">Role:Sub user</div>
                        @endif
                    @endif
                    <div>
                        <a class="btn btn-primary btn-sm" href="#">Follow</a>
                        <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
                    </div>
                </div>
                <hr class="my-0" />
                {{-- <div class="card-body">
                    <h5 class="h6 card-title">Skills</h5>
                    <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
                    <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Sass</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Angular</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Vue</a>
                    <a href="#" class="badge bg-primary me-1 my-1">React</a>
                    <a href="#" class="badge bg-primary me-1 my-1">Redux</a>
                    <a href="#" class="badge bg-primary me-1 my-1">UI</a>
                    <a href="#" class="badge bg-primary me-1 my-1">UX</a>
                </div>
                <hr class="my-0" /> --}}
                <div class="card-body">
                    <h5 class="h6 card-title">About</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a
                                href="#">@if ($user) @if ($user->address){{ $user->address }},@endif  @if ($user->city){{ $user->city }},@endif @if ($user->state){{ $user->state }},@endif @if ($user->country){{ $user->country }},@endif @if ($user->zip_code){{ $user->zip_code }}@endif  @endif</a></li>

                        <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Created at
                            <a href="#">@if ($user) {{ $user->created_at }} @endif</a>
                        </li>
                        <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a
                                href="#">Boston</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

@endsection
