<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20"
                xml:space="preserve">
                <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
      C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
                <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
      c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
                <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
      c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
            </svg>

            <span class="align-middle me-3">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item {{ request()->is('admin/home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                </a>
            </li>


            @if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'main')
            @if (CheckRights(Auth::user()->rights, 1) || CheckRights(Auth::user()->rights, 3))

                <li class="sidebar-item {{ request()->is('admin/user/add*') ? 'active' : '' }}">

                    <a data-bs-target="#User_Management" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">User Management</span>
                    </a>
                    <ul id="User_Management" class="sidebar-dropdown list-unstyled collapse {{ request()->is('admin/user*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                        <li class="sidebar-item {{ request()->is('admin/user') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('user.index')}}">Users List</a></li>
                        @if (CheckRights(Auth::user()->rights, 2) || CheckRights(Auth::user()->rights, 4))
                        <li class="sidebar-item {{ request()->is('admin/user/add*') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('user.add')}}">Create user</a>
                        </li>
                        @endif
                    </ul>
                </li>

            @endif
            @else

                @if (Auth::user()->user_type == 'owner')

                    <li class="sidebar-item {{ request()->is('admin/user/add*') ? 'active' : '' }}">

                        <a data-bs-target="#User_Management" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">User Management</span>
                        </a>
                        <ul id="User_Management" class="sidebar-dropdown list-unstyled collapse {{ request()->is('admin/user*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('admin/user') ? 'active' : '' }}"><a class="sidebar-link" href="{{ route('user.index') }}">Users List</a></li>

                            <li class="sidebar-item {{ request()->is('admin/user/add*') ? 'active' : '' }}"><a class="sidebar-link" href="{{ route('user.add')}}">Create user</a>
                            </li>

                        </ul>
                    </li>

                @endif

                @if (Auth::user()->user_type == 'supervisor')
                    @if (CheckRights(Auth::user()->rights, 7))

                    <li class="sidebar-item {{ request()->is('admin/user/add*') ? 'active' : '' }}">

                        <a data-bs-target="#User_Management" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">User Management</span>
                        </a>
                        <ul id="User_Management" class="sidebar-dropdown list-unstyled collapse {{ request()->is('admin/user*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                            <li class="sidebar-item {{ request()->is('admin/user') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('user.index')}}">Users List</a></li>

                            <li class="sidebar-item {{ request()->is('admin/user/add*') ? 'active' : '' }}"><a class="sidebar-link" href="{{route('user.add')}}">Create user</a>
                            </li>

                        </ul>
                    </li>

                    @endif
                @endif
            @endif




            @if (Auth::user()->is_old == '1')
            <li class="sidebar-item {{ request()->is('admin/oldmessage*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('old-message') }}">
                    <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Inbox</span>
                </a>
            </li>

            @endif


            @if(Auth::user()->user_id)
            @if(findU(Auth::user()->user_id))
            @if(findU(Auth::user()->user_id)->id==Auth::user()->user_id)
            <li class="sidebar-item {{ request()->is('admin/chat*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('chat')}}">
                    <i class="align-middle" data-feather="message-circle"></i> <span class="align-middle">Chat <span class="badge bg-primary rounded-pill" id="single_chat_count">0</span></span>
                </a>
            </li>
            @endif
            @endif
            @endif


        </ul>

        {{-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Monthly Sales Report</strong>
                <div class="mb-3 text-sm">
                    Your monthly sales report is ready for download!
                </div>

                <div class="d-grid">
                    <a href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/"
                        class="btn btn-primary" target="_blank">Download</a>
                </div>
            </div>
        </div> --}}
    </div>
</nav>
