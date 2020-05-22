<?php

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

Route::any('product/search', 'ProductController@search')->name('products.search');

Route::resource('products', 'ProductController');

Route::get('/', function () {
    return view('welcome');
});

