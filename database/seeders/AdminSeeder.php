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
        $data=[[  "nom"=>'NASSIM',
        "prenom"=>"Amale",
        "email"=>"AmaleNassim@admin.com",
        "matricule"=>"AMALE123",
        "role"=>"ADM",
        "password"=>bcrypt('AMALE@1234')],
        [  "nom"=>'Sabor',
        "prenom"=>"Rabia",
        "email"=>"sabor@admin.com",
        "matricule"=>"sabor123",
        "role"=>"FORM",
        "password"=>bcrypt('sabor@1234')],
        [  "nom"=>'ELANSAR',
        "prenom"=>"Yacin",
        "email"=>"yacin@admin.com",
        "matricule"=>"yacin123",
        "role"=>"STG",
        "password"=>bcrypt('yacin@1234')],
        ];
        foreach($data as $d){

            User::create($d);
        }
    }
}
