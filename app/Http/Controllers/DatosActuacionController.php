<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosActuacion;
use Illuminate\Support\Carbon;

class DatosActuacionController extends Controller
{
    // Muestra el formulario para creación o edición en la vista "carga"
    public function form(Request $request)
    {
        $id = $request->input('id');
        $action = $request->input('action', $id ? 'update' : 'create'); // Recibe action o decide por id
    
        try {
            if ($action === 'create') {
                $fechaActual = Carbon::now()->format('Y-m-d');
                $horaActual = Carbon::now()->format('H:i');
                $datosActuacion = new DatosActuacion();
            } elseif ($action === 'update' && $id) {
                $datosActuacion = DatosActuacion::findOrFail($id);
                $fechaActual = $datosActuacion->fechaActuacion;
                $horaActual = Carbon::parse($datosActuacion->horaActuacion)->format('H:i');
            } else {
                abort(404);
            }
    
            return view('carga', compact('datosActuacion', 'fechaActual', 'horaActual', 'action'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al cargar el formulario'], 500);
        }
    }

    // Guardar o actualizar un registro existente según el contexto
    public function save(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $this->validateData($request);
    
        try {
            $datosActuacion = DatosActuacion::updateOrCreate(
                ['id' => $id],
                $validatedData
            );
    
            // Agregar el mensaje de éxito a la sesión
            session()->flash('success', 'Datos de actuación guardados correctamente.');
    
            return response()->json(['success' => true, 'id' => $datosActuacion->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Hubo un problema al guardar el registro.'], 500);
        }
    }    

    // Método privado para validar los datos de entrada
    private function validateData(Request $request)
    {
        return $request->validate([
            'tipoActuacion' => 'required|max:100',
            'numeroActuacion' => 'required|max:20',
            'fechaActuacion' => 'required|date',
            'horaActuacion' => 'required|date_format:H:i',
            'nSumario' => 'required|max:20',
            'unidadRegional' => 'required|max:100',
            'dependenciaPolicial' => 'required|max:100',
            'fuerzaInterviniente' => 'required|max:100',
            'fiscaliaRegional' => 'required|max:100',
            'unidadFiscal' => 'required|max:100',
            'relatoDelHecho' => 'required'
        ]);
    }

    // Mostrar lista de registros
    public function index()
    {        
        try {
            $datos = DatosActuacion::latest()->paginate(10);
            return view('consulta', compact('datos'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al cargar los registros'], 500);
        }
    }
}
