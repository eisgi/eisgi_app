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
            $table->string('codeGroupeDS')->primary();
            $table->string('libelleGroupeDS');
            $table->string('groupeCodeOptionFiliere');
            $table->foreign('groupeCodeOptionFiliere')
                ->references('codeOptionFiliere')
                ->on('option_filieres')
                ->onDelete('cascade');
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
