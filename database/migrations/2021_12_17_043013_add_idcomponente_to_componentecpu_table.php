<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdcomponenteToComponentecpuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('componentecpu', function (Blueprint $table) {
            $table->unsignedBigInteger('id_componenteCPU');
            $table->foreign('id_componenteCPU')->references('id')->on('componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('componentecpu', function (Blueprint $table) {
            $table->dropForeign('id_componentecpu');
            $table->dropColumn('id_componentecpu');
        });
    }
}
