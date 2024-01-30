<?php

use App\Http\Controllers\Admin\BlogController;
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

            Route::put('/case-studies/{case_study}/publish', [CaseStudyController::class, 'publish'])->name('case-studies.publish');
            Route::put('/case-studies/{case_study}/draft', [CaseStudyController::class, 'draft'])->name('case-studies.draft');
            Route::resource('case-studies', CaseStudyController::class)
                ->except(['show']);

            Route::put('/blogs/{blog}/publish', [BlogController::class, 'publish'])->name('blogs.publish');
            Route::put('/blogs/{blog}/draft', [BlogController::class, 'draft'])->name('blogs.draft');
            Route::resource('blogs', BlogController::class)
                ->except(['show']);
        });
    });
});

require __DIR__.'/auth.php';
