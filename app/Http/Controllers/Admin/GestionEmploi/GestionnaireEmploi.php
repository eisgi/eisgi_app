<?php


namespace App\Http\Controllers\Admin\GestionEmploi;
use Illuminate\Support\Facades\Log;


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

class GestionnaireEmploi extends Controller
{
    public function afficherGestionnaire(){
        $annees = AnneeFormation::all();
        return view('admin.GestionEmploi.selectAF', compact('annees'));
    }

    public function selectionAnnee(Request $request){
        $anneeId = $request->input('annee_id');
        $annee=AnneeFormation::where('anneeFormation',$anneeId)->first();
        $semaines = Semaine::where('anneeFormation', $anneeId)->get();

        // dd($semaines);
        return view('admin.GestionEmploi.selectSEM', compact('semaines'));
    }

    public function selectionSemaine(Request $request){
        $semaineId = $request->input('semaine_id');
        $semaine = Semaine::findOrFail($semaineId);
        $jours = Jour::where('id_Semaine', $semaineId)->get();
        $salles = Salle::all();
        $seances = Seance::all();
        $groupesPhysiques=GroupePhysique::all();
        $groupesDistanciels = GroupeDistanciel::all();
        $groupesPresentiels = GroupePresentiel::all();

        return view('admin.GestionEmploi.gestionnaireEmploi', compact('semaine', 'jours', 'groupesPhysiques', 'salles', 'seances', 'groupesDistanciels', 'groupesPresentiels'));
    }
    public function remplirSelect(Request $request){
        $codeGroupeRecherche = $request->input('grouperecherche_selectionne_cle');
        $idGroupeRecherche=GroupePhysique::where('codeGroupePhysique',$codeGroupeRecherche)->pluck('id')->first();
        $affectationsGroupeRecherche = AffectationFormodgr::with('formateurs', 'modules')->where('idGroupePhysique', $idGroupeRecherche)->get();
        return response()->json(compact('affectationsGroupeRecherche'));
    }


}
