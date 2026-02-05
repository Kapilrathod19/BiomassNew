@extends('front.layout.main')
@section('title', 'Home')
@section('content')
    <style>
        .counter h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .counter span {
            font-size: 1.5rem;
            font-weight: bold;
            color: #198754;
            /* Bootstrap success color */
        }

        #header-carousel {
            height: 600px;
            /* Adjust as needed */
            overflow: hidden;
        }

        #header-carousel .carousel-item {
            height: 600px;
        }

        #header-carousel .carousel-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }
    </style>


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        @if (!empty($sliders) && count($sliders))
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="w-100" src="{{ asset('Slider/' . $slider->image) }}" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7 text-center">
                                            <p class="fs-4 text-white animated zoomIn">
                                                {{ $slider->sub_title ?? '' }}
                                            </p>
                                            <h1 class="display-1 text-dark mb-4 animated zoomIn">
                                                {{ $slider->title ?? '' }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
    </div>

    <!-- Carousel End -->


    <!-- About Start -->
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
    <!-- About End -->


    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        @if (!empty($products) && count($products) > 0)
            <div class="container py-5">
                {{-- Section title --}}
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-primary">Our Products</p>
                    <h1 class="display-6">We are dealing with...</h1>
                </div>

                {{-- Product Carousel --}}
                <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                    @foreach ($products as $product)
                        <a href="{{ route('product_details', $product->slug) }}"
                            class="d-block product-item rounded overflow-hidden">
                            <img src="{{ asset('products/' . $product->image) }}" class="img-fluid"
                                alt="{{ $product->title }}">
                            <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4 rounded">
                                <h4 class="text-primary">{{ $product->title ?? '' }}</h4>
                                <span class="text-body d-block">{!! Str::limit(strip_tags($product->details), 50, '...') ?? '' !!}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- View More Button --}}
                <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('products') }}" class="btn btn-primary rounded-pill py-3 px-5">View More Products</a>
                </div>
            </div>
        @endif
    </div>

    <!-- Products End -->


    <!-- Video Start -->
    <div class="container-fluid video my-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-12 py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="py-5">
                        <h5 class="fw-normal lh-base fst-italic text-white mb-5">Why Choose Us</h5>
                        <h1 class="display-6 mb-4">Few Reason <span class="text-white">Why Our Client Choose Us</span>
                        </h1>
                        <h5 class="fw-normal lh-base fst-italic text-white mb-5">At Biomass Mart, we are providing a
                            platform where everyone in the biomass industry can connect with us and grow thier business.
                        </h5>
                        <div class="row g-4 mb-5">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Reliable Supply Chain for Manufacturers & Traders</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Raw Material Solutions for Farmers & Suppliers</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">One Stop Soltuion for Biomass industry</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">We are not just platform , We are partners</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->

    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        @if (!empty($ContactUs))
            <div class="container">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s"
                    style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                    <h1 class="display-6">Contact us right now</h1>
                </div>
                <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-lg-8">
                        <div class="row justify-content-center g-5">
                            @if ($ContactUs->email)
                                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="btn-square mx-auto mb-3">
                                        <i class="fa fa-envelope fa-2x text-white"></i>
                                    </div>
                                    <p class="mb-2">{{ $ContactUs->email ?? '' }}</p>
                                </div>
                            @endif
                            @if ($ContactUs->mobile)
                                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="btn-square mx-auto mb-3">
                                        <i class="fa fa-phone fa-2x text-white"></i>
                                    </div>
                                    <p class="mb-2">{{ $ContactUs->mobile ?? '' }}</p>
                                </div>
                            @endif
                            @if ($ContactUs->address)
                                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="btn-square mx-auto mb-3">
                                        <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                                    </div>
                                    <p class="mb-2">{{ $ContactUs->address ?? '' }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Contact Start -->


@endsection
