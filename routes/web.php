<?php

use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\CategoriesController;
use App\Http\Controllers\Site\FavoritesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\NotificationsController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\RecipesController;
use Illuminate\Support\Facades\Auth;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/',function (){
            return view('welcome');
        }
        );

    }
);

Auth::routes();
