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
            $table->increments('idAbsFM');
            $table->integer('idAffectJrSnPr');
            $table->integer('idAffectJrSnDs');
            $table->string('HeuresAbsentees');
            $table->integer('idJustification');
            $table->foreign('idJustificationAFM')->references('idJustificationAFM')->on('justification_abs_frm');

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
