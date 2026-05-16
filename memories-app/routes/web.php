<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\GroupController;
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

    Route::get('groups', [GroupController::class, 'index'])->name('groups.index');
    Route::post('groups/create', [GroupController::class, 'createGroup'])->name('groups.create');
    Route::get('groups/{group}', [GroupController::class, 'showGroup'])->name('groups.show');
    Route::post('groups/{group}/invite', [GroupController::class, 'inviteGroupMember'])->name('groups.invite');
    Route::get('groups/{group}/{date}', [GroupController::class, 'showGroupMemories'])->name('groups.showGroupMemories');
    Route::post('groups/{group}/{date}/store', [GroupController::class, 'storeGroupMemories'])->name('groups.store');


});

require __DIR__.'/auth.php';
