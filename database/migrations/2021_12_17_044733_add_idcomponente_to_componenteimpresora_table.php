<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdcomponenteToComponenteimpresoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('componenteimpresora', function (Blueprint $table) {
            $table->unsignedBigInteger('id_componenteimpresora');
            $table->foreign('id_componenteimpresora')->references('id')->on('componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('componenteimpresora', function (Blueprint $table) {
            $table->dropForeign('id_componenteimpresora');
            $table->dropColumn('id_componenteimpresora');
        });
    }
}
