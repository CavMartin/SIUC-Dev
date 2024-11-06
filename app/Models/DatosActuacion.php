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
        'unidadRegional',
        'dependenciaPolicial',
        'fuerzaInterviniente',
        'fiscaliaRegional',
        'unidadFiscal',
        'relatoDelHecho'
    ];

    public function delitos()
    {
        return $this->hasMany(Delito::class);
    }
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
    public function armas()
    {
        return $this->hasMany(Arma::class);
    }
    public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }
}
