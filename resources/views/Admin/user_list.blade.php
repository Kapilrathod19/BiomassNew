@extends('Admin.layout.adminlayout')
@section('title', 'User List')
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
                <h4 class="mb-0">User List</h4>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4 table-responsive">
                    <table class="table table-hover align-middle text-center text-nowrap">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th style="width: 120px;">User Status</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Phone</th>
                                <th scope="col">State</th>
                                <th scope="col">City</th>
                                <th scope="col">Zip</th>
                                <th scope="col">Address</th>
                                <th scope="col">Organization Name</th>
                                <th scope="col">Website</th>
                                <th scope="col">Service</th>
                                <th scope="col">Partner</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr style="{{ $user->status == 0 ? 'background-color: #f8d7da;' : '' }}">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td style="width: 120px;">
                                        <select class="form-select form-select-sm status-dropdown"
                                            data-user-id="{{ $user->id }}">
                                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </td>
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->ipass ?? '' }}</td>
                                    <td>{{ $user->phone ?? '' }}</td>
                                    <td>{{ $user->state ?? '' }}</td>
                                    <td>{{ $user->city ?? '' }}</td>
                                    <td>{{ $user->zip ?? '' }}</td>
                                    <td>{{ $user->address ?? '' }}</td>
                                    <td>{{ $user->organization_name ?? '' }}</td>
                                    <td>{{ $user->website ?? '' }}</td>
                                    <td>{{ $user->service ?? '' }}</td>
                                    <td>{{ $user->partner ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('admin.user.delete', $user->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.status-dropdown');

            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('change', function() {
                    const userId = this.dataset.userId;
                    const newStatus = this.value;

                    const confirmChange = confirm("Are you sure you want to change the status?");
                    if (!confirmChange) {
                        // Reload to reset select value
                        window.location.reload();
                        return;
                    }

                    fetch("{{ route('admin.users.updateStatus') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                user_id: userId,
                                status: newStatus
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                location.reload(); // Reload the page to reflect changes
                            } else {
                                alert("Failed to update status.");
                            }
                        })
                        .catch(() => {
                            alert("An error occurred.");
                        });
                });
            });
        });
    </script>
@endsection
