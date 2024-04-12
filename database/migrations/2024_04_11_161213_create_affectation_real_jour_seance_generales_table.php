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
        Schema::create('affectation_real_jour_seance_generales', function (Blueprint $table) {
            $table->integer('id')->primary();
    $table->string('CumuleTotaleJour_dist_pre_', 50);
    $table->string('libelleGroupe', 50);
    $table->foreign('libelleGroupe')->references('libelleGroupe')->on('groupe_physique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectation_real_jour_seance_generales');
    }
};
