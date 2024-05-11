<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnneeFormationController;
use App\Http\Controllers\Api\SemaineController;
use App\Http\Controllers\Api\FormateurController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\GroupePhysiqueController;
use App\Http\Controllers\Api\GroupeDistancielController;
use App\Http\Controllers\Api\GroupePresentielController;
use App\Http\Controllers\Api\JourController;
use App\Http\Controllers\Api\SeanceController;
use App\Http\Controllers\Api\SalleController;
use App\Http\Controllers\Api\AffectationFormodgrController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('annee-formations', AnneeFormationController::class);
Route::apiResource('semaines', SemaineController::class);
Route::apiResource('formateurs', FormateurController::class);
Route::apiResource('modules', ModuleController::class);
Route::apiResource('groupe-physiques', GroupePhysiqueController::class);
Route::apiResource('groupe-distanciels', GroupeDistancielController::class);
Route::apiResource('groupe-presentiels', GroupePresentielController::class);
Route::apiResource('jours', JourController::class);
Route::apiResource('seances', SeanceController::class);
Route::apiResource('salles', SalleController::class);
Route::apiResource('affectation-formodgrs', AffectationFormodgrController::class);
Route::post('affectation-formodgrs/remplirselect', [AffectationFormodgrController::class,'remplirselect']);
Route::get('getJoursByIdSemaines/{id}',[JourController::class, 'getJourByIdSemaine']);
