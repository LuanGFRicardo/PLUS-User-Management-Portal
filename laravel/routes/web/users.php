<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::prefix('users')->group(function () {
    Route::get('/register', [UsersController::class, 'showRegistrationForm'])->name('users.register.form');
    Route::post('/register', [UsersController::class, 'register'])->name('users.register');
    Route::view('/registration/confirmed', 'filament.pages.registro-usuarios.registration-confirmation')->name('registration.confirmed');
});
