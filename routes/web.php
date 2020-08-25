<?php

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all();

    return view('welcome')->with(['products' => $products]);
})->name('index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-to-cart/{id}', 'ProductController@addToCart')->name('product.add');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.cart');

Route::get('/checkout', 'CheckoutController@getCheckout')->name('checkout');
Route::post('/checkout', 'CheckoutController@postCheckout')->name('checkout');

Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::get('/orders/{id}', 'OrderController@getOrder')->name('orders.order');

Auth::routes();
