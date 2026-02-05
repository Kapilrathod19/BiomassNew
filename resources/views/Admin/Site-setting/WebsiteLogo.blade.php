@extends('Admin.layout.adminlayout')
@section('title', 'Website Logo')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $title }}</h5>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.update.websiteLogo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $website_logo->id ?? '' }}">
                        <div class="mb-3">
                            <img src="{{ $website_logo->logo ? asset('WebsiteLogo/' . $website_logo->logo) : asset('placeholder.jpg') }}"
                                alt="{{ $website_logo->name ?? 'Website Logo' }}" width="250px">
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Website Logo</label>
                            <input class="form-control" type="file" id="logo" name="logo">
                            @if ($errors->has('logo'))
                                <p class="text-danger">{{ $errors->first('logo') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name (Alt Text)</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $website_logo->name ?? '' }}">
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection