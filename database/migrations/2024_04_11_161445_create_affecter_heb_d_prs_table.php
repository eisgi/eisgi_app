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
        Schema::create('affecter_heb_d_prs', function (Blueprint $table) {

            $table->increments('idAffecHebPPr');


            $table->integer('idSemaine');


            $table->string('matricule');
            $table->integer('idModule');
            $table->string('codeGroupePR',2);

            $table->decimal('MHHP', 3,2);
            $table->decimal('CumuleHeurePre', 10,2);

            $table->foreign('matricule')->references('matricule')->on('formateurs');
            $table->foreign('idModule')->references('idModule')->on('modules');
            $table->foreign('codeGroupePR')->references('codeGroupePR')->on('groupe_presentiels');
            $table->foreign('idSemaine')->references('idSemaine')->on('semaines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affecter_heb_d_prs');
    }
};
