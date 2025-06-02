<?php
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/admin');
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/admin/livewire/update', $handle)->name('livewire.update');
});

Route::middleware(['auth'])->group(function () {
    require __DIR__.'/web/users.php';
    require __DIR__.'/web/logs.php';
    require __DIR__.'/web/companies.php';
});
