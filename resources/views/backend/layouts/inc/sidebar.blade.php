<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            <li class>
                <a href="{{ route('admin.dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Categories</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('category.index') }}">
                            <span class="pcoded-mtext">Category List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Subcategories</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('subcategory.index') }}">
                            <span class="pcoded-mtext">Subcategory List</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('subcategory.create') }}">
                            <span class="pcoded-mtext">Add Subcategory</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Divisions</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('division.index') }}">
                            <span class="pcoded-mtext">Division List</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('division.create') }}">
                            <span class="pcoded-mtext">Add Division</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Districts</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('district.index') }}">
                            <span class="pcoded-mtext">District List</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('district.create') }}">
                            <span class="pcoded-mtext">Add District</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                    <span class="pcoded-mtext">Posts</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('post.index') }}">
                            <span class="pcoded-mtext">Post List</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('post.create') }}">
                            <span class="pcoded-mtext">Add Post</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Widgets</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('prayerTime.widgetPage') }}">
                            <span class="pcoded-mtext">Prayer Time</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('liveTV.widgetPage') }}">
                            <span class="pcoded-mtext">Live TV</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('notice.widgetPage') }}">
                            <span class="pcoded-mtext">Notice</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class>
                <a href="{{ route('ads.Index') }}">
                    <span class="pcoded-micon"><i class="feather icon-headphones"></i></span>
                    <span class="pcoded-mtext">Advertisement</span>
                </a>
            </li>

            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-grid"></i></span>
                    <span class="pcoded-mtext">Galleries</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('photo.index') }}">
                            <span class="pcoded-mtext">Photo Gallery</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('video.index') }}">
                            <span class="pcoded-mtext">Video Gallery</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                    <span class="pcoded-mtext">Settings</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="{{ route('social.settingPage') }}">
                            <span class="pcoded-mtext">Social Setting</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('seo.settingPage') }}">
                            <span class="pcoded-mtext">SEO Setting</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="{{ route('website.index') }}">
                            <span class="pcoded-mtext">Important Website</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
