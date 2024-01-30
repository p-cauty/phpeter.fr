<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('etudes-de-cas', [CaseStudyController::class, 'index'])
    ->name('case-studies.index');
Route::get('etudes-de-cas/{case_study}/{slug}', [CaseStudyController::class, 'show'])
    ->name('case-studies.show');

Route::get('blog', [BlogController::class, 'index'])
    ->name('blog.index');
Route::get('blog/{blog}/{slug}', [BlogController::class, 'show'])
    ->name('blog.show');

require __DIR__ . '/admin.php';
