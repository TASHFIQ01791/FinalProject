@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title text-primary">Products</h3>
                                <form action="{{ route('admin.products.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Search products..." value="{{ request()->query('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add New</a>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Start Bid</th>
                                            <th>Regular Price</th>
                                            <th>Bid End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td width="20%"><img src="{{ asset($product->product_img) }}" alt="Product Image" style="max-width: 200px;"></td>
                                                <td>{{ $product->start_bid }}</td>
                                                <td>{{ $product->regular_price }}</td>
                                                <td>{{ $product->bid_end_datetime }}</td>
                                                <td>
                                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $products->appends(['search' => request()->query('search')])->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
