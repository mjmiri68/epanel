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

Route::get('/sign-up', function () {return view('register');})->name('register');
Route::get('/login', function () {return view('login');})->name('login');
Route::get('/forgot-password', function () {return view('forgot-password');})->name('forgot-password');
Route::get('/reset-password', function () {return view('reset-password');})->name('reset-password');
Route::get('/verify-email', function () {return view('verify-email');})->name('verify-email');
Route::get('/email-verified', function () {return view('email-verified');})->name('email-verified');

Route::middleware('auth')->group(function () {
    Route::get('/products', function () {return view('user.products');})->name('products');
    Route::get('/product/{slug}', function () {return view('product');})->name('product');
    Route::get('/cart', function () {return view('cart');})->name('cart');
    Route::get('/checkout', function () {return view('checkout');})->name('checkout');
    Route::get('/order-confirmation', function () {return view('order-confirmation');})->name('order-confirmation');
    Route::get('/dashboard', function () {return view('user.dashboard');})->name('dashboard');
});

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/categories', function () {return view('admin.categories');})->name('admin.categories');
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');
    Route::get('/admin/products', function () {return view('admin.products');})->name('admin.products');
    Route::get('/admin/users', function () {return view('admin.users');})->name('admin.users');
    Route::get('/admin/product/edit/{slug}', function () {return view('admin.product-edit');})->name('admin.product.edit');
    Route::get('/admin/orders', function () {return view('admin.orders');})->name('admin.orders');
    Route::get('/admin/order/{order_id}', function () {return view('admin.order');})->name('admin.order');
    Route::get('/admin/customers', function () {return view('admin.customers');})->name('admin.customers');
    Route::get('/admin/customer/{user_id}', function () {return view('admin.customer');})->name('admin.customer');
    Route::get('/admin/settings', function () {return view('admin.settings');})->name('admin.settings');
    Route::get('/admin/profile', function () {return view('admin.profile');})->name('admin.profile');
});
