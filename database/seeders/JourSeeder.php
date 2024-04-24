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
                "libelle"=>"Jour 1",
                "is_feriee"=>0,
                "id_Semaine"=>1
            ],
            [
                "libelle"=>"Jour 2",
                "is_feriee"=>0,
                "id_Semaine"=>1
            ],
            [
                "libelle"=>"Jour 3",
                "is_feriee"=>0,
                "id_Semaine"=>1
            ],
            [
                "libelle"=>"Jour 4",
                "is_feriee"=>0,
                "id_Semaine"=>1
            ],

            [
                "libelle"=>"Jour 5",
                "is_feriee"=>0,
                "id_Semaine"=>1
            ],
            [
                "libelle"=>"Jour 6",
                "is_feriee"=>0,
                "id_Semaine"=>1
            ],
            [
                "libelle"=>"Jour 7",
                "is_feriee"=>0,
                "id_Semaine"=>1
            ]
        ];
        foreach($datas as $data){
            Jour::create($data);
        }
    }
}
