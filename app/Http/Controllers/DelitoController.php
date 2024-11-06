<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Delito;

class DelitoController extends Controller
{
    public function form()
    {
        // Renderizar el formulario sin datos específicos
        return view('components.forms.delito');
    }

    public function save(Request $request)
    {
        // Asegurar que `horaHecho` solo tenga horas y minutos antes de validar
        if ($request->has('horaHecho')) {
            $request->merge([
                'horaHecho' => Carbon::parse($request->input('horaHecho'))->format('H:i')
            ]);
        }
    
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'id_delito' => 'nullable|integer',
            'datos_actuacion_id' => 'required',
            'fechaHecho' => 'required|date',
            'horaHecho' => 'required|date_format:H:i',
            'delitoGeneral' => 'required',
            'agravado' => 'nullable|boolean',
            'tentativa' => 'nullable|boolean',
            'tematica' => 'required',
            'tipologia' => 'required',
            'modalidad' => 'required',
            'entidadAtacada' => 'required',
            'nombreEntidad' => 'nullable|string|max:255',
            'tipoLugar' => 'required',
            'departamento' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'barrio' => 'nullable|string|max:255',
            'calle' => 'nullable|string|max:255',
            'interseccion' => 'nullable|string|max:255',
        ]);
    
        try {
            if ($request->filled('id_delito')) {
                // Realiza una actualización si el ID está presente
                $delito = Delito::findOrFail($request->id_delito); // Asegura que el ID existe
                $delito->update($validatedData);
                $message = 'Delito actualizado correctamente';
            } else {
                // Si no hay ID, realiza un nuevo registro
                $delito = Delito::create($validatedData);
                $message = 'Delito guardado correctamente';
            }
    
            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar el delito', 'error' => $e->getMessage()], 500);
        }
    }    

    public function get($id_delito)
    {
        // Obtener datos de un delito especifico
        $delito = Delito::find($id_delito);
    
        if ($delito) {
            return response()->json(['success' => true, 'delito' => $delito]);
        } else {
            return response()->json(['success' => false, 'message' => 'Delito no encontrado']);
        }
    }    

    public function delete($id_delito)
    {
        // Buscar el delito y eliminarlo si existe
        $delito = Delito::find($id_delito);
        
        if ($delito) {
            $delito->delete();
            return response()->json(['success' => true, 'message' => 'Delito eliminado correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Delito no encontrado'], 404);
    }
}
