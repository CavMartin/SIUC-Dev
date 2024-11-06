<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arma extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_arma'; // Si la PK no es id, hay que definirla

    protected $fillable = [
        'datos_actuacion_id',
        'calidad',
        'tipoArma',
        'marca',
        'modelo',
        'calibre',
        'numero',
        'estado',
        'color',
        'aptaDisparo',
        'remarque',
        'observaciones',
    ];

    public function datosActuacion()
    {
        return $this->belongsTo(DatosActuacion::class);
    }
}