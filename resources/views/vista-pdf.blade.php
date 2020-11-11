<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ $user->name }}<br>
    {{ $direccion->nombre_via }}<br>

    {{ $pedido->id }}<br>
    {{ $pedido->ref }}<br>
    {{ $pedido->total }}<br>
    {{ $pedido->estado }}<br>
    {{ $pedido->observaciones }}<br>
    {{ $pedido->pago }}<br>

    @foreach($lineas as $linea)
        {{ $linea->producto_id }}<br>
        {{ $linea->cantidad }}<br>
        {{ $linea->subtotal }}<br>
    @endforeach


</body>
</html>
