<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [MediaController::class, 'index'])->name('dashboard');
    Route::get('/memories/{date}', [MediaController::class, 'showMemoriesByDate'])->name('memories.show');
    Route::post('memories/{date}/store', [MediaController::class, 'store'])->name('memories.store');
    Route::delete('memories/{id}/delete', [MediaController::class, 'destroy'])->name('memories.destroy');
    Route::get('memories/{id}/expand', [MediaController::class, 'expandGallery'])->name('memories.expand');
    Route::get('memories/{id}/download', [MediaController::class, 'download'])->name('memories.download');
});

require __DIR__.'/auth.php';
