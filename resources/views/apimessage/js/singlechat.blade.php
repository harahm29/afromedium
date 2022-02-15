<script >
    $(document).ready(function() {
        $('#loading').show();
        get_info();
        $("#text_message").prop("disabled", true);
        $("#send_messgae").prop("disabled", true);

        setInterval(function() {
            if ($('.modal.show').length) {
                var id = $('#text_last').val();
                var from_user = $('#text_from').val();
                var to_user = $('#text_to').val();
                var type = $('#text_type').val();
                get_info();
                //getMessages(id, from_user, to_user, type, 1);
            }
        }, 12000);
        //new message
        $('#text_message').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                send_msg();
            }
        });

    });

    function get_info() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('chat.info') }}",
            type: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                "user_id": "{{ Auth::user()->id }}",
            },
            success: function(data) {
                console.log('hey');
                var data = JSON.parse(JSON.stringify(data));
                if (data.error == '') {
                    $('#chat-div').show();
                    $('#balnk-div').hide();
                    $('#blank-alert').hide();
                    var id = btoa(data.data.msg.id);
                    var to = data.data.msg.to_users.name;
                    var from = data.data.msg.from_users.name;
                    var to_user = btoa(data.data.msg.from_user);
                    var from_user = btoa(data.data.msg.to_user);
                    $("#to_u_profile_url").attr("href",
                        "https://afromedium.nl/search_results.php?display=profile&amp;uid=" + atob(
                            to_user));
                    $("#from_u_profile_url").attr("href",
                        "https://afromedium.nl/search_results.php?display=profile&amp;uid=" + atob(
                            from_user));

                    //note
                    $("#to_note_modal").attr("data-user-id", atob(from_user));
                    $("#to_note_modal").attr("data-user-type", 'to');
                    $("#from_note_modal").attr("data-user-id", atob(to_user));
                    $("#from_note_modal").attr("data-user-type", 'from');

                    getUser(to_user, 'from');
                    get_note(atob(to_user), 'from');

                    getUser(from_user, 'to');
                    get_note(atob(from_user), 'to');

                    $('#text_last').val(id);
                    $('#text_from').val(from_user);
                    $('#text_to').val(to_user);
                    $('#text_name').val(to);
                    $('#from_user').text(from);
                    $('#to_user').text(to);

                    getMessages(id, to_user, from_user, 200, 1);

                } else {
                    //$('#loading').show();
                    // swal("Error", data.error, {
                    //     icon: "error",
                    // });
                    $('#chat-div').hide();
                    $('#balnk-div').show();
                    $('#blank-alert').show();
                }
            },
            error: function(err) {
                swal("Error", err, {
                    icon: "error",
                });
                $('#loading').hide();
                $('#chat-div').hide();
                $('#balnk-div').show();
                $('#blank-alert').show();
            }
        });

    }

    function getUser(id, type) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('old-message.getuser') }}",
            type: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data) {
                var data = JSON.parse(JSON.stringify(data));
                if (data.error == '') {
                    if (type == 'to') {
                        $('#to_u_profile_url').text("player");
                        //gender
                        if (data.data.gender != '') {

                            if (data.data.gender == 'M') {
                                $('#to_gendar').text('Male,');
                            } else {
                                $('#to_gendar').text('Female,');
                            }
                        }
                        //age
                        var to_dob = data.data.birth;
                        if (to_dob != '') {
                            var to_age = moment().diff(moment(to_dob, 'YYYY-MM-DD'), 'years');
                            $('#to_age').text(to_age + ' years old');
                        }
                        //location
                        var to_location = '';
                        if (data.data.city) {
                            to_location += data.data.city;
                        }
                        if (data.data.state) {
                            to_location += ', ' + data.data.state;
                        }

                        if (data.data.country) {
                            to_location += ', ' + data.data.country;
                        }
                        $('#to-location').text(to_location);
                        var to_profile_pic = "";
                        if (data.data.profile != '' && typeof(data.data.profile) != "undefined") {
                            if (data.data.profile.photo_id != '' && typeof(data.data.profile.photo_id) !=
                                "undefined") {
                                to_profile_pic = "https://afromedium.nl/_files/photo/" + data.data
                                    .user_id + "_" + data.data.profile.photo_id + "_b.jpg";
                                $("#to_profile_pic").attr("src", to_profile_pic);
                            }
                        }

                        //status
                        if (data.data.uinfo != '' && typeof(data.data.uinfo) != "undefined" && data.data
                            .uinfo !== null) {
                            if (data.data.uinfo.statusa != '' && typeof(data.data.uinfo.statusa) !=
                                "undefined" && data.data
                                .uinfo.statusa !== null) {
                                if (data.data.uinfo.statusa.title != '' && typeof(data.data.uinfo.statusa
                                        .title) != "undefined") {
                                    $('#to_status').text(data.data.uinfo.statusa.title);
                                }
                            }

                            //sexualitys
                            if (data.data.uinfo.sexualitys != '' && typeof(data.data.uinfo.sexualitys) !=
                                "undefined" && data.data
                                .uinfo.sexualitys !== null) {
                                if (data.data.uinfo.sexualitys.title != '' && typeof(data.data.uinfo
                                        .sexualitys.title) != "undefined") {
                                    $('#from_sexuality').text(data.data.uinfo.sexualitys.title);
                                }
                            }

                            //weight
                            if (data.data.uinfo.weights != '' && typeof(data.data.uinfo.weights) !=
                                "undefined" && data.data.uinfo.weights !== null) {
                                if (data.data.uinfo.weights.title != '' && typeof(data.data.uinfo.weights
                                        .title) != "undefined") {
                                    $('#from_weight').text(data.data.uinfo.weights.title);
                                }
                            }

                            //bodys
                            if (data.data.uinfo.bodys != '' && typeof(data.data.uinfo.bodys) !=
                                "undefined" && data.data.uinfo.bodys !== null) {
                                if (data.data.uinfo.bodys.title != '' && typeof(data.data.uinfo.bodys
                                        .title) != "undefined") {
                                    $('#from_body').text(data.data.uinfo.bodys.title);
                                }
                            }

                            //hair
                            if (data.data.uinfo.hairs != '' && typeof(data.data.uinfo.hairs) !=
                                "undefined" && data.data.uinfo.hairs !== null) {
                                if (data.data.uinfo.hairs.title != '' && typeof(data.data.uinfo.hairs
                                        .title) != "undefined") {
                                    $('#from_hair').text(data.data.uinfo.hairs.title);
                                }
                            }


                            //eyes
                            if (data.data.uinfo.eyes != '' && typeof(data.data.uinfo.eyes) != "undefined" &&
                                data.data.uinfo.eyes !== null) {
                                if (data.data.uinfo.eyes.title != '' && typeof(data.data.uinfo.eyes
                                        .title) != "undefined") {
                                    $('#from_eyes').text(data.data.uinfo.eyes.title);
                                }
                            }


                            //familys
                            if (data.data.uinfo.familys != '' && typeof(data.data.uinfo.familys) !=
                                "undefined" && data.data.uinfo.familys !== null) {
                                if (data.data.uinfo.familys.title != '' && typeof(data.data.uinfo.familys
                                        .title) != "undefined") {
                                    $('#from_family').text(data.data.uinfo.familys.title);
                                }
                            }


                            //smokings
                            if (data.data.uinfo.smokings != '' && typeof(data.data.uinfo.smokings) !=
                                "undefined" && data.data.uinfo.smokings !== null) {
                                if (data.data.uinfo.smokings.title != '' && typeof(data.data.uinfo.smokings
                                        .title) != "undefined") {
                                    $('#from_smoking').text(data.data.uinfo.smokings.title);
                                }
                            }


                            //drinkings
                            if (data.data.uinfo.drinkings != '' && typeof(data.data.uinfo.drinkings) !=
                                "undefined" && data.data.uinfo.drinkings !== null) {
                                if (data.data.uinfo.drinkings.title != '' && typeof(data.data.uinfo
                                        .drinkings.title) != "undefined") {
                                    $('#from_drinker').text(data.data.uinfo.drinkings.title);
                                }
                            }

                            //educations
                            if (data.data.uinfo.educations != '' && typeof(data.data.uinfo.educations) !=
                                "undefined" && data.data.uinfo.educations !== null) {
                                if (data.data.uinfo.educations.title != '' && typeof(data.data.uinfo
                                        .educations.title) != "undefined") {
                                    $('#from_education').text(data.data.uinfo.educations.title);
                                }
                            }

                            //About
                            if (data.data.uinfo.about_me != '' && typeof(data.data.uinfo.about_me) !=
                                "undefined") {
                                $('#from_about').text(data.data.uinfo.about_me);
                            }


                            //interested
                            if (data.data.uinfo.interested_in != '' && typeof(data.data.uinfo
                                    .interested_in) != "undefined") {
                                $('#from_interested').text(data.data.uinfo.interested_in);
                            }
                        }

                    }
                    if (type == 'from') {

                        $('#from_u_profile_url').text("customer");
                        if (data.data.gender != '') {
                            if (data.data.gender == 'M') {
                                $('#from_gendar').text('Male,');
                            } else {
                                $('#from_gendar').text('Female,');
                            }
                        }

                        //age

                        var from_dob = data.data.birth;
                        if (from_dob != '') {
                            // console.log(from_dob);
                            var from_age = moment().diff(moment(from_dob, 'YYYY-MM-DD'), 'years');
                            // console.log(from_age);
                            $('#from_age').text(from_age + ' years old');
                        }


                        //location
                        var from_location = '';
                        if (data.data.city) {
                            from_location += data.data.city;
                        }
                        if (data.data.state) {
                            from_location += ', ' + data.data.state;
                        }

                        if (data.data.country) {
                            from_location += ', ' + data.data.country;
                        }
                        $('#to-location').text(from_location);

                        //profile
                        var from_profile_url = "";
                        console.log(data.data.profile);
                        if (data.data.profile != '' && typeof(data.data.profile) != "undefined" && data.data.profile != null) {
                            if (data.data.profile.photo_id != '' && typeof(data.data.profile.photo_id) !=
                                "undefined") {
                                from_profile_url = "https://afromedium.nl/_files/photo/" + data.data
                                    .user_id + "_" + data.data.profile.photo_id + "_b.jpg";
                                $("#from_profile_pic").attr("src", from_profile_url);
                            } else {

                            }
                        }
                        //status
                        if (data.data.uinfo != '' && typeof(data.data.uinfo) != "undefined" && data.data
                            .uinfo !== null) {
                            if (data.data.uinfo.statusa != '' && typeof(data.data.uinfo.statusa) !=
                                "undefined" && data.data.uinfo.statusa !== null) {
                                if (data.data.uinfo.statusa.title != '' && typeof(data.data.uinfo.statusa
                                        .title) != "undefined") {
                                    $('#to_status').text(data.data.uinfo.statusa.title);
                                }
                            }

                            //sexualitys
                            if (data.data.uinfo.sexualitys != '' && typeof(data.data.uinfo.sexualitys) !=
                                "undefined" && data.data.uinfo.sexualitys !== null) {
                                console.log(data.data.uinfo.sexualitys.title);
                                if (data.data.uinfo.sexualitys.title != '' && typeof(data.data.uinfo
                                        .sexualitys.title) != "undefined") {
                                    $('#to_sexuality').text(data.data.uinfo.sexualitys.title);
                                }
                            }

                            //weight

                            if (data.data.uinfo.weights != '' && typeof(data.data.uinfo.weights) !=
                                "undefined" && data.data.uinfo.weights !== null) {
                                if (data.data.uinfo.weights.title != '' && typeof(data.data.uinfo
                                        .weights.title) != "undefined") {
                                    $('#to_weight').text(data.data.uinfo.weights.title);
                                }
                            }

                            //bodys
                            if (data.data.uinfo.bodys != '' && typeof(data.data.uinfo.bodys) !=
                                "undefined" && data.data.uinfo.bodys !== null) {
                                if (data.data.uinfo.bodys.title != '' && typeof(data.data.uinfo
                                        .bodys.title) != "undefined") {
                                    $('#to_body').text(data.data.uinfo.bodys.title);
                                }
                            }

                            //hair
                            if (data.data.uinfo.hairs != '' && typeof(data.data.uinfo.hairs) !=
                                "undefined" && data.data.uinfo.hairs !== null) {
                                if (data.data.uinfo.hairs.title != '' && typeof(data.data.uinfo.hairs
                                        .title) != "undefined") {
                                    $('#to_hair').text(data.data.uinfo.hairs.title);
                                }
                            }


                            //eyes
                            if (data.data.uinfo.eyes != '' && typeof(data.data.uinfo.eyes) != "undefined" &&
                                data.data.uinfo.eyes !== null) {
                                if (data.data.uinfo.eyes.title != '' && typeof(data.data.uinfo.eyes
                                        .title) != "undefined") {
                                    $('#to_eyes').text(data.data.uinfo.eyes.title);
                                }
                            }


                            //familys
                            if (data.data.uinfo.familys != '' && typeof(data.data.uinfo.familys) !=
                                "undefined" && data.data.uinfo.familys !== null) {
                                if (data.data.uinfo.familys.title != '' && typeof(data.data.uinfo.familys
                                        .title) != "undefined") {
                                    $('#to_family').text(data.data.uinfo.familys.title);
                                }
                            }


                            //smokings
                            if (data.data.uinfo.smokings != '' && typeof(data.data.uinfo.smokings) !=
                                "undefined" && data.data.uinfo.smokings !== null) {
                                if (data.data.uinfo.smokings.title != '' && typeof(data.data.uinfo.smokings
                                        .title) != "undefined") {
                                    $('#to_smoking').text(data.data.uinfo.smokings.title);
                                }
                            }


                            //drinkings
                            if (data.data.uinfo.drinkings != '' && typeof(data.data.uinfo.drinkings) !=
                                "undefined" && data.data.uinfo.drinkings !== null) {
                                if (data.data.uinfo.drinkings.title != '' && typeof(data.data.uinfo
                                        .drinkings.title) != "undefined") {
                                    $('#to_drinker').text(data.data.uinfo.drinkings.title);
                                }
                            }

                            //educations
                            if (data.data.uinfo.educations != '' && typeof(data.data.uinfo.educations) !=
                                "undefined" && data.data.uinfo.educations !== null) {
                                if (data.data.uinfo.educations.title != '' && typeof(data.data.uinfo
                                        .educations.title) != "undefined") {
                                    $('#to_education').text(data.data.uinfo.educations.title);
                                }
                            }

                            //About
                            if (data.data.uinfo.about_me != '' && typeof(data.data.uinfo.about_me) !=
                                "undefined") {
                                $('#to_about').text(data.data.uinfo.about_me);
                            }


                            //interested
                            if (data.data.uinfo.interested_in != '' && typeof(data.data.uinfo
                                    .interested_in) != "undefined") {
                                $('#to_interested').text(data.data.uinfo.interested_in);
                            }

                        }



                    }
                } else {
                    swal("Error", data.error, {
                        icon: "error",
                    });
                    $('#loading').hide();
                }

            },
            error: function(err) {
                swal("Error", err, {
                    icon: "error",
                });
                $('#loading').hide();
            }
        });

    }

    function sort_by(field, reverse, primer) {

        const key = primer ?
            function(x) {
                return primer(x[field])
            } :
            function(x) {
                return x[field]
            };

        reverse = !reverse ? 1 : -1;

        return function(a, b) {
            return a = key(a), b = key(b), reverse * ((a > b) - (b > a));
        }
    }

    function getMessages(id, from_user, to_user, limit, type = 1) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('old-message.view') }}",
            type: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "from_user": from_user,
                "to_user": to_user,
                'limit': limit
            },
            success: function(data) {
                var $html = '';
                var data = JSON.parse(JSON.stringify(data));
                if (data.error == '') {
                    $("#text_message").prop("disabled", false);
                    $("#send_messgae").prop("disabled", false);
                    var total = $('#text_total_count').val();
                    if (total != data.data.total_count) {
                        $('#chat-content').html($html);
                        var resultArray = $.map(data.data.data, function(value, index) {
                            return [value];
                        });
                        resultArray.sort().reverse();
                        $.each(resultArray, function(key, value) {
                            //console.log(key);
                            if (key == 0) {
                                if (type == 1) {
                                    if (data.data.length > 50) {
                                        $html +=
                                            '<div class=" text-center text-primary"><a class="readmore" href="javascript:;">Read more..</a></div>';
                                    }
                                }
                            }

                            if (atob(to_user) == value.from_user) {
                                // $html += ' <div class="chat-content-leftside">' +
                                //     ' <div class="d-flex">' +
                                //     '<div class="flex-grow-1 ms-2">' +
                                //     '<p class="mb-0 chat-time">' + value.from_users.name + ' ' +
                                //     moment(value.born).format('DD-MM-YYYY,h:mm a') + '</p>' +
                                //     '<p class="chat-left-msg">' + value.msg + '</p>' +
                                //     '</div>' +
                                //     '</div>' +
                                //     '</div>';

                                    $html += '<div class="chat-message-left pb-4">'+
                                    '<div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">'+
                                    '<div class="fw-bold mb-1">'+value.from_users.name+'</div>'+value.msg+
                                    '<div class="text-muted small text-nowrap mt-2">'+moment(value.born).format('DD-MM-YYYY,h:mm a')+'</div></div></div>';

                            } else {

                                // $html += '<div class="chat-content-rightside">' +
                                //     '<div class="d-flex ms-auto">' +
                                //     '<div class="flex-grow-1 me-2">' +
                                //     '<p class="mb-0 chat-time text-end">' + value.from_users.name +
                                //     ' ' + moment(value.born).format('DD-MM-YYYY,h:mm a') + '</p>' +
                                //     '<p class="chat-right-msg">' + value.msg + '</p>' +
                                //     '</div>' +
                                //     '</div>' +
                                //     '</div>';

                                    $html +=  '<div class="chat-message-right pb-4">'+
                                    '<div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">'+
                                    '<div class="fw-bold mb-1">'+value.from_users.name+'</div>'+value.msg+
                                    '<div class="text-muted small text-nowrap mt-2">'+ moment(value.born).format('DD-MM-YYYY,h:mm a')+'</div></div></div>';


                            }
                        });
                        $('#text_total_count').val(data.data.total_count);
                        $('#chat-content').html($html);
                        var $t = $('#chat-content');
                        $('#loading').hide();
                        $t.animate({
                            "scrollTop": $('#chat-content')[0].scrollHeight
                        }, "slow");
                    }
                }
            },
            error: function(err) {
                swal("Error", err, {
                    icon: "error",
                });
                $('#loading').hide();
            }
        }); // ajax call closing



    }

    $(document).on('click', '.readmore', function() {
        var id = $('#text_last').val();
        var from_user = $('#text_from').val();
        var to_user = $('#text_to').val();
        $('#text_type').val('All');
        getMessages(id, from_user, to_user, 'All', 2);

    });

    $(document).on('click', '#send_messgae', function() {
        send_msg();
    });

    function send_msg() {
        var From = atob($('#text_to').val());
        var To = atob($('#text_from').val());
        //var From =11;
        //var To = 6;
        var Id = atob($('#text_last').val());
        var Text = $('#text_message').val();
        var Name = $('#text_name').val();
        console.log(From, To);
        if (Text != '' && typeof(Text) != "undefined" && Text !== null) {
            $('#text_message_error').hide();
            if (From != '' && typeof(From) != "undefined" && From !== null && To != '' && typeof(To) != "undefined" &&
                To !== null) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('old-message.send') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": Id,
                        "from_user": To,
                        "to_user": From,
                        "msg": Text,
                        "name": Name,
                        "system": 0,
                        "user_id": "{{ Auth::user()->id }}"

                    },
                    success: function(data) {
                        var data = JSON.parse(JSON.stringify(data));
                        if (data.error == '') {
                            $('#text_message').val('');
                            getMessages(btoa(Id), btoa(From), btoa(To), 200, 1);
                            $("#text_message").prop('disabled', true);
                            $("#send_messgae").prop('disabled', true);
                            // swal({
                            //     title: "Success!",
                            //     text: data.message,
                            //     type: "success"
                            // }).then(function() {
                            // });
                            get_info();
                        } else {
                            swal("Error", "Message not sent Successfully!", {
                                icon: "error",
                            });
                        }
                    },
                    error: function(err) {
                        swal("Error", err, {
                            icon: "error",
                        });
                        $('#loading').hide();
                    }
                }); // ajax call closing
            } else {
                swal("Error", "Please refresh the page!", {
                    icon: "error",
                });
            }
        } else {
            $('#text_message_error').show();
        }

    }
    //note
    function get_note(uid, type) {
        //
        if (uid != '' && typeof(uid) != "undefined" && uid !== null) {
            //console.log('uid:'+uid);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('notes.list') }}",
                type: "POST",
                dataType: "json",
                // processData: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": uid,
                },
                success: function(data) {
                    var data = JSON.parse(JSON.stringify(data));
                    if (data.error == '') {

                        var $html = '';
                        $.each(data.data, function(key, value) {
                            if (value.id) {
                                if (value.type != '') {
                                    $html +=
                                        '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">' +
                                        '<h6 class="mb-0">' + value.type + ':</h6>' +
                                        '<p class="text-secondary" >' + value.eng_text +
                                        '</p>' +
                                        '</li>';
                                }
                                // else{

                                //     $html +=
                                //         '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">' +
                                //         '<h6 class="mb-0">' + value.type + ':</h6>' +
                                //         '<p class="text-secondary" >' + value.eng_text +
                                //         '</p>' +
                                //         '<a href="{{asset("/assets/note")}}/'+value.dutch_text+'" target="_blank"><embed src="{{asset("/assets/note")}}/'+value.dutch_text+'" width="120" height="120" alt="'+value.type+'" class="img-fluid rounded-end"></a>'
                                //         '</li>';
                                // }
                            }
                        });

                        //user_to_notes
                        if (type == 'to') {
                            $('#user_to_notes').html('');
                            $('#user_to_notes').html($html);
                        } else {
                            $('#user_from_notes').html('');
                            $('#user_from_notes').html($html);
                        }

                    }
                },
                error: function(err) {
                    swal("Error", err, {
                        icon: "error",
                    });
                    $('#loading').hide();
                }
            });
        }
    }

    function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    }

    $("#note_type").change(function() {

        //$(".dropify-clear").trigger("click");
        $('textarea#eng_note_text').text('');
        $('textarea#eng_note_text').val('');
        $('#note_number').val('');
        $('#note_email').val('');
        if (this.value == 'general' || this.value == 'occupation' || this.value == 'education' || this.value ==
            'location' || this.value == 'transportation') {
            $('.note_cat_type').hide();
            $('.genral').show();
            $('.ntexttype').text(this.value);
            $('#note_user_type_error').hide();
        } else if (this.value == 'number') {
            $('.note_cat_type').hide();
            $('.ntexttype').text('');
            $('.note-number').show();
            $('#note_user_type_error').hide();
        } else if (this.value == 'email') {
            $('.note_cat_type').hide();
            $('#note_user_type_error').hide();
            $('.ntexttype').text('');
            $('.note-email').show();
            //note-photo
        } else if (this.value == 'photo') {
            $('.note_cat_type').hide();
            $('#note_user_type_error').hide();
            $('.ntexttype').text('');
            $('.note-photo').show();
            //note-photo
        } else {
            $('.note_cat_type').hide();
            $('.ntexttype').text('');
            $('#note_user_type_error').show();
        }


    });


    $(document).on('click', '.addnote', function() {
        var user_id = $(this).attr('data-user-id');
        var user_type = $(this).attr('data-user-type');
        $('#note_id').val('');
        $('#note_user_type').val('');
        $('#note_user_id').val('');
        $('textarea#eng_note_text').text('');
        $('textarea#eng_note_text').val('');
        $('#note_number').val('');
        $('#note_email').val('');
        $('#note_type option[value=""]').attr('selected', 'selected');
        //$(".dropify-clear").trigger("click");
        $('.note_cat_type').hide();
        $('#note_type option').removeAttr('selected').filter('[value=""]').attr('selected', true);

        $('#note_user_id').val(user_id);
        $('#note_user_type').val(user_type);

        $('#exampleModal').modal('show');

    });

    $(document).on('click', '#note_add', function(e) {
      
        var Type = $('#note_type').val();
        //var Text = $('#note_text').val();
        var Id = $('#note_id').val();
        var user_type = $('#note_user_type').val();
        var User_id = $('#note_user_id').val();
        if (User_id != '' && typeof(User_id) != "undefined" && Type != '' && typeof(Type) != "undefined" && Type !==
            null) {
            if(validate_form(Type)){
           
                var form = $("#create_note_new")[0];
                var formData = new FormData(form);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                enctype: 'multipart/form-data',
                url: "{{ route('notes.add') }}",
                type: "POST",
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    var data = JSON.parse(JSON.stringify(data));
                    //console.log(data);
                    if (data.error == '') {

                        $('#note_id').val('');
                        $('#note_user_type').val('');
                        $('#note_user_id').val('');
                        $('textarea#eng_note_text').text('');
                        $('textarea#eng_note_text').val('');
                        $('#note_number').val('');
                        $('#note_email').val('');
                        $('#note_type option[value=""]').attr('selected', 'selected');
                        //$(".dropify-clear").trigger("click");
                        $('.note_cat_type').hide();
                        $('#note_type option').removeAttr('selected').filter('[value=""]').attr('selected',
                            true);

                        swal("Success", data.message, {
                            icon: "success",
                        });
                        get_note(User_id, user_type);
                        $('#exampleModal').modal('hide');

                    } else {
                        swal("Error", data.message, {
                            icon: "error",
                        });
                    }
                },
                error: function(err) {
                    swal("Error", err, {
                        icon: "error",
                    });
                    $('#loading').hide();
                }
            });
            }
        } else {
            $('#note_user_type_error').show();
            
        }
    });

    function validatePhone(txtPhone) {
        var a = txtPhone;
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(a)) {
            return true;
        }
        else {
            return false;
        }
    }

    function validate_form(type) {
        $('#note_user_type_error').hide();
        var note_text = $('#eng_note_text').val();
        var photo_note_text = $('#photo_note_text').val();
        
        var note_number = $('#note_number').val();
        var note_email = $('#note_email').val();
        $('#eng_note_text_error').hide();
        $('#note_number_error').hide();
        $('#note_email_error').hide();
        $('#note_photo_error').hide();
        if (type == 'general' || type == 'occupation' || type == 'education' || type == 'location' || type ==
            'transportation') {
            if (note_text != '' && typeof(note_text) != "undefined" && note_text !== null) {
                $('#eng_note_text_error').hide();
                console.log(note_text);
                return true;
            } else {
                $('#eng_note_text_error').show();
                return false;
            }
        } else if (type == 'number') {
            console.log(validatePhone(note_number));
            if (validatePhone(note_number) && note_number != '' && typeof(note_number) != "undefined" && note_number !== null) {
                $('#note_number_error').hide();
                return true;
            } else {
                $('#note_number_error').show();
                return false;
            }

        } else if (type == 'email') {
            console.log(ValidateEmail(note_email));
            if (ValidateEmail(note_email) && note_email != '' && typeof(note_email) != "undefined" && note_email !== null) {
                $('#note_email_error').hide();
                return true;
            } else {
                $('#note_email_error').show();
                return false;
            }

        } else if (type == 'photo') {
            //var vidFileLength = $("#note_photo")[0].files.length;
            //vidFileLength != 0 &&
            if (photo_note_text != '' && typeof(photo_note_text) != "undefined" && photo_note_text !== null) {
                $('#photo_note_text_error').hide();
                //$('#note_photo_error').hide();
                return true;
            } else {
                $('#photo_note_text_error').show();
                //$('#note_photo_error').show();
                return false;
            }

        } else {
            return false;
        }
    }
</script>
