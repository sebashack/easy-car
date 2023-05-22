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

// Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');

Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('home.contact');

Route::get('/unauthorized', 'App\Http\Controllers\HomeController@unauthorized')->name('home.unauthorized');

// Community info
Route::get('/community', 'App\Http\Controllers\CommunityController@index')->name('community.index');

Auth::routes();

// Admin
Route::get('/admins/profile', 'App\Http\Controllers\AdminController@show')->name('admin.show')->middleware('auth', 'isAdmin');

Route::get('/admins/users', 'App\Http\Controllers\AdminController@showUsers')->name('admin.showUsers')->middleware('auth', 'isAdmin');

// Users
Route::get('/users/profile', 'App\Http\Controllers\UserController@show')->name('user.show')->middleware('auth');

// Reviews
Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('review.index')->middleware('auth');

Route::get('/reviews/create/{id}', 'App\Http\Controllers\ReviewController@create')->name('review.create')->middleware('auth');

Route::get('/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('review.show')->middleware('auth');

Route::post('/reviews/save/{id}', 'App\Http\Controllers\ReviewController@save')->name('review.save')->middleware('auth');

Route::delete('/reviews/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name('review.delete')->middleware('auth');

Route::get('/reviews/edit/{id}', 'App\Http\Controllers\ReviewController@edit')->name('review.edit')->middleware('auth');

Route::patch('/reviews/{id}', 'App\Http\Controllers\ReviewController@update')->name('review.update')->middleware('auth');

// AdminCars
Route::get('/admins/cars/create', 'App\Http\Controllers\AdminCarController@create')->name('adminCar.create')->middleware('auth', 'isAdmin');

Route::post('/admins/cars/save', 'App\Http\Controllers\AdminCarController@save')->name('adminCar.save')->middleware('auth', 'isAdmin');

Route::get('/admins/cars/edit/{id}', 'App\Http\Controllers\AdminCarController@edit')->name('adminCar.edit')->middleware('auth', 'isAdmin');

Route::delete('/admins/cars/delete/{id}', 'App\Http\Controllers\AdminCarController@delete')->name('adminCar.delete')->middleware('auth', 'isAdmin');

Route::get('/admins/cars', 'App\Http\Controllers\AdminCarController@index')->name('adminCar.index')->middleware('auth', 'isAdmin');

Route::patch('/admins/cars/{id}', 'App\Http\Controllers\AdminCarController@update')->name('adminCar.update')->middleware('auth', 'isAdmin');

Route::get('/admins/cars/sales/{report_type?}', 'App\Http\Controllers\AdminCarController@downloadReport')->name('adminCar.downloadReport')->middleware('auth', 'isAdmin');

Route::get('/admins/cars/{id}', 'App\Http\Controllers\AdminCarController@show')->name('adminCar.show');

// Cars
Route::get('/cars/{id}', 'App\Http\Controllers\CarController@show')->name('car.show');

Route::get('/cars/addToCart/{id}', 'App\Http\Controllers\CarController@addToCart')->name('car.addToCart');

Route::get('/cars/{car_state?}/{car_brand?}/{transmission_type?}/{price_range?}', 'App\Http\Controllers\CarController@index')->name('car.index');

// AdminCarModel
Route::get('/admins/car-models', 'App\Http\Controllers\AdminCarModelController@index')->name('adminCarModel.index')->middleware('auth', 'isAdmin');

Route::get('/admins/car-models/create', 'App\Http\Controllers\AdminCarModelController@create')->name('adminCarModel.create')->middleware('auth', 'isAdmin');

Route::post('/admins/car-models/save', 'App\Http\Controllers\AdminCarModelController@save')->name('adminCarModel.save')->middleware('auth', 'isAdmin');

Route::get('/admins/car-models/{id}', 'App\Http\Controllers\AdminCarModelController@show')->name('adminCarModel.show');

Route::get('/admins/car-models/edit/{id}', 'App\Http\Controllers\AdminCarModelController@edit')->name('adminCarModel.edit')->middleware('auth', 'isAdmin');

Route::delete('/admins/car-models/delete/{id}', 'App\Http\Controllers\AdminCarModelController@delete')->name('adminCarModel.delete')->middleware('auth', 'isAdmin');

Route::patch('/admins/car-models/{id}', 'App\Http\Controllers\AdminCarModelController@update')->name('adminCarModel.update')->middleware('auth', 'isAdmin');

// Car model
Route::get('/car-models', 'App\Http\Controllers\CarModelController@index')->name('carModel.index');

Route::get('/car-models/{id}', 'App\Http\Controllers\CarModelController@show')->name('carModel.show');

// Publish request
Route::get('/publish-requests', 'App\Http\Controllers\PublishRequestController@index')->name('publishRequest.index')->middleware('auth', 'isAdmin');

Route::get('/publish-requests/create', 'App\Http\Controllers\PublishRequestController@create')->name('publishRequest.create')->middleware('auth');

Route::get('/publish-requests/{id}', 'App\Http\Controllers\PublishRequestController@show')->name('publishRequest.show')->middleware('auth');

Route::post('/publish-requests/save', 'App\Http\Controllers\PublishRequestController@save')->name('publishRequest.save')->middleware('auth');

Route::put('/publish-requests/accept/{id}', 'App\Http\Controllers\PublishRequestController@accept')->name('publishRequest.accept')->middleware('auth', 'isAdmin');

Route::put('/publish-requests/reject/{id}', 'App\Http\Controllers\PublishRequestController@reject')->name('publishRequest.reject')->middleware('auth', 'isAdmin');

// Order

Route::get('/orders/pdf/{id}', 'App\Http\Controllers\OrderController@downloadPdf')->name('layouts.pdf')->middleware('auth');

Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create')->middleware('auth');

Route::get('/orders/remove', 'App\Http\Controllers\OrderController@remove')->name('order.remove')->middleware('auth');

Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index')->middleware('auth');

Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name('order.save')->middleware('auth');

Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show')->middleware('auth');

// Lang

Route::get('/set_language/{lang}', 'App\Http\Controllers\LangController@setLanguage')->name('setLanguage');

// Google maps

Route::get('/car_repair', 'App\Http\Controllers\CarRepairController@index')->name('carRepair');

// Allied products
Route::get('/allied_product', 'App\Http\Controllers\AlliedProductController@index')->name('alliedProduct');
