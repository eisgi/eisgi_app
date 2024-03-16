<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupes')->insert([
            [
                'libelleGroupe' => '2DEVWFS 203',
                'filiereGroupe' => 'DWFS',
            ],
            [
                'libelleGroupe' => '2DEVWFS 204',
                'filiereGroupe' => 'DWFS',
            ],
            [
                'libelleGroupe' => '2GEOCM 201',
                'filiereGroupe' => 'GECM',
            ],
            [
                'libelleGroupe' => '2GEOCM 202',
                'filiereGroupe' => 'GECM',
            ],
            // Ajoutez d'autres données selon vos besoins
        ]);
    }
}
