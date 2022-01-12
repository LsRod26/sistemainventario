<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdEquipoToComponenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('componente', function (Blueprint $table) {
            $table->unsignedBigInteger('id_equipo')->after('id')->nullable(true);  
            $table->foreign('id_equipo')->references('id')->on('equipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('componente', function (Blueprint $table) {
            $table->dropForeign('id_equipo');
            $table->dropColumn('id_equipo');
        });
    }
}
