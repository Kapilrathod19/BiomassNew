@extends('front.layout.main')
@section('title', 'Product Details')
@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Product Details</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Product Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ asset('products/' . $product->image) }}" alt="">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                  <div class="section-title">
                    <h1 class="display-6">{{ $product->title ?? '' }}</h1>
                  </div>
                  {!! $product->details !!}
                  <p class="fs-5 fw-medium fst-italic text-primary">SIZE : {{ $product->size ?? '' }}</p>
                  <p class="fs-5 fw-medium fst-italic text-primary">GCV : {{ $product->gcv ?? '' }}</p>
                  <p class="fs-5 fw-medium fst-italic text-primary">MOISTURE : {{ $product->moisture ?? '' }}</p>
                  <p class="fs-5 fw-medium fst-italic text-primary">CATEGORY : {{ $product->category ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
