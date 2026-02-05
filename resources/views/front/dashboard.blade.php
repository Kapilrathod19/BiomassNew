@extends('front.layout.main')
@section('title', 'User Login')
@section('content')
    <div class="container-xxl contact py-5">
        <div class="container">

            <div class="row justify-content-center g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-white rounded shadow-sm p-4 position-relative overflow-hidden">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="text-muted">User Panel </h5>
                                    <h2 class="fw-bold mb-2">Welcome Back {{ Auth::user()->name ?? '' }}</h2>
                                </div>
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-user-shield fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
