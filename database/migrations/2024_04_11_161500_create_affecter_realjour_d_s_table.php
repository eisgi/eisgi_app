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
        Schema::create('affecter_realjour_d_s', function (Blueprint $table) {
            $table->increments('idAffecRJSnDs');
            $table->integer('idSemaine');
            $table->integer('idJour');
            $table->integer('idSalle');
            $table->integer('idSeance');
            $table->string('matricule');
            $table->integer('idModule');
            $table->string('codeGroupeDS', 2);
            $table->decimal('MHRD', 1, 2);

            $table->unique(['idSemaine', 'idJour', 'idSalle', 'idSeance', 'matricule', 'idModule', 'codeGroupeDS'], 'unique_affecter_realjour_d_s');

            $table->foreign('idJour')->references('idJour')->on('jour');
            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('idSeance')->references('ordreSeance')->on('seances');
            $table->foreign('idModule')->references('idModule')->on('modules');
            $table->foreign('codeGroupeDS')->references('codeGroupeDS')->on('groupe_distanciels');
            $table->foreign('idSalle')->references('idSalle')->on('salles');
            $table->foreign('idSemaine')->references('idSemaine')->on('semaines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_realjour_d_s');
    }
};
