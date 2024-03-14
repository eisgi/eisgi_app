<?php

namespace App\Http\Controllers;

use App\Models\AnneeFormation;
use App\Models\Semaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.AnneFormation.anneFormationGenerationSemaines');
    }
    public function generer(Request $request)
    {
       
        $request->validate([
            'anneFormation' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
        ]);
    
        // Récupération des données du formulaire
        $anneeFormationInput = $request->input('anneFormation');
        $dateDebut = $request->input('dateDebut');
        $dateFin = $request->input('dateFin');
        
    
        // Création de l'année de formation
        $anneeFormation = DB::table('annee_formations')->insertGetId([
            'anneeFormation' => $anneeFormationInput,
            'dateDebutAnneeFormation' => $dateDebut,
            'dateFinAnneeFormation' => $dateFin
        ]);
        
    
        // // Génération des semaines
        $weeks = $this->semainesCreation($dateDebut, $dateFin);
    
        // Sauvegarde des semaines
        foreach ($weeks as $week) {
            DB::table('semaines')->insert([
                'codeSemaine' => $week['codeSemaine'],
                'dateDebutSemaine' => $week['dateDebutSemaine'],
                'dateFinSemaine' => $week['dateFinSemaine'],
                'anneeformation' => $anneeFormationInput,
            ]);
        }
        
    
        // Redirection avec message de succès ou d'erreur
        return redirect()->route('admin.AnneFormation.anneFormationGenerationSemaines')->with('success', 'Semaines ajoutées avec succès.');
    }
    


    public function semainesCreation($dateDebut, $dateFin)
{
    $dateDebut = new \DateTime($dateDebut);
    $dateFin = new \DateTime($dateFin);
    // $dateDebut->modify('+1 day');

    $weeks = [];
    $incr = 0;

    while ($dateDebut <= $dateFin) {
        $jourDD = $dateDebut->format('N');
        $dateFinOfWeek = clone $dateDebut;

        switch ($jourDD) {
            case 1:
                $dateFinOfWeek->modify('+5 days');
                break;
            case 2:
                $dateFinOfWeek->modify('+4 days');
                break;
            case 3:
                $dateFinOfWeek->modify('+3 days');
                break;
            case 4:
                $dateFinOfWeek->modify('+2 days');
                break;
            case 5:
                $dateFinOfWeek->modify('+1 days');
                break;
            case 6:
                // Saturday
                break;
            default:
                $dateFinOfWeek->modify('+1 days');
                break;
        }

        $weeks[] = [
            'codeSemaine' => 'S' . ($incr + 1),
            'dateDebutSemaine' => $dateDebut->format('Y-m-d'),
            'dateFinSemaine' => $dateFinOfWeek->format('Y-m-d'),
        ];

        $dateDebut = clone $dateFinOfWeek;
        $dateDebut->modify('+2 days');
        $incr++;
    }

    return $weeks;
}


    public function create(Request $request)
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function show(Semaine $semaine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function edit(Semaine $semaine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semaine $semaine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semaine $semaine)
    {
        //
    }
}
