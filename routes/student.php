<?php

use App\Http\Controllers\Studentauth\Auth\StudentLoginController;
use App\Http\Controllers\Studentauth\Auth\RegisteredStudentController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:student')->group(function () {
Route::get('student_register', [RegisteredStudentController::class, 'student_register'])
    ->name('student_register');

Route::post('student_register', [RegisteredStudentController::class, 'student_store']);

Route::get('student_login', [StudentLoginController::class, 'student_login'])
    ->name('student_login');

Route::post('student_login', [StudentLoginController::class, 'store']);
});

Route::middleware('auth:student')->group(function () {
    Route::post('student_logout', [StudentLoginController::class, 'student_logout'])
        ->name('student_logout');
});
