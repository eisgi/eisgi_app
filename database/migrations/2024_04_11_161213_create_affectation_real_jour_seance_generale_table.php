<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationRealJourSeanceGeneraleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('affectation_real_jour_seance_generale', function (Blueprint $table) {
            $table->increments('idAffectationJSGenerale');
            $table->decimal('CumuleTotaleJour_dist_pre', 10, 2);
            $table->unsignedBigInteger('idGroupePhysique');
            $table->foreign('idGroupePhysique')->references('idGroupePhysique')->on('groupe_physique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('affectation_real_jour_seance_generale');
    }
}
