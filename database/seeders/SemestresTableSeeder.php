<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate some dummy data
        $semestres = [
            ['idSemestre' => 'S1', 'dateDebutSemestre' => '2024-09-01', 'dateFinSemestre' => '2024-12-31'],
            ['idSemestre' => 'S2', 'dateDebutSemestre' => '2025-01-01', 'dateFinSemestre' => '2025-05-31'],
            // Add more semesters as needed
        ];

        // Insert data into the semestres table
        DB::table('semestres')->insert($semestres);
    }
}
