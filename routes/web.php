<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;

//Ruta que redirige a /factura
Route::get('/', function () {
    return redirect('/factura');
});

//Ruta que muestra el formulario
Route::get('/factura', [FacturaController::class, 'index']);

//Ruta que procesa el formulario
Route::post('/factura', [FacturaController::class, 'calcular']);
