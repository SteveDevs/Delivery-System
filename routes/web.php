<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('deliveries', 'DeliveryController');
Route::post('search-deliveries', 'DeliveryController@search')->name('search-deliveries');

Route::resource('households', 'HouseHoldController');

Route::resource('orders', 'OrderController');

Route::resource('parcels', 'ParcelController');

Route::resource('pargonaughts', 'PargonaughtController');

Route::resource('suppliers', 'SupplierController');

Route::get('/home', 'HomeController@index')->name('home');
