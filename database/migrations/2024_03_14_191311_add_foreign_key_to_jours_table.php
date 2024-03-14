<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToJoursTable extends Migration
{
    public function up()
    {
        Schema::table('jours', function (Blueprint $table) {
            $table->foreignId('id_semaine')->nullable()->constrained('semaines')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('jours', function (Blueprint $table) {
            $table->dropForeign(['id_semaine']);
            $table->dropColumn('id_semaine');
        });
    }
}

?>