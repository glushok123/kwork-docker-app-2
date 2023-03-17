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

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/user-agreement', 'App\Http\Controllers\HomeController@showUserAgreement');
Route::get('/privacy-policy', 'App\Http\Controllers\HomeController@showPrivacyPolicy');
Route::get('/offer', 'App\Http\Controllers\HomeController@showOffer');

Route::post('/get-products-by-filters', 'App\Http\Controllers\HomeController@filtersPost');
Route::get('/get-products-by-filters', 'App\Http\Controllers\HomeController@filtersGet');

Route::post('/feedback-send', 'App\Http\Controllers\FeedbackController@create');
Route::post('/order-send', 'App\Http\Controllers\OrderController@create');

Route::get('/public/uploads/{name}', 'App\Http\Controllers\ImageController@show')->name('image');