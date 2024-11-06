<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_vehiculo'; // Si la PK no es id, hay que definirla

    protected $fillable = [
        'datos_actuacion_id',
        'calidad',
        'dominio',
        'tipoVehiculo',
        'modelo',
        'marca',
        'motor',
        'color',
        'añoModelo',
        'chasis',
        'estado',
        'recuperado',
        'allanamiento',
        'produccion',
        'observaciones',
    ];

    public function datosActuacion()
    {
        return $this->belongsTo(DatosActuacion::class);
    }
}