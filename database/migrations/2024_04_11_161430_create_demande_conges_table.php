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
            $table->id();
            $table->string('statut');
            $table->date('dateDebutConge');
            $table->date('dateFinConge');
            $table->string('durreeConge');

            $table->unsignedBigInteger('idFMPR');
            $table->string('matriculePA');
            $table->unsignedBigInteger('idTypeConge');

            $table->foreign('idFMPR')->references('id')->on('formateurs__permanents');
            $table->foreign('idTypeConge')->references('id')->on('type_conges');
            $table->foreign('matriculePA')->references('matricule')->on('personnel__administratifs');
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
