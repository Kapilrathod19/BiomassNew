<!doctype html>
<html lang="en">
@php
    $user = Auth::user();
    $currentUrl = request()->segment(2);
    $ContactUs = \App\Models\ContactUs::first();
    $WebsiteLogo = \App\Models\WebsiteLogo::first();
@endphp

<head>
    <meta charset="utf-8">
    <title>
        {{ $ContactUs->name ?? '' }}{{ $ContactUs ? ' || ' : '' }}@yield('title')
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
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


        <!-- Sidebar Start -->
        <div class="sidebar pe-2 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ Route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
                    @if ($WebsiteLogo && $WebsiteLogo->logo)
                        <img src="{{ asset('WebsiteLogo/' . $WebsiteLogo->logo) }}" class="mb-3" alt="Logo"
                            width="200" height="70">
                    @else
                        <h3 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h3>
                    @endif
                </a>

                <div class="navbar-nav w-100">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-item nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ Route::is('admin.contactUS', 'admin.websiteLogo','admin.slider', 'admin.about', 'admin.partnerlogo', 'admin.edit.partnerlogo','admin.PrivacyPolicy','admin.termsconditions') ? 'active' : '' }}"
                            data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Site Setting</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.websiteLogo') }}" class="dropdown-item">Website Logo</a>
                            <a href="{{ Route('admin.slider') }}" class="dropdown-item">Slider</a>
                            <a href="{{ route('admin.about') }}" class="dropdown-item">About Us</a>
                            <a href="{{ route('admin.contactUS') }}" class="dropdown-item">Contact Us</a>
                            {{-- <a href="{{ route('admin.partnerlogo') }}" class="dropdown-item">Partner Logo</a> --}}
                            <a href="{{ route('admin.PrivacyPolicy') }}" class="dropdown-item">Privacy Policy</a>
                            <a href="{{ route('admin.termsconditions') }}" class="dropdown-item">Terms & Conditions</a>
                        </div>
                    </div>

                    <a href="{{ Route('admin.users') }}"
                        class="nav-item nav-link {{ Route::is('admin.users') ? 'active' : '' }}"><i
                            class="fas fa-users me-2"></i>Users</a>
                    <a href="{{ Route('admin.product') }}"
                        class="nav-item nav-link {{ Route::is('admin.product','admin.add.product','admin.edit.product') ? 'active' : '' }}"><i class="fas fa-solid fa-box me-2"></i>Products</a>
                    <a href="{{ Route('admin.plan') }}"
                        class="nav-item nav-link {{ Route::is('admin.plan','admin.add.plan','admin.edit.plan') ? 'active' : '' }}"><i class="fas me-2 fa-solid fa-list"></i>Plan</a>
                    {{-- <a href="{{ Route('admin.service') }}"
                        class="nav-item nav-link {{ Route::is('admin.service') ? 'active' : '' }}"><i
                            class="fas fa-user-cog me-2"></i>Services</a>
                    <a href="{{ Route('admin.blog') }}"
                        class="nav-item nav-link {{ Route::is('admin.blog') ? 'active' : '' }}"><i
                            class="fas fa-blog me-2"></i>Blog</a>
                    <a href="{{ Route('admin.testimonial') }}"
                        class="nav-item nav-link {{ Route::is('admin.testimonial') ? 'active' : '' }}"><i
                            class="fas fa-comments me-2"></i>Testimonial</a> --}}
                    <a href="{{ Route('admin.inquiry') }}"
                        class="nav-item nav-link {{ Route::is('admin.inquiry') ? 'active' : '' }}"><i
                            class="fas fa-phone-square-alt me-2"></i>Inquiry</a>
                            
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('Admin/img/user.jpg') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ $user->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ Route('admin.profile') }}" class="dropdown-item">My Profile</a>
                            <a href="{{ Route('admin.logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            @yield('content')
            <!-- Footer Start -->
            {{-- <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">{{ $ContactUs->name ?? '' }}</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
    @yield('script')
</body>

</html>
