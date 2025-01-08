<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'getHotTrendProducts'])->name('page.index');
Route::get('/about', [SettingController::class, 'displayAbout'])->name('setting.display-about');
Route::get('/news', [SettingController::class, 'displayNews'])->name('setting.display-news');
Route::get('/account/login', [SettingController::class, 'displayLogin'])->name('setting.display-login');
Route::get('/collections/all', [ProductController::class, 'showAllProduct'])->name('product.showAllProduct');
Route::get('/collections/{id}', [ProductController::class, 'getProductDetail'])->name('product.getProductDetail');
Route::get('/collections/{gender}/{categoryName}', [ProductController::class, 'showCategoryProducts'])->name('product.productByCategory');

// --------------------- Category ---------------------
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


// --------------------- Product ---------------------
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('cproduct.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::delete('/product/delete-image/{id}', [ProductController::class, 'deleteProductImage'])->name('product.deleteProductImage');
Route::post('/product/update-image/{id}', [ProductController::class, 'updateProductImage'])->name('product.updateImage');

Route::get('/product/{id}/sizes', [ProductController::class, 'showSizes']);
Route::get('/product/checkquanity/{productId}/{sizeId}', [ProductController::class, 'checkSizeQuanity']);

Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');

// --------------------- Login ---------------------
Route::post('/account/login', [LoginController::class, 'login'])->name('login.index');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --------------------- Order ---------------------
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
Route::post('/order/add', [OrderController::class, 'add'])->name('order.add');


// --------------------- Setting ---------------------
Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');
Route::put('/setting/update', [SettingController::class, 'update'])->name('setting.update');

// --------------------- Banner ---------------------
Route::get('/banner', [BannerController::class, 'edit'])->name('banner.edit');
Route::put('/banner/update', [BannerController::class, 'update'])->name('banner.update');

// --------------------- Cart ---------------------
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{index}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkoutt', [CartController::class, 'checkout'])->name('cart.checkout');




