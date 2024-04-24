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
            $table->string('libelleGroupePR')->nullable();
            $table->UnsignedInteger('annee')->nullable();
            $table->string('typegroupe',1)->nullable();
            $table->foreignId('option_filieres_id')->constrained('option_filieres')->onDelete('cascade')->nullable();

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
