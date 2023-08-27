<head>
    <meta charset="utf-8">
    <title>Hotel Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('/frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('/frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('/frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('/frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Uttara, Dhaka 1230</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>01631129351</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>afrojaakhi673@gmail.com</small>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">

                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('frontend.home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('available.rooms') }}" class="nav-item nav-link">Rooms</a>
                    @auth('customers')
                        <a href="{{ route('user.dashboard') }}" class="nav-item nav-link">User Profile</a>
                        <a href="{{ route('user.logout') }}" class="nav-item nav-link">Logout</a>
                    @else
                        <a href="javascript:void(0)" class="nav-item nav-link" data-bs-toggle="modal"
                            data-bs-target="#modalLoginForm">Login</a>
                        <a href="javascript:void(0)" class="nav-item nav-link" data-bs-toggle="modal"
                            data-bs-target="#modalRegisterForm">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-bs-labelledby="myModalLabel"
            aria-bs-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                        <button type="button" class="btn close" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-bs-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('userCustomer.login') }}" method="post">
                        @csrf
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" id="defaultForm-email" class="form-control validate"
                                    name="email">
                                <label data-bs-error="wrong" data-bs-success="right" for="defaultForm-email">Your
                                    email</label>
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <input type="password" id="defaultForm-pass" class="form-control validate"
                                    name="password">
                                <label data-bs-error="wrong" data-bs-success="right" for="defaultForm-pass">Your
                                    password</label>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog"
            aria-bs-labelledby="myModalLabel" aria-bs-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                        <button type="button" class="btn close" data-bs-dismiss="modal" aria-bs-label="Close">
                            <span aria-bs-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" id="orangeForm-name" class="form-control validate"
                                    name="name">
                                <label data-error="wrong" data-success="right" for="orangeForm-name">Your
                                    name</label>
                            </div>
                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" id="orangeForm-email" class="form-control validate"
                                    name="email">
                                <label data-error="wrong" data-success="right" for="orangeForm-email">Your
                                    email</label>
                            </div>

                            <div class="md-form mb-4">
                                <i class="fas fa-lock prefix grey-text"></i>
                                <input type="password" id="orangeForm-pass" class="form-control validate"
                                    name="password">
                                <label data-error="wrong" data-success="right" for="orangeForm-pass">Your
                                    password</label>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-deep-orange">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
