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

Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('review.index');

Route::get('/reviews/create', 'App\Http\Controllers\ReviewController@create')->name('review.create');

Route::get('/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('review.show');

Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');

Route::delete('/reviews/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name('review.delete');
Route::get('/cars', 'App\Http\Controllers\CarController@index')->name('car.index');
Route::get('/cars/create', 'App\Http\Controllers\CarController@create')->name('car.create');
Route::get('/cars/{id}', 'App\Http\Controllers\CarController@show')->name('car.show');
Route::post('/cars/save', 'App\Http\Controllers\CarController@save')->name('car.save');
Route::delete('/cars/delete/{id}', 'App\Http\Controllers\CarController@delete')->name('car.delete');
