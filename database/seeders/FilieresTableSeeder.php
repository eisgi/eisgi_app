<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilieresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filieres')->insert([
            [
                'codeFiliere' => 'DWFS',
                'libelleFiliere' => 'Développement Digital option Web Full Stack',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codeFiliere' => 'GECM',
                'libelleFiliere' => 'Gestion des Entreprises option Commerce et Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
