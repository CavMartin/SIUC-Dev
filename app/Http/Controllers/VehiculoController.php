<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function form()
    {
        // Renderizar el formulario sin datos específicos
        return view('components.forms.vehiculo');
    }

    public function save(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'id_vehiculo' => 'nullable|integer',
            'datos_actuacion_id' => 'required|integer',
            'calidad' => 'nullable|string|max:255',
            'dominio' => 'nullable|string|max:255',
            'tipoVehiculo' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'marca' => 'nullable|string|max:255',
            'motor' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'añoModelo' => 'nullable|integer|digits:4',
            'chasis' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'recuperado' => 'nullable|string|max:255',
            'allanamiento' => 'nullable|boolean',
            'produccion' => 'nullable|in:SI,NO',
            'observaciones' => 'nullable|string|max:1000',
        ]);

        try {
            if ($request->filled('id_vehiculo')) {
                // Realiza una actualización si el ID está presente
                $vehiculo = Vehiculo::findOrFail($request->id_vehiculo);
                $vehiculo->update($validatedData);
                $message = 'Vehículo actualizado correctamente';
            } else {
                // Si no hay ID, realiza un nuevo registro
                $vehiculo = Vehiculo::create($validatedData);
                $message = 'Vehículo guardado correctamente';
            }

            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar el vehículo', 'error' => $e->getMessage()], 500);
        }
    }

    public function get($id_vehiculo)
    {
        // Obtener datos de un vehículo específico
        $vehiculo = Vehiculo::find($id_vehiculo);

        if ($vehiculo) {
            return response()->json(['success' => true, 'vehiculo' => $vehiculo]);
        } else {
            return response()->json(['success' => false, 'message' => 'Vehículo no encontrado']);
        }
    }

    public function delete($id_vehiculo)
    {
        // Buscar el vehículo y eliminarlo si existe
        $vehiculo = Vehiculo::find($id_vehiculo);
        
        if ($vehiculo) {
            $vehiculo->delete();
            return response()->json(['success' => true, 'message' => 'Vehículo eliminado correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Vehículo no encontrado'], 404);
    }
}
