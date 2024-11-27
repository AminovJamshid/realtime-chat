<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('/', [ChatController::class, 'index'])->name('chat');
   Route::get('/user/{id}', [ChatController::class, 'show'])->name('user');
   Route::post('/user/{id}', [ChatController::class, 'store']);

   Route::get('/api/users', [UserController::class, 'index']);
   Route::get('/api/messages/{id}', [ChatController::class, 'getMessages']);
   Route::post('/api/messages/', [ChatController::class, 'storeMessages']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
