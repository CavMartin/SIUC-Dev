<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementosTable extends Migration
{
    public function up()
    {
        Schema::create('elementos', function (Blueprint $table) {
            $table->id('id_elemento'); // ID autoincremental
            $table->foreignId('datos_actuacion_id')->constrained('datos_actuacion')->onDelete('cascade');
            $table->string('calidad')->nullable();
            $table->string('elemento')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('color')->nullable();
            $table->string('empresa')->nullable();
            $table->string('codigoArea')->nullable();
            $table->string('telefono')->nullable();
            $table->enum('produccionPrimaria', ['Si', 'No'])->default('No');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('elementos');
    }
}