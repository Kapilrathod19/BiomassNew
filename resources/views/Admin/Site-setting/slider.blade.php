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
            <form action="{{ route('admin.update.slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$sliders->id}}"> 
                    <div class="mb-3">
                        <img src="{{ asset('Slider/' . $sliders->image) }}" alt="Slider Image" width="250px" height="150px">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Slider Image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                        @if ($errors->has('image'))
                            <p class="text-danger">{{ $errors->first('image') }}</p>                            
                        @endif
                    </div>                                         
                    <div class="mb-3">
                        <label for="sub_title" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$sliders->sub_title}}"> 
                        @if ($errors->has('sub_title'))
                            <p class="text-danger">{{ $errors->first('sub_title') }}</p>
                        @endif                       
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$sliders->title}}"> 
                        @if ($errors->has('title'))
                            <p class="text-danger">{{ $errors->first('title') }}</p>
                        @endif                       
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" style="height: 150px;">{{$sliders->description}}</textarea>
                        @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>                                              
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>                                
            </div>
        </div>
    </div>
</div>
@endsection