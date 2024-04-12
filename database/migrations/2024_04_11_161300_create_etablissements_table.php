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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->string('idEtablissement', 50)->primary();
    $table->string('NomEtablissement', 50);
    $table->string('Adresse', 50);
    $table->integer('idComplexe');
    $table->foreign('idComplexe')->references('idComplexe')->on('complexe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
