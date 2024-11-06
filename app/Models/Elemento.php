<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_elemento'; // Si la PK no es id, hay que definirla

    protected $fillable = [
        'datos_actuacion_id',
        'calidad',
        'elemento',
        'cantidad',
        'marca',
        'modelo',
        'color',
        'empresa',
        'codigoArea',
        'telefono',
        'produccionPrimaria',
        'descripcion',
    ];

    public function datosActuacion()
    {
        return $this->belongsTo(DatosActuacion::class);
    }
}