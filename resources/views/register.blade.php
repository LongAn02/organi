<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image">
                    <img src="{{ asset('assets/img/img-register.jpg') }}" alt="" class="w-100" style="height: 100%">
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="{{ route('user.register') }}" method="POST" name="registerUser">
                            @csrf
                            <div class="form-group row mb-3">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text"
                                           class="form-control form-control-user @error('name') is-invalid @enderror"
                                           id="name-register"
                                           name="name" placeholder="Enter Name">
                                    <span>
                                            @error('name')
                                                <span class="text-danger">Erro : {{ $message }}</span>
                                            @enderror
                                        </span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email-register"
                                       name="email" placeholder="Enter Email">
                                <span>
                                    @error('email')
                                        <span class="text-danger">Erro : {{ $message }}</span>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               id="password-register" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user @error('repeatPassword') is-invalid @enderror"
                                               id="repeat-password-register" name="repeatPassword"
                                               placeholder="Repeat Password">
                                    </div>
                                </div>
                                <span>
                                    @error('password')
                                        <span class="text-danger">Erro : {{ $message }}</span>
                                    @enderror

                                    @error('repeatPassword')
                                        <span class="text-danger">Erro : {{ $message }}</span>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number"
                                               class="form-control form-control-user @error('phone') is-invalid @enderror"
                                               id="phone-register"
                                               name="phone" placeholder="Enter Number Phone">
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center justify-content-around">
                                        <div>
                                            <input type="radio" class="mt-2" name="sex" value="1" checked>
                                            <label for="">Boy</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="mt-2" name="sex" value="0">
                                            <label for="">Girl</label>
                                        </div>
                                    </div>
                                </div>
                                <span>
                                    @error('phone')
                                        <span class="text-danger">Erro : {{ $message }}</span>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control form-control-user @error('address') is-invalid @enderror" id="address-register"
                                       name="address" placeholder="Enter Address">
                                <span>
                                    @error('address')
                                        <span class="text-danger">Erro : {{ $message }}</span>
                                    @enderror
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('user.view.login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
