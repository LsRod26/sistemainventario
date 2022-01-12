<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTipocomponenteToComponenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
            Schema::table('componente', function (Blueprint $table) {
                $table->unsignedBigInteger('id_tipo_componente')->after('id')->nullable(true);
                $table->foreign('id_tipo_componente')->references('id')->on('tipo_componente');
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
                $table->dropForeign('id_tipo_componente');
                $table->dropColumn('id_tipo_componente');
            });
        }
}
