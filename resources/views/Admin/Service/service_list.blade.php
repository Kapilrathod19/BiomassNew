@extends('Admin.layout.adminlayout')
@section('title', 'Service List')
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
                <h4 class="mb-0">{{ $title }}</h4>
                <a class="btn btn-primary rounded-pill" href="{{ route('admin.add.service') }}">
                    <i class="fas fa-plus me-1"></i> Add Service
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
                                <th scope="col">Details</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach ($services as $service)
                                <tr>
                                    <th scope="row">{{ $count }}</th>
                                    <td>{{ $service->title }}</td>
                                    <td>{!! Str::limit($service->details, 25, '...') !!}</td>
                                    <td>
                                        <img src="{{ asset('services/' . $service->image) }}" alt="img" height="50px"
                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                            data-image="{{ asset('services/' . $service->image) }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning me-1"
                                            href="{{ route('admin.edit.service', $service->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('admin.delete.service', $service->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this service?');">
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
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Service Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <script>
        var imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var imageUrl = button.getAttribute('data-image');
            var modalImage = imageModal.querySelector('.modal-body #modalImage');
            modalImage.src = imageUrl;
        });
    </script>
@endsection
