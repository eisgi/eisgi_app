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
        Schema::create('demande_absences', function (Blueprint $table) {
            $table->string('idDemande', 50)->primary();
            $table->string('Motif', 50);
            $table->date('DateDebut');
            $table->date('DateFin');
            $table->string('matricule', 50);
            $table->foreign('matricule')->references('matricule')->on('formateurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_absences');
    }
};
