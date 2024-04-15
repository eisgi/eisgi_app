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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('codeModule')->unique();
            $table->string('libelleModule', 100);
            $table->unsignedMediumInteger('ordreModule');

            $table->decimal('MHT', 8, 2);
            $table->unsignedInteger('Coef');
            $table->boolean('EFM_Regional')->default(false);

            $table->string('filiereModule');
            $table->foreign('filiereModule')->references('codeFiliere')->on('filieres')->onDelete('cascade');
            $table->string('semestreModule', 2);
            $table->foreign('semestreModule')->references('idSemestre')->on('semestres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
