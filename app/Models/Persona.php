<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_persona'; // Si la PK no es id, hay que definirla

    protected $fillable = [
        'datos_actuacion_id',
        'calidad',
        'nn',
        'tipoDocumento',
        'numero',
        'genero',
        'nombres',
        'apellido',
        'apellidoMaterno',
        'alias',
        'fechaNacimiento',
        'edad',
        'estadoCivil',
        'ocupacion',
        'pais',
        'provincia',
        'departamento',
        'estadoSalud',
        'lesionadoCon',
        'lesionadoOcasión',
        'caracteristicas',
    ];

    public function datosActuacion()
    {
        return $this->belongsTo(DatosActuacion::class);
    }
}