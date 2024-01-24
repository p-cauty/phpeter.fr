<?php

use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::name('admin.')->group(function () {
        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('home');

            Route::get('/profile', [ProfileController::class, 'info'])->name('profile.info');
            Route::get('/profile/security', [ProfileController::class, 'security'])->name('profile.security');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::resource('case-studies', CaseStudyController::class);
        });
    });
});

require __DIR__.'/auth.php';
