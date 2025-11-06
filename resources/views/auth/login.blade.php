<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('templateadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('templateadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- fish eye-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/lambang_mura.png') }}">

    <!-- Google reCAPTCHA Script -->
    {!! NoCaptcha::renderJs() !!}

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-white text-center"
                                style="display: flex; align-items: center; justify-content: center;">
                                <div>
                                    <img src="{{ asset('image/lambang_mura.png') }}" alt="Logo UMKM"
                                        style="width: 800px; max-width: 100%; height: auto;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masukkan username & password untuk login</h1>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-success text-center">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if ($errors->has('username'))
                                        <div class="alert alert-danger text-center">
                                            {{ $errors->first('username') }}
                                        </div>
                                    @endif

                                    <form class="user" method="POST" action="{{ route('login.submit') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                placeholder="Masukkan Username...">
                                        </div>

                                        <div class="form-group position-relative">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-user" placeholder="Password">
                                            <span class="position-absolute"
                                                style="right:15px; top:10px; cursor:pointer;"
                                                onclick="this.previousElementSibling.type = this.previousElementSibling.type === 'password' ? 'text' : 'password';
                                                this.innerHTML = this.previousElementSibling.type === 'password' 
                                                ? '<i class=\'fas fa-eye\'></i>' 
                                                : '<i class=\'fas fa-eye-slash\'></i>';">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>

                                        {{-- ✅ reCAPTCHA --}}
                                        <div class="mb-3">
                                            {!! NoCaptcha::display() !!}
                                            @error('g-recaptcha-response')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <a href="{{ route('password.request') }}"
                                            class="btn btn-secondary btn-user btn-block">
                                            Lupa Password
                                        </a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ 'templateadmin/vendor/jquery/jquery.min.js' }}"></script>
    <script src="{{ 'vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ 'templateadmin/vendor/jquery-easing/jquery.easing.min.js' }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ 'templateadmin/js/sb-admin-2.min.js' }}"></script>

</body>

</html>
