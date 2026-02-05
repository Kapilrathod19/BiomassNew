@extends('front.layout.main')
@section('title', 'About Us')
@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            @if (!empty($about))
                <div class="row g-5">
                    <div class="col-lg-6">
                        <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s"
                            src="{{ asset('About/' . $about->main_image) }}" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="section-title">
                            <p class="fs-5 fw-medium fst-italic text-primary">About Us</p>
                            <h1 class="display-6">{{ $about->title ?? '' }}</h1>
                        </div>
                        <div class="row g-3 mb-4">
                            {!! $about->description ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="section-title">
                            <p class="fs-5 m-0 fw-medium fst-italic text-primary">Our Vision</p>
                        </div>
                        <div class="row g-3 mb-4">
                            {!! $about->our_vision ?? '' !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title">
                            <p class="fs-5 m-0 fw-medium fst-italic text-primary">Our Mission</p>
                        </div>
                        <div class="row g-3 mb-4">
                            {!! $about->our_mission ?? '' !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
