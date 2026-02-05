@extends('Admin.layout.adminlayout')
@section('title', 'Certificate List')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 d-flex justify-content-between align-items-center">
                    <div>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <a class="btn btn-primary rounded-pill" href="{{ route('admin.add.certificate') }}" role="button">Add
                        Certificate</a>
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
                                <th scope="col">Certificate</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @forelse ($certificates as $certificate)
                                <tr>
                                    <th scope="row">{{ $count }}</th>
                                    <td>
                                        <img src="{{ asset('certificates/' . $certificate->image) }}"
                                            alt="{{ $certificate->name ?? 'Certificate' }}" width="100px" height="50px"
                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                            data-image="{{ asset('certificates/' . $certificate->image) }}">
                                    </td>
                                    <td>{{ $certificate->name ?? 'N/A' }}</td>
                                    <td>{{ $certificate->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.edit.certificate', $certificate->id) }}" role="button"><i
                                                class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger"
                                            href="{{ route('admin.delete.certificate', $certificate->id) }}" role="button"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @php $count++; @endphp
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No certificates found.</td>
                                </tr>
                            @endforelse
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
                    <h5 class="modal-title" id="imageModalLabel">Certificate Image</h5>
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
        imageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var imageUrl = button.getAttribute('data-image');
            var modalImage = imageModal.querySelector('.modal-body #modalImage');
            modalImage.src = imageUrl;
        });
    </script>
@endsection