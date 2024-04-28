@extends('user.layout.app')
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('user-index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="">{{ $product->category->name }}</a> <span></span> {{ $product->name }}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    @foreach ($multiImage as $img)
                                        <figure class="border-radius-10">
                                            <img src="{{ asset($img->photo_name) }}" alt="product image" />
                                        </figure>
                                    @endforeach

                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    @foreach ($multiImage as $img)
                                        <div><img src="{{ asset($img->photo_name) }}" alt="product image" /></div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> {{ $product->category->name }} </span>
                                <h2 class="title-detail">{{ $product->name }}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">

                                        <div class="product-rate d-inline-block">
                                            @if ($product->rating == 0)
                                            @elseif($product->rating == 1 || $product->rating < 2)
                                                <div class="product-rating" style="width: 20%"></div>
                                            @elseif($product->rating == 2 || $product->rating < 3)
                                                <div class="product-rating" style="width: 40%"></div>
                                            @elseif($product->rating == 3 || $product->rating < 4)
                                                <div class="product-rating" style="width: 60%"></div>
                                            @elseif($product->rating == 4 || $product->rating < 5)
                                                <div class="product-rating" style="width: 80%"></div>
                                            @elseif($product->rating == 5 || $product->rating < 5)
                                                <div class="product-rating" style="width: 100%"></div>
                                            @endif
                                        </div>
                                        {{-- <span class="font-small ml-5 text-muted"> (32 reviews)</span> --}}
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">{{ $product->total }}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">3% GST</span>
                                            <span class="old-price font-md ml-15">{{ $product->price }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="short-desc mb-30">
                                    <p class="font-lg">{{ $product->content }}</p>
                                </div>

                                <div class="detail-extralink mb-50">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i
                                                class="fi-rs-shopping-cart"></i>Add to cart</button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href=""><i
                                                class="fi-rs-heart"></i></a>

                                    </div>
                                </div>

                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description">Description</a>
                                </li>

                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        {!! $product->description !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-60">
                        <div class="col-12">
                            <h2 class="section-title style-1 mb-30">Related products</h2>
                        </div>
                        <div class="col-12">
                            <div class="row related-products">
                                @foreach ($relatedProduct as $item)
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img" src="{{ asset($item->image) }}"
                                                            alt="" />
                                                        <img class="hover-img" src="{{ asset($item->image) }}"
                                                            alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up"
                                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                            class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                        href="shop-wishlist.html" tabindex="0"><i
                                                            class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up"
                                                        href="shop-compare.html" tabindex="0"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                </div>
                                                {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div> --}}
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="{{ route('product-detail', [$item->id, $item->slug]) }}"
                                                        tabindex="0">{{ $item->name }}</a>
                                                </h2>
                                                {{-- <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div> --}}
                                                <div>Rating({{ $item->rating }})</div>
                                                <div class="product-price">
                                                    <span>Rs. {{ $item->total }} </span>
                                                    <span class="old-price">Rs. {{ $item->price }} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
