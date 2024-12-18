<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ asset($pengaturan->desk_web ?? '') }}" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset($pengaturan->nav ?? '') }}">


    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card bg-pattern mx-auto">

                        <div class="card-body p-4 ">

                            <div class="row m-auto d-flex align-items-center  ">
                                <div class="col-md-6 text-center order-2">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <h2 class=" mb-4 mt-3">Masukan email dan password untuk login </h2>

                                        <div class="form-group mb-3">
                                            <input class="form-control" type="email" name="email"
                                                value="{{ old('email') }}" id="emailaddress" required=""
                                                placeholder="Enter your email">

                                            @error('email')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" name="password" class="form-control"
                                                    placeholder="Enter your password">
                                                <div class="input-group-append" data-password="false">
                                                    <div class="input-group-text">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            @error('password')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-success btn-block" type="submit"> Login </button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-6 text-center order-1 ">

                                    <div class="auth-logo">
                                        <a href="#" class="logo logo-dark text-center">
                                            <h2 class="logo-lg fw-bold">

                                              Sistem Pemetaan Stunting Di Kabupaten Jayapura

                                            </h2>
                                            <img src="/assets/images/logo.png"  width="50%" alt=""
                                            srcset="">
                                        </a>


                                    </div>
                                </div>

                            </div>





                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy;   Sistem Pemetaan Stunting Di Kabupaten Jayapura
    </footer>

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>

</body>

</html>
