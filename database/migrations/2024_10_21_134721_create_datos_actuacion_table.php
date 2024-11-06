<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('datos_actuacion', function (Blueprint $table) {
            $table->id();
            $table->string('tipoActuacion', 100);
            $table->string('numeroActuacion', 20);
            $table->date('fechaActuacion');
            $table->time('horaActuacion');
            $table->string('nSumario', 20);
            $table->string('instruyeActuacion', 100);
            $table->string('unidadFiscal', 100);
            $table->string('fuerzaInterviniente', 100);
            $table->string('unidadRegional', 100);
            $table->text('relatoDelHecho');
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_actuacion');
    }
};
