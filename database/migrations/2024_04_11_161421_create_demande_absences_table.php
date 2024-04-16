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
            $table->id();
            $table->string('Motif');
            $table->date('DateDebut');
            $table->date('DateFin');
            $table->string('matriculeFm');
            $table->string('matriculePA');
            $table->foreign('matriculeFm')->references('matricule')->on('formateurs');
            $table->foreign('matriculePA')->references('matricule')->on('personnel__administratifs');
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
