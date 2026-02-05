@extends('Admin.layout.adminlayout')
@section('title', 'About')
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
                    <form action="{{ route('admin.update.about') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $about->id ?? '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label d-block">Main Image Preview</label>
                                    <img src="{{ $about->main_image ? asset('About/' . $about->main_image) : asset('') }}"
                                        alt="Main Image" width="200" height="200" class="img-thumbnail">
                                </div>

                                <div class="mb-3">
                                    <label for="main_image" class="form-label">Upload Main Image</label>
                                    <input class="form-control @error('main_image') is-invalid @enderror" type="file"
                                        id="main_image" name="main_image">

                                    @error('main_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $about->title ?? '' }}">
                            @error('title')<p class="text-danger">{{ $message }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description">{{ $about->description ?? '' }}</textarea>
                                @error('description')<p class="text-danger">{{ $message }}</p>@endif
                            </div>
                            <div class="mb-3">
                                <label for="our_vision" class="form-label">Our Vision</label>
                                <textarea class="form-control" name="our_vision" id="our_vision">{{ $about->our_vision ?? '' }}</textarea>
                                @error('our_vision')<p class="text-danger">{{ $message }}</p>@endif
                            </div>
                            <div class="mb-3">
                                <label for="our_mission" class="form-label">Our Mission</label>
                                <textarea class="form-control" name="our_mission" id="our_mission">{{ $about->our_mission ?? '' }}</textarea>
                                @error('our_mission')<p class="text-danger">{{ $message }}</p>@endif
                            </div>

                            <div class="mb-3">
                                <label for="projects" class="form-label">Projects</label>
                                <input type="text" class="form-control" id="projects" name="projects" value="{{ $about->projects ?? '' }}">
                                @error('projects')<p class="text-danger">{{ $message }}</p>@endif
                            </div>
                            <div class="mb-3">
                                <label for="experts" class="form-label">Experts</label>
                                <input type="text" class="form-control" id="experts" name="experts"
                                    value="{{ $about->experts ?? '' }}">
                                @error('experts')
                                    <p class="text-danger">{{ $message }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="clients" class="form-label">Clients</label>
                                    <input type="text" class="form-control" id="clients" name="clients"
                                        value="{{ $about->clients ?? '' }}">
                                    @error('clients')
                                        <p class="text-danger">{{ $message }}</p>
                                        @endif 
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience" class="form-label">Experience</label>
                                        <input type="text" class="form-control" id="experience" name="experience"
                                            value="{{ $about->experience ?? '' }}">
                                        @error('experience')
                                            <p class="text-danger">{{ $message }}</p>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        CKEDITOR.replace('description');
                        CKEDITOR.replace('our_vision');
                        CKEDITOR.replace('our_mission');
                    </script>
                @endsection
