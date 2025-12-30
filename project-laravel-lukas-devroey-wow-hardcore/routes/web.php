<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController; // <--- Toevoegen
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/{newsItem}', 'show')->name('news.show');
});

// Voeg deze regel toe:
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/user/{user}', [ProfileController::class, 'show'])->name('profile.public');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserController::class);
        Route::patch('/users/{user}/toggle', [AdminUserController::class, 'toggleAdmin'])->name('users.toggle');
    });
});

require __DIR__.'/auth.php';
