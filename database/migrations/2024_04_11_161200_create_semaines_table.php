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
        Schema::create('semaines', function (Blueprint $table) {
            $table->smallIncrements('id');
    $table->string('codeSemaine', 50);
    $table->date('dateDebutSemaine');
    $table->date('dateFinSemaine');
    $table->string('Emploi', 225);
    $table->integer('idSemestre');
    $table->foreign('idSemestre')->references('idSemestre')->on('semestre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semaines');
    }
};
