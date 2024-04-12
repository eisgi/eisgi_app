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
        Schema::create('jours', function (Blueprint $table) {
            $table->increments('idJour');
            $table->boolean('is_feriee');
            $table->string('jourSemestre',2);
            $table->foreign('jourSemestre')->references('idSemestre')->on('semestre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jours');
    }
};
