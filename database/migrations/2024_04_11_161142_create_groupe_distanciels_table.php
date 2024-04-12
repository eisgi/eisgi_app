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
        Schema::create('groupe_distanciels', function (Blueprint $table) {
            $table->string('libelleGroupe', 50)->primary();
    $table->integer('codeFiliere');
    $table->foreign('codeFiliere')->references('codeFiliere')->on('filiere');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_distanciels');
    }
};
