@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Bid</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('user.bids.update', $bid->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="bid_amount">Bid Amount</label>
                <input type="text" name="bid_amount" class="form-control" id="bid_amount" value="{{ old('bid_amount', $bid->bid_amount) }}" required>
                @error('bid_amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Bid</button>
        </form>
    </div>
@endsection
