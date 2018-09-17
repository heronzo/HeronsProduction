<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Products CRUD
Route::get('/products', 'ProductController@index')->name('products_list');
Route::get('/product/{id}', 'ProductController@singleProduct')->name('product_show');
Route::post('/add/product', 'ProductController@add')->name('product_add');
Route::put('/add/product', 'ProductController@add')->name('product_update');
Route::delete('/delete/product/{id}', 'ProductController@delete')->name('product_delete');

//Supplier CRUD
Route::get('/suppliers', 'SupplierController@index')->name('suppliers_list');
Route::get('/supplier/{id}', 'SupplierController@singleSupplier')->name('supplier_show');
Route::post('/add/supplier', 'SupplierController@add')->name('supplier_add');
Route::put('/add/supplier', 'SupplierController@add')->name('supplier_update');
Route::delete('/delete/supplier/{id}', 'SupplierController@delete')->name('supplier_delete');

//Orders CRUD
Route::get('/orders', 'OrderController@index')->name('orders_list');
Route::get('/order/{id}', 'OrderController@singleOrder')->name('order_show');
Route::post('/add/order', 'OrderController@add')->name('order_add');
Route::put('/add/order', 'OrderController@add')->name('order_update');
Route::delete('/delete/order/{id}', 'OrderController@delete')->name('order_delete');


