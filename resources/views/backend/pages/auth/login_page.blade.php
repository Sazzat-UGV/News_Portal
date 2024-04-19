<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="author" content="#">

    <link rel="icon" href="{{ asset('assets/backend') }}/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend') }}/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend') }}/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend') }}/css/style.css">
</head>

<body class="fix-menu">

    <section class="login-block">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <form class="md-float-material form-material" action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="{{ asset('assets/backend') }}/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h4 class="text-center" style="font-weight: 600">Welcome Admin</h4>
                                        <h6 class="text-center">Please log in to your account</h6>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" name="email"
                                        class="form-control @error('email')
                                    is-invalid
                                    @enderror"
                                        placeholder="Your email address">
                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <span class="form-bar"></span>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="password" name="password"
                                        class="form-control  @error('password')
                                    is-invalid
                                    @enderror"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <span class="form-bar"></span>
                                </div>

                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" name="remember_me">
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
                                            in</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </section>

    <script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/jquery-ui/jquery-ui.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/popper.js/dist/umd/popper.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>

    <script type="text/javascript"
        src="{{ asset('assets/backend') }}/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript"
        src="{{ asset('assets/backend') }}/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>

    <script type="text/javascript" src="{{ asset('assets/backend') }}/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('assets/backend') }}/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('assets/backend') }}/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/backend') }}/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/backend') }}/assets/js/common-pages.js"></script>
</body>

</html>
