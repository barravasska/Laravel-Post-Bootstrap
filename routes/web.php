<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Redirect root ke login atau posts
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes yang WAJIB LOGIN
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard redirect ke posts
    Route::get('/dashboard', function () {
        return redirect()->route('posts.index');
    })->name('dashboard');

    // CRUD Posts
    Route::resource('posts', PostController::class);
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';