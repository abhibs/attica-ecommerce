@extends('user.layout.app')
@section('content')
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">Shop</h1>
                        <div class="breadcrumb">
                            <a href="{{ route('user-index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Shop
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                    </div>

                </div>
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
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i
                                                class="fi-rs-heart"></i></a>
                                        {{-- <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a> --}}
                                        <a aria-label="Quick view" id="{{ $item->id }}" onclick="productView(this.id)"
                                            class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                    </div>

                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="">{{ $item->category->name }}</a>
                                    </div>
                                    <h2><a
                                            href="{{ route('product-detail', [$item->id, $item->slug]) }}">{{ $item->name }}</a>
                                    </h2>
                                    <div class="product-rate-cover">
                                        <div>Rating({{ $item->rating }})</div>
                                        {{-- <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div> --}}
                                        {{-- <span class="font-small ml-5 text-muted"> (4.0)</span> --}}
                                    </div>
                                    {{-- <div>
                                        <span class="font-small text-muted">By <a
                                                href="vendor-details-1.html">NestFood</a></span>
                                    </div> --}}
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>Rs. {{ $item->total }}</span>
                                            <span class="old-price">Rs. {{ $item->price }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!--end product card-->





                </div>


                <!--End Deals-->


            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <form action="{{ route('shop-filter') }}" method="POST">
                    @csrf
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        {{-- <h5 class="section-title style-1 mb-30">Fill by price</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range" class="mb-20"></div>
                                <div class="d-flex justify-content-between">
                                    <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong>
                                    </div>
                                    <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                @if (!empty($_GET['category']))
                                    @php
                                        $filterCat = explode(',', $_GET['category']);
                                    @endphp
                                @endif
                                <label class="fw-900">Categories</label>
                                <div class="custome-checkbox">
                                    @foreach ($categories as $item)
                                        @php
                                            $products = App\Models\Product::where('category_id', $item->id)->get();
                                        @endphp
                                        <input class="form-check-input" type="checkbox" name="category[]"
                                            id="exampleCheckbox{{ $item->id }}" value="{{ $item->slug }}"
                                            @if (!empty($filterCat) && in_array($item->slug, $filterCat)) checked @endif
                                            onchange="this.form.submit()" />
                                        <label class="form-check-label"
                                            for="exampleCheckbox{{ $item->id }}"><span>{{ $item->name }}
                                                ({{ count($products) }})
                                            </span></label>
                                        <br />
                                    @endforeach


                                </div>
                                @if (!empty($_GET['weight']))
                                    @php
                                        $filterWeight = explode(',', $_GET['weight']);
                                    @endphp
                                @endif
                                <label class="fw-900 mt-15">Weights</label>
                                <div class="custome-checkbox">
                                    @foreach ($weights as $weight)
                                        @php
                                            $products = App\Models\Product::where('weight_id', $weight->id)->get();
                                        @endphp
                                        <input class="form-check-input" type="checkbox" name="weight[]"
                                            id="exampleWeight{{ $weight->id }}" value="{{ $weight->gram }}"
                                            @if (!empty($filterWeight) && in_array($weight->gram, $filterWeight)) checked @endif
                                            onchange="this.form.submit()" />
                                        <label class="form-check-label"
                                            for="exampleWeight{{ $weight->id }}"><span>{{ $weight->gram }}
                                                grams
                                                ({{ count($products) }})
                                            </span></label>
                                        <br />
                                    @endforeach


                                </div>

                                @if (!empty($_GET['gold']))
                                    @php
                                        $filterGold = explode(',', $_GET['gold']);
                                    @endphp
                                @endif
                                <label class="fw-900 mt-15">Gold Rates</label>
                                <div class="custome-checkbox">
                                    @foreach ($golds as $gold)
                                        @php
                                            $products = App\Models\Product::where('gold_id', $gold->id)->get();
                                        @endphp
                                        <input class="form-check-input" type="checkbox" name="gold[]"
                                            id="exampleGold{{ $gold->id }}" value="{{ $gold->rate }}"
                                            @if (!empty($filterGold) && in_array($gold->rate, $filterGold)) checked @endif
                                            onchange="this.form.submit()" />
                                        <label class="form-check-label" for="exampleGold{{ $gold->id }}"><span>Rs.
                                                {{ $gold->rate }}

                                                ({{ count($products) }})
                                            </span></label>
                                        <br />
                                    @endforeach


                                </div>


                                @if (!empty($_GET['quality']))
                                    @php
                                        $filterQuality = explode(',', $_GET['quality']);
                                    @endphp
                                @endif
                                <label class="fw-900 mt-15">Quality</label>
                                <div class="custome-checkbox">
                                    @foreach ($qualities as $quality)
                                        @php
                                            $products = App\Models\Product::where('quality_id', $quality->id)->get();
                                        @endphp
                                        <input class="form-check-input" type="checkbox" name="quality[]"
                                            id="exampleQuality{{ $quality->id }}" value="{{ $quality->name }}"
                                            @if (!empty($filterQuality) && in_array($quality->name, $filterQuality)) checked @endif
                                            onchange="this.form.submit()" />
                                        <label class="form-check-label" for="exampleQuality{{ $quality->id }}"><span>
                                                {{ $quality->name }}

                                                ({{ count($products) }})
                                            </span></label>
                                        <br />
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        {{-- <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
                            Fillter</a> --}}
                    </div>
                    <!-- Product sidebar Widget -->
                </form>
            </div>
        </div>
    </div>
@endsection
