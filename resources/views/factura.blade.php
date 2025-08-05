<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
</head>
<body>
    <h1>Formulario de Factura</h1>

    <!-- Prevenimos errores -->
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario -->
    <form method="POST" action="/factura">
        @csrf <!-- Token de seguridad para proteger el form-->

        <label>Nombre del Cliente:</label><br>
        <input type="text" name="cliente" value="{{ old('cliente') }}"><br><br>

        <label>Nombre del Producto:</label><br>
        <input type="text" name="producto" value="{{ old('producto') }}"><br><br>

        <label>Cantidad:</label><br>
        <input type="number" name="cantidad" value="{{ old('cantidad') }}"><br><br>

        <label>Precio Unitario:</label><br>
        <input type="number" name="precio" step="0.01" value="{{ old('precio') }}"><br><br>

        <label>IVA (%):</label><br>
        <input type="number" name="iva" step="0.01" value="{{ old('iva') }}"><br><br>

        <button type="submit">Calcular Total</button>
    </form>

    <!-- Mostrar los resultados-->
    @isset($total)
        <hr>
        <h2>Resultado de la Factura</h2>
        <p><strong>Cliente:</strong> {{ $cliente }}</p>
        <p><strong>Producto:</strong> {{ $producto }}</p>
        <p><strong>Cantidad:</strong> {{ $cantidad }}</p>
        <p><strong>Precio unitario:</strong> ${{ number_format($precio, 2) }}</p>
        <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
        <p><strong>IVA ({{ $iva }}%):</strong> ${{ number_format($valor_iva, 2) }}</p>
        <p><strong>Total a pagar:</strong> ${{ number_format($total, 2) }}</p>
    @endisset
</body>
</html>
