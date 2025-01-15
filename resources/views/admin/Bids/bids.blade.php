@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-primary">Bids</h3>
                            <form action="{{ route('admin.bids.index') }}" method="GET" class="form-inline">
                                <input type="text" name="search" class="form-control mr-2" placeholder="Search bids..." value="{{ request()->query('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Bid Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bids as $bid)
                                <tr>
                                    <td>{{ $bid->id }}</td>
                                    <td>{{ $bid->user->name }}</td>
                                    <td>{{ $bid->product->name }}</td>
                                    <td>${{ $bid->bid_amount }}</td>
                                    <td>
                                        @if($bid->status == 1)
                                            Bid
                                        @elseif($bid->status == 2)
                                            Confirmed
                                        @elseif($bid->status == 3)
                                            Cancelled
                                        @else
                                            Unknown
                                        @endif
                                    </td>
                                    <td>{{ $bid->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <form action="{{ route('admin.updateBidStatus', ['id' => $bid->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control">
                                                <option value="1" {{ $bid->status == 1 ? 'selected' : '' }}>Bid</option>
                                                <option value="2" {{ $bid->status == 2 ? 'selected' : '' }}>Confirmed</option>
                                                <option value="3" {{ $bid->status == 3 ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        <div class="d-flex justify-content-center">
                            {{ $bids->appends(['search' => request()->query('search')])->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
