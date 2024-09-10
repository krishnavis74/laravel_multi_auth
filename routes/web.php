<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
////////////////////////////USER/////////////////////////////////////////////

////////////////////////////ADMIN/////////////////////////////////////////////
Route::get('/admin_dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin_dashboard');
require __DIR__ . '/admin.php';

////////////////////////////TEACHER/////////////////////////////////////////////
Route::get('/teacher_dashboard', function () {
    return view('teacher.teacherdashboard');
})->middleware(['auth:teacher'])->name('teacher_dashboard');
require __DIR__ . '/teacher.php';
// ////////////////////////////STUDENT/////////////////////////////////////////////
Route::get('/student_dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth:student'])->name('student_dashboard');
require __DIR__ . '/student.php';
