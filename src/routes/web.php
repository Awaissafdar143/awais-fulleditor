<?php

use Awaistech\Larpack\Controllers\package\Contactcontroller;
use Awaistech\Larpack\Middleware\CheckMaintenanceMode;
use Illuminate\Support\Facades\Route;


Route::middleware(CheckMaintenanceMode::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
Route::post('/contactform-store', [Contactcontroller::class, 'Contact_store'])->name('contactform_store');


require __DIR__ .'/admin.php';
require __DIR__ .'/superadmin.php';