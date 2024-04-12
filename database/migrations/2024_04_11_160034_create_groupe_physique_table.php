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
            $table->increments('idGroupePhysique');
            $table->string('codeGroupePhysique')->unique();
            $table->string('libelleGroupe')->unique();
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
