<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['set.token', 'auth:sanctum'])->group(function () {
    Route::get('/', fn () => view('pages.vat-calc'))->name('vat.calc');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'registerView'])->name('register.view');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'loginView'])->name('login.view');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});
