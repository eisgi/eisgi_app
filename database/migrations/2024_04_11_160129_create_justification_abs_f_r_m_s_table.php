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
        Schema::create('justification_abs_f_r_m_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();$table->string('idJustification', 50)->primary();
            $table->string('motifJustification', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('justification_abs_f_r_m_s');
    }
};
