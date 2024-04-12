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
            $table->string('idConge', 50)->primary();
            $table->string('statut', 50);
            $table->string('dateDebutConge', 50);
            $table->string('dateFinConge', 50);
            $table->string('durreeConge', 50);
            $table->integer('id');
            $table->string('idTypeConge', 50);
            $table->integer('id_1');
            $table->foreign('id')->references('id')->on('formateurs_permanents');
            $table->foreign('idTypeConge')->references('idTypeConge')->on('type_conge');
            $table->foreign('id_1')->references('id')->on('personnel_administratif');
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
