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
        Schema::create('type_conges', function (Blueprint $table) {
            $table->string('idTypeConge', 50)->primary();
    $table->string('TypeConge', 50);
    $table->string('MotifConge', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_conges');
    }
};
