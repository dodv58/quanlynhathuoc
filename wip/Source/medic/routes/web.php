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

Route::get('/home', 'Home\HomeController@index')->name('home');
/*Product management actions*/
Route::get('/product', 'Product\ProductController@index');
Route::get('/product/detail/{id}', 'Product\ProductController@detail');
Route::get('/product/add-stocks', 'Product\ProductController@addStocks');
Route::post('/product/add-stocks', 'Product\ProductController@addStocks');
Route::get('/product/suggest-products', 'Product\ProductController@suggestProducts');
Route::post('/product/add-product', 'Product\ProductController@addProduct');
Route::get('/product/sale', 'Product\ProductController@sale')->name('sale');
Route::post('/product/sale', 'Product\ProductController@sale');
Route::get('/product/find-products', 'Product\ProductController@findByShipments');
Route::post('/product/edit', 'Product\ProductController@editProduct');
Route::post('/product/add', 'Product\ProductController@addProduct');



Route::get('/employee', 'Employee\EmployeeController@employee');
Route::get('/employee/add', 'Employee\EmployeeController@addEmployee');
Route::get('/employee/check-employee-existed', 'Employee\EmployeeController@checkEmployeeExisted');
Route::get('/employee/{account}/edit', 'Employee\EmployeeController@editEmployee');
Route::post('/employee/{account}/edit', 'Employee\EmployeeController@updateEmployee');
Route::post('/employee', 'Employee\EmployeeController@storeEmployee');

Route::get('/employee/{account}', 'Employee\EmployeeController@deleteEmployee')->name('deleteUser');



Route::get('/agency/add', 'Agency\AgencyController@addAgency');
Route::get('/agency', 'Agency\AgencyController@showAgencies');
Route::get('/agency/{id}/addemployee', 'Agency\AgencyController@showAddEmployee');
Route::get('/agency/{id}', 'Agency\AgencyController@showAgency');
Route::post('/agency', 'Agency\AgencyController@storeAgency');
Route::get('/agencyAddEmployee/{id}', 'Agency\AgencyController@agencyAddEmployee');

Route::get('/create-bill', 'Home\HomeController@createBill');


Route::get('login', 'Auth\LoginController@showLoginView')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('register', 'Auth\RegisterController@create');
Route::post('register', 'Auth\RegisterController@store')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('change-password', 'Employee\EmployeeController@showUpdatePasswordForm');
Route::post('change-password', 'Employee\EmployeeController@updatePassword');

Route::get('profile', 'Employee\EmployeeController@showProfile');
