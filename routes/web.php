<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    $products=\App\Models\Product::all();
    $carts=\App\Models\Cart::all();
    return view('welcome',compact('products','carts'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/productAdd', [ProductController::class, 'productAdd'])->name('productAdd');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/updateProduct/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/buy/{id}', [ProductController::class, 'buy'])->name('product.buy');
Route::get('/cart', [ProductController::class, 'cart'])->name('product.cart');

