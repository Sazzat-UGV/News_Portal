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
        </ul>

    </div>
</nav>
