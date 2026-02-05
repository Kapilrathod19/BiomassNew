@extends('front.layout.main')
@section('title', 'Add Product')
@section('content')
 <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <style>
        .cke_notification_warning {
            display: none;
        }
    </style>
<div class="container py-5">
    <h2 class="mb-4">Add New Product</h2>
    <form action="{{ route('user.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category') }}" required>
            @error('category')<span class="text-danger small">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')<span class="text-danger small">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label>Details</label>
            <textarea name="details" class="form-control">{{ old('details') }}</textarea>
            @error('details')<span class="text-danger small">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label>Size</label>
            <input type="text" name="size" class="form-control" value="{{ old('size') }}" required>
            @error('size')<span class="text-danger small">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label>GCV</label>
            <input type="text" name="gcv" class="form-control" value="{{ old('gcv') }}" required>
            @error('gcv')<span class="text-danger small">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label>Moisture</label>
            <input type="text" name="moisture" class="form-control" value="{{ old('moisture') }}" required>
            @error('moisture')<span class="text-danger small">{{ $message }}</span>@enderror
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')<span class="text-danger small">{{ $message }}</span>@enderror
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    CKEDITOR.replace('details');
</script>
@endsection
