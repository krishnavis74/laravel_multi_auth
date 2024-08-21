<?php

use App\Http\Controllers\Adminauth\AdminLoginController;
use App\Http\Controllers\Adminauth\RegisteredAdminController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::get('admin_register', [RegisteredAdminController::class, 'create'])
        ->name('admin_register');

    Route::post('admin_register', [RegisteredAdminController::class, 'store']);

    Route::get('admin_login', [AdminLoginController::class, 'create'])
        ->name('admin_login');
    Route::post('admin_login', [AdminLoginController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {


    Route::post('admin_logout', [AdminLoginController::class, 'destroy'])
        ->name('admin_logout');
});
