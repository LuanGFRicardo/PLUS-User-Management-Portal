<?php
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/admin/livewire/update', $handle)->name('livewire.update');
});

Route::middleware(['auth'])->group(function () {
    require __DIR__.'/web/users.php';
    require __DIR__.'/web/oci.php';
    require __DIR__.'/web/companies.php';
});
