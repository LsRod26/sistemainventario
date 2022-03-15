<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdcomponenteToComponentepcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('componentepc', function (Blueprint $table) {
            $table->unsignedBigInteger('id_componentepc');
            $table->foreign('id_componentepc')->references('id')->on('componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('componentepc', function (Blueprint $table) {
            $table->dropForeign('id_componentepc');
            $table->dropColumn('id_componentepc');
        });
    }
}
