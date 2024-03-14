<?php

namespace App\Imports;

use App\Models\Formateur;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

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
                'dateNaissance' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[2])->toDateString(),
                'dateRejoint' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[3])->toDateString(),
            ]);
        }
    }
}
