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
            $table->string('codeGroupeDS',2)->primary();
            $table->string('libelleGroupeDS');
            $table->string('groupeCodeFiliere');
            $table->foreign('groupeCodeFiliere')->references('codeFiliere')->on('filiere');
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
