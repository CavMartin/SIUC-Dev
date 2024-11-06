<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StgCas;
use App\Http\Controllers\DatosActuacionController;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\DelitoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ArmaController;
use App\Http\Controllers\ElementoController;


use App\Http\Controllers\JsonEditorController;


// Vista de la landing page
Route::get('/landing', function () {
    return view('landing');
})->name('landing');

// CAS Testing
Route::middleware([StgCas::class])->group(function () {
    Route::get('/logout', function () {
        return view('landing');
    })->name('logout');

    Route::get('/mi-perfil', function (Request $request) {
        $user = $request->attributes->get('user');
        $attributes = $request->attributes->get('attributes');
        return view('mi-perfil', compact('user', 'attributes'));
    })->name('mi-perfil');

    // Vista de la pantalla de inicio
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Ruta para la pantalla de carga que muestra y gestiona el formulario de creación o edición
    Route::match(['get', 'post'], '/carga', [CargaController::class, 'cargarDatos'])->name('carga');

    // Ruta para guardar o actualizar un registro
    Route::post('/datos-actuacion/save', [DatosActuacionController::class, 'save'])->name('datos-actuacion.save');// Ruta GET para mostrar el formulario en el modal
    Route::get('/delito/form', [DelitoController::class, 'form'])->name('delito.form'); // Ruta POST para guardar los datos del formulario de delito
    Route::post('/delito/save', [DelitoController::class, 'save'])->name('delito.save');
    Route::get('/delito/get/{id}', [DelitoController::class, 'get'])->name('delito.get');
    Route::delete('/delito/delete/{id}', [DelitoController::class, 'delete'])->name('delito.delete');

    Route::get('/persona/form', [PersonaController::class, 'form'])->name('persona.form');
    Route::post('/persona/save', [PersonaController::class, 'save'])->name('persona.save');
    Route::get('/persona/get/{id}', [PersonaController::class, 'get'])->name('persona.get');
    Route::delete('/persona/delete/{id}', [PersonaController::class, 'delete'])->name('persona.delete');

    Route::get('/vehiculo/form', [VehiculoController::class, 'form'])->name('vehiculo.form');
    Route::post('/vehiculo/save', [VehiculoController::class, 'save'])->name('vehiculo.save');
    Route::get('/vehiculo/get/{id}', [VehiculoController::class, 'get'])->name('vehiculo.get');
    Route::delete('/vehiculo/delete/{id}', [VehiculoController::class, 'delete'])->name('vehiculo.delete');

    Route::get('/arma/form', [ArmaController::class, 'form'])->name('arma.form');
    Route::post('/arma/save', [ArmaController::class, 'save'])->name('arma.save');
    Route::get('/arma/get/{id}', [ArmaController::class, 'get'])->name('arma.get');
    Route::delete('/arma/delete/{id}', [ArmaController::class, 'delete'])->name('arma.delete');

    Route::get('/elemento/form', [ElementoController::class, 'form'])->name('elemento.form');
    Route::post('/elemento/save', [ElementoController::class, 'save'])->name('elemento.save');
    Route::get('/elemento/get/{id}', [ElementoController::class, 'get'])->name('elemento.get');
    Route::delete('/elemento/delete/{id}', [ElementoController::class, 'delete'])->name('elemento.delete');



    // Vista de la pantalla de formularios cargados
    Route::get('/consulta', function () {
        return view('consulta');
    })->name('consulta');
    Route::get('/consulta', [DatosActuacionController::class, 'index'])->name('consulta');

    // Vista de la pantalla del auditor
    Route::get('/auditoria', function () {
        return view('auditoria');
    })->name('auditoria');

    // Vista del panel de control
    Route::get('/panel-de-control', function () {
        return view('panel-de-control');
    })->name('panel-de-control');

    // Editor de listas
    Route::get('/modificar-lista/{filename}', [JsonEditorController::class, 'read'])->name('json.read');
    Route::post('/modificar-lista/{filename}', [JsonEditorController::class, 'update'])->name('json.update');
});
