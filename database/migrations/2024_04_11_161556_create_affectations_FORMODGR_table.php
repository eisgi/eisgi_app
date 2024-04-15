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
        Schema::create('affectations_FORMODGR', function (Blueprint $table) {
            $table->id();
            $table->string('semaineAnneeFormation', 9);
            $table->string('matricule');
            $table->UnsignedBigInteger('idModule');
            $table->UnsignedBigInteger('idGroupePhysique');
            $table->date('dateEFMPre');
            $table->date('dateEFMReal');

            $table->unique(['semaineAnneeFormation', 'matricule', 'idModule', 'idGroupePhysique'], 'unique_affectations');

            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('idModule')->references('id')->on('modules');
            $table->foreign('semaineAnneeFormation')->references('anneeFormation')->on('annee_formations');
            $table->foreign('idGroupePhysique')->references('id')->on('groupe_physique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations_FORMODGR');
    }
};

