<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('backend.layouts.inc.style')
    <title>Login Page</title>
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    {{--     <div class="mb-3 text-center">
                                        <img src="{{ asset('assets/backend') }}/images/logo-icon.png" width="60" alt="" />
                                    </div> --}}
                                    <div class="text-center mb-4">
                                        <h5 class="">Welcome Admin</h5>
                                        <p class="mb-0">Please log in to your account</p>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" action="{{ route('admin.login') }}" method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email')
                                                is-invalid
                                                @enderror"
                                                    name="email" id="inputEmailAddress" placeholder="Enter email">
                                                @error('email')
                                                    <span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password"
                                                        class="form-control border-end-0 @error('password')
                                                    is-invalid
                                                    @enderror"
                                                        id="inputChoosePassword" name="password"
                                                        placeholder="Enter Password">
                                                    @error('password')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" name="remember_me">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/backend') }}/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{ asset('assets/backend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <!--app JS-->
    <script src="{{ asset('assets/backend') }}/js/app.js"></script>
    <!-- jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Toastr-->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
