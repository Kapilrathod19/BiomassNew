@extends('front.layout.main')
@section('title', 'My Products')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>My Products</h2>
        <a href="{{ route('user.products.create') }}" class="btn btn-primary">Add Product</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>GCV</th>
                    <th>Moisture</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('products/' . $product->image) }}" width="60">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->gcv }}</td>
                        <td>{{ $product->moisture }}</td>
                        <td>
                            @if ($product->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
