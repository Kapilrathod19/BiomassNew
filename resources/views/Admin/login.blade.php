<!DOCTYPE html>
<html lang="en">
@php
    $ContactUs = \App\Models\ContactUs::first();
    $WebsiteLogo = \App\Models\WebsiteLogo::first();
@endphp

<head>
    <meta charset="utf-8">
    <title>
        {{ $ContactUs->name ?? '' }}{{ $ContactUs ? ' || ' : '' }} Admin Login
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    @if ($WebsiteLogo && $WebsiteLogo->logo)
        <link href="{{ asset('WebsiteLogo/' . $WebsiteLogo->logo) }}" rel="icon">
    @endif


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('Admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('Admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-2 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between flex-column mb-3">
                            @if ($WebsiteLogo && $WebsiteLogo->logo)
                                <img src="{{ asset('WebsiteLogo/' . $WebsiteLogo->logo) }}" class="mb-3"
                                    alt="Logo" width="200" height="70">
                            @endif
                            <h3>Admin Sign In</h3>
                        </div>
                        @if ($errors->has('failed'))
                            <div class="alert alert-danger my-2" role="alert">{{ $errors->first('failed') }}</div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success my-2" role="alert">{{ session('success') }}</div>
                        @endif
                        <form action="{{ Route('admin.checklogin') }}" method="post" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="name@example.com">
                                <label for="email">Email address</label>
                                <span id="emailError" role="alert" class="text-danger"></span>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="Password" name="password"
                                    value="{{ old('password') }}" placeholder="Password">
                                <label for="Password">Password</label>
                                <span id="passwordError" role="alert" class="text-danger"></span>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('Admin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('Admin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('Admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Admin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('Admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('Admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('Admin/js/main.js') }}"></script>
</body>
<script>
    function validateForm() {
        var username = document.getElementById("email").value;
        var password = document.getElementById("Password").value;
        var emailError = document.getElementById("emailError");
        var passwordError = document.getElementById("passwordError");
        var isValid = true;

        // Reset error messages
        emailError.textContent = "";
        passwordError.textContent = "";

        // Validate username
        if (username === "") {
            emailError.textContent = "Email is required";
            isValid = false;
        }

        // Validate password
        if (password === "") {
            passwordError.textContent = "Password is required";
            isValid = false;
        }

        return isValid;
    }
</script>

</html>
