@extends('Admin.layout.adminlayout')
@section('title', 'Testimonial List')

@section('content')
    <div class="container-fluid pt-4 px-4">

        {{-- Alerts --}}
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
                <a class="btn btn-primary rounded-pill" href="{{ route('admin.add.testimonial') }}">
                    <i class="fas fa-plus me-1"></i> Add Testimonial
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="row">
            <div class="col-12">
                <div class="bg-light rounded p-4 shadow-sm">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Message</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials as $index => $testimonial)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->designation }}</td>
                                    <td>{{ Str::limit($testimonial->message, 25, '...') }}</td>
                                    <td>
                                        <img src="{{ asset('testimonials/' . $testimonial->image) }}"
                                            alt="{{ $testimonial->name }}" width="30%" height="50" class="img-thumbnail"
                                            style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#imageModal"
                                            data-image="{{ asset('testimonials/' . $testimonial->image) }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning me-1"
                                            href="{{ route('admin.edit.testimonial', $testimonial->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('admin.delete.testimonial', $testimonial->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this testimonial?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No testimonials found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="imageModalLabel">Testimonial Image</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Testimonial Image" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    {{-- Image Modal Script --}}
    <script>
        var imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var imageUrl = button.getAttribute('data-image');
            var modalImage = imageModal.querySelector('#modalImage');
            modalImage.src = imageUrl;
        });
    </script>
@endsection
