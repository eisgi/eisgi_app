<?php


namespace App\Http\Controllers\Admin\GestionEmploi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnneeFormation;
use App\Models\Semaine;
use App\Models\Formateur;
use App\Models\Module;
use App\Models\GroupeDistanciel;
use App\Models\GroupePresentiel;
use App\Models\Jour;
use App\Models\Seance;
use App\Models\Salle;

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
        // dd($jours);
        $formateurs = Formateur::all();
        $modules = Module::all();
        $salles = Salle::all();
        $seances = Seance::all();
        $groupesDistanciels = GroupeDistanciel::all();
        $groupesPresentiels = GroupePresentiel::all();

        return view('admin.GestionEmploi.gestionnaireEmploi', compact('semaine', 'jours', 'formateurs', 'modules', 'salles', 'seances', 'groupesDistanciels', 'groupesPresentiels'));
    }

}
