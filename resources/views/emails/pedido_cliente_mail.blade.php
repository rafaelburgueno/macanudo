<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gracias por su compra.</title>
</head>
<body>

    <h3>Muchas gracias por su compra.</h3>

    {{--<h5>Podes ver tu pedido en este <a href="{{URL::signedRoute('ver_pedido', ['pedido' => $pedido->id])}}" target="_blank">link</a>.</h5>--}}

    <p></p>
    <p>Su pedido de 
    <ul>
        @foreach($pedido->productos as $producto)
            <li>{{ $producto->pivot->unidades }} unidades de {{ $producto->nombre }} </li>
        @endforeach
    </ul>
    
    se realizó correctamente.</p>
    <hr>
    <p>Ante cualquier consulta o reclamo comunicarse al email <a href="mailto:contacto@macanudonoqueso.com">contacto@macanudonoqueso.com</a> </p>
    <p></p>

    {{--<table>
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
        <tr><td>C.I.: </td><td>{{$pedido->documento_de_identidad}}</td></tr>
        <tr><td>Telefono: </td><td>{{$pedido->telefono}}</td></tr>
        <tr><td>Dirección: </td><td>{{$pedido->direccion}}</td></tr>
        <tr><td>Localidad: </td><td>{{$pedido->localidad}}</td></tr>
        <tr><td>Departamento: </td><td>{{$pedido->departamento}}</td></tr>
        <tr><td>Pais: </td><td>{{$pedido->pais}}</td></tr>
        <tr><td>User_id: </td><td>{{$pedido->user_id}}</td></tr>
        
        <tr><td>Canasta_id: </td><td>{{$pedido->canasta_id}}</td></tr>
        <tr><td>Costo de envio: </td><td>{{$pedido->costo_de_envio_id}}</td></tr>
        <tr><td>Cupon id: </td><td>{{$pedido->cupon_id}}</td></tr>
        
        <tr><td>Tipo de cliente: </td><td>{{$pedido->tipo_de_cliente}}</td></tr>
        <tr><td>Medio de pago: </td><td>{{$pedido->medio_de_pago}}</td></tr>
        <tr><td>Numero de factura: </td><td>{{$pedido->numero_de_factura}}</td></tr>
        
        <tr><td>Recibir novedades: </td><td>{{$pedido->recibir_novedades}}</td></tr>
        <tr><td>Creado: </td><td>{{$pedido->created_at}}</td></tr>
        <tr><td>Editado: </td><td>{{$pedido->updated_at}}</td></tr>
        
    </table>--}}

    <hr>

    <h2>Macanudonoqueso.com</h2>
    
</body>
</html>