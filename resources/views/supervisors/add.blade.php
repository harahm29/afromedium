@extends('layouts.master')
@if ($user)
    @section('title', 'Edit User')
@else
 @section('title', 'Create User')
@endif


@push('breadcrumb')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{ route('supervisor') }}">User management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@if ($user) Edit User @else Create User @endif</li>
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
        <div class="col-xl-12 mx-auto">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">@if ($user) Edit User @else Create User @endif</h5>
                    </div>
                    <hr>
                    <br />
                    <form class="row g-3 needs-validation" id="create_user" method="POST"
                        action="{{ route('user.store') }}" novalidate>
                        @csrf
                        @if ($user)
                            <input type="hidden" name="id" value="{{ base64_encode($user->id) }}" />
                        @endif
                        {{-- <div class="col-md-6">

                            <label for="inputuser_type" class="form-label">Select user type</label>
                            <select id="inputuser_type" name="user_type" class="form-select" required>
                                <option value="">Choose user type</option>
                                <option value="admin" @if ($user) @if ($user->user_type == 'admin') {{ 'selected' }} @endif @endif>Super admin</option>
                                <option value="owner" @if ($user) @if ($user->user_type == 'owner') {{ 'selected' }} @endif @endif>Studio owner</option>

                            </select>
                        </div> --}}
                        <div class="col-md-6" id="admin_rights" @if ($user) @if ($user->user_type == 'owner') style="display:none;" @endif   @endif>
                            <label for="inputuser_type" class="form-label">Assign rights</label>
                            @if ($rights)
                                @if ($user)
                                    @if ($user->rights)
                                        @php
                                            $rights_data = explode(',', $user->rights);
                                        @endphp
                                    @endif
                                @endif
                                @foreach ($rights as $r)

                                    <div class="form-check {{$r->type}}">
                                        <input class="form-check-input" name="rights[]" type="checkbox"
                                            value="{{ $r->id }}" id="flexCheckDefault_{{ $r->id }}"
                                            @if ($user) @if ($user->rights) @if (in_array($r->id, $rights_data)) checked @endif @endif @endif>
                                        <label class="form-check-label"
                                            for="flexCheckDefault_{{ $r->id }}">{{ $r->name }}</label>
                                    </div>

                                @endforeach
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" @if ($user) @if ($user->fname) value="{{ $user->fname }}" @endif @endif
                                id="inputFirstName">
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" @if ($user) @if ($user->lname) value="{{ $user->lname }}" @endif @endif
                                id="inputLastName">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control is-valid" name="email" id="inputEmail"
                                @if ($user) @if ($user->email) value="{{ $user->email }}" @endif @endif required />
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Opps ! Email Already Used.
                            </div>
                        </div>
                        @if (!$user)
                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="inputPassword"
                                    @if ($user) @if ($user->password) value="{{ $user->password }}" @endif @endif required>
                            </div>
                        @endif
                        <div class="col-6">
                            <label for="inputPhone" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" @if ($user) @if ($user->phone) value="{{ $user->phone }}" @endif @endif
                                id="inputPhone">
                        </div>
                        <div class="col-md-6">
                            <label for="inputcountry" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" @if ($user) @if ($user->country) value="{{ $user->country }}" @endif @endif
                                id="inputcountry">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="inputAddress" name="address" placeholder="Address..."
                                rows="3">@if ($user) @if ($user->address){{ $user->address }}@endif @endif</textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" @if ($user) @if ($user->city) value="{{ $user->city }}" @endif @endif id="inputCity">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">State</label>
                            {{-- <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select> --}}
                            <input type="text" class="form-control" name="state" @if ($user) @if ($user->state) value="{{ $user->state }}" @endif @endif
                                id="inputState">
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Zip code</label>
                            <input type="text" class="form-control" name="zip_code" @if ($user) @if ($user->zip_code) value="{{ $user->zip_code }}" @endif @endif
                                id="inputZip">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">@if ($user) Update User @else Create User @endif</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('css')

@endpush

@push('js')

    <script>
        $(document).ready(function() {
            //check the email when load


            $("#inputEmail").blur(function() {
                var email = $('#inputEmail').val();
                var url = '';
                @if (isset($user))
                    url = "{{ url('user/checkemail') }}/{{ $user->id }}"
                @else
                    url = "{{ url('user/checkemail') }}"
                @endif
                checkemail(url, email);

            });
        });
        //check email
        function checkemail(Url, Data) {
            $.ajax({
                type: 'POST',
                url: Url,
                data: {
                    _token: "{{ csrf_token() }}",
                    email: Data
                },
                success: function(data) {
                    console.log(data);
                    if (data.valid == true) {
                        $("#inputEmail").addClass('is-valid');
                        $("#inputEmail").removeClass('is-invalid');

                    } else {
                        $("#inputEmail").addClass('is-invalid');
                        $("#inputEmail").removeClass('is-valid');
                    }
                }
            });
        }
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // $(forms).bootstrapValidator();
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })();


        $(function() {
            //$('#admin_rights').hide();
            $('#inputuser_type').change(function() {
                console.log($('#inputuser_type').val());
                if ($('#inputuser_type').val() == 'admin') {
                    $('#admin_rights').show();
                } else {
                    $('#admin_rights').hide();
                }
            });
        });
    </script>


@endpush
