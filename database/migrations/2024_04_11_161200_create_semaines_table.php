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
        Schema::create('semaines', function (Blueprint $table) {
            $table->id();
            $table->string('codeSemaine')->unique();
            $table->date('dateDebutSemaine');
            $table->date('dateFinSemaine');
            $table->string('Emploi')->nullable();
            $table->string('semestreSemaine',2);
            $table->foreign('semestreSemaine')->references('idSemestre')->on('semestres');
            $table->string('semaineAnneeFormation', 9);
            $table->foreign('semaineAnneeFormation')->references('anneeFormation')->on('annee_formations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semaines');
    }
};
