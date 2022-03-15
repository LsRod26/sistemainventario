<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componente', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_componente')->nullable(true);
            $table->string('marca')->nullable(true);
            $table->string('serial')->nullable(true);
            $table->boolean('ACTIVO')->nullable(true);
            $table->boolean('tarjeta_red')->nullable(true);
            $table->string('ip')->nullable(true);
            $table->string('mac')->nullable(true);
            $table->string('registradopor');
            $table->string('actualizadopor')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('componente');
    }
}
