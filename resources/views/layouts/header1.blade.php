<header class="yoo-header yoo-style1 yoo-sticky-menu">
    <div class="yoo-main-header">
      <div class="yoo-main-header-in">
        <div class="yoo-main-header-left">
          <a href="{{route('home')}}" class="yoo-logo-link yoo-light-logo"><img src="{{ asset('assets/img/logo.svg')}}" alt="logo-light" /></a>

        </div>
        <div class="yoo-main-header-right">
          <div class="yoo-nav-wrap yoo-fade-up">
            <div class="yoo-nav-toggle">
              <ion-icon name="ellipsis-vertical"></ion-icon>
            </div>
            {{-- <nav class="yoo-nav yoo-desktop-nav">
              <ul class="yoo-nav-list">
                <li class="yoo-has-children">
                  <a href="#"><ion-icon name="albums"></ion-icon> Icons</a>
                  <ul class="yoo-dropdown yoo-style7">
                    <li>
                      <a href="material-icons.html">
                        <div class="yoo-desc-box yoo-icon-color1">
                          <ion-icon name="beer"></ion-icon>
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">Airplane</div>
                          <span class="yoo-desc-cat">Second Line</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="font-awesome-icons.html">
                        <div class="yoo-desc-box yoo-icon-color2">
                          <ion-icon name="restaurant"></ion-icon>
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">Local Dining</div>
                          <span class="yoo-desc-cat">Second Line</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="themify-icons.html">
                        <div class="yoo-desc-box yoo-icon-color3">
                          <ion-icon name="bonfire"></ion-icon>
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">Fast Food</div>
                          <span class="yoo-desc-cat">Second Line</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="line-icons.html">
                        <div class="yoo-desc-box yoo-icon-color4">
                          <ion-icon name="pizza"></ion-icon>
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">Local Pizza</div>
                          <span class="yoo-desc-cat">Second Line</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="yoo-has-children">
                  <a href="#"><ion-icon name="folder-open"></ion-icon> Images</a>
                  <ul class="yoo-dropdown yoo-style6">
                    <li>
                      <a href="#">
                        <div class="yoo-desc-box">
                          <img src="assets/img/img01.png" alt="img01" />
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">Star Wars</div>
                          <span class="yoo-desc-cat">Action</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-desc-box">
                          <img src="assets/img/img02.png" alt="img02" />
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">Friends</div>
                          <span class="yoo-desc-cat">American Sitcom</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-desc-box">
                          <img src="assets/img/img03.png" alt="img03" />
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">Inception</div>
                          <span class="yoo-desc-cat">Thriller</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-desc-box">
                          <img src="assets/img/img04.png" alt="img04" />
                        </div>
                        <div class="yoo-desc-meta">
                          <div class="yoo-desc-title">FightClub</div>
                          <span class="yoo-desc-cat">Drama/Action</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="yoo-has-children yoo-megamenu yoo-style1">
                  <a href="#"><ion-icon name="layers"></ion-icon> Components</a>
                  <div class="yoo-megamenu-in">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-3 col-sm-6">
                          <div class="yoo-megamenu-col">
                            <h2 class="yoo-megamenu-title">Column 1</h2>
                            <ul class="yoo-megamenu-list">
                              <li><a href="components/alerts.html">Alerts</a></li>
                              <li><a href="components/badge.html">Badge</a></li>
                              <li><a href="components/breadcrumb.html">Breadcrumb</a></li>
                              <li><a href="components/button.html">Buttons</a></li>
                              <li><a href="components/button-group.html">Button group</a></li>
                              <li><a href="components/card.html">Card</a></li>
                              <li><a href="components/carousel.html">Carousel</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <div class="yoo-megamenu-col">
                            <h2 class="yoo-megamenu-title">Column 2</h2>
                            <ul class="yoo-megamenu-list">
                              <li><a href="components/collapse.html">Collapse</a></li>
                              <li><a href="components/dropdowns.html">Dropdowns</a></li>
                              <li><a href="components/forms.html">Forms</a></li>
                              <li><a href="components/forms-group.html">Input group</a></li>
                              <li><a href="components/jumbotron.html">Jumbotron</a></li>
                              <li><a href="components/list-group.html">List group</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <div class="yoo-megamenu-col">
                            <h2 class="yoo-megamenu-title">Column 3</h2>
                            <ul class="yoo-megamenu-list">
                              <li><a href="components/media-object.html">Media Object</a></li>
                              <li><a href="components/modal.html">Modal</a></li>
                              <li><a href="components/navs.html">Navs</a></li>
                              <li><a href="components/navbar.html">Navbar</a></li>
                              <li><a href="components/pagination.html">Pagination</a></li>
                              <li><a href="components/popovers.html">Popovers</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <div class="yoo-megamenu-col">
                            <h2 class="yoo-megamenu-title">Column 4</h2>
                            <ul class="yoo-megamenu-list">
                              <li><a href="components/progress.html">Progress</a></li>
                              <li><a href="components/scrollspy.html">Scrollspy</a></li>
                              <li><a href="components/spinners.html">Spinners</a></li>
                              <li><a href="content/table.html">Table</a></li>
                              <li><a href="components/toasts.html">Toasts</a></li>
                              <li><a href="components/tooltips.html">Tooltips</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </nav> --}}
            <!-- .yoo-nav -->
          </div>
          <!-- .yoo-nav-wrap -->
          <ul class="yoo-ex-nav yoo-style1 yoo-flex yoo-mp0">
            <li>
              <div class="yoo-toggle-body yoo-search-area yoo-style1">
                <span class="yoo-toggle-btn yoo-ex-nav-btn yoo-search-btn">
                  <ion-icon name="search"></ion-icon>
                </span>
                <div class="yoo-dropdown yoo-search-dropdown">
                  <form action="#" class="yoo-search yoo-style1">
                    <input type="text" placeholder="Search..." class="yoo-search-input">
                    <div class="yoo-toggle-cross">
                      <ion-icon name="close"></ion-icon>
                    </div>
                    <button class="yoo-search-submit"><ion-icon name="search"></ion-icon></button>
                  </form>
                </div>
              </div>
            </li>
            <li>
              <div class="yoo-toggle-body yoo-message-area yoo-style1">
                <span class="yoo-toggle-btn yoo-ex-nav-btn yoo-message-btn">
                  <ion-icon name="mail"></ion-icon>
                  <span class="yoo-ex-nav-label">9</span>
                </span>
                <div class="yoo-dropdown yoo-notify-dropdown">
                  <h2 class="yoo-nofify-title">
                    <span class="yoo-nofify-title-left">Messages</span>
                    <span class="yoo-nofify-title-right"><a href="#">Mark All as Read</a></span>
                  </h2>
                  <ul class="yoo-nofify-list yoo-style1 yoo-mp0">
                    <li>
                      <a href="#">
                        <div class="yoo-nofify-thumb">
                          <img src="{{ asset('assets/img/user/1.jpg')}}" alt="">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">
                            Bob Dylan
                            <span class="yoo-online-status yoo-live"></span>
                          </h3>
                          <div class="yoo-msg">
                            Thank you for purchasing! <br>
                            When you arrive prepared to negotiate
                          </div>
                          <span class="yoo-notify-time">10:23</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="active">
                        <div class="yoo-nofify-thumb">
                          <img src="{{ asset('assets/img/user/2.jpg')}}" alt="">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">
                            David Gilmour
                            <span class="yoo-online-status"></span>
                          </h3>
                          <div class="yoo-msg">
                            Thank you for purchasing! <br>
                            When you arrive prepared to negotiate
                          </div>
                          <span class="yoo-notify-time">12:23</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nofify-thumb">
                          <img src="{{ asset('assets/img/user/3.jpg')}}" alt="">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">
                            Jeff Beck
                            <span class="yoo-online-status yoo-live"></span>
                          </h3>
                          <div class="yoo-msg">
                            Thank you for purchasing! <br>
                            When you arrive prepared to negotiate
                          </div>
                          <span class="yoo-notify-time">Jan 05</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nofify-thumb">
                          <img src="{{ asset('assets/img/user/4.jpg')}}" alt="">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">
                            Guthrie Govan
                            <span class="yoo-online-status"></span>
                          </h3>
                          <div class="yoo-msg">
                            Thank you for purchasing! <br>
                            When you arrive prepared to negotiate
                          </div>
                          <span class="yoo-notify-time">Jan 10</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nofify-thumb">
                          <img src="{{ asset('assets/img/user/5.jpg')}}" alt="">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">
                            Eric Johnson
                            <span class="yoo-online-status"></span>
                          </h3>
                          <div class="yoo-msg">
                            Thank you for purchasing! <br>
                            When you arrive prepared to negotiate
                          </div>
                          <span class="yoo-notify-time">Jan 16</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <a href="#" class="yoo-btn yoo-style2">SEE ALL <ion-icon name="chevron-forward"></ion-icon></a>
                </div>
              </div>
            </li>
            <li>
              <div class="yoo-toggle-body yoo-notice-area yoo-style1">
                <span class="yoo-toggle-btn yoo-ex-nav-btn yoo-notice-btn">
                  <ion-icon name="notifications"></ion-icon>
                  <span class="yoo-ex-nav-label">3</span>
                </span>
                <div class="yoo-dropdown yoo-notify-dropdown">
                  <h2 class="yoo-nofify-title">Notification</h2>
                  <ul class="yoo-nofify-list yoo-style1 yoo-mp0">
                    <li>
                      <a href="#" class="yoo-nofify-list-in">
                        <div class="yoo-nofify-icon yoo-icon-color2">
                          <ion-icon name="people"></ion-icon>
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">Invite your friends to dashboard.</h3>
                          <span class="yoo-notify-time">5 hour ago</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="yoo-nofify-list-in">
                        <div class="yoo-nofify-icon yoo-icon-color4">
                          <ion-icon name="calendar"></ion-icon>
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">3 Tasks pending this month.</h3>
                          <span class="yoo-notify-time">6 hour ago</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="yoo-nofify-list-in">
                        <div class="yoo-nofify-icon yoo-icon-color3">
                          <ion-icon name="heart"></ion-icon>
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">7 People loved your activity.</h3>
                          <span class="yoo-notify-time">9 hour ago</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="yoo-nofify-list-in">
                        <div class="yoo-nofify-icon yoo-icon-color2">
                          <ion-icon name="chatbox"></ion-icon>
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">John commented on activity.</h3>
                          <span class="yoo-notify-time">1 day ago</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="yoo-nofify-list-in">
                        <div class="yoo-nofify-icon yoo-icon-color1">
                          <img src="{{ asset('assets/img/user/1.jpg')}}" alt="msg1" />
                        </div>
                        <div class="yoo-nofify-text">
                          <h3 class="yoo-nofify-text-head">Click your picture or add an account.</h3>
                          <span class="yoo-notify-time">2 days ago</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <a href="#" class="yoo-btn yoo-style2">SEE ALL <ion-icon name="chevron-forward"></ion-icon></a>
                </div>
              </div>
            </li>
            <li>
              <div class="yoo-toggle-body yoo-app-area yoo-style1">
                <span class="yoo-toggle-btn yoo-ex-nav-btn yoo-app-btn">
                  <ion-icon name="apps"></ion-icon>
                </span>
                <div class="yoo-dropdown yoo-notify-dropdown">
                  <h2 class="yoo-nofify-title">Quick Navigation</h2>
                  <ul class="yoo-nofify-list yoo-style2 yoo-mp0">
                    <li>
                      <a href="#">
                        <div class="yoo-nav-icon">
                          <img src="{{ asset('assets/img/nav-icon/gmail.png')}}" alt="gmail">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3>Gmail</h3>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nav-icon">
                          <img src="{{ asset('assets/img/nav-icon/hangout.png')}}" alt="hangout">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3>Hangout</h3>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nav-icon">
                          <img src="{{ asset('assets/img/nav-icon/google.png')}}" alt="google">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3>Google+</h3>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nav-icon">
                          <img src="{{ asset('assets/img/nav-icon/mail.png')}}" alt="mail">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3>Mail</h3>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nav-icon">
                          <img src="{{ asset('assets/img/nav-icon/message.png')}}" alt="message">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3>Message</h3>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="yoo-nav-icon">
                          <img src="{{ asset('assets/img/nav-icon/more.png')}}" alt="more">
                        </div>
                        <div class="yoo-nofify-text">
                          <h3>More</h3>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <hr>
                  <a href="#" class="yoo-btn yoo-style2">SEE ALL <ion-icon name="chevron-forward"></ion-icon></a>
                </div>
              </div>
            </li>
            <li>
              <div class="yoo-toggle-body yoo-profile-nav yoo-style1">
                <div class="yoo-toggle-btn yoo-profile-nav-btn">
                  <div class="yoo-profile-nav-text">
                    @if (Auth::user())
                    <span>Welcome,{{ Auth::user()->fname . ' ' . Auth::user()->lname }}</span>
                                @if (Auth::user()->user_type == 'main')
                                    <h4 class="designattion mb-0">Account:Master Admin</h4>
                                @else

                                    @if (Auth::user()->user_id)
                                        @if (findUser(Auth::user()->user_id))
                                        <h4>Account:{{ findUser(Auth::user()->user_id) }}
                                        </h4>
                                        @endif
                                    @endif

                                @endif

                                @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
                                <h4 class="designattion mb-0">Role:Super Admin</h4>
                                @elseif(Auth::user()->user_type == 'supervisor')
                                    <h4 class="designattion mb-0">Role:Moderator</h4>
                                @elseif(Auth::user()->user_type == 'owner')
                                    <h4 class="designattion mb-0">Role:Studio Owner</h4>
                                @elseif(Auth::user()->user_type == 'user')
                                    <h4 class="designattion mb-0">Role:Sub-Moderator</h4>
                                @else
                                    <h4 class="designattion mb-0">Role:Sub user</h4>
                                @endif

                    @endif
                  </div>
                  <div class="yoo-profile-nav-img">
                    @if(Auth::user())
                    <img src="{{ asset('assets/profile/').'/'.Auth::user()->profile}}" alt="@if(Auth::user()) {{Auth::user()->fname." ".Auth::user()->lname}} @endif" class="user-img" width="110" height="110">
                    @else
                    <img src="{{ asset('assets/profile/user.jpg')}}" alt="@if(Auth::user()) {{Auth::user()->fname." ".Auth::user()->lname}} @endif" class="user-img" width="110" height="110">
                    @endif

                  </div>
                </div>
                <ul class="yoo-dropdown yoo-style1">
                  <li>
                    <a href="{{ route('profile') }}"><ion-icon name="person-circle"></ion-icon>My Profile</a>
                  </li>
                  <li><a  href="{{ route('profile.setting') }}"><ion-icon name="person-circle"></ion-icon>Profile Settings</a>
                </li>
                  <li>
                    <a href="{{ route('profile.change.pwd') }}"><ion-icon name="cog"></ion-icon>Change Password</a>
                  </li>
                  {{-- <li>
                    <a href="#"><ion-icon name="videocam"></ion-icon>Upload</a>
                  </li>
                  <li>
                    <a href="#"><ion-icon name="help-circle"></ion-icon>Help</a>
                  </li> --}}
                  <li class="yoo-dropdown-cta"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header><!-- .yoo-header -->

  <div class="yoo-sidebarheader-toggle">
    <div class="yoo-button-bar1"></div>
    <div class="yoo-button-bar2"></div>
    <div class="yoo-button-bar3"></div>
  </div><!-- .yoo-sidebarheader-toggle -->
