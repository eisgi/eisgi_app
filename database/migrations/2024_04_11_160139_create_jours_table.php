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
            $table->string('id', 50)->primary();
            $table->boolean('is_feriee');
            $table->smallInteger('id_1');
            $table->foreign('id_1')->references('idSemestre')->on('semestre');
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
