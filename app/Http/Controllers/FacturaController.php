<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    //Esta función muestra el formulario
    public function index()
    {
        //Retorno la vista que está en resources/views/factura.blade.php
        return view('factura');
    }

    //Esta función procesa el formulario
    public function calcular(Request $request)
    {
        //Validamos los datos que recogemos del formulario
        $request->validate([
            'cliente' => 'required',
            'producto' => 'required',
            'cantidad' => 'required|numeric|min:1',
            'precio' => 'required|numeric|min:0',
            'iva' => 'nullable|numeric|min:0',
        ]);

        //Capturamos los datos
        $cliente = $request->input('cliente');
        $producto = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $precio = $request->input('precio');
        $iva = $request->input('iva', 15); //Si no se pone IVA, se asume 15%

        //Se calcula el subtotal
        $subtotal = $cantidad * $precio;

        //Se calcula el valor del IVA
        $valor_iva = $subtotal * ($iva / 100);

        //Se calcula el total a pagar
        $total = $subtotal + $valor_iva;

        //Retornar la vista con los resultados
        return view('factura', compact('cliente', 'producto', 'cantidad', 'precio', 'iva', 'subtotal', 'valor_iva', 'total'));
    }
}
