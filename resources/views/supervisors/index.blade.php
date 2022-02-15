@extends('layouts.master')
@section('title', 'User management')
@push('breadcrumb')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User management</li>
                </ol>
            </nav>
        </div>

                <div class="ms-auto">

                    <a class="btn btn-primary" href="{{ route('supervisor.add') }}">Create Supervisors</a>


                </div>

    </div>

@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatable" class="table dt-responsive" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Supervisor Number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            {{-- @if (Auth::user()->rights)
                                @if (CheckRights(Auth::user()->rights, 4)) --}}
                                    <th>Action</th>
                                {{-- @endif
                            @endif --}}
                        </tr>
                    </thead>
                </table>

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
    $('#example').DataTable();
    });
</script>
<script>
        $(document).ready(function() {

            $("#basic-datatable").DataTable({
                "ajax": "{{ url('supervisor/list') }}",
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "fname"
                    },
                    {
                        "data": "lname"
                    },
                    {
                        "data": "email"
                    },
                    {
                        data: "created_at",
                        orderable: false,
                        render: function(data, row, alldata) {
                            return moment(data).format('DD-MM-YYYY,h:mm a');
                        }
                    }
                    ,{
                            "data": "id",
                            render:function(data, row, alldata ){
                            $html = '<a href="{{ url('supervisor/add') }}/'+btoa(data)+'" class="btn btn-outline-success"'+
                                'data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Edit"'+
                                'aria-describedby="tooltip482041"><i class="me-0 bx bx-edit"></i></a> '+
                            '<button type="button" class="btn btn-outline-danger  delete-record" data-id="'+data+'" data-toggle="tooltip"'+
                            'data-placement="top" title="" data-original-title="Delete">'+
                            '<i class="me-0 bx bx-trash"></i>'+
                            '</button>'+
                            ' <a href="{{ url('supervisor/view') }}/'+btoa(data)+'" class="btn btn-outline-info" data-bs-toggle="tooltip"'+
                            'data-bs-placement="bottom" data-bs-original-title="Login Details"><i class="bx bx-info-square me-0"'+
                            'aria-hidden="true"></i></a>';
                            return $html;
                            }
                            }

                ],
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    },
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                    $(function() {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
                }
            });

        });
        $(document).on('click', '.delete-record', function() {
            var id = $(this).attr("data-id");
            console.log(id);
            window.swal({
                    title: "Are you sure went to delete Supervisor?",
                    text: "You will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            type: "POST",
                            url: "{{ route('supervisor.destroy') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: btoa(id)
                            },
                            success: function(data) {
                                console.log(data);
                                var newData = JSON.parse(data);
                                if (data == 'false') {
                                    swal("Error", "Supervisor has been deleted!", {
                                        icon: "error",
                                    });
                                } else {
                                    $('#basic-datatable').DataTable().ajax.reload();
                                    swal("Success", "Supervisor has been deleted!", {
                                        icon: "success",
                                    });
                                }
                            }
                        });
                    } else {
                        swal("Cancelled", "Your User is safe!");
                    }
                });


        });

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
