@extends('Admin.layout.adminlayout')
@section('title', 'Inquiry List')
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
                <h4 class="mb-0">Inquiry List</h4>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Interest</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach ($inquiries as $inquiry)
                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>{{ $inquiry->name ?? '' }}</td>
                                        <td>{{ $inquiry->email ?? '' }}</td>
                                        <td>{{ $inquiry->phone ?? '' }}</td>
                                        <td>{{ $inquiry->subject ?? '' }}</td>
                                        <td>{{ $inquiry->role ?? '' }}</td>
                                        <td>{{ $inquiry->interest ?? '' }}</td>
                                        <td class="text-start">{{ Str::limit($inquiry->message, 50) ?? '' }}</td>

                                        <td>{{ $inquiry->created_at->format('d-m-Y') }}</td>

                                        <td>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('admin.delete.inquiry', $inquiry->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this inquiry?');">
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
    </div>
@endsection
