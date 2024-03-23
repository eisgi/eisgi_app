<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'id' => 1,
            'nom' => 'NASIM',
            'prenom' => 'Amale',
            'email' => 'AmaleNASIM@gmail.com',
            'role' => 'ADM',
            'matricule' => 'NASAML01',
            'password' => '123AMALE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}