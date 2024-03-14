<?php

namespace App\Imports;

use App\Models\Formateur;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class FormateurImport implements ToCollection
{
    /**
     * @param Collection $collection
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Formateur::create([
                'nom' => $row[0],
                'prenom' => $row[1],
                'dateNaissance' => $row[2],
                'dateRejoint' => $row[3], 
                'matricule' => $row[4], 
                'password' => bcrypt($row[5]), // Hash the password
            ]);
        }
    }
}