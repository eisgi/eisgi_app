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
            $table->string('libelleGroupe')->unique();
            $table->string('codeGroupeDS');
            $table->foreign('codeGroupDs')->references('codeGroupeDS')->on('groupe_distanciels')->onDelete('cascade')->onUpdate('cascade');
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
