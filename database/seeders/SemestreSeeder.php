<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas=[
            [
                "codeSemestre"=>"S1",
                "dateDebutSemestre"=>'2024-09-05',
                "dateFinSemestre"=>'2025-01-19',
                "anneeFormation"=>'2024-2025'
            ],
            [
                "codeSemestre"=>"S2",
                "dateDebutSemestre"=>'2025-01-29',
                "dateFinSemestre"=>'2025-07-05',
                "anneeFormation"=>'2024-2025'
            ],
            [
                "codeSemestre"=>"S3",
                "dateDebutSemestre"=>'2025-09-05',
                "dateFinSemestre"=>'2026-01-18',
                "anneeFormation"=>'2025-2026'
            ],
        ];
        foreach($datas as $data){
            Semestre::create($data);
        }
    }
}
