<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annee_formations', function (Blueprint $table) {
            $table->string('anneeFormation', 9)->primary();
            $table->date('dateDebutAnneeFormation');
            $table->date('dateFinAnneeFormation');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annee_formations');
    }
};
