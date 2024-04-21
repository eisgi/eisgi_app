<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Filiere\ImportFiliereController;
use App\Http\Controllers\Admin\OptionFiliere\OptionFiliereImportController;
use App\Http\Controllers\Admin\Complexe\ComplexeImportController;
use App\Http\Controllers\Admin\Etablissement\EtablissementImportController;

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
    Route::prefix('optionfiliere')->group(function () {
        Route::get('/formimport', [OptionFiliereImportController::class, 'showForm'])->name('importoptionfiliereform');
        Route::post('/import', [OptionFiliereImportController::class, 'import'])->name('importoptionfiliereaction');
    });
    Route::prefix('complexe')->group(function () {
        Route::get('/formimport', [ComplexeImportController::class, 'showForm'])->name('importcomplexeform');
        Route::post('/import', [ComplexeImportController::class, 'import'])->name('importcomplexeeaction');
    });
    Route::prefix('etablissement')->group(function () {
        Route::get('/formimport', [EtablissementImportController::class, 'showForm'])->name('importetablissementform');
        Route::post('/import', [EtablissementImportController::class, 'import'])->name('importetablissementaction');
    });
});

require __DIR__.'/auth.php';
