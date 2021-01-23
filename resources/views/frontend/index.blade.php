       @extends('layout.master')
       @section('title','market')


       @section('content')
       <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Latest Products</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    @foreach ($latproducts as $product)


                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="images/products/{{$product->photo}}" alt="" />
                            <p class="text-center">{{strtoupper($product->name)}}</p>
                            <p class="text-center">{{($product->price)}}L.E</p>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- About Section-->

        <!-- Contact Section-->



        @stop
