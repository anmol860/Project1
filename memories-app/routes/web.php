<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [MediaController::class, 'index'])->name('dashboard');
    Route::get('/memories/{date}', [MediaController::class, 'showMemoriesByDate'])->name('memories.show');
    Route::post('memories/{date}/store', [MediaController::class, 'store'])->name('memories.store');
    Route::delete('memories/{id}', [MediaController::class, 'destroy'])->name('memories.destroy');
});

require __DIR__.'/auth.php';
