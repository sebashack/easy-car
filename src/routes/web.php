<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/unauthorized', 'App\Http\Controllers\HomeController@unauthorized')->name('home.unauthorized');

// Users
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show')->name('user.show')->middleware('auth');

// Reviews
Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('review.index');

Route::get('/reviews/create', 'App\Http\Controllers\ReviewController@create')->name('review.create');

Route::get('/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('review.show');

Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');

Route::delete('/reviews/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name('review.delete');

// Cars
Route::get('/cars', 'App\Http\Controllers\CarController@index')->name('car.index');

Route::get('/cars/create', 'App\Http\Controllers\CarController@create')->name('car.create')->middleware('auth', 'isAdmin');

Route::get('/cars/{id}', 'App\Http\Controllers\CarController@show')->name('car.show');

Route::post('/cars/save', 'App\Http\Controllers\CarController@save')->name('car.save')->middleware('auth', 'isAdmin');

Route::get('/cars/addToCart/{id}', 'App\Http\Controllers\CarController@addToCart')->name('car.addToCart');

Route::delete('/cars/delete/{id}', 'App\Http\Controllers\CarController@delete')->name('car.delete');


// Car model
Route::get('/car-models', 'App\Http\Controllers\CarModelController@index')->name('carModel.index');

Route::get('/car-models/create', 'App\Http\Controllers\CarModelController@create')->name('carModel.create')->middleware('auth', 'isAdmin');

Route::get('/car-models/{id}', 'App\Http\Controllers\CarModelController@show')->name('carModel.show');

Route::post('/car-models/save', 'App\Http\Controllers\CarModelController@save')->name('carModel.save')->middleware('auth', 'isAdmin');

Route::delete('/car-models/delete/{id}', 'App\Http\Controllers\CarModelController@delete')->name('carModel.delete')->middleware('auth', 'isAdmin');

// Publish request
Route::get('/publish-request', 'App\Http\Controllers\PublishRequestController@index')->name('publishRequest.index');

Route::get('/publish-request/create', 'App\Http\Controllers\PublishRequestController@create')->name('publishRequest.create');

Route::get('/publish-request/{id}', 'App\Http\Controllers\PublishRequestController@show')->name('publishRequest.show');

Route::post('/publish-request/save', 'App\Http\Controllers\PublishRequestController@save')->name('publishRequest.save');

Route::delete('/publish-request/delete/{id}', 'App\Http\Controllers\PublishRequestController@delete')->name('publishRequest.delete');

Auth::routes();

// Order
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create')->middleware('auth');

Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name('order.save')->middleware('auth');

Route::get('/orders/removeAll', 'App\Http\Controllers\OrderController@removeAll')->name('order.removeAll')->middleware('auth');
