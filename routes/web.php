<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Route::get('/', [HomeController::class, 'index'])->name('user-index');
Route::get('/user/register', [UserController::class, 'register'])->name('user-register');
Route::post('/user/register/post', [UserController::class, 'registerPost'])->name('user-register-post');

Route::get('/user/login', [UserController::class, 'login'])->name('user-login');
Route::post('/user/login/post', [UserController::class, 'loginPost'])->name('user-login-post');


Route::get('/user/contact', [HomeController::class, 'contact'])->name('user-contact');

Route::get('/user/cart', [HomeController::class, 'cart'])->name('user-cart');

Route::get('/user/wishlist', [HomeController::class, 'wishlist'])->name('user-wishlist');

Route::get('/user/checkout', [HomeController::class, 'checkout'])->name('user-checkout');


Route::get('/product/detail/{id}/{slug}', [HomeController::class, 'productDetais'])->name('product-detail');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('user/dashboard', [UserController::class, 'userDashboard'])->name('user-dashboard');
    Route::get('user/logout', [UserController::class, 'userLogout'])->name('user-logout');
    // Route::get('user/profile/update', [UserController::class, 'userProfileUpdate'])->name('user-profile-update');
    // Route::post('user/profile/update/post', [UserController::class, 'userProfileUpdatePost'])->name('user-profile-update-post');
    // Route::get('user/change/password', [UserController::class, 'userChangePassword'])->name('user-change-password');
    // Route::post('user/change/password/post', [UserController::class, 'userChangePasswordPost'])->name('user-change-password-post');
});


