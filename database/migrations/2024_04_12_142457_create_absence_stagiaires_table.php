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
        Schema::create('absence_stagiaires', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('idJustification');
            $table->UnsignedBigInteger('idAffectJrSnDs');
            $table->UnsignedBigInteger('idAffectJrSnPr');
            $table->decimal('HeuresAbsentees',2,2);
            $table->UnsignedBigInteger('idJustificationSTG');
            $table->foreign('idJustificationSTG')->references('id')->on('justification_abs_s_t_g_s');
            $table->foreign('idAffectJrSnPr')->references('id')->on('affecter_realjour_p_r');
            $table->foreign('idAffectJrSnDs')->references('id')->on('affecter_realjour_d_s');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence_stagiaires');
    }
};
