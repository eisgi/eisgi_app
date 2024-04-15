<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\AnneeFormationController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\CsvImportFourmateur;
use App\Http\Controllers\SemaineController;
use App\Http\Controllers\EmploiController;
=======
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
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
    Route::post('/ajoutCSVFilieres',[CsvImportController::class, 'import'])->name('import.filieres');
    // Route::get('/generationSemaines',[AnneeFormationController::class,'GenererSemaines']);
    Route::get('/semaines', [SemaineController::class, 'index']);
    Route::post('/semaines', [SemaineController::class, 'generer'])->name('genererSemaines');
    Route::get('/ajoutCSVFourmateurs', [FormateurController::class, 'returnForm']);
    Route::post('/ajoutCSVFourmateurs',[CsvImportFourmateur::class, 'import'])->name('import.Fourmateurs');
    Route::get('/GererEmploi',[EmploiController::class,'index']);

});
Route::prefix('fourmateur')->group(function () {

    Route::get('/emploi',[EmploiController::class,'fourmateur'])->name('emploi.fourmateur');
    Route::get('/updatePSW/{id}', [FormateurController::class, 'updatePSW'])->name('updatePSW.fourmateur');
    

});
=======
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
