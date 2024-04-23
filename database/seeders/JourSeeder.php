<?php

namespace Database\Seeders;

use App\Models\Jour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas=[
            [
                "libelle"=>"vacance 1",
                "is_feriee"=>1,
                "id_Semaine"=>1
            ],
            [
                "libelle"=>"Ce jour n'est pas un jour férié",
                "is_feriee"=>0,
                "id_Semaine"=>2
            ],
            [
                "libelle"=>"Ce jour n'est pas un jour férié",
                "is_feriee"=>0,
                "id_Semaine"=>2
            ],
            [
                "libelle"=>"Ce jour n'est pas un jour férié",
                "is_feriee"=>0,
                "id_Semaine"=>2
            ],
            
            [
                "libelle"=>"vacance 2",
                "is_feriee"=>1,
                "id_Semaine"=>3
            ],
            
        ];
        foreach($datas as $data){
            Jour::create($data);
        }
    }
}
