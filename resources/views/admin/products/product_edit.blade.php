@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" class="form-control" id="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="3" required>{{ $product->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_img">Product Image</label>
                                        <input type="file" name="product_img" class="form-control" id="product_img">
                                        @if($product->product_img)
                                            <img src="{{ asset($product->product_img) }}" alt="Product Image" style="max-width: 200px; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="start_bid">Start Bid</label>
                                        <input type="text" name="start_bid" class="form-control" id="start_bid" value="{{ $product->start_bid }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="regular_price">Regular Price</label>
                                        <input type="text" name="regular_price" class="form-control" id="regular_price" value="{{ $product->regular_price }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bid_end_datetime">Bid End Date and Time</label>
                                        <input type="datetime-local" name="bid_end_datetime" class="form-control" id="bid_end_datetime" value="{{ date('Y-m-d\TH:i', strtotime($product->bid_end_datetime)) }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

