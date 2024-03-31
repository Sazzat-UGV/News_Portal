<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('backend.layouts.inc.style')

    <title>@yield('title')</title>

</head>

<body>
    <!--wrapper-->
    <div class="wrapper">

        <!--sidebar wrapper -->
        @include('backend.layouts.inc.sidebar')
        <!--end sidebar wrapper -->

        <!--start header -->
        @include('backend.layouts.inc.header')
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                @yield('content')

            </div>
        </div>
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        @include('backend.layouts.inc.footer')

    </div>
    <!--end wrapper-->

    @include('backend.layouts.inc.script')
</body>

</html>
