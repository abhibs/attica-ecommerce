@extends('user.layout.app')
@section('content')
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">{{ $item }}</h1>
                        <div class="breadcrumb">
                            <a href="{{ route('user-index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> {{ $item }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-md-12">
                <div class="row product-grid">

                    @foreach ($products as $item)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="{{ asset($item->image) }}" alt="" />
                                            <img class="hover-img" src="{{ asset($item->image) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}"
                                            onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                        {{-- <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a> --}}
                                        <a aria-label="Quick view" id="{{ $item->id }}" onclick="productView(this.id)"
                                            class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                    </div>
                                    {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div> --}}
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{ $item->category->name }}</a>
                                    </div>
                                    <h2><a
                                            href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                                    </h2>
                                    <div class="product-rate-cover">
                                        <div>Rating({{ $item->rating }})</div>
                                        {{-- <span class="font-small ml-5 text-muted"> (4.0)</span> --}}
                                    </div>
                                    {{-- <div>
                                        <span class="font-small text-muted">By <a
                                                href="vendor-details-1.html">NestFood</a></span>
                                    </div> --}}
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>Rs. {{ $item->price }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add"
                                                href="{{ route('product-detail', [$item->id, $item->slug]) }}"><i
                                                    class="mr-5"></i>View
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!--end product card-->





                </div>
                <!--product grid-->
            </div>

        </div>
    </div>
@endsection
