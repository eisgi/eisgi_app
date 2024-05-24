<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GestionEmploi\GestionnaireEmploi;
use App\Http\Controllers\AuthController;

Route::prefix('gestionnaire-emploi')->group(function () {
    Route::get('annees', [GestionnaireEmploi::class, 'afficherGestionnaire']);
    Route::get('selection-annee', [GestionnaireEmploi::class, 'selectionAnnee']);
    Route::get('selection-semaine', [GestionnaireEmploi::class, 'selectionSemaine']);
    Route::get('remplir-select', [GestionnaireEmploi::class, 'remplirSelect']);
});

Route::post('loginUser', [AuthController::class, 'login']);
?>
