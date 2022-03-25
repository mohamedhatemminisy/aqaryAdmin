<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AboutController;

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

Route::middleware('auth:api')->group(function () {
    Route::get('logout', 'App\Http\Controllers\Api\UserController@logout');
    Route::post('update_prodile', 'App\Http\Controllers\Api\UserController@update_prodile');
    Route::post('update_password', 'App\Http\Controllers\Api\UserController@update_password');
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});


Route::get('about', 'App\Http\Controllers\Api\AboutController@about');

Route::get('contact', 'App\Http\Controllers\Api\AboutController@contact');
Route::post('contact', 'App\Http\Controllers\Api\AboutController@post_contact');
Route::get('setting', 'App\Http\Controllers\Api\AboutController@setting');

Route::get('properties', 'App\Http\Controllers\Api\PropertYController@properties');
Route::get('categoryProperties', 'App\Http\Controllers\Api\PropertYController@categoryProperties');
Route::get('singlePropety/{id}', 'App\Http\Controllers\Api\PropertYController@singlePropety')->name('singlePropety');

Route::post('propertyRequest', 'App\Http\Controllers\Api\PropertYController@propertyRequest');

Route::get('home', 'App\Http\Controllers\Api\HomeController@home');

Route::post('filter', 'App\Http\Controllers\Api\HomeController@filter');

Route::post('login', 'App\Http\Controllers\Api\UserController@login');
Route::post('register', 'App\Http\Controllers\Api\UserController@register');
