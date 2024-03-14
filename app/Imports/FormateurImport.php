<?php

namespace App\Imports;

use App\Models\Formateur;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class FormateurImport implements ToCollection
{
    /**
     * @param Collection $collection
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Assurez-vous que la ligne contient suffisamment de colonnes
            if (count($row) < 6) {
                continue; // Passez à la ligne suivante si une colonne "password" n'est pas présente
            }

            // Récupérez la valeur de la colonne "matricule" du fichier CSV
            $matricule = $row[4];

            // Formatez la date de naissance au format aaaa-mm-jj
            $dateNaissance = \Carbon\Carbon::createFromFormat('d-m-Y', $row[2])->format('Y-m-d');

            // Formatez la date de rejoindre au format aaaa-mm-jj
            $dateRejoint = \Carbon\Carbon::createFromFormat('d-m-Y', $row[3])->format('Y-m-d');

            // Cryptez le mot de passe
            $password = Hash::make($row[5]);

            // Créez l'enregistrement Formateur
            Formateur::create([
                'nom' => $row[0],
                'prenom' => $row[1],
                'dateNaissance' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[2])->toDateString(),
                'dateRejoint' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[3])->toDateString(),
]);
        }
    }
}
