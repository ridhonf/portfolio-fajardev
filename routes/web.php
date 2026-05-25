<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

// ==================== FRONTEND ====================
Route::get('/', function () {
    $projects = \App\Models\Project::latest()->take(6)->get();
    return view('welcome', compact('projects'));
})->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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

        // Inbox Contact
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    });
