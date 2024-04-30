<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;





Route::get('/', [HomeController::class, 'index'])->name('user-index');
Route::get('contact', [HomeController::class, 'contact'])->name('user-contact');
Route::get('privacy/policy', [HomeController::class, 'privacy'])->name('user-privacy');
Route::get('terms/condition', [HomeController::class, 'terms'])->name('user-terms');
Route::get('faq', [HomeController::class, 'faq'])->name('user-faq');
Route::get('about', [HomeController::class, 'about'])->name('user-about');




Route::get('/shop', [ShopController::class, 'shop'])->name('shop');



Route::post('/shop/filter', [ShopController::class, 'shopFilter'])->name('shop-filter');
Route::get('/product/detail/{id}/{slug}', [HomeController::class, 'productDetais'])->name('product-detail');
Route::get('category/product/{id}/{slug}', [HomeController::class, 'catWiseProduct'])->name('category-product');
Route::get('/product/view/modal/{id}', [HomeController::class, 'productViewModel']);
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishList']);
Route::get('/login', [UserController::class, 'login'])->name('login');


Route::group(['prefix' => 'user'], function () {
    Route::get('/register', [UserController::class, 'register'])->name('user-register');

    Route::post('/register/post', [UserController::class, 'registerPost'])->name('user-register-post');
    Route::post('/login/post', [UserController::class, 'loginPost'])->name('user-login-post');


    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('user-dashboard');
        Route::get('/logout', [UserController::class, 'userLogout'])->name('user-logout');
        Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
        Route::get('/wishlist', [WishlistController::class, 'AllWishlist'])->name('user-wishlist');
        Route::get('/wishlist-remove/{id}', [WishlistController::class, 'WishlistRemove']);
        Route::get('/cart', [CartController::class, 'userCart'])->name('user-cart');

        Route::get('/get-cart-product', [CartController::class, 'GetCartProduct']);
        Route::get('/cart-remove/{rowId}', [CartController::class, 'CartRemove']);


        Route::get('/cart-decrement/{rowId}', [CartController::class, 'CartDecrement']);
        Route::get('/cart-increment/{rowId}', [CartController::class, 'CartIncrement']);
        Route::get('/cart-details', [CartController::class, 'getCartDetails']);


        Route::post('/check/pincode', [CartController::class, 'checkPincode']);

        Route::get('/checkout', [CartController::class, 'checkout'])->name('user-checkout');


    });
});


