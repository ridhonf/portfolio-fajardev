<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CvController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

// ==================== FRONTEND ====================
Route::get('/', function () {
    $projects = \App\Models\Project::latest()->take(6)->get();
    $cv = \App\Models\Cv::first();

    return view('welcome', compact('projects', 'cv'));
})->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Download CV (publik)
Route::get('/cv/download', function () {
    $cv = \App\Models\Cv::first();
    abort_if(! $cv, 404);

    $path = public_path('cv/' . $cv->filename);
    abort_if(! file_exists($path), 404);

    return response()->download($path, $cv->original_name);
})->name('cv.download');

// Breeze Auth
require __DIR__.'/auth.php';

// ==================== ADMIN ====================
Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {

        // Dashboard (Halaman utama setelah login)
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Projects
        Route::resource('projects', ProjectController::class);

        // Download CV (CRUD)
        Route::get('/cv', [CvController::class, 'index'])->name('cv.index');
        Route::post('/cv', [CvController::class, 'store'])->name('cv.store');
        Route::put('/cv', [CvController::class, 'update'])->name('cv.update');
        Route::delete('/cv', [CvController::class, 'destroy'])->name('cv.destroy');

        // Inbox Contact
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    });