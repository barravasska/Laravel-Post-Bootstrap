<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes yang WAJIB LOGIN + VERIFIED
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('posts.index');
    })->name('dashboard');

    // Posts - dengan permission
    Route::get('posts', [PostController::class, 'index'])
        ->middleware('permission:view posts')
        ->name('posts.index');

    Route::get('posts/create', [PostController::class, 'create'])
        ->middleware('permission:create posts')
        ->name('posts.create');

    Route::post('posts', [PostController::class, 'store'])
        ->middleware('permission:create posts')
        ->name('posts.store');

    Route::get('posts/{post}', [PostController::class, 'show'])
        ->middleware('permission:view posts')
        ->name('posts.show');

    Route::get('posts/{post}/edit', [PostController::class, 'edit'])
        ->middleware('permission:edit posts')
        ->name('posts.edit');

    Route::put('posts/{post}', [PostController::class, 'update'])
        ->middleware('permission:edit posts')
        ->name('posts.update');

    Route::delete('posts/{post}', [PostController::class, 'destroy'])
        ->middleware('permission:delete posts')
        ->name('posts.destroy');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';