<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdFuncionarioToFuncionarioEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario_equipo', function (Blueprint $table) {
            $table->unsignedBigInteger('id_funcionario')->after('id')->nullable(true);
            $table->foreign('id_funcionario')->references('id')->on('funcionario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario_equipo', function (Blueprint $table) {
            $table->dropForeign('id_funcionario');
            $table->dropColumn('id_funcionario');
        });
    }
}
