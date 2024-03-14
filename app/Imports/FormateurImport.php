<?php

namespace App\Imports;

use App\Models\Formateur;
use Illuminate\Support\Str;
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
            $matricule = $this->generateUniqueMatricule();
            
            Formateur::create([
                'nom' => $row[0],
                'prenom' => $row[1],
                'dateNaissance' => $row[2],
                'dateRejoint' => $row[3], 
                'matricule' => $matricule,
                'password' => bcrypt(Str::random(12)), // Generate a random password
            ]);
        }
    }

    // Method to generate unique matricule
    private function generateUniqueMatricule()
    {
        $matricule = Str::random(8); // Generate a random string for matricule

        // Check if the generated matricule already exists
        while (Formateur::where('matricule', $matricule)->exists()) {
            $matricule = Str::random(8); // Regenerate a new matricule
        }

        return $matricule;
    }
}