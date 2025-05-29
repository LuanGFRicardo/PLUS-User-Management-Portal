<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::prefix('users')->group(function () {
    Route::get('/register', [UsersController::class, 'showRegistrationForm'])->name('users.register.form');
    Route::post('/register', [UsersController::class, 'register'])->name('users.register');
    Route::post('approve/{user}', [UsersController::class, 'approve'])->name('users.approve');
    Route::post('reject/{user}', [UsersController::class, 'reject'])->name('users.reject');
});
