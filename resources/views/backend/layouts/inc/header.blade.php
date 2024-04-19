<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="{{ route('admin.dashboard') }}">
                <img class="img-fluid" src="{{ asset('assets/backend') }}/images/logo.png" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container">
            <ul class="nav-left">

                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('uploads/users') }}/{{ Auth::user()->image }}" class="img-radius"
                                alt="User-Profile-Image">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{ route('admin.profilePage') }}">
                                    <i class="feather icon-user"></i>My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.changePasswordPage') }}">
                                    <i class="feather icon-settings"></i> Change
                                    Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}" id="logout">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
