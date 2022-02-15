@extends('layouts.master')
@section('title', 'Supervisor View')

@push('breadcrumb')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{ route('supervisor') }}">Supervisors management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View : @if ($user) {{$user->fname." ".$user->lname}} @endif Info</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->

@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/images/avatars/avatar-1.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                    <div class="mt-3">
                        <h4>@if($user) {{$user->fname." ".$user->lname}} @endif</h4>
                        <p class="text-secondary mb-1">@if($user) @if($user->user_type=='admin') {{"Super admin"}} @else {{'Studio owner'}} @endif  @endif</p>
                        <p class="text-muted font-size-sm">@if($user) @if($user->address){{$user->address}},@endif  @if($user->city){{$user->city}},@endif @if($user->state){{$user->state}},@endif @if($user->country){{$user->country}},@endif @if($user->zip_code){{$user->zip_code}}@endif  @endif</p>
                        <p class="text-muted font-size-sm">@if($user) {{$user->email}} @endif</p>
                        <br/>
                        <p class="text-muted font-size-sm">Created at :<b>@if($user) {{$user->created_at}} @endif</b> </p>
                        <button class="btn btn-primary">Follow</button>
                        <button class="btn btn-outline-primary">Message</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
