<!-- Header  -->
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>

                            <li><a href="{{ route('user-cart') }}">My Cart</a></li>
                            <li><a href="{{ route('user-checkout') }}">Checkout</a></li>
                            <li><a href="{{ route('user-track-order') }}">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            {{-- <ul>
                                    <li>100% Secure delivery without contacting the courier</li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today</li>
                                </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>

                            {{-- <li>
                                    <a class="language-dropdown-active" href="#">English <i
                                            class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('user/assets/imgs/theme/flag-fr.png') }}"
                                                    alt="" />Français</a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('user/assets/imgs/theme/flag-dt.png') }}"
                                                    alt="" />Deutsch</a>
                                        </li>
                                        <li>
                                            <a href="#"><img
                                                    src="{{ asset('user/assets/imgs/theme/flag-ru.png') }}"
                                                    alt="" />Pусский</a>
                                        </li>
                                    </ul>
                                </li> --}}

                            <li>Need help? Call Us: <strong class="text-brand"> +91-8880300300</strong></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('user-index') }}"><img src="{{ asset('user/assets/imgs/theme/logo3.jpeg') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('search-by-name') }}" method="POST">
                            @csrf

                            <input type="text" name="search" placeholder="Search for items..." />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">


                            <div class="header-action-icon-2">
                                <a href="{{ route('user-wishlist') }}">
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue" id="wishQty"> 0</span>
                                </a>
                                <a href="{{ route('user-wishlist') }}"><span class="lable">Wishlist</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('user-cart') }}">
                                    <img alt="Nest"
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue" id="cartQty">0</span>
                                </a>
                                <a href="{{ route('user-cart') }}"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <div id="miniCart">

                                    </div>
                                    {{-- <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span id="cartSubTotal"> </span></h4>
                                        </div>

                                    </div> --}}
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="{{ route('user-index') }}">
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                @auth
                                    <a href="{{ route('user-dashboard') }}"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{ route('user-dashboard') }}"><i
                                                        class="fi fi-rs-user mr-10"></i>My
                                                    Account</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user-track-order') }}"><i
                                                        class="fi fi-rs-location-alt mr-10"></i>Order
                                                    Tracking</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('user-wishlist') }}"><i
                                                        class="fi fi-rs-heart mr-10"></i>My
                                                    Wishlist</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('user-logout') }}"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"><span class="lable ml-0">Login</span></a>

                                    <span class="lable" style="margin-left: 2px; margin-right: 2px;"> | </span>


                                    <a href="{{ route('user-register') }}"><span class="lable ml-0">Register</span></a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @php

        $categories = App\Models\Category::orderBy('name', 'ASC')->get();
    @endphp


    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('user-index') }}"><img src="{{ asset('user/assets/imgs/theme/logo3.jpeg') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex justify-content-center categori-dropdown-inner">
                                <ul>
                                    @foreach ($categories as $item)
                                        <li>
                                            <a href="{{ route('category-product', [$item->id, $item->slug]) }}"> <img
                                                    src="{{ asset($item->image) }}"
                                                    alt="" />{{ $item->name }}</a>
                                        </li>
                                    @endforeach


                                </ul>
                                {{-- <ul class="end">
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/category-6.svg') }}"
                                                    alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/category-7.svg') }}"
                                                    alt="" />Fresh Seafood</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/category-8.svg') }}"
                                                    alt="" />Fast food</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/category-9.svg') }}"
                                                    alt="" />Vegetables</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/category-10.svg') }}"
                                                    alt="" />Bread and Juice</a>
                                        </li>
                                    </ul> --}}
                            </div>
                            {{-- <div class="more_slide_open" style="display: none">
                                    <div class="d-flex categori-dropdown-inner">
                                        <ul>
                                            <li>
                                                <a href="shop-grid-right.html"> <img
                                                        src="{{ asset('user/assets/imgs/theme/icons/icon-1.svg') }}"
                                                        alt="" />Milks and Dairies</a>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img
                                                        src="{{ asset('user/assets/imgs/theme/icons/icon-2.svg') }}"
                                                        alt="" />Clothing & beauty</a>
                                            </li>
                                        </ul>
                                        <ul class="end">
                                            <li>
                                                <a href="shop-grid-right.html"> <img
                                                        src="{{ asset('user/assets/imgs/theme/icons/icon-3.svg') }}"
                                                        alt="" />Wines & Drinks</a>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img
                                                        src="{{ asset('user/assets/imgs/theme/icons/icon-4.svg') }}"
                                                        alt="" />Fresh Seafood</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}

                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>

                                <li>
                                    <a class="active" href="{{ route('user-index') }}">Home </a>

                                </li>
                                <li>
                                    <a href="{{ route('user-about') }}">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">Shop</a>
                                </li>
                                {{-- <li>
                                    <a href="">Blog</a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('user-contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('user/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>+91-8880300300<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest"
                                    src="{{ asset('user/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest"
                                    src="{{ asset('user/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                    src="{{ asset('user/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- End Header  -->




<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('user-index') }}"><img src="{{ asset('user/assets/imgs/theme/logo2.jpeg') }}"
                        alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{ route('user-index') }}">Home</a>

                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('user-about') }}">About</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('shop') }}">Shop</a>
                        </li>
                        {{-- <li class="menu-item-has-children">
                            <a href="">Blog</a>
                        </li> --}}
                        <li class="menu-item-has-children">
                            <a href="{{ route('user-contact') }}">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                @auth
                    <div class="single-mobile-header-info">
                        <a href="{{ route('user-dashboard') }}"><i class="fi-rs-user"></i>Account </a>
                    </div>
                @else
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}"><i class="fi-rs-user"></i>User Login </a>
                    </div>
                @endauth

            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>
<!--End header-->
