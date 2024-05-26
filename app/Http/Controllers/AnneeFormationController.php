<?php

namespace App\Http\Controllers;

use App\Models\AnneeFormation;
use App\Models\Jour;
use App\Models\Semaine;
use App\Models\Semestre;
use Illuminate\Http\Request;

class AnneeFormationController extends Controller
{
    

    public function genererSemaines(Request $request)
    {
        $data = $request->all();

        $anneeFormationInput = $data['anneFormation'];
        $anneeFormationInputS3 = $data['anneFormationS3'];
        $dateDebut = $data['dateDebut'];
        $dateFin = $data['dateFin'];
        $dateDebutS3 = $data['dateDebutS3'];
        $dateFinS3 = $data['dateFinS3'];
        $joursFeriesData = $data['joursFeries'];
        $dateDebutSemestre1 = $data['dateDebutSemestre1'];
        $dateFinSemestre1 = $data['dateFinSemestre1'];
        $dateDebutSemestre2 = $data['dateDebutSemestre2'];
        $dateFinSemestre2 = $data['dateFinSemestre2'];


        // // // // Création de l'année de formation
        $anneeFormation = AnneeFormation::create([
            'anneeFormation' => $anneeFormationInput,
            'dateDebutAnneeFormation' => $dateDebut,
            'dateFinAnneeFormation' => $dateFin
        ]);
        $anneeFormationS3 = AnneeFormation::create([
            'anneeFormation' => $anneeFormationInputS3,
            'dateDebutAnneeFormation' => $dateDebutS3,
            'dateFinAnneeFormation' => $dateFinS3
        ]);


        $semestre1 = Semestre::create([
            'codeSemestre' => "S1",
            'dateDebutSemestre' => $dateDebutSemestre1,
            'dateFinSemestre' => $dateFinSemestre1,
            'anneeFormation' => $anneeFormationInput
        ]);
        $semestre2 = Semestre::create([
            'codeSemestre' => "S2",
            'dateDebutSemestre' => $dateDebutSemestre2,
            'dateFinSemestre' => $dateFinSemestre2,
            'anneeFormation' => $anneeFormationInput
        ]);
        $semestre3 = Semestre::create([
            'codeSemestre' => "S3",
            'dateDebutSemestre' => $dateDebutS3,
            'dateFinSemestre' => $dateFinS3,
            'anneeFormation' => $anneeFormationInputS3
        ]);


        //  // Génération des semaines
        $weeks = $this->semainesCreation($dateDebut, $dateFin);
        $weeksS3 = $this->semainesCreationS3($dateDebutS3, $dateFinS3);
        // // Sauvegarde des semaines
        $sr1 = Semestre::where('codeSemestre', 'S1')->first();
        $sr2 = Semestre::where('codeSemestre', 'S2')->first();
        $sr3 = Semestre::where('codeSemestre', 'S3')->first();
        foreach ($weeks  as $index => $week) {
            $totalSemaines = count($weeks);
            $milieu = ceil($totalSemaines / 2);
            if ($index < $milieu) {
                $idSemestre = $sr1->id; // Assigne au premier semestre
            } else {
                $idSemestre = $sr2->id; // Assigne au deuxième semestre
            }
            $semaine = Semaine::create([
                'codeSemaine' => $week['codeSemaine'],
                'dateDebutSemaine' => $week['dateDebutSemaine'],
                'dateFinSemaine' => $week['dateFinSemaine'],
                'anneeFormation' => $anneeFormationInput,
                'idSemestre' => $idSemestre,
            ]);
            $this->generateAndSaveDays($semaine, $joursFeriesData); // Passer $joursFeriesData à la fonction
        }
        foreach ($weeksS3 as  $weekS3) {
           
            $semaineS3 = Semaine::create([
                'codeSemaine' => $weekS3['codeSemaine'],
                'dateDebutSemaine' => $weekS3['dateDebutSemaine'],
                'dateFinSemaine' => $weekS3['dateFinSemaine'],
                'anneeFormation' => $anneeFormationInputS3,
                'idSemestre' => $sr3->id,
            ]);
            $this->generateAndSaveDaysS3($semaineS3, $joursFeriesData); // Passer $joursFeriesData à la fonction
        }

        if ($anneeFormation && $semaine) {
            return response()->json(['message' => 'Data inserted successfully'], 200);

        } else {
            return response()->json(['message' => 'Failed to insert data'], 500);
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
            $jour->libelle = $libelleJourFerie;
            $jour->id_Semaine = $semaine->id;
            $jour->save();
            // $semaine->jours()->save($jour);

            $dateDebut->modify('+1 day');
        }
    }
    private function generateAndSaveDaysS3($semaine, $joursFeriesData)
    {
        $dateDebutS3 = new \DateTime($semaine->dateDebutSemaine);
        $dateFinS3 = new \DateTime($semaine->dateFinSemaine);

        while ($dateDebutS3 <= $dateFinS3) {
            $jour = new Jour();

            $dateJour = $dateDebutS3->format('Y-m-d');
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
            $jour->libelle = $libelleJourFerie;
            $jour->id_Semaine = $semaine->id;
            $jour->save();
            // $semaine->jours()->save($jour);

            $dateDebutS3->modify('+1 day');
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
                'codeSemaine' => 'Sem' . ($incr + 1),
                'dateDebutSemaine' => $dateDebut->format('Y-m-d'),
                'dateFinSemaine' => $dateFinOfWeek->format('Y-m-d'),
            ];

            $dateDebut = clone $dateFinOfWeek;
            $dateDebut->modify('+2 days');
            $incr++;
        }

        return $weeks;
    }
    public function semainesCreationS3($dateDebutS3, $dateFinS3)
    {
        $dateDebutS3 = new \DateTime($dateDebutS3);
        $dateFinS3 = new \DateTime($dateFinS3);
        // $dateDebut->modify('+1 day');

        $weeksS3 = [];
        $incr = 0;

        while ($dateDebutS3 <= $dateFinS3) {
            $jourDD = $dateDebutS3->format('N');
            $dateFinOfWeekS3 = clone $dateDebutS3;

            switch ($jourDD) {
                case 1:
                    $dateFinOfWeekS3->modify('+5 days');
                    break;
                case 2:
                    $dateFinOfWeekS3->modify('+4 days');
                    break;
                case 3:
                    $dateFinOfWeekS3->modify('+3 days');
                    break;
                case 4:
                    $dateFinOfWeekS3->modify('+2 days');
                    break;
                case 5:
                    $dateFinOfWeekS3->modify('+1 days');
                    break;
                case 6:
                    // Saturday
                    break;
                default:
                    $dateFinOfWeekS3->modify('+1 days');
                    break;
            }

            $weeksS3[] = [
                'codeSemaine' => 'Sem-S3-' . ($incr + 1),
                'dateDebutSemaine' => $dateDebutS3->format('Y-m-d'),
                'dateFinSemaine' => $dateFinOfWeekS3->format('Y-m-d'),
            ];

            $dateDebutS3 = clone $dateFinOfWeekS3;
            $dateDebutS3->modify('+2 days');
            $incr++;
        }

        return $weeksS3;
    }
}
