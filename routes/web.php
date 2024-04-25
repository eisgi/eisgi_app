<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Filiere\ImportFiliereController;
use App\Http\Controllers\Admin\OptionFiliere\OptionFiliereImportController;
use App\Http\Controllers\Admin\Complexe\ComplexeImportController;
use App\Http\Controllers\Admin\Etablissement\EtablissementImportController;
use App\Http\Controllers\Admin\Formateur\FormateurImportController;
use App\Http\Controllers\Admin\Module\ModuleImportController;
use App\Http\Controllers\Admin\Salle\SalleImportController;
use App\Http\Controllers\AnneeFormationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Timetable;

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
    Route::prefix('formateur')->group(function () {
        Route::get('/formimport', [FormateurImportController::class, 'showForm'])->name('importformateurform');
        Route::post('/import', [FormateurImportController::class, 'import'])->name('importformateuraction');
    });
    Route::prefix('module')->group(function () {
        Route::get('/formimport', [ModuleImportController::class, 'showForm'])->name('importmoduleform');
        Route::post('/import', [ModuleImportController::class, 'import'])->name('importmoduleaction');
    });
    Route::prefix('salle')->group(function () {
        Route::get('/formimport', [SalleImportController::class, 'showForm'])->name('importsalleform');
        Route::post('/import', [SalleImportController::class, 'import'])->name('importsalleaction');
    });
    
    // l'emploi du temps
    Route::get('/timetable/group/{Id}', [Timetable::class,'group'])->name('emploi.group');
    Route::get('/timetable/teacher/{Id}', [Timetable::class,'teacher'])->name('emploi.teacher');
    Route::get('/timetable/global', [Timetable::class,'global'])->name('emploi.global');
    Route::get('/export-pdf', [Timetable::class, 'exportToPdf'])->name('export.pdf');

});

require __DIR__.'/auth.php';