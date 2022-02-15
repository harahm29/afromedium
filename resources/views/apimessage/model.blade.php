<div class="modal fade" id="exampleFullScreenModal" tabindex="-1" style="display: none;" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="m-title">View Chat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loading">
                    <div class="loading">Loading&#8230;</div>
                </div>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="card mb-3 sideprofile">
                            <div class="card-body text-center">

                                <img id="to_profile_pic" src="{{ asset('assets/profile/user.jpg') }}" alt="profile"
                                    class="img-fluid rounded-circle mb-2" width="128" height="128" />

                                <h5 class="card-title mb-0" id="to_user">to user</h5>
                                <div class="text-muted mb-2" id="to_gendar"></div>
                                <div class="text-muted mb-2" id="to-location"></div>

                                <div>
                                    <a class="btn btn-primary btn-sm" id="to_u_profile_url" href="#">Follow</a>
                                    <button class="btn btn-danger btn-sm addnote" type="button" 
                                        id="to_note_modal"><i class="fas fa-feather me-0"></i></button>
                                </div>
                            </div>
                            <hr class="my-0" />

                            <div class="card-body">
                                <h5 class="h6 card-title">About</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Status:
                                        <span class="text-secondary" id="to_status"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="x-circle" class="feather-sm me-1"></span>
                                        Sexuality:
                                        <span class="text-secondary" id="to_sexuality"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="pocket" class="feather-sm me-1"></span>
                                        Weight:
                                        <span class="text-secondary" id="to_weight"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="bold" class="feather-sm me-1"></span>
                                        Body:
                                        <span class="text-secondary" id="to_body"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="crosshair" class="feather-sm me-1"></span>
                                        Hair:
                                        <span class="text-secondary" id="to_hair"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="eye" class="feather-sm me-1"></span>
                                        Eyes:
                                        <span class="text-secondary" id="to_eyes"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="users" class="feather-sm me-1"></span>
                                        Family:
                                        <span class="text-secondary" id="to_family"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Smoking:
                                        <span class="text-secondary" id="to_smoking"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Drinker:
                                        <span class="text-secondary" id="to_drinker"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Education:
                                        <span class="text-secondary" id="to_education"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        About:
                                        <span class="text-secondary" id="to_about"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Interested:
                                        <span class="text-secondary" id="to_interested"></span>
                                    </li>
                                </ul>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <h5 class="h6 card-title">Note's</h5>
                                <ul class="list-unstyled mb-0" id="user_to_notes">
                                    <!-- <li class="mb-1"> <a href="#">staciehall.co</a></li> -->

                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div id="newchat" class="row g-0">

                                <div class="col-12 col-lg-12 col-xl-12">
                                    <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                        <div class="d-flex align-items-start align-items-center py-1">

                                            <div class="flex-grow-1 ps-3">
                                                <strong class="to-name-info">Name</strong>
                                                <div class="text-muted small" id="to_user_online3"><em
                                                        id="to_user_online2">Active
                                                        Now</em></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="position-relative">
                                        <div class="chat-messages p-4" id="chat-content">
                                            <div class="chat-message-right pb-4">

                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                                    <div class="fw-bold mb-1">You</div>
                                                    Lorem ipsum dolor sit amet, vis erat denique in,
                                                    dicunt prodesset te vix.
                                                    <div class="text-muted small text-nowrap mt-2">
                                                        2:33 am
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="chat-message-left pb-4">

                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                                    <div class="fw-bold mb-1">Bertha Martin</div>
                                                    Sit meis deleniti eu, pri vidit meliore docendi ut, an
                                                    eum erat animal commodo.
                                                    <div class="text-muted small text-nowrap mt-2">
                                                        2:34 am
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="chat-message-right pb-4">

                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                                    <div class="fw-bold mb-1">You</div>
                                                    Cum ea graeci tractatos.
                                                    <div class="text-muted small text-nowrap mt-2">
                                                        2:35 am
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="chat-message-left pb-4">

                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                                    <div class="fw-bold mb-1">Bertha Martin</div>
                                                    Sed pulvinar, massa vitae interdum pulvinar, risus
                                                    lectus porttitor magna, vitae commodo lectus mauris et
                                                    velit. Proin ultricies placerat imperdiet. Morbi
                                                    varius quam ac venenatis tempus.
                                                    <div class="text-muted small text-nowrap mt-2">
                                                        2:36 am
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-grow-0 py-3 px-4 border-top">
                                        <div class="input-group">
                                            <input type="hidden" name="user_to" id="text_to" />
                                            <input type="hidden" name="user_from" id="text_from" />
                                            <input type="hidden" name="last_msg" id="text_last" />
                                            <input type="hidden" name="text_name" id="text_name" />
                                            <input type="hidden" name="text_type" id="text_type" value='200' />
                                            <input type="hidden" name="text_total_count" id="text_total_count"
                                                value="0" />
                                            <input type="text" id="text_message" class="form-control"
                                                placeholder="Type your message" />
                                            <div id="text_message_error" class="invalid-feedback"
                                                style="display: none;">
                                                Message is required, Please enter message!!!
                                            </div>
                                            <button id="send_messgae" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-3 sideprofile">
                            <div class="card-body text-center">

                                <img id="from_profile_pic" src="{{ asset('assets/profile/user.jpg') }}" alt="profile"
                                    class="img-fluid rounded-circle mb-2" width="128" height="128" />

                                <h5 class="card-title mb-0" id="from_user">to user</h5>
                                <div class="text-muted mb-2" id="from_gendar"></div>
                                <div class="text-muted mb-2" id="to-location"></div>

                                <div>
                                    <a class="btn btn-primary btn-sm" id="from_u_profile_url" href="#">Follow</a>
                                    <button class="btn btn-danger btn-sm addnote" type="button" 
                                        id="from_note_modal"><i class="fas fa-feather me-0"></i></button>
                                </div>
                            </div>
                            <hr class="my-0" />

                            <div class="card-body">
                                <h5 class="h6 card-title">About</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Status:
                                        <span class="text-secondary" id="from_status"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="x-circle" class="feather-sm me-1"></span>
                                        Sexuality:
                                        <span class="text-secondary" id="from_sexuality"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="pocket" class="feather-sm me-1"></span>
                                        Weight:
                                        <span class="text-secondary" id="from_weight"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="bold" class="feather-sm me-1"></span>
                                        Body:
                                        <span class="text-secondary" id="from_body"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="crosshair" class="feather-sm me-1"></span>
                                        Hair:
                                        <span class="text-secondary" id="from_hair"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="eye" class="feather-sm me-1"></span>
                                        Eyes:
                                        <span class="text-secondary" id="from_eyes"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="users" class="feather-sm me-1"></span>
                                        Family:
                                        <span class="text-secondary" id="from_family"></span>
                                    </li>
                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Smoking:
                                        <span class="text-secondary" id="from_smoking"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Drinker:
                                        <span class="text-secondary" id="from_drinker"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Education:
                                        <span class="text-secondary" id="from_education"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        About:
                                        <span class="text-secondary" id="from_about"></span>
                                    </li>

                                    <li class="mb-1">
                                        <span data-feather="info" class="feather-sm me-1"></span>
                                        Interested:
                                        <span class="text-secondary" id="from_interested"></span>
                                    </li>


                                </ul>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <h5 class="h6 card-title">Note's</h5>
                                <ul class="list-unstyled mb-0" id="user_from_notes">
                                    <!-- <li class="mb-1"> <a href="#">staciehall.co</a></li> -->

                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-2" data-target="TARGET-2" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="note_title">Add Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Please Add the note about the User.</div>
            <form class="row g-3 needs-validation" id="create_note_new" method="POST" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="container justify-content-center ml-4">
                    <div class="row">
                        <div class="col-8">

                            <input type="hidden" name="user_type" id="note_user_type" value="" />
                            <input type="hidden" name="id" id="note_id" value="" />
                            <input type="hidden" name="user_id" id="note_user_id" value="" />
                            <label for="note_type" class="form-label">Select note type</label>
                            <select id="note_type" name="note_type" class="form-select" required>
                                <option value="">Choose note type</option>
                                <option value="general">General</option>
                                <option value="occupation">Occupation</option>
                                <option value="education">Education</option>
                                <option value="number">Number</option>
                                <option value="email">Email</option>
                                <option value="photo">Photo</option>
                                <option value="location">Location</option>
                                <option value="transportation">Transportation</option>

                            </select>
                            <div id="note_user_type_error" class="invalid-feedback" style="display: none;">
                                Note type is required !!
                            </div>
                        </div>
                        <div class="col-8 mb-2 note_cat_type genral" style="display: none;">
                            <div class="note_text">
                                <label for="eng_note_text" class="form-label"><span class="ntexttype"></span>
                                    Note:</label>
                                <textarea class="form-control" name="eng_note_text" id="eng_note_text"
                                    required></textarea>
                                <div id="eng_note_text_error" class="invalid-feedback" style="display: none;">
                                    Note is required !!
                                </div>
                            </div>

                        </div>

                        <div class="col-8 mb-2 note_cat_type note-number" style="display: none;">
                            <div class="note_number">
                                <label for="eng_note_text" class="form-label">Number:</label>
                                <input class="form-control" type="number" name="note_number" id="note_number" />
                                <div id="note_number_error" class="invalid-feedback" style="display: none;">
                                    Number is required !!
                                </div>
                            </div>
                        </div>

                        <div class="col-8 mb-2 note_cat_type note-email" style="display: none;">
                            <div class="note_number">
                                <label for="note_email" class="form-label">Email:</label>
                                <input class="form-control" type="email" name="note_email" id="note_email" />
                                <div id="note_email_error" class="invalid-feedback" style="display: none;">
                                    Email is required !!
                                </div>
                            </div>
                        </div>

                        <div class="col-10 mb-2 note_cat_type note-photo" style="display: none;">
                            <div class="note_text">
                                <label for="eng_note_text" class="form-label"><span class="ntexttype"></span>
                                    Note:</label>
                                <textarea class="form-control" name="photo_note_text"
                                    id="photo_note_text"></textarea>
                                <div id="photo_note_text_error" class="invalid-feedback" style="display: none;">
                                    Note is required !!
                                </div>
                            </div>
                            {{-- <div class="note_photo">
                                <label for="note_photo" class="form-label">Photo:</label>
                                <input type="file" name="note_photo" id="note_photo" class="dropify"
                                    data-max-file-size="1M" />
                                <div id="note_photo_error" class="invalid-feedback" style="display: none;">
                                    <span class="ntexttype"></span> Photo is required !!
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="note_add">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('css')
    @include('apimessage.css.css')
@endpush
