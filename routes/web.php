<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'web'], function () {
    // Authentication Routes
    Route::get('auth/login', LoginController::class . '@getLogin');
    Route::post('auth/login', LoginController::class . '@postLogin');
    Route::get('auth/logout', LoginController::class . '@getLogout');

    // Registration Routes
    Route::get('auth/register', RegisterController::class . '@getRegister');
    Route::post('auth/register', RegisterController::class . '@postRegister');

    // Password Reset Routes
    Route::get('password/reset', PasswordController::class . '@showLinkRequestForm');
    Route::post('password/email', PasswordController::class . '@sendResetLinkEmail');
    Route::get('password/reset/{token}', PasswordController::class . '@showResetForm');
    Route::post('password/reset', PasswordController::class . '@reset');

    // Registration Routes
    Route::get('register', RegisterController::class . '@getRegister');
    Route::post('register', RegisterController::class . '@postRegister');

    //category routes
    Route::resource('categories', CategoryController::class)->except('create');

    Route::get('blog/{slug}', BlogController::class. '@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
    Route::get('blog', BlogController::class. '@getIndex')->name('blog.index');
    Route::get('contact', PagesController::class . '@getContact');
    Route::get('about', PagesController::class . '@getAbout');
    Route::get('/', PagesController::class . '@getIndex');
    Route::resource('posts', PostController::class);
    // Route::Resource("auth", LoginController::class);

});
Auth::routes();

Route::get('/', App\Http\Controllers\PagesController::class . '@getIndex')->name('home');

Auth::routes();

Route::get('/', App\Http\Controllers\PagesController::class . '@getIndex')->name('home');

Auth::routes();

Route::get('/', App\Http\Controllers\PagesController::class . '@getIndex')->name('home');
