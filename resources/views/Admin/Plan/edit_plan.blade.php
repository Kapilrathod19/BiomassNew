@extends('Admin.layout.adminlayout')
@section('title', 'Edit Plan')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Plan</h5>
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
                    <form action="{{ route('admin.update.plan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $plan->id }}">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title', $plan->title) }}">
                            @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                   value="{{ old('price', $plan->price) }}">
                            @if ($errors->has('price'))
                                <p class="text-danger">{{ $errors->first('price') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time Duration</label>
                            <select name="time" class="form-select" id="time">
                                <option value="">Select Time Duration</option>
                                <option value="Monthly" {{ old('time', $plan->time) == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="Yearly" {{ old('time', $plan->time) == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                            </select>
                            @if ($errors->has('time'))
                                <p class="text-danger">{{ $errors->first('time') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control" id="details" name="details">{{ old('details', $plan->details) }}</textarea>
                            @if ($errors->has('details'))
                                <p class="text-danger">{{ $errors->first('details') }}</p>
                            @endif
                        </div>  
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                   value="{{ old('link', $plan->link) }}">
                            @if ($errors->has('link'))
                                <p class="text-danger">{{ $errors->first('link') }}</p>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.plan') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
