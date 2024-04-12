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
        Schema::create('affecter_heb_p_dis', function (Blueprint $table) {
            $table->increments('idAffecHebPDs');
            $table->integer('idSemaine');
            $table->string('matricule');
            $table->integer('idModule');
            $table->string('codeGroupeDS',2);
            $table->decimal('MHHD', 3,2);
            $table->decimal('CumuleHeureDist', 10,2);
            
            $table->unique(['idSemaine', 'matricule', 'idModule', 'codeGroupeDS'], 'unique_affecter_heb_p_dis');

            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('idModule')->references('idModule')->on('modules');
            $table->foreign('codeGroupeDS')->references('codeGroupeDS')->on('groupe_distanciels');
            $table->foreign('idSemaine')->references('idSemaine')->on('semaines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_heb_p_dis');
    }
};
