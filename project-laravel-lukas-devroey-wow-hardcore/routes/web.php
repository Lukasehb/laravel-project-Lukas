<?php

use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profiel routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Admin Routes (Gegroepeerd + Middleware)
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Resource Controller voor volledige CRUD
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserController::class);
    });
});

Route::controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/{newsItem}', 'show')->name('news.show');
});

Route::middleware(['auth', 'admin'])->resource('admin/news', AdminNewsController::class);

require __DIR__.'/auth.php';
