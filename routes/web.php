<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Filiere\ImportFiliereController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->group(function () {
    Route::prefix('filiere')->group(function () {
        Route::get('/formimport', [ImportFiliereController::class, 'showForm'])->name('importfiliereform');
        Route::post('/import', [ImportFiliereController::class, 'import'])->name('importfiliereaction');
    });
});

require __DIR__.'/auth.php';
