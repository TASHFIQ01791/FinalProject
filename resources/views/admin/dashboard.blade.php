{{-- @extends('layouts.app') --}}
@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col">
                        <h3 class="text-primary">Admin Dashboard</h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <!-- Total Categories -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="small-box bg-success text-dark rounded">
                            <div class="inner p-3">
                                <i class="fas fa-layer-group fa-3x mb-3"></i>
                                <h3>{{ $totalCategories }}</h3>
                                <h4>Total Categories</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Total Products -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="small-box bg-warning text-dark rounded">
                            <div class="inner p-3">
                                <i class="fas fa-boxes fa-3x mb-3"></i>
                                <h3>{{ $totalProducts }}</h3>
                                <h4>Total Products</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Total Bids -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="small-box bg-danger text-dark rounded">
                            <div class="inner p-3">
                                <i class="fas fa-gavel fa-3x mb-3"></i>
                                <h3>{{ $totalBids }}</h3>
                                <h4>Total Bids</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Total Users -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="small-box bg-info text-dark rounded">
                            <div class="inner p-3">
                                <i class="fas fa-users fa-3x mb-3"></i>
                                <h3>{{ $totalUsers }}</h3>
                                <h4 ><a class="text-dark" href="{{ route('admin.users.index') }}">Total Users</a></h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
@endsection
