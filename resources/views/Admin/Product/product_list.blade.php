@extends('Admin.layout.adminlayout')
@section('title', 'Product List')
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
                    <a class="btn btn-primary rounded-pill" href="{{ route('admin.add.product') }}" role="button">Add
                        Product</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h5 class="mb-4">{{ $title }}</h5>
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Details</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count = 1; @endphp
                            @foreach ($products as $product)
                                <tr style="{{ $product->status == 0 ? 'background-color: #f8d7da;' : '' }}">
                                    <th scope="row">{{ $count }}</th>
                                    <td>{{ $product->user->name ?? 'Admin' }}</td>
                                    <td>{{ $product->title ?? '' }}</td>
                                    <td>{!! Str::limit($product->details, 25, '...') !!}</td>
                                    <td>
                                        <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}"
                                            width="100px" data-bs-toggle="modal" data-bs-target="#imageModal"
                                            data-image="{{ asset('products/' . $product->image) }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning me-1"
                                            href="{{ route('admin.edit.product', $product->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('admin.delete.product', $product->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this product?');">
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
                    <h5 class="modal-title" id="imageModalLabel">Product Image</h5>
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
