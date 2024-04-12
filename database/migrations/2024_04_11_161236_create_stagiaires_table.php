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
            $table->string('nomStagiaire');
            $table->string('prenomStagiaire');
            $table->decimal('noteAssiduite',2,2);
            $table->string('nbrAbsenceNonJusitifie', 50);
            $table->string('numInscription')->unique();
            $table->integer('nbrSanctions');
            $table->unsignedBigInteger('idGroupePhysique');
            $table->foreign('idGroupePhysique')->references('id')->on('groupe_physique');
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
