<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DatosActuacion;

class CargaController extends Controller
{
    public function cargarDatos(Request $request)
    {
        // Si no es una solicitud POST y no es AJAX, redirigir
        if (!$request->isMethod('post') && !$request->ajax()) {
            return redirect()->route('dashboard')->with('error', 'Acceso no permitido. Por favor, utilice los botones de la aplicación.');
        }

        // Variables por defecto para una nueva creación
        $id = $request->input('id');
        $fechaActual = Carbon::now()->format('Y-m-d');
        $horaActual = Carbon::now()->format('H:i');
        $datosActuacion = new DatosActuacion();
        $delitos = [];
        $personas = [];
        $vehiculos = [];
        $armas = [];
        $elementos = [];
        $action = 'create';

        // Verificar si se pasa un ID y si existe el registro en la base de datos
        if ($id) {
            $datosActuacion = DatosActuacion::with(['delitos', 'personas', 'vehiculos', 'armas', 'elementos'])->find($id);
            if ($datosActuacion) {
                $fechaActual = $datosActuacion->fechaActuacion;
                $horaActual = Carbon::parse($datosActuacion->horaActuacion)->format('H:i');
                $action = 'update';

                // Cargar las entidades relacionadas solo si existen
                $delitos = $datosActuacion->delitos;
                $personas = $datosActuacion->personas;
                $vehiculos = $datosActuacion->vehiculos;
                $armas = $datosActuacion->armas;
                $elementos = $datosActuacion->elementos;
            } else {
                if ($request->ajax()) {
                    return response()->json(['error' => 'Datos no encontrados para el ID proporcionado.'], 404);
                } else {
                    return redirect()->route('dashboard')->with('error', 'Datos no encontrados para el ID proporcionado.');
                }
            }
        }

        $saveUrl = route('datos-actuacion.save');

        if ($request->ajax()) {
            // Retorna datos en JSON si es una solicitud AJAX
            return response()->json([
                'datosActuacion' => $datosActuacion,
                'fechaActual' => $fechaActual,
                'horaActual' => $horaActual,
                'action' => $action,
                'saveUrl' => $saveUrl,
                'delitos' => $delitos,
                'personas' => $personas,
                'vehiculos' => $vehiculos,
                'armas' => $armas,
                'elementos' => $elementos,
                'success' => session('success') ? 'Datos guardados correctamente.' : null,
            ]);
        }

        // Retorna la vista si no es una solicitud AJAX
        return view('carga', compact('datosActuacion', 'fechaActual', 'horaActual', 'action', 'saveUrl', 'delitos', 'personas', 'vehiculos', 'armas', 'elementos'))
            ->with('success', session('success') ? 'Datos guardados correctamente.' : null);
    }
}
