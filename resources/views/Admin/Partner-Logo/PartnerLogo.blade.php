@extends('Admin.layout.adminlayout')
@section('title', 'Partner-Logo List')

@section('content')
<div class="container-fluid pt-4 px-4">

    {{-- Header Row with Title and Add Button --}}
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded p-4 d-flex justify-content-between align-items-center shadow-sm">
                <h4 class="mb-0">{{ $title }}</h4>
                <a href="{{ route('admin.add.partnerlogo') }}" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus me-1"></i> Add Partner Logo
                </a>
            </div>
        </div>

        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
    </div>

    {{-- Table --}}
    <div class="row g-4 mt-2">
        <div class="col-12">
            <div class="bg-light rounded p-4 shadow-sm">
                <table class="table table-striped align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Partner Logo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($PLogo as $index => $logo)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('partner_logos/' . $logo->logo) }}"
                                        alt="{{ $logo->name ?? 'Partner Logo' }}"
                                        width="100" height="50"
                                        class="img-thumbnail" style="cursor:pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        data-image="{{ asset('partner_logos/' . $logo->logo) }}">
                                </td>
                                <td>{{ $logo->name ?? '' }}</td>
                                <td>
                                    <a href="{{ route('admin.edit.partnerlogo', $logo->id) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.delete.partnerlogo', $logo->id) }}" class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this logo?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No partner logos found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Image Modal --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="imageModalLabel">Partner Logo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Logo" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

{{-- Modal Script --}}
<script>
    var imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var imageUrl = button.getAttribute('data-image');
        var modalImage = imageModal.querySelector('#modalImage');
        modalImage.src = imageUrl;
    });
</script>
@endsection
