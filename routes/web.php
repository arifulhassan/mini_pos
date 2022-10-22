<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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


// login
Route::get('/login', 'App\HTTP\Controllers\Auth\LoginController@login')->name('login');
Route::post('/login', 'App\HTTP\Controllers\Auth\LoginController@authenticate')->name('login.confirm');


Route::group(['middleware' => 'auth'],function() {


  Route::get('/dashboard', function () {
    // return Auth::user();
       return view('welcome');
  });



  // logout
  Route::get('/logout', 'App\HTTP\Controllers\Auth\LoginController@logout')->name('logout');



// Group
  Route::get('/groups','App\Http\Controllers\UserGroupsController@index');
  Route::get('/groups/create','App\Http\Controllers\UserGroupsController@create');
  Route::post('/groups','App\Http\Controllers\UserGroupsController@store');
  Route::delete('/groups/{id}','App\Http\Controllers\UserGroupsController@destroy');


// User

  // Route::get('/users','App\Http\Controllers\UsersController@index');
  Route::resource('/users','App\Http\Controllers\UsersController');
  Route::get('/users/{id}/sales','App\Http\Controllers\UserSalesController@index')->name('user.sales');

  Route::get('/users/{id}/purchases','App\Http\Controllers\UserPurchasesController@index')->name('user.purchases');

  Route::get('/users/{id}/payments','App\Http\Controllers\UserPaymentController@index')->name('user.payments');
  Route::post('/users/{id}/payments','App\Http\Controllers\UserPaymentController@store')->name('user.payments.store');
  Route::delete('/users/{id}/payments/{payment_id}','App\Http\Controllers\UserPaymentController@destroy')->name('user.payments.destroy');


  Route::get('/users/{id}/receipts','App\Http\Controllers\UserReceiptsController@index')->name('user.receipts');




  Route::resource('/categories','App\Http\Controllers\CategoriesController', ['except' => ['show']]);


  Route::resource('/products','App\Http\Controllers\ProductsController');



});



// Route::resource('/users','App\Http\Controllers\UsersController', ['except' => ['show']]);
// Route::resource('/users','App\Http\Controllers\UsersController', ['only' => ['show','destroy']]);



// Route::get('/users/{id}','App\Http\Controllers\UsersController@show');
// Route::get('/users/create','App\Http\Controllers\UsersController@create');
// Route::post('/users','App\Http\Controllers\UsersController@store');
// Route::get('/users/{id}/edit','App\Http\Controllers\UsersController@edit');
// Route::put('/users/{id}','App\Http\Controllers\UsersController@update');
// Route::delete('/users/{id}','App\Http\Controllers\UsersController@destroy');
