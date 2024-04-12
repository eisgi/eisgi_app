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
        Schema::create('demande_conges', function (Blueprint $table) {
            $table->increments('idDmConge');
            $table->string('statut');
            $table->date('dateDebutConge');
            $table->date('dateFinConge');
            $table->string('durreeConge');

            $table->integer('idFMPR');
            $table->integer('idPA');
            $table->integer('idTypeConge');

            $table->foreign('idFMPR')->references('id')->on('formateurs_permanents');
            $table->foreign('idPA')->references('idTypeConge')->on('type_conge');
            $table->foreign('idTypeConge')->references('id')->on('personnel_administratif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_conges');
    }
};
