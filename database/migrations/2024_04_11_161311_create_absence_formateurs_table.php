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
        Schema::create('absence_formateurs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('idAffectJr', 50);
            $table->string('HeuresAbsentees', 50);
            $table->string('idJustification', 50);
            $table->foreign('idJustification')->references('idJustification')->on('justification_abs_frm');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence_formateurs');
    }
};
