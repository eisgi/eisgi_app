<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Complexe\ComplexeImportController;
use App\Http\Controllers\Admin\Etablissement\EtablissementImportController;
use App\Http\Controllers\Admin\Filiere\ImportFiliereController;
use App\Http\Controllers\Admin\Formateur\FormateurImportController;
use App\Http\Controllers\Admin\GestionAffectation\AffectationFormodgrImportController;
use App\Http\Controllers\Admin\GestionEmploi\GestionnaireEmploi;
use App\Http\Controllers\Admin\Groupe\GroupeDistancielImportController;
use App\Http\Controllers\Admin\Groupe\GroupePhysiqueImportController;
use App\Http\Controllers\Admin\Groupe\GroupePresentielImportController;
use App\Http\Controllers\Admin\Module\ModuleImportController;
use App\Http\Controllers\Admin\OptionFiliere\OptionFiliereImportController;
use App\Http\Controllers\Admin\Salle\SalleImportController;
use App\Http\Controllers\AnneeFormationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportFiles;

Route::prefix('gestionnaire-emploi')->group(function () {
    Route::get('annees', [GestionnaireEmploi::class, 'afficherGestionnaire']);
    Route::get('selection-annee', [GestionnaireEmploi::class, 'selectionAnnee']);
    Route::get('selection-semaine', [GestionnaireEmploi::class, 'selectionSemaine']);
    Route::get('remplir-select', [GestionnaireEmploi::class, 'remplirSelect']);
});

Route::post('loginUser', [AuthController::class, 'login']);
Route::post('/genererSemaines', [AnneeFormationController::class, 'genererSemaines']);
Route::post('/importFiliere', [ImportFiliereController::class, 'import']);
Route::post('/importoptionFiliere', [OptionFiliereImportController::class, 'import']);
Route::post('/importComplexe', [ComplexeImportController::class, 'import']);
Route::post('/importEtablissement', [EtablissementImportController::class, 'import']);
Route::post('/importFormateur', [FormateurImportController::class, 'import']);
Route::post('/importModule', [ModuleImportController::class, 'import']);
Route::post('/importSalle', [SalleImportController::class, 'import']);
Route::post('/importGroupedistanciel', [GroupeDistancielImportController::class, 'import']);
Route::post('/importGroupephysique', [GroupePhysiqueImportController::class, 'import']);
Route::post('/importGroupepresentiel', [GroupePresentielImportController::class, 'import']);
Route::post('/importAffectation ', [AffectationFormodgrImportController::class, 'import']);

?>
