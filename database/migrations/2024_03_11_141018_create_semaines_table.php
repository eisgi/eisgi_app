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
            $table->string('codeSemaine')->unique();
            $table->date('dateDebutSemaine');
            $table->date('dateFinSemaine');
            $table->foreign('anneeFormation')->references('anneeFormation')->on('annee_formations')->onDelete('cascade');

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
