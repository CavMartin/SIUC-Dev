<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delito extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_delito'; // Si la PK no es id, hay que definirla

    protected $fillable = [
        'datos_actuacion_id',
        'fechaHecho',
        'horaHecho',
        'delitoGeneral',
        'agravado',
        'tentativa',
        'tematica',
        'tipologia',
        'modalidad',
        'entidadAtacada',
        'nombreEntidad',
        'tipoLugar',
        'departamento',
        'localidad',
        'barrio',
        'calle',
        'interseccion',
    ];

    public function datosActuacion()
    {
        return $this->belongsTo(DatosActuacion::class);
    }
}
