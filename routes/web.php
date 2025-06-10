<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
#Tambahan Achmad
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BuildingPartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#Tambahan dari Achmad
Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('projects.building-parts', BuildingPartController::class);
});


require __DIR__.'/auth.php';
