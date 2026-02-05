@extends('Admin.layout.adminlayout')
@section('title', 'Contact Us')
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
                    <form action="{{ route('admin.update.contactUS') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $contact->id ?? '' }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $contact->name ?? '' }}">
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $contact->email ?? '' }}">
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                value="{{ $contact->mobile ?? '' }}">
                            @if ($errors->has('mobile'))
                                <p class="text-danger">{{ $errors->first('mobile') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $contact->address ?? '' }}">
                            @if ($errors->has('address'))
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Map Link</label>
                            <textarea name="map_link" id="map_link" class="form-control" rows="2" placeholder="Embed Map Link">{{ $contact->map_link ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pinterest_link" class="form-label">Pinterest Link</label>
                            <input type="text" class="form-control" id="pinterest_link" name="pinterest_link"
                                value="{{ $contact->pinterest_link ?? '' }}">
                            @if ($errors->has('pinterest_link'))
                                <p class="text-danger">{{ $errors->first('pinterest_link') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="youtube_link" class="form-label">Youtube Link</label>
                            <input type="text" class="form-control" id="youtube_link" name="youtube_link"
                                value="{{ $contact->youtube_link ?? '' }}">
                            @if ($errors->has('youtube_link'))
                                <p class="text-danger">{{ $errors->first('youtube_link') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="instagram_link" class="form-label">Instagram Link</label>
                            <input type="text" class="form-control" id="instagram_link" name="instagram_link"
                                value="{{ $contact->instagram_link ?? '' }}">
                            @if ($errors->has('instagram_link'))
                                <p class="text-danger">{{ $errors->first('instagram_link') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="facebook_link" class="form-label">Facebook Link</label>
                            <input type="text" class="form-control" id="facebook_link" name="facebook_link"
                                value="{{ $contact->facebook_link ?? '' }}">
                            @if ($errors->has('facebook_link'))
                                <p class="text-danger">{{ $errors->first('facebook_link') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="twitter_link" class="form-label">Twitter Link</label>
                            <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                value="{{ $contact->twitter_link ?? '' }}">
                            @if ($errors->has('twitter_link'))
                                <p class="text-danger">{{ $errors->first('twitter_link') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="linkedin_link" class="form-label">Linkedin Link</label>
                            <input type="text" class="form-control" id="linkedin_link" name="linkedin_link"
                                value="{{ $contact->linkedin_link ?? '' }}">
                            @if ($errors->has('linkedin_link'))
                                <p class="text-danger">{{ $errors->first('linkedin_link') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection