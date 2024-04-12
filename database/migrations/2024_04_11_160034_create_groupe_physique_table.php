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
        Schema::create('groupe_physique', function (Blueprint $table) {
            $table->increments('idGroupePhysique');
            $table->string('codeGroupePhysique')->unique();
            $table->string('libelleGroupe', 50)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_physiques');
    }
};
