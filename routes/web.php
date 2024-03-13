<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\AnneeFormationController;
use App\Http\Controllers\CsvImportController;



Route::get('/', function () {
    return view('auth.login');
});

////////////////////////////////////////////////////////

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('loginVerify');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

////////////////////////////////////////////////////////

Route::prefix('admin')->group(function () {
    Route::post('/ajoutSemestres', [SemestreController::class, 'AS'])->name('admin.ajoutSemestres');
    Route::post('/ajoutFilieres', [FiliereController::class, 'AF'])->name('admin.ajoutFilieres');
    Route::post('/ajoutFormateurs', [FormateurController::class, 'AFOR'])->name('admin.ajoutFormateurs');
    Route::post('/ajoutModules', [ModuleController::class, 'AM'])->name('admin.ajoutModules');
    Route::post('/ajoutGroupe', [GroupeController::class, 'AG'])->name('admin.ajoutGroupes');
    Route::post('/ajoutGroupes', [AnneeFormationController::class, 'AFOURM'])->name('admin.ajoutFormation');
    Route::get('/afficherFilieres', [FiliereController::class, 'index'])->name('importFiliere.form');
    Route::get('/ajoutCSVFilieres', [FiliereController::class, 'returnForm']);
    Route::post('/ajoutCSVFilieres',[FiliereController::class, 'AF'])->name('import.filieres');
    Route::get('/generationSemaines',[AnneeFormationController::class,'GenererSemaines']);
});