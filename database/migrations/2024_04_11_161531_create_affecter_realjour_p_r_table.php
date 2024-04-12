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
        Schema::create('affecter_realjour_p_r', function (Blueprint $table) {
            $table->increments('idAffecRJSnPr');
            $table->integer('idSemaine');
            $table->integer('idJour');
            $table->integer('idSalle');
            $table->integer('idSeance');
            $table->string('matricule');
            $table->integer('idModule');
            $table->string('codeGroupePR',2);


            $table->decimal('MHRD',1,2);

            $table->foreign('idJour')->references('iJour')->on('jour');
            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('Seance')->references('ordreSeance')->on('seances');
            $table->foreign('idModule')->references('idModule')->on('modules');
            $table->foreign('codeGroupePR')->references('codeGroupePR')->on('groupe_presentiels');
            $table->foreign('idSalle')->references('idSalle')->on('salles');
            $table->foreign('idSemaine')->references('idSemaine')->on('semaines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_realjour_p_r');
    }
};
