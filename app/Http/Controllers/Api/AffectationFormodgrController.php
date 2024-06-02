<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\AffectationFormodgr;
use Illuminate\Http\Request;
use App\Models\Semaine;
use App\Models\Formateur;
use App\Models\Module;
use App\Models\GroupePhysique;
use App\Models\GroupeDistanciel;
use App\Models\GroupePresentiel;
use App\Models\Jour;
use App\Models\Seance;
use App\Models\Salle;

class AffectationFormodgrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affectations = AffectationFormodgr::all();
        return response()->json($affectations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'semaineAnneeFormation' => 'required',
            'matricule' => 'required',
            'idModule' => 'required',
            'idGroupePhysique' => 'required',
        ]);

        $affectation = AffectationFormodgr::create($request->all());
        return response()->json($affectation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AffectationFormodgr $affectationFormodgr)
    {
        return response()->json($affectationFormodgr);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AffectationFormodgr $affectationFormodgr)
    {
        $request->validate([
            'semaineAnneeFormation' => 'required',
            'matricule' => 'required',
            'idModule' => 'required',
            'idGroupePhysique' => 'required',
        ]);

        $affectationFormodgr->update($request->all());
        return response()->json($affectationFormodgr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AffectationFormodgr $affectationFormodgr)
    {
        $affectationFormodgr->delete();
        return response()->json(null, 204);
    }

    public function remplirSelect(Request $request){
        $codeGroupeRecherche = $request->input('grouperecherche_selectionne_cle');
        Log::info($codeGroupeRecherche);
        // $idGroupeRecherche = GroupePhysique::where('codeGroupePhysique', $codeGroupeRecherche)->pluck('id')->first();
        // Log::info($idGroupeRecherche);
        // Inclure les formateurs associés à chaque affectation
        $affectationsGroupeRecherche = AffectationFormodgr::with('formateurs', 'modules')->where('idGroupePhysique', $codeGroupeRecherche)->get();



        return response()->json(compact('affectationsGroupeRecherche'));
    }

}
