@extends('layouts.app')
@section('content')
<header>
<!-- Start Carousel -->
    <section>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <!-- 1st image -->
                <div class="carousel-item active">
                    <img src="images/camera.jpg" class="d-block w-100" alt="...">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1 class="text-dark">CAMERA.</h1>
                            <h6 class="text-dark">Need it for Photography purposes</h6>
                            <p><a class="btn btn-lg btn-primary mt-2" href="#" role="button">More</a></p>
                        </div>
                    </div>
                </div>
                <!-- 2nd image -->
                <div class="carousel-item">
                    <img src="images/bd items.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-dark mt-6">HOME NEED</h1>
                        <h6 class="text-dark">Home purposes you can use</h6>
                    </div>
                </div>
                <!-- 3rd image -->
                <div class="carousel-item">
                    <img src="images/soup.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-dark">SOUP ITEM</h1>
                        <h6 class="text-dark">Home purposes you can use</h6>
                    </div>
                </div>
                <!-- 4th image -->
                <div class="carousel-item">
                    <img src="images/furniture.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-light">FURNITURE</h1>
                        <h6 class="text-light">Home purposes you can use</h6>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section>
        <div class="jumbotron text-center mt-5">
            <h1 class="display-3">Bidding Part</h1>
            <p class="lead">Here are the products you can bid on</p>
            <p>More info</p>

        </div>
    </section>

    <!-- Search Form -->
    <section class="container mb-4">
        <form action="{{ route('home') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search products...">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </section>

    <!-- Bidding Product -->
    <section class="container mb-2">
        <div class="container mb-5">
            <h2>Bidding Products</h2>
            <p class="mb-0">Here you can bid on every product</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card">
                        @if ($product->product_img)
                            <img src="{{ asset($product->product_img) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/default-product.png') }}" class="card-img-top product-image" alt="Default Image">
                        @endif
                        <div class="card-img-overlay text-dark">
                            <h5 class="card-title text-white mb-0">{{ $product->name }}</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p>{{ $product->description }}</p>
                            <p><strong>Starting Price:</strong> ${{ $product->start_bid }}</p>
                            <p><strong>Regular Price:</strong> ${{ $product->regular_price }}</p>
                            <p><strong>Bid End Date and Time:</strong> {{ $product->bid_end_datetime }}</p>
                        </div>
                    </div>
                    <a href="{{ route('users.bids.show', $product->id) }}" class="btn btn-warning">Bid Now</a>
                </div>
            @endforeach
        </div>
        <!-- Pagination Links -->
        <div class="pagination mt-4">
            {{ $products->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
        </div>
    </section>

    <!-- Contact -->
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Contact</h2>
                    <p class="text-secondary mb-5 text-center">The best way to contact us is to use our contact form below. Please fill out all of the required fields and we will get back to you as soon as possible.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-9">
                    <div class="bg-white border rounded shadow-sm overflow-hidden">
                        <form action="#!">
                            <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                <div class="col-12">
                                    <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" value="" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" id="phone" name="phone" value="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>

<style>
    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
