@extends('layouts.user')

@section('content')
<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3>{{ $product->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($product->product_img)
                        <img src="{{ asset($product->product_img) }}" alt="{{ $product->name }}" class="img-fluid">
                    @else
                        <img src="{{ asset('images/default-product.png') }}" alt="Default Image" class="img-fluid">
                    @endif
                </div>
                <div class="col-md-8">
                    <p><strong>Product ID:</strong> {{ $product->id }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Starting Price:</strong> ${{ $product->start_bid }}</p>
                    <p><strong>Regular Price:</strong> ${{ $product->regular_price }}</p>
                    <p><strong>Bid End Date and Time:</strong> {{ $product->bid_end_datetime }}</p>
                </div>
            </div>
        </div>
    </div>

    <h1>Bids for {{ $product->name }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Bid Amount</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bids as $bid)
                <tr>
                    <td>{{ $bid->id }}</td>
                    <td>{{ $bid->user->name }}</td>
                    <td>${{ $bid->bid_amount }}</td>
                    <td>{{ $bid->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        @if($bid->user_id == Auth::id())
                            <form action="{{ route('user.bids.update', $bid->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="bid_amount" value="{{ $bid->bid_amount }}" required>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <form action="{{ route('user.bids.destroy', $bid->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Place a New Bid</h2>
    <form action="{{ route('user.bids.store', $product->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="bid_amount">Bid Amount</label>
            <input type="number" name="bid_amount" id="bid_amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Place Bid</button>
    </form>
</div>
@endsection
