<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arma;

class ArmaController extends Controller
{
    public function form()
    {
        // Renderizar el formulario sin datos específicos
        return view('components.forms.arma');
    }

    public function save(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'id_arma' => 'nullable|integer',
            'datos_actuacion_id' => 'required|integer',
            'calidad' => 'nullable|string|max:255',
            'tipoArma' => 'nullable|string|max:255',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'calibre' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'aptaDisparo' => 'nullable|in:Si,No',
            'remarque' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string|max:1000',
        ]);

        try {
            if ($request->filled('id_arma')) {
                // Realiza una actualización si el ID está presente
                $arma = Arma::findOrFail($request->id_arma);
                $arma->update($validatedData);
                $message = 'Arma actualizada correctamente';
            } else {
                // Si no hay ID, realiza un nuevo registro
                $arma = Arma::create($validatedData);
                $message = 'Arma guardada correctamente';
            }

            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar el arma', 'error' => $e->getMessage()], 500);
        }
    }

    public function get($id_arma)
    {
        // Obtener datos de un arma especifica
        $arma = Arma::find($id_arma);

        if ($arma) {
            return response()->json(['success' => true, 'arma' => $arma]);
        } else {
            return response()->json(['success' => false, 'message' => 'Arma no encontrada']);
        }
    }

    public function delete($id_arma)
    {
        // Buscar el arma y eliminarla si existe
        $arma = Arma::find($id_arma);
        
        if ($arma) {
            $arma->delete();
            return response()->json(['success' => true, 'message' => 'Arma eliminada correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Arma no encontrada'], 404);
    }
}