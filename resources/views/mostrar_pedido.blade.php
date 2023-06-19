@extends('layouts.plantilla')

@section('title', 'Ver Pedido')
@section('meta-description', 'metadescripcion para la pagina de ver pedido')
    
    
@section('content')


<div class="container text-white">

    {{--<div class="text-center text-white mt-5">
        
        <h3>Gracias por su compra.</h3>
        
        <h5>Podes ver tu pedido en este <a href="{{URL::signedRoute('ver_pedido', ['pedido' => $pedido->id])}}" target="_blank">link</a>.</h5>
    </div>--}}
    <h4 class="text-center pt-2">Pedido id: {{$pedido->id}}</h4>
    
    <div class="row mb-5 mt-2">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        
            <table>
                <style>
                    tr {
                        border-bottom: 1px solid #ddd;
                        text-align: right;
                    }
                </style>
                <tr><td>Id: </td><td>{{$pedido->id}}</td></tr>
                <tr><td>Status: </td><td>{{$pedido->status}}</td></tr>
                <tr><td>Tipo de cliente: </td><td>{{$pedido->tipo_de_cliente}}</td></tr>
                <tr><td>Medio de pago: </td><td>{{$pedido->medio_de_pago}}</td></tr>
                <tr><td>Estado del pago: </td><td>{{$pedido->estado_del_pago}}</td></tr>
                {{--<tr><td>Tipo: </td><td>{{$pedido->tipo}}</td></tr>--}}
                
                <tr><td>Medio de pago: </td><td>{{$pedido->medio_de_pago}}</td></tr>
                <tr><td>Numero de factura: </td><td>{{$pedido->numero_de_factura}}</td></tr>

                <tr>
                    <td>Productos: </td>
                    <td>
                        {{--<small>{{ $pedido->detalleDeProductos() }}</small>--}}
                        <small>
                            <ul>
                                @php
                                    $suma_de_productos = 0;
                                @endphp
                                @foreach($pedido->productos as $producto)
                                    @php
                                        $suma_de_productos += $producto->precio * $producto->pivot->unidades;
                                    @endphp
                                    <li>{{ $producto->nombre }} ($ {{$producto->precio}}) x {{ $producto->pivot->unidades }}</li>
                                @endforeach
                                 
                            </ul>
                        </small>

                    </td>
                </tr>
                
                <tr><td>Suma de productos: </td><td>$ {{$suma_de_productos}}</td></tr>
                <tr><td>Costo de envio: </td><td>id:{{$pedido->costo_de_envio_id}} | zona: {{$pedido->costo_de_envio->region}} | costo: $ {{$pedido->costo_de_envio->costo_de_envio}}</td></tr>
                <tr><td>Monto total: </td><td>{{$pedido->monto}} $</td></tr>
                @if($pedido->costo_de_envio)
                <tr><td>Dia de entrega: </td><td>{{$pedido->costo_de_envio->dia_de_entrega}}</td></tr>
                <tr><td>Hora de entrega: </td><td>{{$pedido->costo_de_envio->hora_de_entrega}}</td></tr>
                @endif
                <tr><td>Nombre: </td><td>{{$pedido->nombre}}</td></tr>
                <tr><td>Email: </td><td>{{$pedido->email}}</td></tr>
                <tr><td>C.I.: </td><td>{{$pedido->documento_de_identidad}}</td></tr>
                <tr><td>Telefono: </td><td>{{$pedido->telefono}}</td></tr>
                <tr><td>Dirección: </td><td>{{$pedido->direccion}}</td></tr>
                <tr><td>Localidad: </td><td>{{$pedido->localidad}}</td></tr>
                <tr><td>Departamento: </td><td>{{$pedido->departamento}}</td></tr>
                {{--<tr><td>Pais: </td><td>{{$pedido->pais}}</td></tr>--}}
                {{--<tr><td>User_id: </td><td>{{$pedido->user_id}}</td></tr>--}}
                
                <tr>
                    <td>Canasta: </td>
                    <td class="align-left">
                        @if(isset($pedido->canasta))
                        {{$pedido->canasta->nombre}}
                        <small>
                            @foreach($pedido->canasta->productos as $producto)
                                <p class="m-0 p-0">{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</p>
                            @endforeach
                        </small>
                        @else
                        No
                        @endif
                    </td>
                </tr>
                
                {{--<tr><td>Costo de envio(): </td><td>{{$pedido->costo_de_envio()}}</td></tr>--}}
                
                <tr><td>Cupon id: </td><td>{{$pedido->cupon_id}}</td></tr>
                <tr><td>Suscripcion id: </td><td>{{$pedido->suscripcion_id}}</td></tr>
                
                {{--<tr><td>Tipo de cliente: </td><td>{{$pedido->tipo_de_cliente}}</td></tr>--}}
                
                {{--<tr><td>Recibir novedades: </td><td>{{$pedido->recibir_novedades}}</td></tr>--}}
                <tr><td>Creado: </td><td>{{$pedido->created_at}}</td></tr>
                {{--<tr><td>Editado: </td><td>{{$pedido->updated_at}}</td></tr>--}}
                
            </table>


        </div>
        <div class="col-md-3"></div>
    </div>


</div>


@endsection


