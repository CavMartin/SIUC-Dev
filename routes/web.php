<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosActuacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/carga', function () {
    return view('carga');
})->name('carga');
Route::get('/formulario-delito/{index}', function ($index) {
    return view('forms.delito', ['index' => $index]);
})->name('formulario-delito');
Route::get('/formulario-persona/{index}', function ($index) {
    return view('forms.persona', ['index' => $index]);
})->name('formulario-persona');
Route::get('/formulario-vehiculo/{index}', function ($index) {
    return view('forms.vehiculo', ['index' => $index]);
})->name('formulario-vehiculo');
Route::get('/formulario-arma/{index}', function ($index) {
    return view('forms.arma', ['index' => $index]);
})->name('formulario-arma');
Route::get('/formulario-elemento/{index}', function ($index) {
    return view('forms.elemento', ['index' => $index]);
})->name('formulario-elemento');

Route::post('/datos-actuacion', [DatosActuacionController::class, 'store'])->name('datos-actuacion.store');

Route::get('/consulta', function () {
    return view('consulta');
})->name('consulta');

Route::get('/auditoria', function () {
    return view('auditoria');
})->name('auditoria');