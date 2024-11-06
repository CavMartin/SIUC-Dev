<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_persona'); // ID autoincremental
            $table->foreignId('datos_actuacion_id')->constrained('datos_actuacion')->onDelete('cascade');
            $table->string('calidad');
            $table->boolean('nn')->default(false); // Campo de tipo booleano para NN
            $table->string('tipoDocumento');
            $table->string('numero');
            $table->string('genero');
            $table->string('nombres')->nullable();
            $table->string('apellido')->nullable();
            $table->string('apellidoMaterno')->nullable();
            $table->string('alias')->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('pais')->default('ARGENTINA');
            $table->string('provincia')->default('SANTA FE');
            $table->string('departamento')->default('ROSARIO');
            $table->string('estadoSalud')->nullable();
            $table->string('lesionadoCon')->nullable();
            $table->string('lesionadoOcasión')->nullable();
            $table->text('caracteristicas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}