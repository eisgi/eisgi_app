<?php

namespace Database\Seeders;

use App\Models\Semaine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "codeSemaine" => "Sem1",
                "dateDebutSemaine" => "2024-09-05",
                "dateFinSemaine" => "2024-09-07",
                "idSemestre" => 1,
                "anneeFormation" => "2024-2025"
            ],
            [
                "codeSemaine" => "Sem2",
                "dateDebutSemaine" => "2024-09-09",
                "dateFinSemaine" => "2024-09-14",
                "idSemestre" => 1,
                "anneeFormation" => "2024-2025"
            ],
            [
                "codeSemaine" => "Sem34",
                "dateDebutSemaine" => "2025-06-09",
                "dateFinSemaine" => "2025-06-14",
                "idSemestre" => 2,
                "anneeFormation" => "2024-2025"
            ],
            [
                "codeSemaine" => "Sem-S3-1",
                "dateDebutSemaine" => "2025-09-05",
                "dateFinSemaine" => "2025-09-07",
                "idSemestre" => 1,
                "anneeFormation" => "2025-2026"
            ],

        ];
        foreach ($datas as $data) {
            Semaine::create($data);
        }
    }
}
