@extends('Admin.layout.adminlayout')
@section('title', 'Blog List')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 d-flex justify-content-between align-items-center">
                    <div>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    <a class="btn btn-primary rounded-pill" href="{{ route('admin.add.blog') }}" role="button">Add Blog</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h5 class="mb-4">{{ $title }}</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Blog Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $count }}</th>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.edit.blog', $blog->id) }}"
                                            role="button"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" href="{{ route('admin.delete.blog', $blog->id) }}"
                                            role="button"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @php $count++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection