<?php

use App\Http\Controllers\GadgetsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/gadgets' , [GadgetsController::class, 'index'])->name('gadgets.index');
    Route::get('/gadgets/create', [GadgetsController::class, 'create'])->name('gadgets.create');
    Route::post('/gadgets', [GadgetsController::class, 'store'])->name('gadgets.store');
    Route::get('/gadgets/{gadget}/edit', [GadgetsController::class, 'edit'])->name('gadgets.edit');
    Route::put('/gadgets/{gadget}', [GadgetsController::class, 'update'])->name('gadgets.update');
    Route::delete('/gadgets/{gadget}', [GadgetsController::class, 'destroy'])->name('gadgets.destroy');
});

require __DIR__ . '/auth.php';
