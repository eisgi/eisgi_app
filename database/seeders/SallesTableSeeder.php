<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salle;

class SallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate dummy data for the salles table
        Salle::create(['Salle' => 'Salle A']);
        Salle::create(['Salle' => 'Salle B']);
        Salle::create(['Salle' => 'Salle C']);
        // Add more dummy data as needed
    }
}
