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
        Schema::create('semaines', function (Blueprint $table) {
            $table->id();
            $table->string('codeSemaine');
            $table->date('dateDebutSemaine');
            $table->date('dateFinSemaine');
            $table->string('anneeformation',9);
            $table->foreign('anneeformation')->references('anneeFormation')->on('annee_formations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semaines');
    }
};
