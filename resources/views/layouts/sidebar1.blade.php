<div class="yoo-sidebarheader">

    <div class="yoo-sidebarheader-in" data-scrollbar>
        <div class="yoo-sidebar-nav">
            <ul class="yoo-sidebar-nav-list yoo-mp0">
                <li class="{{ request()->is('admin/home*') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <span class="yoo-sidebar-link-title">
                            <span class="yoo-sidebar-link-icon yoo-accent-bg2">
                                <ion-icon name="home"></ion-icon>
                            </span>
                            <span class="yoo-sidebar-link-text">Dashboard</span>
                        </span>
                    </a>

                </li>

                @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
                    @if (CheckRights(Auth::user()->rights, 1) || CheckRights(Auth::user()->rights, 3))

                        <li class="yoo-sidebar-has-children {{ request()->is('admin/user/add*') ? 'active' : '' }}">
                            <a href="#">
                                <span class="yoo-sidebar-link-title">
                                    <span class="yoo-sidebar-link-icon yoo-accent-bg1">
                                        <ion-icon name="person-circle"></ion-icon>
                                    </span>
                                    <span class="yoo-sidebar-link-text">User Management</span>
                                </span>
                            </a>
                            <ul class="yoo-sidebar-nav-dropdown">
                                <li class="{{ request()->is('admin/user') ? 'active' : '' }}">
                                    <a href="{{ route('user.index') }}">
                                        <span class="yoo-sidebar-link-title">
                                            <span class="yoo-sidebar-link-text">List</span>
                                        </span>
                                    </a>
                                </li>
                                @if (CheckRights(Auth::user()->rights, 2) || CheckRights(Auth::user()->rights, 4))
                                    <li class="{{ request()->is('admin/user/add*') ? 'active' : '' }}">
                                        <a href="{{ route('user.add') }}">
                                            <span class="yoo-sidebar-link-title">
                                                <span class="yoo-sidebar-link-text">Create user</span>
                                            </span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                    @endif
                @else

                    @if (Auth::user()->user_type == 'owner')

                        <li class="yoo-sidebar-has-children {{ request()->is('admin/user/add*') ? 'active' : '' }}">
                            <a href="#">
                                <span class="yoo-sidebar-link-title">
                                    <span class="yoo-sidebar-link-icon yoo-accent-bg1">
                                        <ion-icon name="person-circle"></ion-icon>
                                    </span>
                                    <span class="yoo-sidebar-link-text">User Management</span>
                                </span>
                            </a>
                            <ul class="yoo-sidebar-nav-dropdown">
                                <li class="{{ request()->is('admin/user') ? 'active' : '' }}">
                                    <a href="{{ route('user.index') }}">
                                        <span class="yoo-sidebar-link-title">
                                            <span class="yoo-sidebar-link-text">List</span>
                                        </span>
                                    </a>
                                </li>

                                <li class="{{ request()->is('admin/user/add*') ? 'active' : '' }}">
                                    <a href="{{ route('user.add') }}">
                                        <span class="yoo-sidebar-link-title">
                                            <span class="yoo-sidebar-link-text">Create user</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endif

                    @if (Auth::user()->user_type == 'supervisor')
                        @if (CheckRights(Auth::user()->rights, 7))

                            <li
                                class="yoo-sidebar-has-children {{ request()->is('admin/user/add*') ? 'active' : '' }}">
                                <a href="#">
                                    <span class="yoo-sidebar-link-title">
                                        <span class="yoo-sidebar-link-icon yoo-accent-bg1">
                                            <ion-icon name="person-circle"></ion-icon>
                                        </span>
                                        <span class="yoo-sidebar-link-text">User Management</span>
                                    </span>
                                </a>
                                <ul class="yoo-sidebar-nav-dropdown">
                                    <li class="{{ request()->is('admin/user') ? 'active' : '' }}">
                                        <a href="{{ route('user.index') }}">
                                            <span class="yoo-sidebar-link-title">
                                                <span class="yoo-sidebar-link-text">List</span>
                                            </span>
                                        </a>
                                    </li>

                                    <li class="{{ request()->is('admin/user/add*') ? 'active' : '' }}">
                                        <a href="{{ route('user.add') }}">
                                            <span class="yoo-sidebar-link-title">
                                                <span class="yoo-sidebar-link-text">Create user</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @endif
                    @endif
                @endif

                @if (Auth::user()->is_old == '1')
                <li class="yoo-sidebar {{ request()->is('admin/oldmessage*') ? 'active' : '' }}">
                    <a href="{{ route('old-message') }}">
                        <span class="yoo-sidebar-link-title">
                            <span class="yoo-sidebar-link-icon yoo-accent-bg3">
                                <ion-icon name="mail"></ion-icon>
                            </span>
                            <span class="yoo-sidebar-link-text">Inbox</span>
                        </span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->user_id)
                @if(findU(Auth::user()->user_id))
                @if(findU(Auth::user()->user_id)->id==Auth::user()->user_id)
                <li class="yoo-sidebar-has-children">
                    <a href="{{ route('chat') }}">
                        <span class="yoo-sidebar {{ request()->is('admin/chat*') ? 'mm-active' : '' }}">
                            <span class="yoo-sidebar-link-icon yoo-accent-bg5">
                                <ion-icon name="mail"></ion-icon>
                            </span>
                            <span class="yoo-sidebar-link-text">Chat <span class="badge bg-primary rounded-pill" id="single_chat_count">0</span></span>
                        </span>
                    </a>

                </li>
                @endif
                @endif
                @endif

            </ul><!-- .yoo-sidebar-nav-list -->
        </div>
    </div>
</div><!-- .yoo-sidebarheader -->
