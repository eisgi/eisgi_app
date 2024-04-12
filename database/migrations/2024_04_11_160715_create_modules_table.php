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
        Schema::create('modules', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('codeModule', 50);
            $table->string('libelleModule', 50);
            $table->tinyInteger('ordreModule');
            $table->decimal('MHT', 8, 2);
            $table->tinyInteger('Coef');
            $table->boolean('EFM_Regional');
            $table->integer('codeFiliere');
            $table->foreign('codeFiliere')->references('codeFiliere')->on('filiere');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
