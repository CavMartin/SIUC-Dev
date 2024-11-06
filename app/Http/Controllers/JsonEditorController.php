<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JsonEditorController extends Controller
{
    public function read($filename)
    {
        $path = public_path("json/{$filename}.json");  // Ajustar la ruta
    
        if (!file_exists($path)) {
            // Redirige con un mensaje de error si el archivo no existe
            return redirect()->back()->withErrors(['error' => "El archivo {$filename}.json no existe."]);
        }
    
        // Leer el contenido del JSON
        $jsonContent = file_get_contents($path);
        $jsonData = json_decode($jsonContent, true);
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            return redirect()->back()->withErrors(['error' => 'Error al decodificar el archivo JSON.']);
        }
    
        // Renderizar la vista con los datos
        return view('modificar-lista', compact('jsonData', 'filename'));
    }    

    public function update(Request $request, $filename)
    {
        // Validar que se haya enviado la estructura JSON
        $request->validate([
            'jsonData' => 'required|array',
        ]);
    
        $jsonData = $request->input('jsonData');
    
        // Definir la ruta del archivo JSON en public/json
        $path = public_path("json/{$filename}.json");
    
        // Guardar el JSON modificado en el archivo
        $result = file_put_contents($path, json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
        if ($result === false) {
            return redirect()->back()->withErrors(['error' => 'Error al guardar el archivo JSON.']);
        }
    
        return redirect()->route('json.read', $filename)
                         ->with('success', 'Listado actualizado correctamente.');
    }
    
}
