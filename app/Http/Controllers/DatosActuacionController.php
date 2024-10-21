<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosActuacion;

class DatosActuacionController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'tipoActuacion' => 'required|max:100',
            'numeroActuacion' => 'required|max:20',
            'fechaActuacion' => 'required|date',
            'horaActuacion' => 'required|date_format:H:i',
            'nSumario' => 'required|max:20',
            'instruyeActuacion' => 'required|max:100',
            'unidadFiscal' => 'required|max:100',
            'fuerzaInterviniente' => 'required|max:100',
            'unidadRegional' => 'required|max:100',
            'relatoDelHecho' => 'required'
        ]);
    
        // Crear una nueva entrada en la base de datos
        DatosActuacion::create($validated);
    
        // Guardar mensaje de éxito en la sesión
        return redirect()->back()->with('success', 'Datos guardados correctamente.');
    }
    
}
