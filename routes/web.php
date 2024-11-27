<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $users = \App\Models\User::all()->toArray();
    return view('welcome', compact('users'));
});

Route::post('/message', function (Request $request) {
    $message = \App\Models\Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->input('receiver_id'),
        'text' => $request->input('message'),
    ]);

    return response()->json($message);
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
