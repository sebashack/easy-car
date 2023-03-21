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

Auth::routes();

// Users
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index')->middleware('auth', 'isAdmin');

Route::get('/users/profile', 'App\Http\Controllers\UserController@show')->name('user.show')->middleware('auth');

Route::get('/admins/profile', 'App\Http\Controllers\UserController@showAdmin')->name('user.showAdmin')->middleware('auth', 'isAdmin');

// Reviews
Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('review.index')->middleware('auth');

Route::get('/reviews/create/{id}', 'App\Http\Controllers\ReviewController@create')->name('review.create')->middleware('auth');

Route::get('/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('review.show')->middleware('auth');

Route::post('/reviews/save/{id}', 'App\Http\Controllers\ReviewController@save')->name('review.save')->middleware('auth');

Route::delete('/reviews/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name('review.delete')->middleware('auth');

// Cars
Route::get('/cars', 'App\Http\Controllers\CarController@index')->name('car.index');

Route::get('/cars/create', 'App\Http\Controllers\CarController@create')->name('car.create')->middleware('auth', 'isAdmin');

Route::get('/cars/{id}', 'App\Http\Controllers\CarController@show')->name('car.show');

Route::post('/cars/save', 'App\Http\Controllers\CarController@save')->name('car.save')->middleware('auth', 'isAdmin');

Route::get('/cars/edit/{id}', 'App\Http\Controllers\CarController@edit')->name('car.edit')->middleware('auth', 'isAdmin');

Route::patch('/cars/{id}', 'App\Http\Controllers\CarController@update')->name('car.update')->middleware('auth', 'isAdmin');

Route::get('/cars/addToCart/{id}', 'App\Http\Controllers\CarController@addToCart')->name('car.addToCart');

Route::delete('/cars/delete/{id}', 'App\Http\Controllers\CarController@delete')->name('car.delete')->middleware('auth', 'isAdmin');

// Car model
Route::get('/car-models', 'App\Http\Controllers\CarModelController@index')->name('carModel.index');

Route::get('/car-models/create', 'App\Http\Controllers\CarModelController@create')->name('carModel.create')->middleware('auth', 'isAdmin');

Route::get('/car-models/{id}', 'App\Http\Controllers\CarModelController@show')->name('carModel.show');

Route::post('/car-models/save', 'App\Http\Controllers\CarModelController@save')->name('carModel.save')->middleware('auth', 'isAdmin');

Route::get('/car-models/edit/{id}', 'App\Http\Controllers\CarModelController@edit')->name('carModel.edit')->middleware('auth', 'isAdmin');

Route::patch('/car-models/{id}', 'App\Http\Controllers\CarModelController@update')->name('carModel.update')->middleware('auth', 'isAdmin');

Route::delete('/car-models/delete/{id}', 'App\Http\Controllers\CarModelController@delete')->name('carModel.delete')->middleware('auth', 'isAdmin');

// Publish request
Route::get('/publish-requests', 'App\Http\Controllers\PublishRequestController@index')->name('publishRequest.index')->middleware('auth', 'isAdmin');

Route::get('/publish-requests/create', 'App\Http\Controllers\PublishRequestController@create')->name('publishRequest.create')->middleware('auth');

Route::get('/publish-requests/{id}', 'App\Http\Controllers\PublishRequestController@show')->name('publishRequest.show')->middleware('auth');

Route::post('/publish-requests/save', 'App\Http\Controllers\PublishRequestController@save')->name('publishRequest.save')->middleware('auth');

Route::put('/publish-requests/accept/{id}', 'App\Http\Controllers\PublishRequestController@accept')->name('publishRequest.accept')->middleware('auth', 'isAdmin');

Route::put('/publish-requests/reject/{id}', 'App\Http\Controllers\PublishRequestController@reject')->name('publishRequest.reject')->middleware('auth', 'isAdmin');

// Order
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create')->middleware('auth');

Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index')->middleware('auth');

Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show')->middleware('auth');

Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name('order.save')->middleware('auth');

Route::get('/orders/removeAll', 'App\Http\Controllers\OrderController@removeAll')->name('order.removeAll')->middleware('auth');
