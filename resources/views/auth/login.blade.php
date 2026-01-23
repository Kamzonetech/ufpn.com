<!doctype html>
<html lang="en" >

<head>

    <meta charset="utf-8" />
    <title>Authorized Access</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Artemis Research Lab" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('/admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('/admin/assets/css/app.min.css') }}"  id="app-style"  rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg border-0 rounded-lg overflow-hidden">

                        <div class="bg-login text-center p-4" style="background: linear-gradient(to right, #04062e, #070b4d);">
                            <div class="position-relative">
                                <h5 class="text-white fw-bold font-size-22 mb-2">UPFN (Ummah Peace Foundation Network)</h5>
                                <p class="text-white-50 mb-3">Sign in to continue.</p>
                                <a href="{{ route('welcome') }}" class="logo logo-admin">

                                    <img src="{{ asset('admin/assets/images/LOGO UPFN2.png') }}" alt="Logo" height="55">
                                    {{-- <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="Logo" height="50"> --}}
                                    {{-- <img src="{{ asset('admin/assets/images/favicon.png') }}" alt="Logo" height="50"> --}}
                                </a>
                            </div>
                        </div>

                        <div class="card-body pt-5">
                            <div class="p-3">
                                <x-feedback-alert />

                                <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control shadow-sm" id="email" placeholder="Email">
                                        <label for="email">Email</label>
                                        @error('email')
                                            <p class="text-danger small mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control shadow-sm" id="userpassword" placeholder="Password">
                                        <label for="userpassword">Password</label>
                                        @error('password')
                                            <p class="text-danger small mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                            <label class="form-check-label small" for="remember_me">Remember me</label>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="text-muted small">
                                            <i class="mdi mdi-lock me-1"></i> Forgot password?
                                        </a>
                                    </div>

                                    <div class="d-grid">
                                        <button onclick="disableButton(this)" style="background-color: #04062e" class="btn btn-success  shadow-lg fw-bold" type="submit">
                                            Login <i class="mdi mdi-login ms-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('/admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('/admin/assets/js/app.js') }}"></script>
    <script>
        function disableButton(button) {
            button.disabled = true;
            button.value = "submitting...."
            button.form.submit();
       }
       </script>
</body>

</html>
