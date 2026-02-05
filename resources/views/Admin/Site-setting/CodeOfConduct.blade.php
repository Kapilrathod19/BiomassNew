@extends('Admin.layout.adminlayout')
@section('title', 'Code of Conduct')
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
                    <form action="{{ route('admin.update.codeOfConduct') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $code_of_conduct->id ?? '' }}">
                        <div class="mb-3">
                            <label for="details" class="form-label">Code of Conduct Details</label>
                            <textarea name="details" id="details">{{ $code_of_conduct->details ?? '' }}</textarea>
                            @if ($errors->has('details'))
                                <p class="text-danger">{{ $errors->first('details') }}</p>
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