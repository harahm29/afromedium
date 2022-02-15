<script>
    $(document).ready(function() {
        unRead();

        setInterval(function() {
        var unread_table_count =$('#unread-totall').val();
        var all_table_count =$('#all-totall').val();
            if (unread_table_count){
                getTotal('unread');
            }
            if(all_table_count){
                getTotal('');
            }
        },12000);

    });

    function unRead() {
        $('#unread-basic-datatable').DataTable().destroy();
        var table= $("#unread-basic-datatable").DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            responsive: true,
            drawCallback: function( settings, start, end, max, total, pre ) {
               $('#unread-totall').val(this.fnSettings().fnRecordsTotal());
            },
            ajax: {
                url: "{{ route('old-message.list') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "unread": 'unread',
                }
            },
            columns: [{
                    data: "id",
                    orderable: false,
                    render: function(data, row, alldata) {


                        return data;
                    },
                    width: "10%",
                },
                {
                    data: "name",
                    orderable: false,
                    render: function(data, row, alldata) {
                        var msg = '';
                        if (alldata.is_new == 1) {
                            msg = '<p class="mb-0 chat-msg"><strong>' + cutString(alldata.msg) +
                                '</strong></p>';
                        } else {
                            msg = '<p class="mb-0 chat-msg">' + cutString(alldata.msg) + '</p>';
                        }
                        var from = '';
                        var to = '';
                        var is_online = '';
                        if (alldata.from_users != null) {
                            from = alldata.from_users.name;
                            if (alldata.from_users.use_as_online == 1) {
                                var is_online = 'chat-user-online';
                            }
                        }
                        if (alldata.to_users != null) {
                            to = alldata.to_users.name;
                        }

                        var user_to_from = "<small>(From " + from + " to " + to + ")</small>";
                        var profile_pic = '';

                        if (alldata.profilem != '' && typeof(alldata.profilem) != "undefined" &&
                            alldata.profilem !== null) {
                            var info = alldata.from_user + "_" + alldata.profilem.photo_id +
                                "_b.jpg"
                            profile_pic =
                                '<img src="https://www.afromedium.nl/_files/photo/' + info +
                                '" width="42" height="42" class="rounded-circle" style="width: 42px !important;height: 42px !important;" alt="">';
                        } else {
                            profile_pic =
                                '<img src="{{ asset('assets/images/avatars/avatar-1.png') }}" width="42" height="42" class="rounded-circle" style="width: 42px !important;height: 42px !important;" alt="">';
                        }
                        // https://https://www.afromedium.nl/_files/photo/"+data.data.user_id+"_"+data.data.profile.photo_id+"_b.jpg";

                        return '<a href="javascript:;" class="list-group-item">' +
                            '<div class="d-flex">' +
                            '<div class="' + is_online + '">' + profile_pic + '</div>' +
                            '<div class="flex-grow-1 ms-2">' +
                            '<h6 class="mb-0 chat-title"><strong class="text-primary">' + data +
                            '</strong> ' + user_to_from + '</h6>' +
                            '<p class="mb-0 chat-msg">' + msg + '</p>' +
                            '</div>' +
                            '<div class="chat-time">' + moment(alldata.born).format(
                                'DD-MM-YYYY,h:mm a') + '</div>' +
                            '</div>' +
                            '</a>';



                    },
                    width: "80%",
                },
                {
                    "data": "id",
                    render: function(data, row, alldata) {
                        var from = '';
                        var to = '';
                        var from_is_online = '';
                        var to_is_online = '';


                        if (alldata.from_users != null) {
                            from = alldata.from_users.name;
                            if (alldata.from_users.use_as_online == 1) {
                                var from_is_online = 'chat-user-online';
                            }
                        }
                        if (alldata.to_users != null) {
                            to = alldata.to_users.name;
                            if (alldata.to_users.use_as_online == 1) {
                                var to_is_online = 'chat-user-online';
                            }
                        }
                        //class view message: view_msg
                        $html =
                            '<a href="javascript:;" data-id="' + btoa(alldata.id) +
                            '" data-to-name="' + to + '" data-from-name="' + from + '"' +
                            ' data-to-user="' + btoa(alldata.to_user) + '" data-from-user="' + btoa(
                                alldata.from_user) + '"' +
                            'data-to-user-online="' + to_is_online + '" data-from-user-online="' +
                            from_is_online + '"' +
                            'class="btn btn-info view_msg" data-bs-toggle="tooltip"' +
                            'data-bs-placement="bottom" data-bs-original-title="View Message"><i class="fas fa-eye me-0"' +
                            'aria-hidden="true"></i></a>';
                        // '<a href="javascript:;"  class="ml-1 btn btn-outline-info view_msg" data-bs-toggle="tooltip"' +
                        // 'data-bs-placement="bottom" data-bs-original-title="User"><i class="bx bx bx-user me-0"' +
                        // 'aria-hidden="true"></i></a>'
                        return $html;
                    },
                    width: "10%",
                }

            ]
        });

       // alert(table.rows().count());

    }



    function cutString(text) {
        var wordsToCut = 20;
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

    $("#all-message").click(function() {
        allMessge();
    });

    function allMessge() {
        $('#all-basic-datatable').DataTable().destroy();
        var table = $("#all-basic-datatable").DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            autoWidth: false, drawCallback: function( settings, start, end, max, total, pre ) {
               $('#all-totall').val(this.fnSettings().fnRecordsTotal());
            },
            ajax: {
                url: "{{ route('old-message.list') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",

                }
            },
            columns: [{
                    data: "id",
                    orderable: false,
                    render: function(data, row, alldata) {


                        return data;
                    },
                    width: "10%",
                },
                {
                    data: "name",
                    orderable: false,
                    render: function(data, row, alldata) {
                        var msg = '';
                        if (alldata.is_new == 1) {
                            msg = '<p class="mb-0 chat-msg"><strong>' + cutString(alldata.msg) +
                                '</strong></p>';
                        } else {
                            msg = '<p class="mb-0 chat-msg">' + cutString(alldata.msg) + '</p>';
                        }
                        var from = '';
                        var to = '';
                        var is_online = '';
                        if (alldata.from_users != null) {
                            from = alldata.from_users.name;
                            if (alldata.from_users.use_as_online == 1) {
                                var is_online = 'chat-user-online';
                            }
                        }
                        if (alldata.to_users != null) {
                            to = alldata.to_users.name;
                        }

                        var user_to_from = "<small>(From " + from + " to " + to + ")</small>";
                        var profile_pic = '';

                        if (alldata.profilem != '' && typeof(alldata.profilem) != "undefined" &&
                            alldata.profilem !== null) {
                            var info = alldata.from_user + "_" + alldata.profilem.photo_id +
                                "_b.jpg"
                            profile_pic =
                                '<img src="https://www.afromedium.nl/_files/photo/' + info +
                                '" width="42" height="42" class="rounded-circle" style="width: 42px !important;height: 42px !important;" alt="">';
                        } else {
                            profile_pic =
                                '<img src="{{ asset('assets/images/avatars/avatar-1.png') }}" width="42" height="42" class="rounded-circle" style="width: 42px !important;height: 42px !important;" alt="">';
                        }
                        // https://https://www.afromedium.nl/_files/photo/"+data.data.user_id+"_"+data.data.profile.photo_id+"_b.jpg";

                        return '<a href="javascript:;" class="list-group-item">' +
                            '<div class="d-flex">' +
                            '<div class="' + is_online + '">' + profile_pic + '</div>' +
                            '<div class="flex-grow-1 ms-2">' +
                            '<h6 class="mb-0 chat-title"><strong class="text-primary">' + data +
                            '</strong> ' + user_to_from + '</h6>' +
                            '<p class="mb-0 chat-msg">' + msg + '</p>' +
                            '</div>' +
                            '<div class="chat-time">' + moment(alldata.born).format(
                                'DD-MM-YYYY,h:mm a') + '</div>' +
                            '</div>' +
                            '</a>';



                    },
                    width: "80%",
                },
                {
                    "data": "id",
                    render: function(data, row, alldata) {
                        var from = '';
                        var to = '';
                        var from_is_online = '';
                        var to_is_online = '';


                        if (alldata.from_users != null) {
                            from = alldata.from_users.name;
                            if (alldata.from_users.use_as_online == 1) {
                                var from_is_online = 'chat-user-online';
                            }
                        }
                        if (alldata.to_users != null) {
                            to = alldata.to_users.name;
                            if (alldata.to_users.use_as_online == 1) {
                                var to_is_online = 'chat-user-online';
                            }
                        }
                        //class view message: view_msg
                        $html =
                            '<button  data-id="' + btoa(alldata.id) +
                            '" data-to-name="' + to + '" data-from-name="' + from + '"' +
                            ' data-to-user="' + btoa(alldata.to_user) + '" data-from-user="' + btoa(
                                alldata.from_user) + '"' +
                            'data-to-user-online="' + to_is_online + '" data-from-user-online="' +
                            from_is_online + '"' +
                            'class="btn btn-info view_msg" data-bs-toggle="tooltip"' +
                            'data-bs-placement="bottom" data-bs-original-title="View Message"><i class="fas fa-eye me-0"' +
                            'aria-hidden="true"></i></button>';
                        // '<a href="javascript:;"  class="ml-1 btn btn-outline-info view_msg" data-bs-toggle="tooltip"' +
                        // 'data-bs-placement="bottom" data-bs-original-title="User"><i class="bx bx bx-user me-0"' +
                        // 'aria-hidden="true"></i></a>'
                        return $html;
                    },
                    width: "10%",
                }

            ]
        });
        return table;
    }

    function getTotal(type=''){
        var iTotalRecords = '';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('old-message.count') }}",
            type: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                "unread": type,
            },
            success: function(data) {
             if(data.unread=='unread'){
                var unread= $('#unread-totall').val();
                if(unread<data.iTotalRecords){
                    unRead();
                }
             }else{
                var all= $('#all-totall').val();
                if(all<data.iTotalRecords){
                    allMessge();
                }

             }
             iTotalRecords =   data.iTotalRecords;
             //var data = JSON.parse(JSON.stringify(data));

            },
            error: function(err) {
                iTotalRecords= 0;
            }
        });
        // ajax call closing
        return  iTotalRecords;

    }


</script>
