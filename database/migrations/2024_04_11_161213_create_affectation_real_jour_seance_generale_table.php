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
        Schema::create('affectation_real_jour_seance_generale', function (Blueprint $table) {
            $table->id();
            $table->string('CumuleTotaleJour_dist_pre', 50);
            $table->string('libelleGroupePhysique', 50);
            $table->foreign('libelleGroupePhysique')->references('libelleGroupe')->on('groupe_physique');
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
