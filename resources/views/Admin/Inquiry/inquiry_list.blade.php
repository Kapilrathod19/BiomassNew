@extends('Admin.layout.adminlayout')
@section('title', 'Inquiry List')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h5 class="mb-4">{{ $title }}</h5>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile No.</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @forelse ($Inquirys as $Inquiry)
                                <tr>
                                    <th scope="row">{{ $count }}</th>
                                    <td>{{ $Inquiry->name }}</td>
                                    <td>{{ $Inquiry->email }}</td>
                                    <td>{{ $Inquiry->phone }}</td>
                                    <td>{{ Str::limit($Inquiry->message, 25, '...') }}</td>
                                    <td>{{ $Inquiry->created_at->format('d-m-Y') }}</td>
                                </tr>
                                @php $count++; @endphp
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No inquiries found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection