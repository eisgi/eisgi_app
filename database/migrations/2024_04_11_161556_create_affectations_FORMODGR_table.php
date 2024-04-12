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
            $table->increments('idEFM');
            $table->string('semaineAnneeFormation', 9);
            $table->string('matricule');
            $table->integer('idModule');
            $table->integer('idGroupePhysique');

            $table->date('dateEFMPre');
            $table->date('dateEFMReal');

            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('idModule')->references('idModule')->on('modules');
            $table->foreign('semaineAnneeFormation')->references('anneeFormation')->on('annee_formation');
            $table->foreign('idGroupePhysique')->references('idGroupePhysique')->on('groupe_physique');
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
