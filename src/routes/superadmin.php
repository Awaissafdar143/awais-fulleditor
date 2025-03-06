<?php


use Awaistech\Larpack\Middleware\SuperAdmin;
use Illuminate\Support\Facades\Route;
use Awaistech\Larpack\Controllers\package\EnvController;
use Awaistech\Larpack\Controllers\package\Contactcontroller;
use Awaistech\Larpack\Controllers\package\ActivityLogController;
use Awaistech\Larpack\Controllers\package\MaintenanceController;


Route::prefix('/admin')->group(function () {
    Route::middleware(SuperAdmin::class)->group(function () {
        //maintaince page
        Route::get('/maintenance/edit', [MaintenanceController::class, 'edit'])->name('maintenance.edit');
        Route::post('/maintenance/update', [MaintenanceController::class, 'update'])->name('maintenance.update');
        //env editor
        Route::get('/env-editor', [EnvController::class, 'index'])->name('env.index');
        Route::post('/env-editor', [EnvController::class, 'update'])->name('env.update');

        //Activity log
        Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity.logs');

        //restore entry
        Route::get('/contact/restore/{id}', [Contactcontroller::class, 'restore'])
            ->name('contact_restore');
    });
});
