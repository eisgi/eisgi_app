<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnneeFormation;

class AnneeFormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "anneeFormation" => '2024/2025',
                "dateDebutAnneeFormation" => '2024-09-05',
                "dateFinAnneeFormation" => '2025-07-05'
            ],
            [
                "anneeFormation" => '2025/2026',
                "dateDebutAnneeFormation" => '2025-09-05',
                "dateFinAnneeFormation" => '2026-01-23'
            ]

        ];
        foreach($datas as $data){
            AnneeFormation::create($data);
        }
    }
}
