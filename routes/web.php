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

Route::prefix('login')->name('login.')->group(function() {
  Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
  Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::prefix('register')->name('register.')->group(function() {
  Route::get('{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
  Route::post('{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});

Route::get('/', 'ProductsController@index')->name('products.index');
Route::get('/index', 'ProductsController@index')->name('products.index');
Route::get('/product/{id}', 'ProductsController@show')->name('products.show');
Route::get('/new', 'ProductsController@new')->name('products.new')->middleware('auth');
Route::post('/create', 'ProductsController@create')->name('products.create');
Route::get('/product/{id}/edit', 'ProductsController@edit')->name('products.edit')->middleware('auth');
Route::put('/product/{id}/edit', 'ProductsController@update')->name('products.update')->middleware('auth');
Route::delete('/product/{id}/destroy', 'ProductsController@destroy')->name('products.destroy')->middleware('auth');



Route::prefix('product')->name('product.')->group(function() {
  Route::put('/{product}/like', 'ProductsController@like')->name('like')->middleware('auth');
  Route::delete('/{product}/like', 'ProductsController@unlike')->name('unlike')->middleware('auth');
});

Route::prefix('/product')->name('comments.')->group(function() {
  Route::middleware('auth')->group(function() {
    Route::get('/{id}/comment/new', 'CommentsController@new')->name('new');
    Route::post('/{id}/comment/create', 'CommentsController@create')->name('create');
    Route::get('/comment/{id}/edit', 'CommentsController@edit')->name('edit');
    Route::put('/comment/{id}/update', 'CommentsController@update')->name('update');
    Route::delete('/comment/{id}/destroy', 'CommentsController@de')->name('destroy');
  });
});

Route::get('/tags/{name}', 'TagController@show')->name('tags.show');


Route::prefix('/users')->name('users.')->group(function() {
  Route::get('/{name}', 'UserController@show')->name('show');
  Route::get('/{name}/edit', 'UserController@edit')->name('edit')->middleware('auth');
  Route::put('/{name}/update', 'UserController@update')->name('update')->middleware('auth');
  Route::get ('/{name}/likes', 'UserController@likes')->name('likes');
  Route::get('/{name}/followings', 'UserController@followings')->name('followings');
  Route::get('/{name}/followers', 'UserController@followers')->name('followers');

  Route::middleware('auth')->group(function() {
    Route::put('/{name}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
  });
});