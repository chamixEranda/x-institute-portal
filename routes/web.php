<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('user.loginForm');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'loginUser'])->name('user.login');


Route::middleware('auth')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('user.logout');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    //student routes
    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::get('/resgister', [App\Http\Controllers\StudentController::class, 'index'])->name('resgister');
        Route::post('/resgister/store', [App\Http\Controllers\StudentController::class, 'store'])->name('resgister.store');
        Route::get('search', [App\Http\Controllers\StudentController::class, 'search'])->name('search');
    });

    //course routes
    Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
        Route::resource('/', App\Http\Controllers\CourseController::class);
    });
});

