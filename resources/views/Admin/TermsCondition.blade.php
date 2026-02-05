@extends('Admin.layout.adminlayout')
@section('title', 'Terms & Condition')
@section('content')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<style>
.cke_notification_warning{
    display: none;
}
</style>
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
                <form action="{{ route('admin.update.termsconditions') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$terms->id ?? ''}}">                     
                    <div class="mb-3">
                        <label for="details" class="form-label">Description</label>
                        <textarea name="details" id="details">{{$terms->details ?? ''}}</textarea>                        
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