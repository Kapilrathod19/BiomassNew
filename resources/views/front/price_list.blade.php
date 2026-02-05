@extends('front.layout.main')
@section('title', 'Price List')

@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Price List</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Price List</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                @foreach($plans as $plan)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <div class="card shadow-lg border-0 rounded-4 h-100 pricing-card text-center position-relative overflow-hidden">
                            <div class="card-header bg-primary text-white rounded-top-4 py-4">
                                <h4 class="mb-1">{{ $plan->title }}</h4>
                                <h2 class="fw-bold mb-0">
                                    ₹{{ number_format($plan->price, 2) }}
                                    <small class="fs-6 text-light">/{{ $plan->time ?? '' }}</small>
                                </h2>
                            </div>
                            <div class="card-body p-4">
                                <p class="mb-4 text-muted">
                                    {!! nl2br(e($plan->details ?? '')) !!}
                                </p>
                            </div>
                            <div class="card-footer bg-light py-3">
                                @if($plan->link)
                                    <a href="{{ $plan->link }}" target="_blank" class="btn btn-outline-primary rounded-pill px-4">
                                        Subscribe Now
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .pricing-card {
            transition: all 0.3s ease-in-out;
        }
        .pricing-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
    </style>
@endsection
