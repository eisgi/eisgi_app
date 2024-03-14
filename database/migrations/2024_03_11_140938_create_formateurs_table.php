<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateNaissance');
            $table->date('dateRejoint');
             $table->string('matricule', 8)->unique()->nullable()->default(Str::random(8));
            $table->string('password', 12)->unique()->default(Str::random(12));
            $table->timestamps();
        });

        // Generate unique random values for matricule
        $this->generateUniqueMatricules();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formateurs');
    }
    private function generateUniqueMatricules()
    {
        $formateurs = \App\Models\Formateur::all();

        foreach ($formateurs as $formateur) {
            $formateur->update(['matricule' => Str::random(8)]);
        }
    }
};