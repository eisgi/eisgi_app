<?php

namespace Database\Seeders;

use App\Models\AnneeFormation;
use App\Models\Jour;
use App\Models\Semaine;
use App\Models\Semestre;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(User::count() ==0){
            $this->call([
                AdminSeeder::class,

            ]);
        }
        if(AnneeFormation::count() ==0){
            $this->call([
                    AnneeFormationSeeder::class,

            ]);
        }
        if(Semestre::count() ==0){
            $this->call([
                    SemestreSeeder::class,

            ]);
        }
        if(Semaine::count() ==0){
            $this->call([
                    SemaineSeeder::class,

            ]);
        }
        if(Jour::count() ==0){
            $this->call([
                    JourSeeder::class,

            ]);
        }

    }
}
