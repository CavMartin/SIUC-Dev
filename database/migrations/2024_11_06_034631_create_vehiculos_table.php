<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id('id_vehiculo'); // ID autoincremental
            $table->foreignId('datos_actuacion_id')->constrained('datos_actuacion')->onDelete('cascade');
            $table->string('calidad');
            $table->string('dominio')->nullable();
            $table->string('tipoVehiculo')->nullable();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->string('motor')->nullable();
            $table->string('color')->nullable();
            $table->integer('añoModelo')->nullable();
            $table->string('chasis')->nullable();
            $table->string('estado')->nullable();
            $table->string('recuperado')->nullable(); // Almacenará el valor del radio button seleccionado
            $table->boolean('allanamiento')->default(false); // Booleano para el checkbox de allanamiento
            $table->string('produccion')->nullable(); // Almacena SI o NO para la cadena de producción
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}