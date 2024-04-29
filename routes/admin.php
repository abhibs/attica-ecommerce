<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GoldController;
use App\Http\Controllers\Admin\WeightController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QualityController;
use App\Http\Controllers\Admin\ProductController;





Route::get('/test', function () {
    echo "Abhiram";
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin-login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('admin-login-post');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::get('/logout', [Admincontroller::class, 'adminLogout'])->name('admin-logout');
        Route::get('/profile', [Admincontroller::class, 'adminProfile'])->name('admin-profile');
        Route::post('/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin-profile-update');
        Route::get('/change/password', [Admincontroller::class, 'changePassword'])->name('admin-change-password');
        Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('admin-password-update');

        Route::get('/gold/create', [GoldController::class, 'create'])->name('gold-create');
        Route::post('/gold/store', [GoldController::class, 'store'])->name('gold-store');
        Route::get('/gold/rate', [GoldController::class, 'index'])->name('gold-index');
        Route::get('/gold/edit/{id}', [GoldController::class, 'edit'])->name('gold-edit');
        Route::post('/gold/update', [GoldController::class, 'update'])->name('gold-update');
        Route::get('/gold/delete/{id}', [GoldController::class, 'delete'])->name('gold-delete');


        Route::get('/weight/create', [WeightController::class, 'create'])->name('weight-create');
        Route::post('/weight/store', [WeightController::class, 'store'])->name('weight-store');
        Route::get('/weight', [WeightController::class, 'index'])->name('weight-index');
        Route::get('/weight/edit/{id}', [WeightController::class, 'edit'])->name('weight-edit');
        Route::post('/weight/update', [WeightController::class, 'update'])->name('weight-update');
        Route::get('/weight/delete/{id}', [WeightController::class, 'delete'])->name('weight-delete');


        Route::get('/category/create', [CategoryController::class, 'create'])->name('category-create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category-store');
        Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
        Route::post('/category/update', [CategoryController::class, 'update'])->name('category-update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category-delete');

        Route::get('/quality/create', [QualityController::class, 'create'])->name('quality-create');
        Route::post('/quality/store', [QualityController::class, 'store'])->name('quality-store');
        Route::get('/quality', [QualityController::class, 'index'])->name('quality-index');
        Route::get('/quality/edit/{id}', [QualityController::class, 'edit'])->name('quality-edit');
        Route::post('/quality/update', [QualityController::class, 'update'])->name('quality-update');
        Route::get('/quality/delete/{id}', [QualityController::class, 'delete'])->name('quality-delete');

        Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product-store');
        Route::get('/product/index', [ProductController::class, 'index'])->name('product-index');

    });
});
