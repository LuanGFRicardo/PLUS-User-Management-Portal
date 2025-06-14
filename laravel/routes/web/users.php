<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::prefix('users')->group(function () {
    Route::get('/register', [UsersController::class, 'showRegistrationForm'])->name('users.register.form');
    Route::post('/register', [UsersController::class, 'register'])->name('users.register');
    Route::view('/registration/confirmed', 'filament.pages.registro-usuarios.registration-confirmation')->name('registration.confirmed');
    Route::view('/access/pending', 'filament.pages.registro-usuarios.access-pending')->name('access.pending');
    Route::view('/access/declined', 'filament.pages.registro-usuarios.access-declined')->name('access.declined');
});
