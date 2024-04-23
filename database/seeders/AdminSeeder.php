<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            "nom"=>'NASSIM',
            "prenom"=>"Amale",
            "email"=>"AmaleNassim@admin.com",
            "matricule"=>"AMALE123",
            "role"=>"ADM",
            "password"=>bcrypt('AMALE@1234')
        ];
        User::create($data);
    }
}
