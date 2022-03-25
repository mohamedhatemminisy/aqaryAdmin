<?php

use App\Http\Controllers\Admin\PropertiesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\PropertyRequestController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(
            [
                'prefix' => 'dashboard',
                'middleware' => ['auth', 'permission']
                // 'middleware' => ['auth', 'permission']
            ],

            function () {
                Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
                Route::resource('categories', CategoriesController::class);
                Route::post('comments/comment-status', [CommentsController::class, 'commentStatus'])->name('comments.comment-status');
                Route::resource('pages', PagesController::class);
                Route::resource('roles', RolesController::class);
                Route::resource('users', UsersController::class);
                Route::resource('permissions', PermissionsController::class);

                Route::get('/properties/plans/{event_id}', 'App\Http\Controllers\Admin\PlanController@plans')->name('properties.plans');
                Route::get('/plan/create/{event_id}', 'App\Http\Controllers\Admin\PlanController@createPlan')->name('createPlan');
                Route::post('/plan/store', 'App\Http\Controllers\Admin\PlanController@store')->name('plans.store');
                Route::resource('plans', PlanController::class);

                Route::get('/properties/feature/{event_id}', 'App\Http\Controllers\Admin\FeatureController@feature')->name('properties.feature');
                Route::get('/feature/create/{event_id}', 'App\Http\Controllers\Admin\FeatureController@createFeature')->name('createFeature');
                Route::post('/feature/store', 'App\Http\Controllers\Admin\FeatureController@store')->name('Features.store');
                Route::resource('feature', FeatureController::class);

                Route::get('/properties/detail/{event_id}', 'App\Http\Controllers\Admin\DetailController@detail')->name('properties.detail');
                Route::get('/detail/create/{event_id}', 'App\Http\Controllers\Admin\DetailController@createDetail')->name('createDetail');
                Route::post('/detail/store', 'App\Http\Controllers\Admin\DetailController@store')->name('detail.store');
                Route::resource('detail', DetailController::class);

            

                Route::resource('properties', PropertiesController::class);
                // vision section route
                Route::get('/vision', [VisionController::class, 'edit'])->name('vision.edit');
                Route::put('/vision', [VisionController::class, 'update'])->name('vision.update');
                // mission page route
                Route::get('/mission', [MissionController::class, 'edit'])->name('mission.edit');
                Route::put('/mission', [MissionController::class, 'update'])->name('mission.update');

                // settings route
                Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
                Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
                // contact form page route
                Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
                Route::get('/contact/{id}', [ContactController::class, 'show'])->name("contact.show");
                Route::get('/contact/show-reply/{id}', [ContactController::class, 'show_reply'])->name('contact.show-reply');
                Route::post('/contact/contact-reply', [ContactController::class, 'contact_reply'])->name('contact.contact-reply');
                // property request route
                Route::get('/property-request', [PropertyRequestController::class, 'index'])->name('property_request');
                Route::get('/contact/{id}', [PropertyRequestController::class, 'show'])->name('property_request.show');
                Route::get('/contact/show-reply/{id}', [PropertyRequestController::class, 'show_reply'])->name('property_request.show-reply');
                Route::post('/contact/contact-reply', [PropertyRequestController::class, 'contact_reply'])->name('property_request.contact-reply');
            }
        );
    }
);
Auth::routes();
