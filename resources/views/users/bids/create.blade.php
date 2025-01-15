@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Place a Bid on {{ $product->name }}</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('user.bids.store', $product->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bid_amount">Bid Amount</label>
                <input type="text" name="bid_amount" class="form-control" id="bid_amount" required>
                @error('bid_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Place Bid</button>
        </form>
    </div>
@endsection
