@extends('front.layout.main')
@section('title', 'Privacy Policy')
@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Privacy Policy</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Privacy Policy</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl contact py-5">
        @if (!empty($privacy_policy))
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="heading-layout2 mb-4">
                            <div class="heading-layout2">
                                {!! $privacy_policy->details ?? 'No privacy policy available.' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
