<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elemento;

class ElementoController extends Controller
{
    public function form()
    {
        // Renderizar el formulario sin datos específicos
        return view('components.forms.elemento');
    }

    public function save(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'id_elemento' => 'nullable|integer',
            'datos_actuacion_id' => 'required|integer',
            'calidad' => 'nullable|string|max:255',
            'elemento' => 'nullable|string|max:255',
            'cantidad' => 'nullable|integer',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'codigoArea' => 'nullable|string|max:10',
            'telefono' => 'nullable|string|max:20',
            'produccionPrimaria' => 'required|in:Si,No',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        try {
            if ($request->filled('id_elemento')) {
                // Realiza una actualización si el ID está presente
                $elemento = Elemento::findOrFail($request->id_elemento);
                $elemento->update($validatedData);
                $message = 'Elemento actualizado correctamente';
            } else {
                // Si no hay ID, realiza un nuevo registro
                $elemento = Elemento::create($validatedData);
                $message = 'Elemento guardado correctamente';
            }

            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar el elemento', 'error' => $e->getMessage()], 500);
        }
    }

    public function get($id_elemento)
    {
        // Obtener datos de un elemento especifico
        $elemento = Elemento::find($id_elemento);

        if ($elemento) {
            return response()->json(['success' => true, 'elemento' => $elemento]);
        } else {
            return response()->json(['success' => false, 'message' => 'Elemento no encontrado']);
        }
    }

    public function delete($id_elemento)
    {
        // Buscar el elemento y eliminarlo si existe
        $elemento = Elemento::find($id_elemento);
        
        if ($elemento) {
            $elemento->delete();
            return response()->json(['success' => true, 'message' => 'Elemento eliminado correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Elemento no encontrado'], 404);
    }
}