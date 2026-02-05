@extends('Admin.layout.adminlayout')
@section('title', 'Qubeta || Admin')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{$title}}</h5>
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
                <form action="{{ route('admin.update.project') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $project->id }}">
                    <div class="mb-3">
                        <label for="project_name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" value="{{ $project->name }}">
                        @if ($errors->has('project_name'))
                        <p class="text-danger">{{ $errors->first('project_name') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_details">Project Details</label>
                        <textarea class="form-control" name="project_details" id="project_details" style="height: 150px;">{{ $project->details }}</textarea>
                        @if ($errors->has('project_details'))
                        <p class="text-danger">{{ $errors->first('project_details') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_title" class="form-label">Project Title</label>
                        <input type="text" class="form-control" id="project_title" name="project_title" value="{{ $project->title }}">
                        @if ($errors->has('project_title'))
                        <p class="text-danger">{{ $errors->first('project_title') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_description">Project Description</label>
                        <textarea class="form-control" name="project_description" id="project_description" style="height: 150px;">{{ $project->description }}</textarea>
                        @if ($errors->has('project_description'))
                        <p class="text-danger">{{ $errors->first('project_description') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_category" class="form-label">Project Category</label>
                        <input type="text" class="form-control" id="project_category" name="project_category" value="{{ $project->category }}">
                        @if ($errors->has('project_category'))
                        <p class="text-danger">{{ $errors->first('project_category') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_client" class="form-label">Project Client</label>
                        <input type="text" class="form-control" id="project_client" name="project_client" value="{{ $project->client }}">
                        @if ($errors->has('project_client'))
                        <p class="text-danger">{{ $errors->first('project_client') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_location" class="form-label">Project Location</label>
                        <input type="text" class="form-control" id="project_location" name="project_location" value="{{ $project->location }}">
                        @if ($errors->has('project_location'))
                        <p class="text-danger">{{ $errors->first('project_location') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_value" class="form-label">Project Value</label>
                        <input type="number" class="form-control" id="project_value" name="project_value" value="{{ $project->value }}">
                        @if ($errors->has('project_value'))
                        <p class="text-danger">{{ $errors->first('project_value') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_website" class="form-label">Project Website</label>
                        <input type="text" class="form-control" id="project_website" name="project_website" value="{{ $project->website }}">
                        @if ($errors->has('project_website'))
                        <p class="text-danger">{{ $errors->first('project_website') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_line_1" class="form-label">Project Line 1</label>
                        <input type="text" class="form-control" id="project_line_1" name="project_line_1" value="{{ $project->line_1 }}">
                        @if ($errors->has('project_line_1'))
                        <p class="text-danger">{{ $errors->first('project_line_1') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_line_2" class="form-label">Project Line 2</label>
                        <input type="text" class="form-control" id="project_line_2" name="project_line_2" value="{{ $project->line_2 }}">
                        @if ($errors->has('project_line_2'))
                        <p class="text-danger">{{ $errors->first('project_line_2') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_line_3" class="form-label">Project Line 3</label>
                        <input type="text" class="form-control" id="project_line_3" name="project_line_3" value="{{ $project->line_3 }}">
                        @if ($errors->has('project_line_3'))
                        <p class="text-danger">{{ $errors->first('project_line_3') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="project_line_4" class="form-label">Project Line 4</label>
                        <input type="text" class="form-control" id="project_line_4" name="project_line_4" value="{{ $project->line_4 }}">
                        @if ($errors->has('project_line_4'))
                        <p class="text-danger">{{ $errors->first('project_line_4') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="main_image" class="form-label">Main Image</label>
                        <input class="form-control" type="file" id="main_image" name="main_image">
                        @if ($errors->has('main_image'))
                        <p class="text-danger">{{ $errors->first('main_image') }}</p>
                        @endif
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
@endsection