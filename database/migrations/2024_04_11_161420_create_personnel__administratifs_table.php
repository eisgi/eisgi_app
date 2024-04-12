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
        Schema::create('personnel__administratifs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('Role', 50);
            $table->string('reliquat', 50);
            $table->string('idDemande', 50);
            $table->foreign('idDemande')->references('idDemande')->on('demande_absence');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel__administratifs');
    }
};
