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
        Schema::create('affectation_prev_heb_generales', function (Blueprint $table) {
            $table->integer('idAffecHebGen');
            $table->integer('idAffecHebPDs');
            $table->integer('idAffecHebPPr');
            $table->integer('idGroupePhysique');
            $table->decimal('CumuleTotaleHeb_dist_pre_gen', 10,2);
            $table->foreign('idGroupePhysique')->references('idGroupePhysique')->on('groupe_physique');
            $table->foreign('idAffecHebPDs')->references('idAffecHebPD')->on('affecter_heb_p_dis');
            $table->foreign('idAffecHebPPr')->references('idAffecHebPPr')->on('affecter_heb_d_prs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectation_prev_heb_generales');
    }
};
