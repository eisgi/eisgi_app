<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('codeModule');
            $table->string('libelleModule', 100);
            $table->unsignedMediumInteger('ordreModule');
            $table->decimal('MasseHoraireTotal', 6, 2);

            $table->decimal('MHT', 8, 2);
            $table->unsignedInteger('Coef');
            $table->boolean('EFM_Regional')->default(false);

            $table->string('filiereModule');
            $table->foreign('filiereModule')->references('codeFiliere')->on('filieres')->onDelete('cascade');
            $table->string('semestreModule', 2);
            $table->foreign('semestreModule')->references('idSemestre')->on('semestres')->onDelete('cascade');

            $table->unique(['codeModule', 'libelleModule', 'filiereModule', 'semestreModule'],'unique_module_combinaison');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
};
