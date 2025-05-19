<?php
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/admin/livewire/update', $handle)->name('livewire.update');
});
