<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSistemaToFuncionarioSistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionario_sistema', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sistema')->after('id_funcionario')->nullable(true);
            $table->foreign('id_sistema')->references('id')->on('sistema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario_sistema', function (Blueprint $table) {
            $table->dropForeign('id_sistema');
            $table->dropColumn('id_sistema');
        });
    }
}
