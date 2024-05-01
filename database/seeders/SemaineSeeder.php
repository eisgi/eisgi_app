<?php

namespace Database\Seeders;

use App\Models\Semaine;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SemaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Définissez la date de début pour la première semaine
        $dateDebut = Carbon::parse('2024-09-05');
        
        // Définir l'identifiant du semestre et l'année de formation
        $idSemestre = 1;
        $anneeFormation = '2024/2025';
        
        // Générer 7 semaines
        for ($i = 1; $i <= 7; $i++) {
            // Calculer la date de fin de la semaine en ajoutant 6 jours à la date de début
            $dateFin = $dateDebut->copy()->addDays(6);
            
            // Créer un code de semaine basé sur l'itération actuelle
            $codeSemaine = "Sem" . $i;
            
            // Créer les données de la semaine
            $data = [
                "codeSemaine" => $codeSemaine,
                "dateDebutSemaine" => $dateDebut->toDateString(),
                "dateFinSemaine" => $dateFin->toDateString(),
                "idSemestre" => $idSemestre,
                "anneeFormation" => $anneeFormation,
            ];
            
            // Créer la semaine dans la base de données
            Semaine::create($data);
            
            // Passer à la semaine suivante en ajoutant 7 jours à la date de début
            $dateDebut->addDays(7);
        }
    }
}
