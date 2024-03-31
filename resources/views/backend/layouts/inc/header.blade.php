<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">

                    <li class="nav-item dropdown dropdown-app">
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2">

                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-notifications-list">

                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list">

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('uploads/users') }}/{{ Auth::user()->image }}" class="user-img"
                        alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                        <p class="designattion mb-0">
                            @if (Auth::user()->is_admin == 1)
                                Admin
                            @endif
                        </p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profilePage') }}"><i
                                class="bx bx-user fs-5"></i><span>My Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('admin.changePasswordPage') }}"><i class="bx bx-cog fs-5"></i><span>Change
                                Password</span></a>
                    </li>

                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"
                            id="logout"><i class="bx bx-log-out fs-5"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
