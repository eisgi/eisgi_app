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
        Schema::create('annee_formations', function (Blueprint $table) {
            $table->string('anneeFormation', 12)->primary();
            $table->date('dateDebutAnneeFormation');
            $table->date('dateFinAnneeFormation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annee_formations');
    }
};
