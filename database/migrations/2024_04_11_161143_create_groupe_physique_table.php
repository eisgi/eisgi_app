<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupePhysiqueTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('groupe_physique', function (Blueprint $table) {
            $table->id();
            $table->string('codeGroupePhysique')->unique();
            $table->string('libelleGroupe')->nullable();
            $table->enum('annee',['1A','2A','3A'])->nullable();
            $table->string('codeGroupeDS');
            $table->foreign('codeGroupeDS')->references('codeGroupeDS')->on('groupe_distanciels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('option_filieres_id')->constrained('option_filieres')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('groupe_physique');
    }
}
