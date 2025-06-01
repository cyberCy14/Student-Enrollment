<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\authController;
use App\Http\Middleware\loginMiddleware;
use App\Http\Middleware\authUser;


Route::middleware(authUser::class)->controller(studentController::class)->group(function () {
    Route::get('/', [studentController::class, 'index']);
    Route::get('/student/{id}', [studentController::class, 'get']);
    Route::post('/enroll', [studentController::class, 'store'])->name('register.student');
    Route::get('/delete/{id}',[studentController::class, 'delete'])->name('delete.student');
    Route::get('/update/{id}',[studentController::class, 'updateView'])->name('update.student');
    Route::put('/students/{id}', [studentController::class, 'update'])->name('student.update');
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
});

Route::middleware(loginMiddleware::class)->controller(authController::class)->group(function () {
Route::get('/login', [authController::class, 'showLoginForm'])->name('auth.loginView');
Route::post('/login', [authController::class, 'login']);
Route::get('/register', [authController::class, 'showRegisterForm'])->name('auth.registerView');
Route::post('/register', [authController::class, 'register'])->name('register.post');
});