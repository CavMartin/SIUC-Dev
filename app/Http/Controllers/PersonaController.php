<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function form()
    {
        // Renderizar el formulario sin datos específicos
        return view('components.forms.persona');
    }

    public function save(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'id_persona' => 'nullable|integer',
            'datos_actuacion_id' => 'required|integer',
            'calidad' => 'nullable|string|max:255',
            'nn' => 'nullable|boolean',
            'tipoDocumento' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:255',
            'genero' => 'nullable|string|max:255',
            'nombres' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'apellidoMaterno' => 'nullable|string|max:255',
            'alias' => 'nullable|string|max:255',
            'fechaNacimiento' => 'nullable|date',
            'edad' => 'nullable|integer|min:0',
            'estadoCivil' => 'nullable|string|max:255',
            'ocupacion' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'provincia' => 'nullable|string|max:255',
            'departamento' => 'nullable|string|max:255',
            'estadoSalud' => 'nullable|string|max:255',
            'lesionadoCon' => 'nullable|string|max:255',
            'lesionadoOcasión' => 'nullable|string|max:255',
            'caracteristicas' => 'nullable|string|max:1000',
        ]);

        try {
            if ($request->filled('id_persona')) {
                // Realiza una actualización si el ID está presente
                $persona = Persona::findOrFail($request->id_persona);
                $persona->update($validatedData);
                $message = 'Persona actualizada correctamente';
            } else {
                // Si no hay ID, realiza un nuevo registro
                $persona = Persona::create($validatedData);
                $message = 'Persona guardada correctamente';
            }

            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar la persona', 'error' => $e->getMessage()], 500);
        }
    }

    public function get($id_persona)
    {
        // Obtener datos de una persona específica
        $persona = Persona::find($id_persona);

        if ($persona) {
            return response()->json(['success' => true, 'persona' => $persona]);
        } else {
            return response()->json(['success' => false, 'message' => 'Persona no encontrada']);
        }
    }

    public function delete($id_persona)
    {
        // Buscar la persona y eliminarla si existe
        $persona = Persona::find($id_persona);
        
        if ($persona) {
            $persona->delete();
            return response()->json(['success' => true, 'message' => 'Persona eliminada correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Persona no encontrada'], 404);
    }
}