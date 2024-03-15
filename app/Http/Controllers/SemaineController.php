<?php

namespace App\Http\Controllers;

use App\Models\AnneeFormation;
use App\Models\Jour;
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

        // $request->validate([
        //     'anneFormation' => 'required|string',
        //     'dateDebut' => 'required|date',
        //     'dateFin' => 'required|date|after_or_equal:dateDebut',
        //     'du' => 'required|date',
        //     'au' => 'required|date|after_or_equal:du',
        //     'libelle_jour_ferie' => 'required|string',
        // ]);

        $anneeFormationInput = $request->input('anneFormation');
        $dateDebut = $request->input('dateDebut');
        $dateFin = $request->input('dateFin');
        $joursFeriesData = json_decode($request->input('joursFeriesData'), true);
        
        dd([
            // 'anneeFormationInput' => $anneeFormationInput,
            // 'dateDebut' => $dateDebut,
            // 'dateFin' => $dateFin,
            'joursFeriesData' => $joursFeriesData,
        ]);
        




        // // Création de l'année de formation
        $anneeFormation = AnneeFormation::create([
            'anneeFormation' => $anneeFormationInput,
            'dateDebutAnneeFormation' => $dateDebut,
            'dateFinAnneeFormation' => $dateFin
        ]);
        //  // Génération des semaines
        $weeks = $this->semainesCreation($dateDebut, $dateFin);
        // // Sauvegarde des semaines
        foreach ($weeks as $week) {
            $semaine = Semaine::create([
                'codeSemaine' => $week['codeSemaine'],
                'dateDebutSemaine' => $week['dateDebutSemaine'],
                'dateFinSemaine' => $week['dateFinSemaine'],
                'anneeformation' => $anneeFormationInput,
            ]);
            $this->generateAndSaveDays($semaine, $joursFeriesData); // Passer $joursFeriesData à la fonction
        }
        
        if ($anneeFormation && $semaine) {
            return redirect()->back()->with('success', 'AnneFormation,Semaines,jours feries ajoutées avec succès.');
        }
        else{
            return redirect()->back()->with('error', 'probleme d\'insertion.');
        }
    }

    private function generateAndSaveDays($semaine, $joursFeriesData)
{
    $dateDebut = new \DateTime($semaine->dateDebutSemaine);
    $dateFin = new \DateTime($semaine->dateFinSemaine);

    while ($dateDebut <= $dateFin) {
        $jour = new Jour();
    
        $dateJour = $dateDebut->format('Y-m-d');
        $jourFerie = false;
        $libelleJourFerie = 'Ce jour n\'est pas un jour férié';
        foreach ($joursFeriesData as $jourFerieData) {
            if ($dateJour >= $jourFerieData['du'] && $dateJour <= $jourFerieData['au']) {
                $jourFerie = true;
                $libelleJourFerie = $jourFerieData['libelle'];
                break;
            }
        }
        $jour->is_feriee = $jourFerie;
        $jour->libelle=$libelleJourFerie;
    
        $jour->save();
        $semaine->jours()->save($jour);
    
        $dateDebut->modify('+1 day');
    }
    
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
