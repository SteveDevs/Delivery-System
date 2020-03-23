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
//assign_pargonaughts
Route::get('show-assign-pargonaughts/{id}', 'DeliveryController@show_assign_pargonaughts')->name('show-assign-pargonaughts');;
Route::post('assign-pargonaughts', 'DeliveryController@assign_pargonaughts')->name('assign-pargonaughts');

Route::resource('households', 'HouseholdController');
Route::post('search-households', 'HouseholdController@search')->name('search-households');

Route::resource('orders', 'OrderController');
Route::post('search-orders', 'DeliveryController@search')->name('search-orders');

Route::resource('parcels', 'ParcelController');
Route::post('search-parcels', 'ParcelController@search')->name('search-parcels');

Route::resource('pargonaughts', 'PargonaughtController');
Route::post('search-pargonaughts', 'PargonaughtController@search')->name('search-pargonaughts');

Route::resource('suppliers', 'SupplierController');
Route::post('search-suppliers', 'SupplierController@search')->name('search-suppliers');

Route::get('/home', 'HomeController@index')->name('home');
