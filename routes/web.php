<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\CvController;

// ==================== FRONTEND ====================
Route::get('/', function () {
    $projects = \App\Models\Project::latest()->take(6)->get();
    $user = \App\Models\User::first();

    return view('welcome', compact('projects', 'user'));
})->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// CV Preview & Download
Route::get('/cv', [CvController::class, 'preview'])->name('cv.preview');
Route::get('/cv/download', [CvController::class, 'download'])->name('cv.download');

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

        // CV Management
        Route::get('/cv', [CvController::class, 'edit'])->name('cv.edit');
        Route::put('/cv', [CvController::class, 'update'])->name('cv.update');

        // Inbox Contact
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    });