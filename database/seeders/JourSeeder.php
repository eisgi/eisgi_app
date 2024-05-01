<?php

namespace Database\Seeders;

use App\Models\Jour;
use App\Models\Semaine;
use Illuminate\Database\Seeder;

class JourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Définir les noms des jours de la semaine
        $nomsJours = [
            "Lundi",
            "Mardi",
            "Mercredi",
            "Jeudi",
            "Vendredi",
            "Samedi",
            "Dimanche"
        ];
        
        // Récupérer toutes les semaines existantes
        $semaines = Semaine::all();

        // Parcourir chaque semaine
        foreach ($semaines as $semaine) {
            // Générer 7 jours pour chaque semaine en utilisant les noms des jours
            foreach ($nomsJours as $index => $nomJour) {
                $jour = new Jour();
                $jour->libelle = $nomJour;
                $jour->is_feriee = 0; // Vous pouvez définir les jours fériés si nécessaire
                $jour->id_Semaine = $semaine->id; // Associer chaque jour à la semaine

                // Enregistrer le jour dans la base de données
                $jour->save();
            }
        }
    }
}
