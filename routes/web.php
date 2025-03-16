<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sign-up', function () {
    return view('register');
})->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/products', function () {
    return view('user.products');
})->name('products');
Route::get('/product/{slug}', function () {
    return view('product');
})->name('product');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('/order-confirmation', function () {
    return view('order-confirmation');
})->name('order-confirmation');
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');
Route::get('/admin/products', function () {
    return view('admin.products');
})->name('admin.products');
Route::get('/admin/product/create', function () {
    return view('admin.product-create');
})->name('admin.product.create');
Route::get('/admin/product/edit/{slug}', function () {
    return view('admin.product-edit');
})->name('admin.product.edit');
Route::get('/admin/orders', function () {
    return view('admin.orders');
})->name('admin.orders');
Route::get('/admin/order/{order_id}', function () {
    return view('admin.order');
})->name('admin.order');
Route::get('/admin/customers', function () {
    return view('admin.customers');
})->name('admin.customers');
Route::get('/admin/customer/{user_id}', function () {
    return view('admin.customer');
})->name('admin.customer');
Route::get('/admin/settings', function () {
    return view('admin.settings');
})->name('admin.settings');
Route::get('/admin/profile', function () {
    return view('admin.profile');
})->name('admin.profile');
