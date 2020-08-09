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

// use Illuminate\Routing\Route;

Auth::routes();

Route::get('/index', 'ProductsController@index')->name('products.index');
Route::get('/product/{id}', 'ProductsController@show')->name('products.show');
Route::get('/new', 'ProductsController@new')->name('products.new')->middleware('auth');
Route::post('/create', 'ProductsController@create')->name('products.create');
Route::get('/product/{id}/edit', 'ProductsController@edit')->name('products.edit')->middleware('auth');
Route::put('/product/{id}/edit', 'ProductsController@update')->name('products.update')->middleware('auth');
Route::delete('/product/{id}/destroy', 'ProductsController@destroy')->name('products.destroy')->middleware('auth');

Route::get('/mypage', 'UserController@mypage')->name('users.mypage')->middleware('auth');
Route::get('/mypage/edit', 'UserController@edit')->name('users.edit')->middleware('auth');
Route::put('/mypage/update', 'UserController@update')->name('users.update')->middleware('auth');