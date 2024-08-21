<?php

use App\Http\Controllers\Teacherauth\TeacherLoginController;
use App\Http\Controllers\Teacherauth\TeacherRegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('teacher2:teacher')->group(function () {
    //////////////////////////////////////////////////////////////
    // teacher2->karnal.php me register hain 
    // teacher->config file me register hain
    Route::get('teacher_register', [TeacherRegisterController::class, 'teacher_register'])
        ->name('teacher_register');
    Route::post('teacher_register', [TeacherRegisterController::class, 'teacher_store']);

    Route::get('teacher_login', [TeacherLoginController::class, 'teacher_login'])
        ->name('teacher_login');

    Route::post('teacher_login', [TeacherLoginController::class, 'teacher_store']);
});

Route::middleware('auth:teacher')->group(function () {
    Route::post('teacher_logout', [TeacherLoginController::class, 'teacher_logout'])
        ->name('teacher_logout');
});
