<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se ha recibido un nuevo pedido</title>
</head>
<body>
    
    <h2>Pedido de {{$pedido->nombre}} <small>({{$pedido->email}})</small>.</h2>    

    <hr>
    <h5>Ver <a href="{{URL::signedRoute('ver_pedido', ['pedido' => $pedido->id])}}" target="_blank">pedido</a>.</h5>

    <hr>

    <table>
        <style>
            tr {
                border-bottom: 1px solid rgb(112, 112, 112);
                text-align: right;
            }
        </style>
        <tr><td>Id: </td><td>{{$pedido->id}}</td></tr>
        <tr><td>Status: </td><td>{{$pedido->status}}</td></tr>
        <tr><td>Tipo: </td><td>{{$pedido->tipo}}</td></tr>
        <tr><td>Monto: </td><td>{{$pedido->monto}} $</td></tr>

        <tr>
            <td>Productos: </td>
            <td>
                <ul>
                    @foreach($pedido->productos as $producto)
                        <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        
        <tr><td>Nombre: </td><td>{{$pedido->nombre}}</td></tr>
        <tr><td>Email: </td><td>{{$pedido->email}}</td></tr>
        <tr><td>Telefono: </td><td>{{$pedido->telefono}}</td></tr>

        @if($pedido->documento_de_identidad != 9999999)
            <tr><td>C.I.: </td><td>{{$pedido->documento_de_identidad}}</td></tr>
        @endif

        <tr><td>Region del costo de envio: </td><td>{{$pedido->costo_de_envio->region}}</td></tr>
        
        @if($pedido->direccion != 'el pedido se retira en la planta')
            <tr><td>Dirección: </td><td>{{$pedido->direccion}}</td></tr>
            <tr><td>Localidad: </td><td>{{$pedido->localidad}}</td></tr>
            <tr><td>Departamento: </td><td>{{$pedido->departamento}}</td></tr>
            <tr><td>Pais: </td><td>{{$pedido->pais}}</td></tr>
        @endif

        @if($pedido->user_id)
            <tr><td>User id: </td><td>{{$pedido->user_id}}</td></tr>
        @endif

        @if($pedido->canasta_id)
        <tr><td>Canasta id: </td><td>{{$pedido->canasta_id}}</td></tr>
        @endif
        
        @if($pedido->cupon_id)
            <tr><td>Cupon id: </td><td>{{$pedido->cupon_id}}</td></tr>
        @endif

        {{--<tr><td>Tipo de cliente: </td><td>{{$pedido->tipo_de_cliente}}</td></tr>--}}
        <tr><td>Medio de pago: </td><td>{{$pedido->medio_de_pago}}</td></tr>
        <tr><td>Numero de factura: </td><td>{{$pedido->numero_de_factura}}</td></tr>
        
        <tr><td>Recibir novedades: </td><td>{{$pedido->recibir_novedades}}</td></tr>
        <tr><td>Creado: </td><td>{{$pedido->created_at}}</td></tr>
        <tr><td>Editado: </td><td>{{$pedido->updated_at}}</td></tr>
        
    </table>

    
</body>
</html>