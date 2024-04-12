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
            $table->decimal('HeuresAbsentees',2,2);
            $table->integer('idJustification');
            $table->foreign('idJustificationAFM')->references('idJustificationAFM')->on('justification_abs_frm');
            $table->foreign('idAffectJrSnPr')->references('idAffectJrSnPr')->on('affecter_realjour_p_r');
            $table->foreign('idAffectJrSnDs')->references('idAffectJrSnDs')->on('affecter_realjour_d_s');


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
