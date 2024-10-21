<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosActuacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('main');
});
Route::post('/datos-actuacion', [DatosActuacionController::class, 'store'])->name('datos-actuacion.store');
