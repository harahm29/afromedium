@extends('layouts.master')
@section('title', 'Inbox')
@push('breadcrumb')
<h1 class="h3 mb-3">Fakes IM Inbox</h1>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Fakes IM Inbox </li>
                </ol>
            </nav>
    </div>
@endpush
@section('content')

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-primary" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-message-x font-18 me-1"></i>
                            </div>
                            <div class="tab-title">Unread Messages</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" id="all-message" href="#primaryprofile" role="tab"
                        aria-selected="false">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-message-check font-18 me-1"></i>
                            </div>
                            <div class="tab-title">All Messages</div>
                        </div>
                    </a>
                </li>

            </ul>
            <div class="tab-content py-3">
                <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                    <div class="table-responsive">
                        <input type="hidden" id="unread-totall" />
                        <table id="unread-basic-datatable" class="table table-striped chat-list"  
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>Name</th>
                                    {{-- <th>Assign user</th> --}}

                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                    <div class="table-responsive">
                        <input type="hidden" id="all-totall" />
                        <table id="all-basic-datatable" class="table table-striped chat-list "
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('apimessage.model')
@endsection

@push('css')
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@push('js')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    {{-- <script>
        new PerfectScrollbar('.chat-list');
        new PerfectScrollbar('.chat-content');
        @if ($user)
            var appuser = @json($user);
        @else
            var appuser={};
        @endif
    </script> --}}

    @include('apimessage.js.datatablejs');
    @include('apimessage.js.js');

@endpush
