@extends('front.layout.main')
@section('title', 'Product Details')

@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Product Details</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="breadcrumb-item text-dark" aria-current="page">
                        Product Details
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <div class="row g-5 align-items-center">
                <!-- Product Image -->
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100"
                        src="{{ asset('products/' . $product->image) }}"
                        alt="{{ $product->title }}">
                </div>

                <!-- Product Info -->
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <div class="section-title">
                        <h1 class="display-6">{{ $product->title ?? '' }}</h1>
                    </div>

                    @if (!empty($product->size))
                        <p class="fs-5 fw-medium fst-italic text-primary mb-3">
                            SIZE : {{ $product->size }}
                        </p>
                    @endif

                    @if (!empty($product->gcv))
                        <p class="fs-5 fw-medium fst-italic text-primary mb-3">
                            GCV : {{ $product->gcv }}
                        </p>
                    @endif

                    @if (!empty($product->moisture))
                        <p class="fs-5 fw-medium fst-italic text-primary mb-3">
                            MOISTURE : {{ $product->moisture }}
                        </p>
                    @endif

                    <p class="fs-5 fw-medium fst-italic text-primary mb-0">
                        CATEGORY : {{ $product->category ?? '' }}
                    </p>
                </div>
            </div>

            <!-- Product Description -->
            <div class="row mt-5">
                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                    {!! $product->details !!}
                </div>
            </div>

        </div>
    </div>
@endsection