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
        Schema::create('groupe_presentiels', function (Blueprint $table) {
            $table->string('codeGroupePR',2)->primary();
            $table->string('libelleGroupePR');
            $table->string('groupeCodeFiliere');
            $table->foreign('groupeCodeFiliere')->references('codeFiliere')->on('filiere');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_presentiels');
    }
};
