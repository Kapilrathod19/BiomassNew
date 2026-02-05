@extends('Admin.layout.adminlayout')
@section('title', 'Edit Service')
@section('content')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <style>
        .cke_notification_warning {
            display: none;
        }
    </style>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $title }}</h5>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.update.service') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $service->id }}">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $service->title }}">
                            @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details" style="height: 150px;">{{ $service->details }}</textarea>
                            @if ($errors->has('details'))
                                <p class="text-danger">{{ $errors->first('details') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="key_features">Key Features</label>
                            <textarea class="form-control" name="key_features" id="key_features" style="height: 150px;">{{ $service->key_features }}</textarea>
                            @if ($errors->has('key_features'))
                                <p class="text-danger">{{ $errors->first('key_features') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('services/' . $service->image) }}" alt="Service Image" width="250px"
                                height="200px">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('services/' . $service->sub_image) }}" alt="Service Sub Image" width="250px"
                                height="200px">
                        </div>
                        <div class="mb-3">
                            <label for="sub_image" class="form-label">Sub Image</label>
                            <input class="form-control" type="file" id="sub_image" name="sub_image">
                            @if ($errors->has('sub_image'))
                                <p class="text-danger">{{ $errors->first('sub_image') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('details');
        CKEDITOR.replace('key_features');
    </script>
@endsection
