@extends('Admin.layout.adminlayout')
@section('title', 'Plan List')
@section('content')
    <div class="container-fluid pt-4 px-4">
         <div class="row mb-3">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        {{-- Header: Title + Add Button --}}
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Plan List</h4>
                <a class="btn btn-primary rounded-pill" href="{{ route('admin.add.plan') }}">
                    <i class="fas fa-plus me-1"></i> Add Plan
                </a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Time Duration</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach ($plans as $p)
                                <tr>
                                    <th scope="row">{{ $count }}</th>
                                    <td>{{ $p->title ?? '' }}</td>
                                    <td>{{ $p->price ?? '' }}</td>
                                    <td>{{ $p->time ?? '' }}</td>
                                    <td>{!! Str::limit($p->details, 25, '...') !!}</td>
                                    
                                    <td>
                                        <a class="btn btn-sm btn-warning me-1"
                                            href="{{ route('admin.edit.plan', $p->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('admin.delete.plan', $p->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this plan?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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
