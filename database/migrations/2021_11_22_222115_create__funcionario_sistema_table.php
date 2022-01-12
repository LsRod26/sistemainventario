<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioSistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_sistema', function (Blueprint $table) {
            $table->id();
            //$table->enum('estado',['ACTIVO','INACTIVO']);
            $table->boolean('ACTIVO');
            //$table->string('asignacion_realizada_por')->nullable(true);
            //$table->string('modificacion_realizada_por')->nullable(true);
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
        Schema::dropIfExists('funcionario_sistema');
    }
}
