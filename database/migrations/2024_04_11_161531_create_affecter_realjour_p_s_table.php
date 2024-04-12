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
        Schema::create('affecter_realjour_p_s', function (Blueprint $table) {
            $table->string('id', 50);
    $table->string('matricule', 50);
    $table->string('libelleGroupe', 50);
    $table->string('ordreSeance', 50);
    $table->integer('id_1');
    $table->smallInteger('id_2');
    $table->string('nomSalle', 50);
    $table->string('MHRP', 50);
    $table->primary(['id', 'matricule', 'libelleGroupe', 'ordreSeance', 'id_1', 'id_2', 'nomSalle']);
    $table->foreign('id')->references('id')->on('jour');
    $table->foreign('matricule')->references('matricule')->on('formateurs');
    $table->foreign('libelleGroupe')->references('libelleGroupe')->on('groupe_presentiel');
    $table->foreign('ordreSeance')->references('ordreSeance')->on('seance');
    $table->foreign('id_1')->references('id')->on('modules');
    $table->foreign('id_2')->references('id')->on('semaine');
    $table->foreign('nomSalle')->references('nomSalle')->on('salle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_realjour_p_s');
    }
};
