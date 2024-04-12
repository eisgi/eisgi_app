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
        Schema::create('semestres', function (Blueprint $table) {
            $table->string('idSemestre',2)->primary();
            $table->date('dateDebutSemestre');
            $table->date('dateFinSemestre');
            $table->string('semestreAnneeFormation', 9);
            $table->foreign('semestreAnneeFormation')->references('anneeFormation')->on('annee_formations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semestres');
    }
};
