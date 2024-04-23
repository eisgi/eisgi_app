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
            // [
            //     "libelle"=>,
            //     "is_feriee"=>,
            //     ""
            // ],
        ];
        foreach($datas as $data){
            Jour::create($data);
        }
    }
}
