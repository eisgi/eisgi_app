<?php

namespace App\Imports;

use App\Models\Filiere;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FiliereImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Assuming the first column contains the codeFiliere and the second column contains the libelleFiliere
            Filiere::create([
                'codeFiliere' => $row[0],
                'libelleFiliere' => $row[1],
            ]);
        }
    }
}
