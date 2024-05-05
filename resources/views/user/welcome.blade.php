@extends('user.layout.app')
@section('content')
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    @foreach ($banners as $item)
                        <div class="single-hero-slider single-animation-wrap"
                            style="background-image: url({{ asset($item->image) }})">
                            <div class="slider-content">

                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>
    <!--End hero slider-->
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3>New Arrived Products</h3>

                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                    id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    @foreach ($newarrived_products as $item)
                        <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="{{ route('product-detail', [$item->id, $item->slug]) }}"><img
                                        src="{{ asset($item->image) }}" alt="" /></a>
                            </figure>
                            <h6><a href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                            </h6>
                            {{-- <span>26 items</span> --}}
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col text-center p-5">
                    <h1 style="color:#EECD5A">{{ $occation->name }}</h1>
                    <h5 class="text-muted" style="margin-top: 10px;">{{ $occation->content }}</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($occation->image1) }}" alt="main-img" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset($occation->image2) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6 p-1">
                            <img src="{{ asset($occation->image3) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6 p-1">
                            <img src="{{ asset($occation->image4) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <h5 class="text-center text-muted">
                    Celebrate Akshaya Tritiya, a day revered for its boundless blessings and the enduring promise of
                    eternal prosperity symbolized by the timeless allure of gold.
                    Embrace this auspicious occasion as an opportunity to ignite new beginnings and invite abundance
                    into your life,
                    ensuring that your journey is adorned with the gleam of everlasting fortune.
                </h5>
            </div>
        </div>
    </div> --}}






    <section class="section-padding pb-5">
        <div class="container">
            <div class="section-title wow animate__animated animate__fadeIn">
                <h3 class=""> Featured Products </h3>

            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                    @foreach ($featured_products as $item)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('product-detail', [$item->id, $item->slug]) }}">
                                                        <a href="{{ route('product-detail', [$item->id, $item->slug]) }}"><img
                                                                class="default-img" src="{{ asset($item->image) }}"
                                                                alt="" /></a>

                                                        <a href="{{ route('product-detail', [$item->id, $item->slug]) }}">
                                                            <img class="hover-img" src="{{ asset($item->image) }}"
                                                                alt="" /></a>
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn"
                                                        id="{{ $item->id }}" onclick="addToWishList(this.id)"><i
                                                            class="fi-rs-heart"></i></a>
                                                    {{-- <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a> --}}
                                                    <a aria-label="Quick view" id="{{ $item->id }}"
                                                        onclick="productView(this.id)" class="action-btn"
                                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                            class="fi-rs-eye"></i></a>
                                                </div>
                                                {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Save 15%</span>
                                                </div> --}}
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="">{{ $item->category->name }}</a>
                                                </div>
                                                <h2><a
                                                        href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                                                </h2>
                                                <div>
                                                    Rating ({{ $item->rating }})
                                                </div>
                                                <div class="product-price mt-10">
                                                    <span>Rs. {{ $item->price }}</span>
                                                </div>

                                                <a href="{{ route('product-detail', [$item->id, $item->slug]) }}"
                                                    class="btn w-100 hover-up"><i class="mr-5"></i>View More</a>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!--End product Wrap-->



                                </div>
                            </div>
                        </div>
                        <!--End tab-pane-->


                    </div>
                    <!--End tab-content-->
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>

    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Gold Coin Category</h3>

            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">

                        @foreach ($coinCategoryproducts as $item)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product-detail', [$item->id, $item->slug]) }}">
                                                <img class="default-img" src="{{ asset($item->image) }}"
                                                    alt="" />
                                                <img class="hover-img" src="{{ asset($item->image) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href=""><i
                                                    class="fi-rs-heart"></i></a>
                                            {{-- <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a> --}}
                                            <a aria-label="Quick view" id="{{ $item->id }}"
                                                onclick="productView(this.id)" class="action-btn" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div> --}}
                                    </div>
                                    <div class="product-content-wrap">
                                        {{-- <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $item->category->name }}</a>
                                        </div> --}}
                                        <h2><a
                                                href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                                        </h2>
                                        <div class="product-rate-cover">

                                        </div>
                                        <div>
                                            <span class="font-small text-muted">Category <a
                                                    href="">{{ $item->category->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>Rs. {{ $item->price }}</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add"
                                                    href="{{ route('product-detail', [$item->id, $item->slug]) }}"><i
                                                        class="mr-5"></i>View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <!--end product card-->




                        <!--end product card-->

                    </div>
                    <!--End product-grid-4-->
                </div>


            </div>
            <!--End tab-content-->
        </div>


    </section>





    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Gold Bar Category </h3>

            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">


                        @foreach ($barCategoryproducts as $item)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product-detail', [$item->id, $item->slug]) }}">
                                                <img class="default-img" src="{{ asset($item->image) }}"
                                                    alt="" />
                                                <img class="hover-img" src="{{ asset($item->image) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href=""><i
                                                    class="fi-rs-heart"></i></a>
                                            {{-- <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a> --}}
                                            <a aria-label="Quick view" id="{{ $item->id }}"
                                                onclick="productView(this.id)" class="action-btn" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div> --}}
                                    </div>
                                    <div class="product-content-wrap">
                                        {{-- <div class="product-category">
                                            <a href="shop-grid-right.html">Snack</a>
                                        </div> --}}
                                        <h2><a href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}
                                            </a>
                                        </h2>
                                        {{-- <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div> --}}
                                        <div>
                                            <span class="font-small text-muted">Category <a
                                                    href="">{{ $item->category->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>Rs. {{ $item->price }}</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add"
                                                    href="{{ route('product-detail', [$item->id, $item->slug]) }}"><i
                                                        class="mr-5"></i>View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach






                    </div>
                </div>


            </div>
            <!--End tab-content-->
        </div>


    </section>
@endsection
