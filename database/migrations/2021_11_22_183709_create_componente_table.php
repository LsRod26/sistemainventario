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
            $table->string('codigo_componente');
            $table->string('marca');
            $table->string('serial');
            
            $table->boolean('ACTIVO');
            $table->boolean('tarjeta_red');
            $table->string('ip')->nullable(true);
            $table->string('mac')->nullable(true);
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
