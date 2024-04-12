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
             $table->integer('idSemestre')->primary();
    $table->date('dateDebutSemestre');
    $table->date('dateFinSemestre');
    $table->string('anneeFormation', 9);
    $table->foreign('anneeFormation')->references('anneeFormation')->on('annee_formation');
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
