@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- User Information Card -->
        <div class="col-md-12 mb-4">
            <div class="card border-primary ">
                <div class="card-body text-center">
                    <h2 class="card-title mb-3 text-primary font-weight-bold">Welcome, {{ $user->name }}</h2>
                    <p class="card-text text-muted">Manage your bids and view your profile here.</p>
                </div>
            </div>
        </div>

        <!-- Bids Count Card -->
        <div class="col-md-12 mb-4">
            <div class="card border-gray ">
                <div class="card-body text-center">
                    <h3 class="card-title mb-3 text-success font-weight-bold">Your Bids</h3>
                    <h1 class="card-text mb-4 text-success font-weight-bold">{{ $bidCount }}</h1>
                    <p class="card-text text-muted">{{ Str::plural('bid', $bidCount) }} placed.</p>
                </div>
            </div>
        </div>

        <!-- Products Bidded On -->
        <div class="col-md-12">
                <div class=" text-dark">
                    <h3 class="card-title mb-0">Products You've Bid On</h3>
                </div>
                <div class="card-body">
                    @if($products->isEmpty())
                        <p class="text-muted">You haven't placed bids on any products yet.</p>
                    @else
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4 mb-4">
                                    <div class="card border-gray shadow-sm">
                                        <img src="{{ asset($product->product_img) }}" class="card-img-top" alt="Product Image">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">{{ $product->description }}</p>
                                            <p class="card-text"><strong>Current Bid:</strong> {{ $product->bids->max('bid_amount') ?? 'No bids yet' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
