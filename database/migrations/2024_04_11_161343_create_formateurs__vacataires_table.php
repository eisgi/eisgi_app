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
        Schema::create('formateurs__vacataires', function (Blueprint $table) {
            $table->string('id', 50)->primary();
    $table->string('Annee_Experience', 50);
    $table->string('type', 50);
    $table->string('metier', 50);
    $table->string('etat', 50);
    $table->boolean('Dossier_Depose');
    $table->integer('N_ordre');
    $table->boolean('Date_decision');
    $table->boolean('_Validation_RRH');
    $table->boolean('Apparition_Enote');
    $table->integer('N_ordre_Bordereau');
    $table->date('Date_Bordereau');
    $table->boolean('Decison');
    $table->string('MasseHoraireAnnuelle', 50);
    $table->string('MasseHoraireProposee', 50);
    $table->boolean('Dossier_Depose_DR');
    $table->string('matricule', 50);
    $table->foreign('matricule')->references('matricule')->on('formateurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formateurs__vacataires');
    }
};
