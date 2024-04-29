@extends('user.layout.app')
@section('content')
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <div class="single-hero-slider single-animation-wrap"
                        style="background-image: url(user/assets/imgs/slider/banner.jpg)">
                        <div class="slider-content">
                            {{-- <h1 class="display-2 mb-40">
                                Don’t miss amazing<br />
                                grocery deals
                            </h1> --}}
                            {{-- <p class="mb-65">Sign up for the daily newsletter</p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form> --}}
                        </div>
                    </div>
                    <div class="single-hero-slider single-animation-wrap"
                        style="background-image: url(user/assets/imgs/slider/banner.jpg)">
                        {{-- <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                Fresh Vegetables<br />
                                Big discount
                            </h1>
                            <p class="mb-65">Save up to 50% off on your first order</p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div> --}}
                    </div>
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
                    <h3>All Gold Products</h3>

                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                    id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    @foreach ($allproducts as $item)
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
    <!--End category slider-->
    {{-- <section class="banners mb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="assets/imgs/banner/banner-1.png" alt="" />
                        <div class="banner-text">
                            <h4>
                                Everyday Fresh & <br />Clean with Our<br />
                                Products
                            </h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src="assets/imgs/banner/banner-2.png" alt="" />
                        <div class="banner-text">
                            <h4>
                                Make your Breakfast<br />
                                Healthy and Easy
                            </h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="assets/imgs/banner/banner-3.png" alt="" />
                        <div class="banner-text">
                            <h4>The best Organic <br />Products Online</h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End banners-->


    @php
        $productdatas = App\Models\Product::where('status', 1)->get();
        $categories = App\Models\Category::orderBy('name', 'ASC')->get();
    @endphp

    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3> All Products </h3>
                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                            type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                    </li> --}}
                    {{-- @foreach ($categories as $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                type="button" role="tab" aria-controls="tab-two"
                                aria-selected="false">{{ $category->name }}</button>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach ($productdatas as $item)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product-detail', [$item->id, $item->slug]) }}">
                                                <img class="default-img" src="{{ asset($item->image) }}" alt="" />
                                                <img class="hover-img" src="{{ asset($item->image) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
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
                                        <div class="product-category">
                                            <a href="">Gold</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                                        </h2>
                                        <div>
                                            Rating
                                            <span class="font-small ml-5 text-muted"> ({{ $item->rating }})</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">Category <a
                                                    href="vendor-details-1.html">{{ $item->category->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>Rs.{{ $item->total }}</span>
                                                <span class="old-price">Rs. {{ $item->price }}</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add"
                                                    href="{{ route('product-detail', [$item->id, $item->slug]) }}"><i
                                                        class=""></i>View </a>
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
                <!--En tab one-->
                @foreach ($categories as $category)
                    <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="tab-two">
                        @php
                            $catwiseProduct = App\Models\Product::where('category_id', $category->id)
                                ->orderBy('id', 'DESC')
                                ->get();
                        @endphp
                        <div class="row product-grid-4">
                            @foreach ($catwiseProduct as $item)
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product-detail', [$item->id, $item->slug]) }}">
                                                    <img class="default-img" src="{{ asset($item->image) }}"
                                                        alt="" />
                                                    <img class="hover-img" src="{{ asset($item->image) }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Add To Wishlist" class="action-btn"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                        class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                    data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Snack</a>
                                            </div>
                                            <h2><a href="{{ route('product-detail', [$item->id, $item->slug]) }}">Seeds of
                                                    Change Organic Quinoa, Brown, &
                                                    Red
                                                    Rice</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$28.85</span>
                                                    <span class="old-price">$32.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
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
                @endforeach
                <!--En tab two-->

            </div>
            <!--End tab-content-->
        </div>
    </section>
    <!--Products Tabs-->


    <section class="section-padding pb-5">
        <div class="container">
            <div class="section-title wow animate__animated animate__fadeIn">
                <h3 class=""> Featured Products </h3>

            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                            aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                    @foreach ($featured_products as $item)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('product-detail', [$item->id, $item->slug]) }}">
                                                        <img class="default-img" src="{{ asset($item->image) }}"
                                                            alt="" />
                                                        <img class="hover-img" src="{{ asset($item->image) }}"
                                                            alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn"
                                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
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
                                                    <a href="shop-grid-right.html">{{ $item->category->name }}</a>
                                                </div>
                                                <h2><a
                                                        href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                                                </h2>
                                                <div>
                                                    Rating ({{ $item->rating }})
                                                </div>
                                                <div class="product-price mt-10">
                                                    <span> {{ $item->total }}</span>
                                                    <span class="old-price">{{ $item->price }}</span>
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
                <h3>Gold Coin Category Product</h3>

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
                                            <a aria-label="Add To Wishlist" class="action-btn"
                                                href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
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
                                                    href="vendor-details-1.html">{{ $item->category->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>Rs. {{ $item->total }}</span>
                                                <span class="old-price">Rs. {{ $item->price }}</span>
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
                <h3>Gold Bar Category Product</h3>

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
                                            <a aria-label="Add To Wishlist" class="action-btn"
                                                href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
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
                                                    href="vendor-details-1.html">{{ $item->category->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>Rs. {{ $item->total }}</span>
                                                <span class="old-price">Rs. {{ $item->price }}</span>
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
