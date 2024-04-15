<?php

namespace Database\Seeders;

<<<<<<< HEAD
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
=======
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
<<<<<<< HEAD
     *
     * @return void
     */
    public function run()
    {
    $this->call(UsersTableSeeder::class);
    $this->call(FilieresTableSeeder::class);
    $this->call(GroupesTableSeeder::class);
    $this->call(SallesTableSeeder::class);
    $this->call(ModulesTableSeeder::class);
    $this->call(SemestresTableSeeder::class);
   

       
    }
}
=======
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
