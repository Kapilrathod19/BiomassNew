@extends('front.layout.main')
@section('title', 'Products')
@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="container-xxl py-5">
        @if (!empty($products))
            <div class="container">
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="{{ asset('products/' . $product->image) }}" alt="">
                            <div class="p-4">
                                <h4 class="mb-3">{{ $product->title ?? '' }}</h4>
                                {!! Str::words($product->details, 15, '...') ?? '' !!}
                            </div>
                            <div class="store-overlay">
                                <a href="{{route('product_details',$product->slug)}}" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i
                                        class="fa fa-arrow-right ms-2"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <nav class="pagination-area">
                            <ul class="pagination justify-content-center align-items-center mb-0">
                                {{ $products->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
