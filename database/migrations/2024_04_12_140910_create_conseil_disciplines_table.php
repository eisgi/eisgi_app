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
        Schema::create('conseil_disciplines', function (Blueprint $table) {
            $table->increments('idConseil');
            $table->date('dateConseil');
            $table->string('raison');
            $table->integer('idSanction');
            $table->integer('idStagiaire');
            $table->foreign('idSanction')->references('idSanction')->on('sanctions');
            $table->foreign('idStagiaire')->references('idStagiaire')->on('stagiaires');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conseil_disciplines');
    }
};
