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
            $table->string('libelleGroupePR');
            $table->string('groupeCodeOptionFiliere');
            $table->foreignId('option_filieres_id')->constrained('option_filieres')->onDelete('cascade');
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
