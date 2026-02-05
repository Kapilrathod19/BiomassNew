@extends('Admin.layout.adminlayout')
@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-white rounded shadow-sm p-4 position-relative overflow-hidden">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="fw-bold mb-2">Welcome Back </h2>
                        <h5 class="text-muted">Admin Panel for {{ $ContactUs->name ?? 'Your Website' }}</h5>
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
@endsection
