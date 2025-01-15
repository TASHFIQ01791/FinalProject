<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Website</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Bootstrap Icons CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/index.css">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/6bd6346bb5.js" crossorigin="anonymous"></script>
    </head>

<body>
    <header >
        <!-- Making Navbar  -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top ">
            <div class="container">
                <a class="navbar-brand text-light" href="#">E-Bidding-System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"         data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold fs-6 me-4 p-2">
                    <li class="nav-item">
                       <a class="nav-link text-light" aria-current="page" href="#">Dashborad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-light" aria-current="page" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  btn btn-danger text-light mx-4" aria-current="page" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Ending Navigation Bar  -->

        <!-- Start Carousel  -->
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
                        <!-- image part  -->
                        <img src="images/camera.jpg" class="d-block w-100 " alt="...">
                        <div class="container">
                            <div class="carousel-caption text-left">
                              <h1 class="text-dark">CAMERA.</h1>
                              <h6 class="text-dark"> Need it for Photography purpurse</h6>
                              <p><a class="btn btn-lg btn-primary mt-2" href="#" role="button">More</a></p>
                            </div>
                          </div>
                    </div>
                    <!-- 2nd image -->
                    <div class="carousel-item">
                        <img src="images/bd items.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="text-dark mt-6">HOME NEED</h1>
                            <h6 class="text-dark">Home Purpuse You Can Use</h6>
                        </div>
                    </div>
                    <!-- 3rd image -->
                    <div class="carousel-item">
                        <img src="images/soup.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="text-dark">SOUP ITEM</h1>
                            <h6 class="text-dark">HOME Purpuse You Can Use</h6>
                        </div>
                    </div>
                    <!-- 4th image -->
                    <div class="carousel-item">
                        <img src="images/furniture.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="text-light">FURNITURE</h1>
                            <h6 class="text-light">HOME Purpuse You Can Use</h6>
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
        <!-- PART 2 IN MY WEBSITE  -->
        <section>
            <div class="jumbotron text-center mt-5">
                <h1 class="display-3">E-BIDDING-SYSTEM</h1>
                <p class="lead">E Commerce Bidding System</p>
                <hr class="my-2">
                <p>More info</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Bit Now</a>
                </p>
            </div>
        </section>

        <!-- TYPES OUR PRODUCT  -->
        <section class="container mb-4">
            <div class="container mb-5">
                <h2>All Product</h2>
                <p class="mb-0">Here you can see the whole product of our company</p>
            </div>
            <!-- First row of products -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/mobile-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Mobile </h5>
                            <p class="card-text ">
                                Explore our exquisite mobile, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>
                                <div >
                                    <a href="details.html">
                                     <button class="btn btn-success"> Explore More <i class="fas fa-arrow-circle-right"></i></button>
                                    </a>
                                    <a href="addToCard.html">
                                        <button class="btn btn-info mx-2"> Add To Card <i class="fas fa-arrow-circle-right"></i></button>
                                    </a>
                                 </div>

                        </button>
                        </div>
                    </div>
                </div>

                <!-- Example card 2 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/clock-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">clock </h5>
                            <p class="card-text ">
                                Explore our exquisite clocks, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>
                                <div >
                                    <a href="details.html">
                                     <button class="btn btn-success"> Explore More <i class="fas fa-arrow-circle-right"></i></button>
                                    </a>
                                    <a href="addToCard.html">
                                        <button class="btn btn-info mx-2"> Add To Card <i class="fas fa-arrow-circle-right"></i></button>
                                    </a>
                                 </div>

                        </button>
                        </div>
                    </div>
                </div>

                <!-- Example card 3 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/gell-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Gell</h5>
                            <p class="card-text"> Explore our exquisite gell, combining superior craftsmanship with timeless elegance for a perfect addition to your home. </p>
                            <div >
                                <a href="details.html">
                                 <button class="btn btn-success"> Explore More <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                                <a href="addToCard.html">
                                    <button class="btn btn-info mx-2"> Add To Card <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second row of products (you can add more rows as needed) -->
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                <!-- Example card 4 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/camera-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Camera</h5>
                            <p class="card-text"> Explore our exquisite camera, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>
                            <div >
                                <a href="details.html">
                                 <button class="btn btn-success"> Explore More <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                                <a href="addToCard.html">
                                    <button class="btn btn-info mx-2"> Add To Card <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                             </div>
                        </div>
                    </div>
            </div>

                <!-- Example card 5 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/lamp.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Lamp</h5>
                            <p class="card-text">Explore our exquisite lamp, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>
                            <div >
                                <a href="details.html">
                                 <button class="btn btn-success"> Explore More <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                                <a href="addToCard.html">
                                    <button class="btn btn-info mx-2"> Add To Card <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                             </div>
                        </div>
                    </div>
                </div>

                <!-- Example card 6 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/book-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Book</h5>
                            <p class="card-text">Explore our exquisite book, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>

                            <div >
                                <a href="details.html">
                                 <button class="btn btn-success"> Explore More <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                                <a href="addToCard.html">
                                    <button class="btn btn-info mx-2"> Add To Card <i class="fas fa-arrow-circle-right"></i></button>
                                </a>
                             </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="more">
                <a href="" class="btn btn-warning my-5 px-5 text-light " >More</a>
            </div>
        </section>

        <!-- Brand our product  -->
        <section>
            <div class="jumbotron text-center mt-5">
                <h1 class="display-3">Bidding Part </h1>
                <p class="lead">Here The Product, You Can Bid Them </p>
                <hr class="my-2">
                <p>More info</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Bit Now</a>
                </p>
            </div>
        </section>

        <!--  BIDDING PRODUCT  -->
        <section class="container mb-2">
            <div class="container mb-5">
                <h2>Bidding Product</h2>
                <p class="mb-0">Here you can bid every product</p>
            </div>
            <!-- First row of products -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/mobile-2.jpg" class="card-img-top" alt="...">
                        <div class="card-img-overlay text-dark">
                            <h5 class="card-title text-white mb-0">Mobile</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mobile</h5>
                            <p>
                                "Explore our exquisite smartphone, combining superior craftsmanship with timeless elegance for a perfect addition to your home."
                            </p>
                            <div >
                                <button class="btn btn-warning">Bid Now  <i class="fas fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example card 2 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/book-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">clock </h5>
                            <p class="card-text ">
                                Explore our exquisite clocks, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>
                                <div >
                                    <button class="btn btn-warning">Bid Now  <i class="fas fa-arrow-circle-right"></i></button>
                                </div>

                        </button>
                        </div>
                    </div>
                </div>

                <!-- Example card 3 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/gell-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Gell</h5>
                            <p class="card-text"> Explore our exquisite gell, combining superior craftsmanship with timeless elegance for a perfect addition to your home. </p>
                            <div >
                                <button class="btn btn-warning">Bid Now  <i class="fas fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second row of products (you can add more rows as needed) -->
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                <!-- Example card 4 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/camera-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Camera</h5>
                            <p class="card-text"> Explore our exquisite camera, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>
                            <div >
                                <button class="btn btn-warning">Bid Now  <i class="fas fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
            </div>

                <!-- Example card 5 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/clock-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Lamp</h5>
                            <p class="card-text">Explore our exquisite lamp, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>
                            <div >
                                <button class="btn btn-warning">Bid Now  <i class="fas fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example card 6 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="images/all product/mobile-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Book</h5>
                            <p class="card-text">Explore our exquisite book, combining superior craftsmanship with timeless elegance for a perfect addition to your home.</p>

                            <div >
                                <button class="btn btn-warning">Bid Now  <i class="fas fa-arrow-circle-right"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="more">
                <a href="" class="btn btn-warning my-5 px-5 text-light " >More</a>
            </div>
        </section>

        <!-- COntact  -->
         <!-- Contact 1 - Bootstrap Brain Component -->
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

    <!-- js link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
