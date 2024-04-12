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
        Schema::create('realiser_e_f_m_s', function (Blueprint $table) {
            $table->string('matricule', 50);
    $table->integer('id');
    $table->string('libelleGroupe', 50);
    $table->date('dateEFMPre');
    $table->string('dateEFMReal', 50);
    $table->primary(['matricule', 'id', 'libelleGroupe']);
    $table->foreign('matricule')->references('matricule')->on('formateurs');
    $table->foreign('id')->references('id')->on('modules');
    $table->foreign('libelleGroupe')->references('libelleGroupe')->on('groupe_physique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realiser_e_f_m_s');
    }
};
