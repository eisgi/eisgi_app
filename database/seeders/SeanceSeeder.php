<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seance;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Seance::create([
            'ordreSeance' => 1,
        ]);

        Seance::create([
            'ordreSeance' => 2,
        ]);

        Seance::create([
            'ordreSeance' => 3,
        ]);

        Seance::create([
            'ordreSeance' => 4,
        ]);
    }
}
