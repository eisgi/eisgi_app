<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//importation
use App\Http\Controllers\Admin\Filiere\ImportFiliereController;
use App\Http\Controllers\Admin\OptionFiliere\OptionFiliereImportController;
use App\Http\Controllers\Admin\Complexe\ComplexeImportController;
use App\Http\Controllers\Admin\Etablissement\EtablissementImportController;
use App\Http\Controllers\Admin\Formateur\FormateurImportController;
use App\Http\Controllers\Admin\Module\ModuleImportController;
use App\Http\Controllers\Admin\Salle\SalleImportController;
use App\Http\Controllers\Admin\Groupe\GroupeDistancielImportController;
use App\Http\Controllers\Admin\Groupe\GroupePresentielImportController;
use App\Http\Controllers\Admin\GestionEmploi\GestionnaireEmploi;
use App\Http\Controllers\Admin\Groupe\GroupePhysiqueImportController;
use App\Http\Controllers\Admin\GestionAffectation\AffectationFormodgrImportController;
use App\Http\Controllers\AnneeFormationController;
use App\Http\Controllers\AuthController;

//gestionemploi




Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/authlogin',[AuthController::class,'login'])->name('auth.login');

Route::view('/admin','admin.home')->name('homeAdmin');
Route::view('/formateur','formateur.home')->name('homeFormateur');
Route::view('/stagaire','stagaire.home')->name('homeStagaire');

Route::delete('authlogout',[AuthController::class,'logout'])->name('auth.logout');

Route::get('/semaines', [AnneeFormationController::class, 'index']);
Route::post('/semaines', [AnneeFormationController::class, 'generer'])->name('genererSemaines');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('admin')->group(function () {
    Route::prefix('filiere')->group(function () {
        Route::get('/formimport', [ImportFiliereController::class, 'showForm'])->name('import.filiere.form');
        Route::post('/import', [ImportFiliereController::class, 'import'])->name('import.filiere.action');
    });
    Route::prefix('optionfiliere')->group(function () {
        Route::get('/formimport', [OptionFiliereImportController::class, 'showForm'])->name('import.optionfiliere.form');
        Route::post('/import', [OptionFiliereImportController::class, 'import'])->name('import.optionfiliere.action');
    });
    Route::prefix('complexe')->group(function () {
        Route::get('/formimport', [ComplexeImportController::class, 'showForm'])->name('import.complexe.form');
        Route::post('/import', [ComplexeImportController::class, 'import'])->name('import.complexe.action');
    });
    Route::prefix('etablissement')->group(function () {
        Route::get('/formimport', [EtablissementImportController::class, 'showForm'])->name('import.etablissement.form');
        Route::post('/import', [EtablissementImportController::class, 'import'])->name('import.etablissement.action');
    });
    Route::prefix('formateur')->group(function () {
        Route::get('/formimport', [FormateurImportController::class, 'showForm'])->name('import.formateur.form');
        Route::post('/import', [FormateurImportController::class, 'import'])->name('import.formateur.action');
    });
    Route::prefix('module')->group(function () {
        Route::get('/formimport', [ModuleImportController::class, 'showForm'])->name('import.module.form');
        Route::post('/import', [ModuleImportController::class, 'import'])->name('import.module.action');
    });
    Route::prefix('salle')->group(function () {
        Route::get('/formimport', [SalleImportController::class, 'showForm'])->name('import.salle.form');
        Route::post('/import', [SalleImportController::class, 'import'])->name('import.salle.action');
    });
    Route::prefix('groupe')->group(function () {
        Route::prefix('distanciel')->group(function () {
            Route::get('/formimport', [GroupeDistancielImportController::class, 'showForm'])->name('import.groupedistanciel.form');
            Route::post('/import', [GroupeDistancielImportController::class, 'import'])->name('import.groupedistanciel.action');
        });

        Route::prefix('presentiel')->group(function () {
            Route::get('/formimport', [GroupePresentielImportController::class, 'showForm'])->name('import.groupepresentiel.form');
            Route::post('/import', [GroupePresentielImportController::class, 'import'])->name('import.groupepresentiel.action');
        });
        Route::prefix('physique')->group(function () {
            Route::get('/formimport', [GroupePhysiqueImportController::class, 'showForm'])->name('import.groupephysique.form');
            Route::post('/import', [GroupePhysiqueImportController::class, 'import'])->name('import.groupephysique.action');
        });

    });
    Route::prefix('affectation')->group(function () {
        Route::get('/formimport', [AffectationFormodgrImportController::class, 'showForm'])->name('import.affectation.form');
        Route::post('/import', [AffectationFormodgrImportController::class, 'import'])->name('import.affectation.action');
    });
    Route::prefix('gestionemploi')->group(function () {
        Route::get('/', [GestionnaireEmploi::class, 'afficherGestionnaire'])->name('gestionemploi.index');
        Route::post('/selection-annee', [GestionnaireEmploi::class, 'selectionAnnee'])->name('gestionemploi.selection_annee');

        Route::post('/selection-semaine', [GestionnaireEmploi::class, 'selectionSemaine'])->name('gestionemploi.selection_semaine');

        Route::post('/afficher_form_mod', [GestionnaireEmploi::class, 'remplirSelect'])->name('gestionemploi.remplir_select');
    });
    });


require __DIR__.'/auth.php';
