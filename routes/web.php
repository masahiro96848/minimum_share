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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/index', 'ProductsController@index')->name('products.index');
Route::get('/show', 'ProductsController@show')->name('products.show');
Route::get('/new', 'ProductsController@new')->name('products.new')->middleware('auth');
Route::post('/create', 'ProductsController@create')->name('products.create');