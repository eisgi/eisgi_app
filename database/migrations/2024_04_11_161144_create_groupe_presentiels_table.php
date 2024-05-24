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

            $table->string('codeGroupePR')->primary();
            $table->foreignId('option_filieres_id')->constrained('option_filieres')->onDelete('cascade')->nullable();
            $table->foreignId('groupe_physique_id')->constrained('groupe_physique')->onDelete('cascade')->nullable();
            $table->string('libelleGroupePR')->nullable();
            $table->enum('annee',['1A','2A','3A'])->nullable();
            $table->string('typegroupe',1)->nullable();

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
