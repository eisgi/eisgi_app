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
        Schema::create('affectation_prev_heb_generales', function (Blueprint $table) {
            $table->integer('id')->primary();
    $table->string('affectDistHeb_cleEtrangere_', 50);
    $table->string('affectPreHeb_cleEtrangere_', 50);
    $table->string('CumuleTotaleHeb_dist_pre_', 50);
    $table->string('libelleGroupe', 50);
    $table->foreign('libelleGroupe')->references('libelleGroupe')->on('groupe_physique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectation_prev_heb_generales');
    }
};
