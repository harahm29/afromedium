@extends('layouts.master')
@section('title', 'User management')
@push('breadcrumb')
    <!--breadcrumb-->
    <h1 class="h3 mb-3">User management</h1>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User management</li>
                </ol>
            </nav>
    </div>

@endpush

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h5 class="card-title">User managements</h5> --}}
                    {{-- <h6 class="card-subtitle text-muted"> .</h6> --}}
                    <div class="d-lg-flex align-items-center gap-3">

                        <div class="ms-auto">
                          @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
                              @if (CheckRights(Auth::user()->rights, 2)||CheckRights(Auth::user()->rights, 4))
                              <a href="{{ route('user.add') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Create User</a>
                              @endif
                          @else
                              <a href="{{ route('user.add') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Create User</a>
                          @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <table id="basic-datatable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>User Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
                                    <th>Type</th>
                                @endif
                                <th>Email</th>
                                @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
                                    @if (CheckRights(Auth::user()->rights, 2)||CheckRights(Auth::user()->rights, 4))
                                    <th>Action</th>
                                    @endif
                                @endif

                                @if (Auth::user()->user_type == 'owner')
                                    <th>Action</th>
                                @endif

                                @if(Auth::user()->user_type == 'supervisor' )
                                @if (CheckRights(Auth::user()->rights, 7))
                                    <th>Action</th>
                                @endif
                                @endif


                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>


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

    <script>
        $(document).ready(function() {
            '';
            var table = $("#basic-datatable").DataTable({
                "responsive": true,
                "ajax": "{{ route('user.list') }}",
                "columns": [{
                        "data": "id",render: function(data, row, alldata) {
                            var img= "";
                            if(alldata.profile){
                                var img= "{{ asset('assets/profile')}}/"+alldata.profile;
                            }else{
                                var img= "{{ asset('assets/profile/user.jpg')}}";
                            }
                            $html = '<img src="'+img+'" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"> UserID:'+data;
                            return $html;
                        }
                    },
                    {
                        "data": "fname"
                    },
                    {
                        "data": "lname"
                    },
                    @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
                        { "data": "user_type",
                        render: function(data, row, alldata) {
                            var user_type ='';
                            if(data== 'admin' ||data== 'main'){
                                user_type ='Super Admin';
                            }else if(data== 'supervisor'){
                                user_type ='Moderator';
                            }else if(data== 'owner'){
                                user_type ='Studio Owner';
                            }else if(data== 'user'){
                                user_type ='Sub-Moderator';
                            }else{
                                user_type ='Sub user';
                            }
                            return user_type;
                        }},
                    @endif {
                        "data": "email"
                    },
                    @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
                    @if (CheckRights(Auth::user()->rights, 2)||CheckRights(Auth::user()->rights, 4))
                    {
                        "data": "id",
                        render: function(data, row, alldata) {
                            $html = '<a href="{{ url('admin/user/add') }}/' + btoa(data) +
                                '" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-original-title="Edit"><i class="fas fa-edit"></i></a> ' +
                                ' <a href="{{ url('admin/user/view') }}/' + btoa(data) +
                                '" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details" data-bs-original-title="View Details"><i class="fas fa-info"></i></a>';
                            return $html;
                        }
                    }
                    @endif
                    @endif
                    @if(Auth::user()->user_type == 'owner')
                    {
                        "data": "id",
                        render: function(data, row, alldata) {
                            $html = '<a href="{{ url('admin/user/add') }}/' + btoa(data) +
                                '" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-original-title="Edit"><i class="fas fa-edit"></i></a> ' +
                                ' <a href="{{ url('admin/user/view') }}/' + btoa(data) +
                                '" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details" data-bs-original-title="View Details"><i class="fas fa-info"></i></a>';
                            return $html;
                        }
                    }
                    @endif
                    @if(Auth::user()->user_type == 'supervisor' )
                    @if (CheckRights(Auth::user()->rights, 7))
                    {
                        "data": "id",
                        render: function(data, row, alldata) {
                            $html = '<a href="{{ url('admin/user/add') }}/' + btoa(data) +
                                '" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit" data-bs-original-title="Edit"><i class="fas fa-edit"></i></a> ' +
                                ' <a href="{{ url('admin/user/view') }}/' + btoa(data) +
                                '" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details" data-bs-original-title="View Details"><i class="fas fa-info"></i></a>';
                            return $html;
                        }
                    }
                    @endif
                    @endif
                ]
            });
            // table.buttons().container().appendTo( '#example2_wrapper .col-md-6:eq(0)' );

        });

        // '<button type="button" class="btn btn-outline-danger  delete-record" data-id="' +
        //                         data +
        //                         '" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">' +
        //                         '<i class="me-0 bx bx-trash"></i>' +
        //                         '</button>' +
        // $(document).on('click', '.delete-record', function() {
        //     var id = $(this).attr("data-id");
        //     console.log(id);
        //     window.swal({
        //             title: "Are you sure went to delete User?",
        //             text: "You will not be able to recover this Data!",
        //             icon: "warning",
        //             buttons: true,
        //             dangerMode: true,
        //         })
        //         .then((willDelete) => {
        //             if (willDelete) {

        //                 $.ajax({
        //                     type: "POST",
        //                     url: "{{ route('user.destroy') }}",
        //                     data: {
        //                         _token: '{{ csrf_token() }}',
        //                         id: btoa(id)
        //                     },
        //                     success: function(data) {
        //                         console.log(data);
        //                         var newData = JSON.parse(data);
        //                         if (data == 'false') {
        //                             swal("Error", "User has been deleted!", {
        //                                 icon: "error",
        //                             });
        //                         } else {
        //                             $('#basic-datatable').DataTable().ajax.reload();
        //                             swal("Success", "User has been deleted!", {
        //                                 icon: "success",
        //                             });
        //                         }
        //                     }
        //                 });
        //             } else {
        //                 swal("Cancelled", "Your User is safe!");
        //             }
        //         });


        // });

        function cutString(text) {
            var wordsToCut = 5;
            var wordsArray = text.split(" ");
            if (wordsArray.length > wordsToCut) {
                var strShort = "";
                for (i = 0; i < wordsToCut; i++) {
                    strShort += wordsArray[i] + " ";
                }
                return strShort + "...";
            } else {
                return text;
            }
        };
    </script>
@endpush
