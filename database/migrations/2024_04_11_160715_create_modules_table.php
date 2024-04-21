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
            $table->string('codeModule');
            $table->string('libelleModule', 100);
            $table->unsignedMediumInteger('ordreModule');

            $table->decimal('MHT', 8, 2);
            $table->unsignedInteger('Coef');
            $table->boolean('EFM_Regional')->default(false);

            $table->foreignId('option_filieres_id')->constrained('option_filieres')->onDelete('cascade');

            $table->string('semestreModule', 2);
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
