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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'Home\HomeController@index');

/*Product management actions*/
Route::get('/product', 'Product\ProductController@index');
Route::get('/product/detail/{id}', 'Product\ProductController@detail');
Route::get('/product/add-stocks', 'Product\ProductController@addStocks');
Route::post('/product/add-stocks', 'Product\ProductController@addStocks');
Route::get('/product/suggest-products', 'Product\ProductController@suggestProducts');
Route::post('/product/add-product', 'Product\ProductController@addProduct');
Route::get('/product/sale', 'Product\ProductController@sale');
Route::post('/product/sale', 'Product\ProductController@sale');
Route::get('/product/find-products', 'Product\ProductController@findByShipments');
