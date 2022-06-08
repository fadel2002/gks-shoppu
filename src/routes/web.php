<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
// use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/product', function () {
    return view('product');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/shop', [ShopController::class, 'index']);
Route::post('/shop', [ShopController::class, 'store']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);

// Route::resource('product', 'ProductController');
Route::resource('product', ProductController::class);
// Route::resource('order', 'OrderController')->only([
//     'edit', 'update'
// ]);
Route::resource('order', OrderController::class)->only([
    'edit', 'update'
]);
// Route::resource('category', 'CategoryController')->only([
//     'show'
// ]);
Route::resource('category', CategoryController::class)->only([
    'show'
]);

// Route::get('/cart', function () {
//     return view('cart');
// });

Route::get('/checkout', function () {
    return view('checkout');
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
