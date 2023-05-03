<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--<meta charset="UTF-8">-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Alimentos Macanudo</title>
    <!-- ESTILOS CSS -->
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css')}}">--}}
    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        :root {
            --lila: #f4aeaa;
            --rojo: #f04643;
            --amarillo: #dab827;
            --azul: #4554a4;
            --verde: #70802c;
            --verde-claro: #92ad3d;

            --blanco: #e1e1e1;
            --mas-blanco: #ececec;
            --negro: #1e1e1e;
            --gris: #e5e6e1;
            --gris-oscuro: #5c5c5c;
        }

.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}

.container-fluid {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

header{
    background-color: #1e1e1e;
}

.text-center {
    text-align: center;
}

.p-1 {
  padding: 0.25rem !important;
}
.py-5 {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

.pt-3,
.py-3 {
  padding-top: 1rem !important;
}

.pr-3,
.px-3 {
  padding-right: 1rem !important;
}

.pb-3,
.py-3 {
  padding-bottom: 1rem !important;
}
.pr-1,
.px-1 {
  padding-right: 0.25rem !important;
}

.pb-1,
.py-1 {
  padding-bottom: 0.25rem !important;
}

.pl-1,
.px-1 {
  padding-left: 0.25rem !important;
}


.text-dark {
  color: #5c5c5c !important;
}

a.text-dark:hover, a.text-dark:focus {
  color: #1e1e1e !important;
}

h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: 0.5rem;
}

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  margin-bottom: 0.5rem;
  font-family: inherit;
  font-weight: 500;
  line-height: 1.2;
  color: inherit;
}
h3, .h3 {
  font-size: 1.75rem;
}
h4, .h4 {
  font-size: 1.5rem;
}

h5, .h5 {
  font-size: 1.25rem;
}

.mt-3,
.my-3 {
  margin-top: 1rem !important;
}
.mb-1,
.my-1 {
  margin-bottom: 0.25rem !important;
}
.mr-5,
.mx-5 {
  margin-right: 3rem !important;
}
.ml-5,
.mx-5 {
  margin-left: 3rem !important;
}



.font-weight-bold {
  font-weight: 700 !important;
}




    </style>
</head>
<body style="background-color: #ececec; margin:0; padding:0;">

    <header class="text-center py-5" style="">
        <img src="{{asset('/storage/img/maca.1.png')}}" width="250px" alt="logo de Macanudo"> 
        {{--<div class="h3 font-weight-bold" style="color: #e1e1e1;">{{env('APP_NAME')}}</div>--}}
    </header>

    <div class="container py-5 text-dark">
        

        <div class="">
            <div class="h5 mt-3 p-1 mb-1 font-weight-bold" style="color: #70802c;">Muchas gracias por unirse al Club Macanudo!</div>
            <div class="py-5 px-3 text-center">
                <div class="h4 py-3 px-1 mx-5" style="background-color: #92ad3d; color: #e1e1e1;">Su suscripción se realizó correctamente.</div>
            </div>

        </div>

        <p class="text-secondary" style="color: #5c5c5c;">
            
            Recibirás una canasta con {{$suscripcion->cantidad_de_quesos}} quesos cada {{Str::lower($suscripcion->dia_de_entrega)}}.
            <br>
            La dirección definida para recibir el pedido es {{$suscripcion->direccion_de_entrega}}.
            <br>
            El costo de la suscripción es de ${{$suscripcion->precio}}, y deberás pagar con Mercado Pago, transferencia o efectivo, al recibir los productos.
            <br><br>
            Iniciando sesión en <a href="{{env('APP_URL')}}" target="_blank">{{env('APP_NAME')}}.com</a> con tu usuario y contraseña, podés editar tus datos personales y las características de la suscripción.
        </p>
        
        <p class="" style="color: #5c5c5c;">
            Podés cancelar tu suscripción haciendo click en este 
            <a href="{{URL::signedRoute('confirmar_cancelacion', ['suscripcion' => $suscripcion->id])}}" target="_blank">link</a>.
        </p>
        <br><br>
        <p class="" style="color: #5c5c5c;" style="">Saludos cordiales.</p>
        <div class="text-center">
            <div class="h3"><a href="{{env('APP_URL')}}" target="_blank" >{{env('APP_NAME')}}.com</a></div>
        </div>
        <hr>
        <p class="" style="color: #5c5c5c;">
            Ante cualquier consulta o reclamo comunicate al email <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">{{env('MAIL_FROM_ADDRESS')}}</a>
        </p>

    </div>
    


</body>
</html>