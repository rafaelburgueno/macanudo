<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gracias por suscribirse.</title>
</head>
<body>

    <h3>Muchas gracias por suscribirse al Club Macanudo.</h3>

    {{--<h5>Podes ver tu pedido en este <a href="{{URL::signedRoute('ver_pedido', ['pedido' => $pedido->id])}}" target="_blank">link</a>.</h5>--}}

    <!-- detalles de la suscripcion-->
    <h4>Detalles de la suscripción</h4>
    <p>Su suscripción al Club Macanudo, se realizó correctamente.</p>
    <p>Recibirás una canasta con {{$suscripcion->cantidad_de_quesos}} quesos cada {{$suscripcion->dia_de_entrega}}.</p>
    <p>La dirección definida para recibir el pedido es {{$suscripcion->direccion_de_entrega}}</p>
    <p>El costo de la suscripción es de ${{$suscripcion->precio}}, y deberás pagar con Mercado Pago, transferencia o efectivo al recibir los productos.</p>
    <p>Iniciando sesión en <a href="{{env('APP_URL')}}" target="_blank">{{env('APP_NAME')}}.com</a> con tu usuario y contraseña, podés editar tus datos personales y las características de la suscripción.</p>
    

    
    {{--<p>
        Su pedido de 
        @foreach($pedido->productos as $producto)
            @if($loop->first)
                
            @elseif($loop->last)
                y
            @else
                ,
            @endif
            {{ $producto->pivot->unidades }}
            @if($producto->pivot->unidades > 1)
                unidades de
            @else
                unidad de
            @endif
            {{ $producto->nombre }} 
                
        @endforeach
    , se realizó correctamente.
    </p>
    

    @if($pedido->direccion == 'el pedido se retira en la planta')
        <p>
            Puede retirar su pedido de lunes a viernes {{$pedido->costo_de_envio->hora_de_entrega}}, en nuestra planta ubicada 
            en calle los Coronillas casi De Los Ombues, La Floresta, Canelones.
        </p>
    @else
        @if($pedido->costo_de_envio)
        <p>
            La entrega de pedidos en su zona se realiza {{$pedido->costo_de_envio->dia_de_entrega}}, 
            en el horario {{$pedido->costo_de_envio->hora_de_entrega}}.
        </p>
        @endif
    @endif--}}

    <p>Podés cancelar tu suscripción en cualquier momento haciendo click en este <a href="{{URL::signedRoute('cancelar_suscripcion', ['suscripcion' => $suscripcion->id])}}" target="_blank">link</a>.</p>

    {{--<p>Ante cualquier consulta o reclamo comunicarse al email <a href="mailto:contacto@macanudonoqueso.com">contacto@macanudonoqueso.com</a> </p>--}}
    <p>Ante cualquier consulta o reclamo comunicate al email <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">{{env('MAIL_FROM_ADDRESS')}}</a> </p>
    

    <p>Saludos cordiales.</p>

    <h2><a href="{{env('APP_URL')}}" target="_blank">{{env('APP_NAME')}}.com</a></h2>
    
</body>
</html>