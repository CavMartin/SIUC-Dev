<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelitosTable extends Migration
{
    public function up()
    {
        Schema::create('delitos', function (Blueprint $table) {
            $table->id('id_delito');
            $table->foreignId('datos_actuacion_id')->constrained('datos_actuacion')->onDelete('cascade');
            $table->date('fechaHecho');
            $table->time('horaHecho');
            $table->string('delitoGeneral');
            $table->boolean('agravado')->default(false);
            $table->boolean('tentativa')->default(false);
            $table->string('tematica')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('entidadAtacada')->nullable();
            $table->string('nombreEntidad')->nullable();
            $table->string('tipoLugar')->nullable();
            $table->string('departamento');
            $table->string('localidad');
            $table->string('barrio')->nullable();
            $table->string('calle')->nullable();
            $table->string('interseccion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delitos');
    }
}

