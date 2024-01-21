<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function() {
    Route::name('dashboard.')->group(function () {
        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('home');

            Route::get('/profile', [ProfileController::class, 'info'])->name('profile.info');
            Route::get('/profile/security', [ProfileController::class, 'security'])->name('profile.security');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });
});

require __DIR__.'/auth.php';
