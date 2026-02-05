<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @php
        $ContactUs = \App\Models\ContactUs::first();
        $WebsiteLogo = \App\Models\WebsiteLogo::first();
    @endphp
    <title> {{ $ContactUs->name ?? '' }}{{ $ContactUs ? ' || ' : '' }}@yield('title')</title>

    @if ($WebsiteLogo && $WebsiteLogo->logo)
        <link href="{{ asset('WebsiteLogo/' . $WebsiteLogo->logo) }}" rel="icon">
    @endif
    <!-- css -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">


</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    @include('front.layout.header')

    @yield('content')

    @include('front.layout.footer')

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- OR this, but only one is needed, not both --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('front/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Your main script that uses jQuery -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    @yield('script')

</body>

</html>
