<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosActuacion extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'datos_actuacion';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'tipoActuacion',
        'numeroActuacion',
        'fechaActuacion',
        'horaActuacion',
        'nSumario',
        'instruyeActuacion',
        'unidadFiscal',
        'fuerzaInterviniente',
        'unidadRegional',
        'relatoDelHecho'
    ];
}
