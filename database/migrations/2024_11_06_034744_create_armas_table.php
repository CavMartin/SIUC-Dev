<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmasTable extends Migration
{
    public function up()
    {
        Schema::create('armas', function (Blueprint $table) {
            $table->id('id_arma'); // ID autoincremental
            $table->foreignId('datos_actuacion_id')->constrained('datos_actuacion')->onDelete('cascade');
            $table->string('calidad');
            $table->string('tipoArma')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('calibre')->nullable();
            $table->string('numero')->nullable();
            $table->string('estado')->nullable();
            $table->string('color')->nullable();
            $table->string('aptaDisparo')->nullable(); // Almacena "Si" o "No" para aptitud de disparo
            $table->string('remarque')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('armas');
    }
}
