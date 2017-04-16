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
Route::get('/product/add-stocks', 'Product\ProductController@addStocks');
Route::get('/product/suggest-products', 'Product\ProductController@suggestProducts');
Route::post('/product/add-product', 'Product\ProductController@addProduct');



Route::get('/product/add-stocks', 'Product\ProductController@addStocks');
Route::get('/product/suggest-products', 'Product\ProductController@suggestProducts');
Route::post('/product/add-product', 'Product\ProductController@addProduct');

Route::get('/home/employee', 'Employee\EmployeeController@employee');
Route::get('/home/employee/add', 'Employee\EmployeeController@addEmployee');
Route::get('/home/employee/check-employee-existed', 'Employee\EmployeeController@checkEmployeeExisted');
Route::get('/home/employee/{account}/edit', 'Employee\EmployeeController@editEmployee');
Route::post('/home/employee/{account}/edit', 'Employee\EmployeeController@updateEmployee');
Route::post('/home/employee', 'Employee\EmployeeController@storeEmployee');

Route::get('/home/employee/{account}', 'Employee\EmployeeController@deleteEmployee')->name('deleteUser');



Route::get('/home/agency/add', 'Home\HomeController@addAgency');
Route::get('home/agency', 'Home\HomeController@showAgencies');
Route::get('/home/agency/{id}/addemployee', 'Home\HomeController@showAddEmployee');
Route::get('/home/agency/{id}', 'Home\HomeController@showAgency');
Route::post('/home/agency', 'Home\HomeController@storeAgency');
Route::get('/home/agencyAddEmployee/{id}', 'Home\HomeController@agencyAddEmployee');

Route::get('/home/create-bill', 'Home\HomeController@createBill');