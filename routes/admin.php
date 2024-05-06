<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GoldController;
use App\Http\Controllers\Admin\WeightController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QualityController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PincodeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\OccasionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\OrderController;


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


        Route::get('/pincode/create', [PincodeController::class, 'create'])->name('pincode-create');
        Route::post('/pincode/store', [PincodeController::class, 'store'])->name('pincode-store');
        Route::get('/pincode', [PincodeController::class, 'index'])->name('pincode-index');
        Route::get('/pincode/edit/{id}', [PincodeController::class, 'edit'])->name('pincode-edit');
        Route::post('/pincode/update', [PincodeController::class, 'update'])->name('pincode-update');
        Route::get('/pincode/delete/{id}', [PincodeController::class, 'delete'])->name('pincode-delete');


        Route::get('/user/index', [UserController::class, 'index'])->name('user-list');
        Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user-delete');

        Route::get('/state/create', [StateController::class, 'create'])->name('state-create');
        Route::post('/state/store', [StateController::class, 'store'])->name('state-store');
        Route::get('/state', [StateController::class, 'index'])->name('state-index');
        Route::get('/state/edit/{id}', [StateController::class, 'edit'])->name('state-edit');
        Route::post('/state/update', [StateController::class, 'update'])->name('state-update');
        Route::get('/state/delete/{id}', [StateController::class, 'delete'])->name('state-delete');


        Route::get('/district/create', [DistrictController::class, 'create'])->name('district-create');
        Route::post('/district/store', [DistrictController::class, 'store'])->name('district-store');
        Route::get('/district', [DistrictController::class, 'index'])->name('district-index');
        Route::get('/district/edit/{id}', [DistrictController::class, 'edit'])->name('district-edit');
        Route::post('/district/update', [DistrictController::class, 'update'])->name('district-update');
        Route::get('/district/delete/{id}', [DistrictController::class, 'delete'])->name('district-delete');


        Route::get('/city/create', [CityController::class, 'create'])->name('city-create');
        Route::post('/city/store', [CityController::class, 'store'])->name('city-store');
        Route::get('/city', [CityController::class, 'index'])->name('city-index');
        Route::get('/city/edit/{id}', [CityController::class, 'edit'])->name('city-edit');
        Route::post('/city/update', [CityController::class, 'update'])->name('city-update');
        Route::get('/city/delete/{id}', [CityController::class, 'delete'])->name('city-delete');


        Route::get('/branch/create', [BranchController::class, 'create'])->name('branch-create');
        Route::post('/branch/store', [BranchController::class, 'store'])->name('branch-store');
        Route::get('/branch', [BranchController::class, 'index'])->name('branch-index');
        Route::get('/branch/edit/{id}', [BranchController::class, 'edit'])->name('branch-edit');
        Route::post('/branch/update', [BranchController::class, 'update'])->name('branch-update');
        Route::get('/branch/delete/{id}', [BranchController::class, 'delete'])->name('branch-delete');

        Route::get('/occasion', [OccasionController::class, 'index'])->name('occasion-index');
        Route::post('/occasion/update', [OccasionController::class, 'update'])->name('occasion-update');


        Route::get('/banner/create', [BannerController::class, 'create'])->name('banner-create');
        Route::post('/banner/store', [BannerController::class, 'store'])->name('banner-store');
        Route::get('/banner', [BannerController::class, 'index'])->name('banner-index');
        Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner-edit');
        Route::post('/banner/update', [BannerController::class, 'update'])->name('banner-update');
        Route::get('/banner/delete/{id}', [BannerController::class, 'delete'])->name('banner-delete');
        Route::get('/banner/inactive/{id}', [BannerController::class, 'inactive'])->name('banner-inactive');
        Route::get('/banner/active/{id}', [BannerController::class, 'active'])->name('banner-active');

        Route::get('/pending/orders', [OrderController::class, 'pendingOrder'])->name('pending-order');
        Route::get('/confirmed/orders', [OrderController::class, 'confirmedOrder'])->name('confirmed-order');
        Route::get('/processing/orders', [OrderController::class, 'processingOrder'])->name('processing-order');
        Route::get('/deliverd/orders', [OrderController::class, 'deliveredOrder'])->name('deliverd-order');


        Route::get('/order/detail/{id}', [OrderController::class, 'orderDetail'])->name('order-detail');
        Route::get('/pending/confirm/{id}', [OrderController::class, 'pendingToConfirm'])->name('pending-confirm');
        Route::get('/confirm/processing/{id}', [OrderController::class, 'confirmToProcess'])->name('confirm-process');
        Route::get('/processing/delivered/{id}', [OrderController::class, 'processToDelivered'])->name('process-deliver');






    });
});
