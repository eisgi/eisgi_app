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
        Schema::create('affecter_heb_d_prs', function (Blueprint $table) {
            $table->string('matricule', 50);
    $table->string('libelleGroupe', 50);
    $table->integer('id');
    $table->smallInteger('id_1');
    $table->string('MHHP', 50);
    $table->string('CumuleHeurePre', 50);
    $table->primary(['matricule', 'libelleGroupe', 'id', 'id_1']);
    $table->foreign('matricule')->references('matricule')->on('formateurs');
    $table->foreign('libelleGroupe')->references('libelleGroupe')->on('groupe_presentiel');
    $table->foreign('id')->references('id')->on('modules');
    $table->foreign('id_1')->references('id')->on('semaine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_heb_d_prs');
    }
};
