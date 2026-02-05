@extends('Admin.layout.adminlayout')
@section('title', 'Edit Product')
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
                    <form action="{{ route('admin.update.product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $product->id }}">

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category"
                                value="{{ $product->category }}">
                            @if ($errors->has('category'))
                                <p class="text-danger">{{ $errors->first('category') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $product->title }}">
                            @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details" style="height: 150px;">{{ $product->details }}</textarea>
                            @if ($errors->has('details'))
                                <p class="text-danger">{{ $errors->first('details') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="size" class="form-label">Size <small class="text-muted">(e.g., 12x18
                                    mm)</small></label>
                            <input type="text" class="form-control" id="size" name="size"
                                value="{{ $product->size }}">
                            @if ($errors->has('size'))
                                <p class="text-danger">{{ $errors->first('size') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="gcv" class="form-label">GCV</label>
                            <input type="text" class="form-control" id="gcv" name="gcv"
                                value="{{ $product->gcv }}">
                            @if ($errors->has('gcv'))
                                <p class="text-danger">{{ $errors->first('gcv') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="moisture" class="form-label">MOISTURE <small class="text-muted">(e.g., &lt;
                                    10%)</small></label>
                            <input type="text" class="form-control" id="moisture" name="moisture"
                                value="{{ $product->moisture }}">
                            @if ($errors->has('moisture'))
                                <p class="text-danger">{{ $errors->first('moisture') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Current Image</label>
                            @if ($product->image)
                                <img src="{{ asset('products/' . $product->image) }}" alt="Product Image" width="250px"
                                    height="200px">
                            @else
                                <p class="text-muted">No image uploaded.</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Change Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @if ($errors->has('image'))
                                <p class="text-danger">{{ $errors->first('image') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Approved</option>
                                <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>Not Approved
                                </option>
                            </select>
                            @if ($errors->has('status'))
                                <p class="text-danger">{{ $errors->first('status') }}</p>
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
    </script>
@endsection
