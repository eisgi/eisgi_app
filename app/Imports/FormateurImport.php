<?php

namespace App\Imports;

use App\Models\Formateur;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FormateurImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
               Formateur::create([
                'codeFiliere' => $row[0],
                'libelleFiliere' => $row[1]
            ]);
        }
    }
}