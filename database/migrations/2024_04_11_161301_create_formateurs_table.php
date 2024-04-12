<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateurs', function (Blueprint $table) {
            $table->string('matricule')->primary();
            $table->string('password');
            $table->string('nom');
            $table->string('prenom');
            $table->string('numTel');
            $table->string('civilite');
            $table->integer('Echelle');
            $table->string('Echelon');
            $table->date('Date_Recrutement');
            $table->date('Date_Depart_Retrait');
            $table->date('dateNaissance');
            $table->string('Adresse');
            $table->string('Grade');
            $table->string('Diplome');
            $table->string('situationFamiliale');
            $table->decimal('MasseHoaraireHeb', 8, 2);
            $table->decimal('massHorRealiseeAnnuel', 8, 2);
            $table->string('Filiere', 50);
            $table->string('Categorie', 50);
            $table->unsignedBigInteger('idEtablissement');
            $table->foreign('idEtablissement')->references('id')->on('etablissements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formateurs');
    }
}
