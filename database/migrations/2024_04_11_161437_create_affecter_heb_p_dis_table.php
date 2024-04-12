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
        Schema::create('affecter_heb_p_dis', function (Blueprint $table) {
            $table->string('MHHD', 50);
            $table->string('CumuleHeureDist', 50);
            $table->primary(['matricule', 'id', 'libelleGroupe', 'id_1']);
            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('id')->references('id')->on('modules');
            $table->foreign('libelleGroupe')->references('libelleGroupe')->on('groupe_distanciel');
            $table->foreign('id_1')->references('id')->on('semaine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_heb_p_dis');
    }
};
