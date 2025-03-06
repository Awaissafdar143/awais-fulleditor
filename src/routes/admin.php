<?php

use App\Http\Middleware\AuthChheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\package\AuthController;
use App\Http\Controllers\package\BlogController;
use App\Http\Controllers\package\Contactcontroller;
use App\Http\Controllers\package\seoController;

Route::prefix('/admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/loginPost', 'logincheck')->name('logincheck');
    });
    Route::middleware(AuthChheck::class)->group(function () {

        Route::get('/dashboard', [AuthController::class, 'AdminDashboard'])->name('adminDashboard');
        Route::controller(AuthController::class)->group(function () {
            Route::get('/Profile', 'Profile')->name('profile');
            Route::post('/Profile', 'updateprofile')->name('updateprofile');
            Route::get('/logout', "logout")->name('logout');
        });
        Route::controller(BlogController::class)->group(function () {
            Route::get('/Blog-Dashboard', 'blogdashboard')->name('blogdashboard');
            Route::get('/Add-Blog', 'add')->name('addblog');
            Route::post('/Add-Blog', 'post')->name('addblogpost');
            Route::get('/update-Blog/{id}', 'update')->name('blogupdate');
            Route::post('/update-Blog', 'updatepost')->name('blogupdatepost');
            Route::get('/delete-Blog/{id}', 'delete')->name('blogDelete');
        });
        Route::controller(seoController::class)->group(function () {
            Route::get('/Seo-Dashboard', 'seodashboard')->name('seodashboard');
            Route::get('/update-seo/{id}', 'update')->name('seoupdate');
            Route::post('/update-seo/{id}', 'updatepost')->name('seoupdatepost');
        });
        Route::controller(Contactcontroller::class)->group(function () {
            Route::get('/Contact-form-Dashboard', 'dashboard')->name('contactform_dashboard');
            Route::get('/contact-us/{id}', 'Contactdelete')->name('contact_delete');
        });
    });
});
