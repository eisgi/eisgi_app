<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate some dummy data
        $modules = [
            [
                'codeModule' => 'EGTS202',
                'libelleModule' => 'Français',
                'ordreModule' => 1,
                'MHT' => 115.00,
                'Coef' => 2,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'EGTS203',
                'libelleModule' => 'Anglais technique',
                'ordreModule' => 2,
                'MHT' => 50.00,
                'Coef' => 2,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'EGTS204',
                'libelleModule' => 'Culture entrepreneuriale',
                'ordreModule' => 3,
                'MHT' => 45.00,
                'Coef' => 2,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'EGTS205',
                'libelleModule' => 'Compétences comportementales',
                'ordreModule' => 4,
                'MHT' => 30.00,
                'Coef' => 2,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'EGTS208',
                'libelleModule' => 'Entrepreneuriat-PIE 2',
                'ordreModule' => 5,
                'MHT' => 80.00,
                'Coef' => 2,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'EGTSA206',
                'libelleModule' => 'Culture et techniques avancées du numérique',
                'ordreModule' => 6,
                'MHT' => 30.00,
                'Coef' => 1,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'M201',
                'libelleModule' => 'Préparation d’un projet web',
                'ordreModule' => 7,
                'MHT' => 60.00,
                'Coef' => 1,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'M202',
                'libelleModule' => 'Approche agile',
                'ordreModule' => 8,
                'MHT' => 120.00,
                'Coef' => 2,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            [
                'codeModule' => 'M203',
                'libelleModule' => 'Gestion des données',
                'ordreModule' => 9,
                'MHT' => 90.00,
                'Coef' => 2,
                'EFM_Regional' => false,
                'filiereModule' => 'DWFS',
                'semestreModule' => 'S1',
            ],
            // Add more modules here as needed
        ];

        // Insert data into the modules table
        DB::table('modules')->insert($modules);
    }
}
