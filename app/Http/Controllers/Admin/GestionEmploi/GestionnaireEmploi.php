<?php


namespace App\Http\Controllers\Admin\GestionEmploi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnneeFormation;
use App\Models\Semaine;
use App\Models\Formateur;
use App\Models\Module;
use App\Models\GroupePhysique;
use App\Models\GroupeDistanciel;
use App\Models\GroupePresentiel;
use App\Models\Jour;
use App\Models\Seance;
use App\Models\Salle;
use App\Models\AffectationFormodgr;
use Illuminate\Http\JsonResponse;

class GestionnaireEmploi extends Controller
{
    public function afficherGestionnaire(): JsonResponse
{
    $annees = AnneeFormation::all();
    return response()->json($annees);
}


public function selectionAnnee(Request $request): JsonResponse
{
    $anneeId = $request->input('annee_id');
    $semaines = Semaine::where('anneeFormation', $anneeId)->get();

    return response()->json($semaines);
}


public function selectionSemaine(Request $request): JsonResponse
{
    $semaineId = $request->input('semaine_id');
    $semaine = Semaine::findOrFail($semaineId);
    $jours = Jour::where('id_Semaine', $semaineId)->get();
    $salles = Salle::all();
    $seances = Seance::all();
    $groupesPhysiques = GroupePhysique::all();
    $groupesDistanciels = GroupeDistanciel::all();
    $groupesPresentiels = GroupePresentiel::all();

    return response()->json([
        'semaine' => $semaine,
        'jours' => $jours,
        'salles' => $salles,
        'seances' => $seances,
        'groupesPhysiques' => $groupesPhysiques,
        'groupesDistanciels' => $groupesDistanciels,
        'groupesPresentiels' => $groupesPresentiels,
    ]);
}

public function remplirSelect(Request $request): JsonResponse
{
    $codeGroupeRecherche = $request->input('groupereherche');
    $affectationsGroupeRecherche = AffectationFormodgr::with('formateurs')
        ->where('idGroupePhysique', $codeGroupeRecherche)
        ->get();

    return response()->json($affectationsGroupeRecherche);
}


}
