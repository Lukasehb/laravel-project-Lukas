<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController; // Publieke controller
use App\Http\Controllers\Admin\NewsController as AdminNewsController; // Admin controller met alias
use App\Http\Controllers\Admin\AdminUserController; // Admin user controller
use Illuminate\Support\Facades\Route;

Route::controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/{newsItem}', 'show')->name('news.show');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::resource('news', AdminNewsController::class);

        Route::resource('users', AdminUserController::class);
       
        Route::patch('/users/{user}/toggle', [AdminUserController::class, 'toggleAdmin'])->name('users.toggle');
    });
});

require __DIR__.'/auth.php';
