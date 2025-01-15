@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Details') }}</div>
                <div class="card-body">
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <img src="{{ asset($product->product_img) }}" alt="Product Image" style="max-width: 200px;">
                    <p>Start Bid: {{ $product->start_bid }}</p>
                    <p>Regular Price: {{ $product->regular_price }}</p>
                    <p>Bid End Date: {{ $product->bid_end_datetime }}</p>

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(now() < $product->bid_end_datetime && !$product->winner_id)
                        <form action="{{ route('bids.store', $product->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="amount">Your Bid</label>
                                <input type="number" name="amount" id="amount" class="form-control" min="{{ $product->start_bid + 1 }}" max="{{ $product->regular_price }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Place Bid</button>
                        </form>
                    @else
                        <p>Bidding has ended or the product has a confirmed winner.</p>
                    @endif

                    <h2>Bids</h2>
                    @if($bids->isEmpty())
                        <p>No bids yet.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bidder</th>
                                    <th>Bid Amount</th>
                                    <th>Bid Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bids as $bid)
                                    <tr>
                                        <td>{{ $bid->user->name }}</td>
                                        <td>{{ $bid->bid_amount }}</td>
                                        <td>{{ $bid->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
