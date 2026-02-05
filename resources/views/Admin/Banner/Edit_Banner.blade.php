@extends('Admin.layout.adminlayout')
@section('title', 'Edit Banner')
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
                    <form action="{{ route('admin.update.banner') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $banner->id }}">
                        <div class="mb-3">
                            <img src="{{ asset('banners/' . $banner->image) }}" alt="Banner" width="100px" height="70px">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Banner Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name (Alt Text)</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $banner->name ?? '' }}">
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