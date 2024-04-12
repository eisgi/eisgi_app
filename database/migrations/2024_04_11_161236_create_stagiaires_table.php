<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); $table->string('idStagiaire', 50)->primary();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('noteAssiduite', 50);
            $table->string('nbrAbsenceNonJusitifie', 50);
            $table->string('numInscription', 50)->unique();
            $table->string('nbrSanctions', 50);
            $table->string('libelleGroupe', 50);
            $table->foreign('libelleGroupe')->references('libelleGroupe')->on('groupe_physique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
