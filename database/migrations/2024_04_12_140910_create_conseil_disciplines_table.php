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
            $table->id();
            $table->date('dateConseil');
            $table->string('raison');
            $table->UnsignedBigInteger('idSanction');
            $table->UnsignedBigInteger('idStagiaire');
            $table->foreign('idSanction')->references('id')->on('sanctions');
            $table->foreign('idStagiaire')->references('id')->on('stagiaires');

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
