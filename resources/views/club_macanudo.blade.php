@extends('layouts.plantilla')

@section('title', 'Club Macanudo')
@section('meta-description', 'Obtén una canasta de productos cada mes con nuestra suscripción, y disfruta de la comodidad de recibirlos directamente en tu hogar. ¡Únete al Club Macanudo hoy!')
    
    
@section('content')


<div>
    <br>
    <img src="{{asset('/storage/img/club-macanudo.png')}}" class="nav d-block w-100" alt="Imagen con productos de Macanudo, con el sobreimpreso '¿Te encanta Macanudo?'">
    <br><br>
</div>



<div class="container-fluid">
    <div class="row mt-3  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center text-shadow" style="color: var(--gris);">
                ¡Tenemos una canasta especial para ti!
                <br> 
                <img src="{{asset('/storage/img/canasta.png')}}" width="25%" alt="Ilustración de una canasta con productos de Macanudo">
            </h1>
            <br>
        </div>
    </div>
</div>



<div class="mt-5 mr-0 mb-5 ml-0 container-fluid">
    <div class="row">
        <div class="col text-center">
            <a href="" class=" btn1 btn-club " data-toggle="modal" data-target="#suscribirme_al_club">
                Sé parte de nuestro club
            </a>
        </div>
    </div>
</div>
<br>

{{--</div>{{--TODO: creo que este div esta perdido --}}

<div class="container-fluid">

    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h2 class="text-center scroll-content fadeLeft" style=" color: var(--azul) ;">
                y cada mes <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-calendar2-check ml-3" viewBox="0 0 16 16">
                    <path
                        d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                </svg></h2><br>

        </div>
    </div>

    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h3 class="text-center  scroll-content fadeLeft" style=" color: var(--verde) ;">
                recibirás en tu casa <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                    fill="currentColor" class="bi bi-door-open ml-3" viewBox="0 0 16 16">
                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                    <path
                        d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                </svg></h3><br>

        </div>
    </div>

    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--verde-claro) ;">
                una canasta <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-basket ml-3" viewBox="0 0 16 16">
                    <path
                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                </svg></h1><br>

        </div>
    </div>

    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h3 class="text-center  scroll-content fadeLeft" style="line-height:50px; color: var(--amarillo) ;">
                con nuestros productos variados <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                    fill="currentColor" class="bi bi-layout-wtf ml-3" viewBox="0 0 16 16">
                    <path
                        d="M5 1v8H1V1h4zM1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm13 2v5H9V2h5zM9 1a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9zM5 13v2H3v-2h2zm-2-1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H3zm12-1v2H9v-2h6zm-6-1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H9z" />
                </svg></h3><br>

        </div>
    </div>

    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--rojo) ;">
                entre los clásicos de
                siempre <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-star-fill ml-3" viewBox="0 0 16 16">
                    <path
                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                </svg></h1><br>

        </div>
    </div>

    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--lila) ;"> y las
                ediciones limitadas<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                    fill="currentColor" class="bi bi-award  ml-3" viewBox="0 0 16 16">
                    <path
                        d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                </svg></h1><br><br>

        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center text-white">¿Te encantan los beneficios?</h1><br><br>

        </div>
    </div>
    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h2 class="text-center  scroll-content fadeLeft" style=" color: var(--gris) ;">
                Estas en el lugar correcto</h2><br><br>
        </div>
    </div>
    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h3 class="text-center  scroll-content fadeLeft" style=" color: var(--lila) ;">
                los quesos del club</h3><br><br>
        </div>
    </div>
    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--rojo) ;">
                tienen descuentos</h1><br><br>
        </div>
    </div>
    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--amarillo) ;">
                el packaging es más sustentable <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                    fill="currentColor" class="bi bi-box2-heart ml-3" viewBox="0 0 16 16">
                    <path d="M8 7.982C9.664 6.309 13.825 9.236 8 13 2.175 9.236 6.336 6.31 8 7.982Z" />
                    <path
                        d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5Zm0 1H7.5v3h-6l2.25-3ZM8.5 4V1h3.75l2.25 3h-6ZM15 5v10H1V5h14Z" />
                </svg></h1><br>
        </div>
    </div>
    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h4 class="text-center  scroll-content fadeLeft" style=" color: var(--verde-claro) ;">
                y como si fuera poco</h4><br>
        </div>
    </div>
    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h2 class="text-center  scroll-content fadeLeft" style=" color: var(--verde) ;">
                en el mes de tu cumpleaños <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                    fill="currentColor" class="bi bi-gift ml-3" viewBox="0 0 16 16">
                    <path
                        d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z" />
                </svg></h2><br>
        </div>
    </div>
    <div class="row  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--azul) ;">
                AUMENTAMOS<br>TU CANASTA</h1><br><br>
        </div>
    </div>
</div>





{{--
<div class="container-fluid ">

    <div class="row text-center">
        <div class="col-sm-2 mt-3"></div><br>
        <div class="col-sm-4  mt-3 border-bottom border-light text-light">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--rojo) ;">
                Canasta<br>3 quesos</h1>
            <img src="{{asset('/storage/img/canasta.png')}}" width="60%">
            <p>aca va una caracteristica </p>
            <p>aca va otra</p>
            <p>aca va otra</p>
            <h4 class="text-center  scroll-content fadeLeft" style="line-height:50px; color: var(--amarillo) ;">
                con 15% de descuento</h4>
            <h1 class="text-center" style=" color: var(--rojo) ;">
                $969 x mes</h1><span class="border-bottom"></span>

        </div><br>
        <div class="col-sm-4  mt-3 border-bottom border-light text-light">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--lila) ;">
                Canasta<br> 5 quesos</h1>
            <img src="{{asset('/storage/img/canasta.png')}}" width="60%">
            <p>aca va una caracteristica </p>
            <p>aca va otra</p>
            <p>aca va otra</p>
            <h4 class="text-center  scroll-content fadeLeft" style="line-height:50px; color: var(--amarillo) ;">
                con 18% de descuento</h4>
            <h1 class="text-center" style=" color: var(--lila) ;">
                $1599 x mes</h1><span class=""></span>

        </div><br>
        <div class="col-sm-2 mt-3"></div><br>

    </div><br><br><br>
</div>

<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm-2 mt-3"></div><br>
        <div class="col-sm-4  mt-3  mr-1 text-light  border border-2 border-light">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--rojo) ;">
                Canasta<br>3 quesos</h1><br>
            <img src="{{asset('/storage/img/tabla_con_quesos.jpeg')}}" width="60%">
            <p>un queso roque</p>
            <p>aca va otra</p>
            <p>aca va otra</p>
            <h4 class="text-center  scroll-content fadeLeft" style="line-height:50px; color: var(--amarillo) ;">
                con 15% de descuento</h4>
            <h1 class="text-center" style=" color: var(--rojo) ;">
                $969</h1>
        </div><br>
        <div class="col-sm-4  mt-3 mr-1 text-light  border border-2 border-lila">
            <h1 class="text-center  scroll-content fadeLeft" style=" color: var(--lila) ;">
                Canasta<br> 5 quesos</h1><br>
            <img src="{{asset('/storage/img/tabla_con_quesos.jpeg')}}" width="60%">
            <p>aca va una caracteristica </p>
            <p>aca va otra</p>
            <p>aca va otra</p>
            <h4 class="text-center  scroll-content fadeLeft" style="line-height:50px; color: var(--amarillo) ;">
                con 18% de descuento</h4>
            <h1 class="text-center" style=" color: var(--lila) ;">
                $1599 x mes</h1>
        </div><br>
        <div class="col-sm-2 mt-3"></div><br>

    </div>
</div>
<br><br>--}}







<!--boton unirme-->
<div class="mt-3 mr-0 mb-3 ml-0 container-fluid">
    <div class="row">

        <div class="col text-center">
            <a href="" class=" btn1 btn-club link" data-toggle="modal"
                data-target="#suscribirme_al_club">unirme al club</a>

            <p>

            </p>
        </div>
    </div>
</div>



<!--METODO DE PAGOS METODO DE PAGOS METODO DE PAGOS METODO DE PAGOS-->
{{--<div class="ml-0 mt-0 mr-0 mb-0 container-fluid">
    <h3 class="text-center btn-blanco negro">
        <a class="" data-toggle="modal" data-target="#politicas_envio">
            MÉTODOS DE PAGO
        </a>
    </h3><br>
</div>
<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-2  text-center">
            <img src="{{asset('/storage/img/mercadopago-icon.png')}}" max-width="60%">
        </div>
        <div class="col-sm-2 text-center">
            <img src="{{asset('/storage/img/transf.png')}}" max-width="60%">
        </div>

        <div class="col-sm-2 text-center">
            <img src="{{asset('/storage/img/efect (1).png')}}" max-width="60%">
        </div>
        <div class="col-sm-3"></div>

    </div>
</div><br><br>--}}



<!--cancelar cancelar cancelar cancelar-->
{{--<div class="ml-0 mt-0 mr-0 mb-0 container-fluid">
    <h3 class="text-center btn-blanco negro">
        <a class="" data-toggle="modal" data-target="#politicas_envio">
            la suscripción podrá cancelarse en cualquier momento
        </a>
    </h3><br>
</div>--}}



<!--terminos y condiciones-->
<div class="mt-1 mr-0 mb-5 ml-0 container-fluid">
    <div class="row">

        <div class="col text-center">
            <h5><a href="" class="" data-toggle="modal" data-target="#modal_terminos_y_condiciones_del_club">Leer términos y condiciones del
                    Club Macanudo</a></h5>
            <br>

        </div>
    </div>
</div>






<!-- MODAL INFO  ----MODAL INFO  ----MODAL INFO  ----MODAL INFO  ------>
<!-- MODAL INFO  ----MODAL INFO  ----MODAL INFO  ----MODAL INFO  ------>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog negro" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <h5 class="modal-title text-center" id="exampleModalLabel">¿Cómo funciona?</h5>
            <div class="modal-body">
                <p>Llena el formulario, indica que tipo de canasta queres recibir y listo<br> La primer semana del
                    mes
                    recibirás nuestras delicias en tu casa! <br>Ah y podes cancelar tu suscripción en cualquier
                    momento!
                </p>

            </div>
            <div class="modal-footer">
                {{--<button class="btn1 btn-azul shadown" data-toggle="modal"
                    data-target="#exampleModal1">Unirme</button>--}}
                <div class="alert alert-danger" role="alert">La suscripción al Club Macanudo está suspendida por el momento.</div>
            </div>

        </div>


    </div>
</div>




<!--MODAL DATOS SUSCRIPCIÓN -- MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN-->
<!--MODAL DATOS SUSCRIPCIÓN -- MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN-->
@if ($errors->any())
    <script>
        //sweet alert informando que hay errores en el formulario del club macanudo
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Hay errores en el formulario. Por favor, revisa los campos.'
        })
    </script>
@endif
<div class="modal fade" id="suscribirme_al_club" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog negro" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            
            {{--<div class="modal-body"><p>La suscripción al Club Macanudo está suspendida por el momento.</p></div>--}}
            
            
            {{--<h5 class="modal-title text-center" id="exampleModalLabel">Completa tus datos</h5>--}}

            <p class="mx-3 mt-3">El Club Del Queso te entrega en tu casa todos los meses una variedad de productos, 
                entre los que encontraras productos clásicos y todos los meses un producto especial 
                de edición limitada que solo se elaborara para el club. 
                <br>
                Para crear tu suscripción debes llenar el siguiente formulario.
            </p>


            <form action="{{route('suscribirse')}}" method="POST">
                @csrf
                @method('POST')
            
                <div class="modal-body">

                    
                    
                    @if( !Auth::check() )
                        
                        <!-- Nombre -->
                        <div class="form-group mb-4">
                            <label for="nombre" class="negro">Nombre <small>(El campo es obligatorio y debe contener al menos 6 caracteres)</small>: </label>
                            <input value="{{old('nombre')}}" type="text" pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{6,100}" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required>
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group mb-4">
                            <label for="email" class="negro">Email <small>(Obligatorio)</small>: </label>
                            <input value="{{old('email')}}" type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email" required>
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        
                    @else
                        <input type="hidden" name="nombre" id="nombre" value="nombre ficticio">
                        <input type="hidden" name="email" id="email" value="email@ficticio.com">
                        <input type="hidden" name="password" id="password" value="miPassword">
                        <input type="hidden" name="password_confirmacion" id="password_confirmacion" value="miPassword">

                    @endif


                    <!-- Teléfono -->
                    <div class="form-group mb-4">    
                        <label for="telefono" class="negro">Teléfono <small>(Obligatorio)</small>: </label>
                        <input value="{{old('telefono')}}" type="text" {{--pattern="[0-9]{8,9}"--}} class="form-control" name="telefono" id="telefono" placeholder="Ingrese su teléfono" title="Número de teléfono inválido" required>
                        @error('telefono')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dirección de entrega -->
                    <div class="form-group mb-4">
                        <label for="direccion_de_entrega" class="negro">Dirección de entrega <small>(Obligatorio)</small>: </label>
                        {{--<input type="text" class="form-control" id="direccion_de_entrega" name="direccion_de_entrega" placeholder="Ingrese su dirección" required>--}}
                        <textarea required class="form-control" id="direccion_de_entrega" name="direccion_de_entrega" rows="3" placeholder="Ingrese su dirección">{{old('direccion_de_entrega')}}</textarea>
                        @error('direccion_de_entrega')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="form-group mb-4 mt-4">
                        <label for="fecha_de_nacimiento" class="negro mb-0">Fecha de nacimiento</label>
                        <div>
                            <small>(El mes de tu cumpleaños te agrandamos la caja para 
                            que puedas compartirnos con tus invitados. Valido para socios 
                            que permanezcan por lo menos 6 meses al año dentro del club.)
                            </small>
                        </div>
                        <input max="{{ date('Y-m-d') }}" value="{{old('fecha_de_nacimiento')}}" type="date" class="form-control" name="fecha_de_nacimiento" id="fecha_de_nacimiento">
                        @error('fecha_de_nacimiento')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    

                    <!-- Ingredientes que no consumo -->
                    <div class="form-group mb-4 mt-4">
                        <label for="ingredientes_que_no_consumo" class="negro mb-0">Alergias o ingredientes que prefiero evitar</label>
                        <div>
                            <small>
                                Si hay algún ingrediente que no quieres o no puedes consumir indícanos cuál es así lo 
                                podremos tener en cuenta al armar tu envio. 
                            </small>
                        </div>
                            @if( Auth::check() )
                                <textarea class="form-control" id="ingredientes_que_no_consumo" name="ingredientes_que_no_consumo" rows="2" placeholder="Por ejemplo: No consumo ajo, no puedo consumir semillas enteras, no me gusta el roquefort">{{old('ingredientes_que_no_consumo', auth()->user()->ingredientes_que_no_consumo)}}</textarea>
                            @else
                                <textarea class="form-control" id="ingredientes_que_no_consumo" name="ingredientes_que_no_consumo" rows="2" placeholder="Por ejemplo: No consumo ajo, no puedo consumir semillas enteras, no me gusta el roquefort">{{old('ingredientes_que_no_consumo')}}</textarea>
                            @endif
                        @error('ingredientes_que_no_consumo')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                        
                    <!--selecciona el dia de entrega-->
                    <div class="form-group mb-4">
                        <label for="dia_de_entrega">Cuando nos podes recibir?</label>
                        <select required class="form-control" id="dia_de_entrega" name="dia_de_entrega">
                            <option value="Primer jueves del mes en la mañana (8 a 12)" @selected(old('dia_de_entrega') == "Primer jueves del mes en la mañana (8 a 12)")>Primer jueves del mes en la mañana (8 a 12)</option>
                            <option value="Tercer jueves del mes en la tarde (14 a 18)" @selected(old('dia_de_entrega') == "Tercer jueves del mes en la tarde (14 a 18)")>Tercer jueves del mes en la tarde (14 a 18)</option>
                        </select>
                        @error('dia_de_entrega')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <!--selecciona la cantidad de quesos-->
                    {{--<div class="form-group mb-4">
                        <label for="cantidad_de_quesos">Que cantidad de quesos preferís para tu canasta?</label>
                        <select required class="form-control recalcular_precio" id="cantidad_de_quesos" name="cantidad_de_quesos">
                            <option value="3" @selected(old('cantidad_de_quesos') == "3")>3 quesos</option>
                            <option value="5" @selected(old('cantidad_de_quesos') == "5")>5 quesos</option>
                        </select>
                        @error('cantidad_de_quesos')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>--}}
                    <!-- radio button para seleccionar la cantidad de quesos -->
                    <div class="form-group">
                        <label>¿Qué cantidad de quesos preferís para tu canasta?</label>
                        <div class="row">
                            <div class="col-6 text-center">
                                <label class="p-0 m-0 w-100 recalcular_precio" for="quesos_3">
                                    <div class="border rounded mr-1 p-3">
                                        <input required type="radio" id="quesos_3" name="cantidad_de_quesos" value="3" @if(old('cantidad_de_quesos') == "3") checked @endif>
                                        3 quesos
                                    </div>
                                </label>
                            </div>
                            <div class="col-6 text-center">
                                <label class="p-0 m-0 w-100 recalcular_precio" for="quesos_5">
                                    <div class="border rounded ml-1 p-3">
                                        <input required type="radio" id="quesos_5" name="cantidad_de_quesos" value="5" @if(old('cantidad_de_quesos') == "5") checked @endif>
                                        5 quesos
                                    </div>
                                </label>
                            </div>
                        </div>
                        @error('cantidad_de_quesos')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Se muestran los resultados del calculo del precio -->
                    <div class="text-center mb-5" id="precio_por_mes">
                        
                        {{--<p class="m-1 h4 " id="precio_total">Precio total de la suscripción: $969</p>--}}
                    </div>



                    <!--tipo de suscripcion-->
                    {{--<div class="form-group mb-3">
                        <label for="tipo">Duración de la suscripción</label>
                        <select required class="form-control recalcular_precio" id="tipo" name="tipo">
                            <option value="Un mes" @selected(old('tipo') == "Un mes")>Un mes</option>
                            <option value="Tres meses" @selected(old('tipo') == "Tres meses")>Tres meses</option>
                            <option value="Seis meses" @selected(old('tipo') == "Seis meses")>Seis meses</option>
                            <option value="Doce meses" @selected(old('tipo') == "Doce meses")>Doce meses</option>
                        </select>
                        @error('tipo')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>--}}


                    @if( !Auth::check() )
                        <!-- Contraseña -->
                        <div class="form-group mb-3">
                            <label for="password" class="negro">Necesitamos que definas una contraseña para acceder a tu usuario de Macanudo: </label>
                            <input value="{{old('password')}}" type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                            @error('password')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            {{--<label for="password_confirmacion" class="negro">Confirmación de contraseña: </label>--}}
                            <input value="{{old('password_confirmacion')}}" type="password" class="form-control" name="password_confirmacion" id="password_confirmacion" placeholder="Confirmación de contraseña" required>
                            @error('password_confirmacion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            <p id="password_confirmacion_info" class="text-danger" style="display: none">Las contraseñas no coinciden.</p>
                        </div>
                    @endif


                    


                    <!--Aceptar terminos y condiciones del club macanudo-->
                    <div class="form-group mb-3">
                        <input @checked(old('terminos_y_condiciones_del_club')) required type="checkbox" class="h1" name="terminos_y_condiciones_del_club" value="1" id="terminos_y_condiciones_del_club" checked>
                        <label class="" for="terminos_y_condiciones_del_club">Acepto los <a href="#" data-toggle="modal" data-target="#modal_terminos_y_condiciones_del_club">términos y condiciones</a> del Club Macanudo.</label>
                    </div>
                    

                </div>

                <div class="modal-footer text-center">
                    <button type="submit" class="btn1 btn-azul shadown btn-procesando btn-block">Suscribirme</button>
                </div>
            </form>

        </div>


    </div>
</div>


<script>
    $(document).ready(function(){
        
        $("[name='cantidad_de_quesos']").on("click", function() {
            var precio_unitario = 380;
            var descuento_por_tres_quesos = 0.85;
            var descuento_por_cinco_quesos = 0.82;
            // Obtiene el valor del botón de radio seleccionado
            var cantidad = $(this).val();
            if(cantidad == 3){
                //$('#precio_por_mes').html('<span class=" alert alert-success">Precio por mes $' + precio_unitario*cantidad*descuento_por_tres_quesos + '</span>');
                $('#precio_por_mes').html('<span class=" alert alert-success">Precio por mes $' + 969 + '</span>');
            }else{
                //$('#precio_por_mes').html('<span class=" alert alert-success">Precio por mes $' + precio_unitario*cantidad*descuento_por_cinco_quesos + '</span>');
                $('#precio_por_mes').html('<span class=" alert alert-success">Precio por mes $' + 1599 + '</span>');
            }
        });

        
        

        //funcion que valida que los password coincidan, si no coincide pone el borde en rojo, el fondo en rojo e informa que los password no coinciden
        $('#password_confirmacion').keyup(function(){
            if( $('#password').val() != $('#password_confirmacion').val() ){
                $('#password_confirmacion').css('border', '1px solid red');
                $('#password_confirmacion').css('background', '#f2dede');
                $('#password_confirmacion').css('color', '#a94442');
                $('#password_confirmacion').css('font-weight', 'bold');
                $('#password_confirmacion').css('font-size', '14px');
                $('#password_confirmacion').css('padding', '5px');
                $('#password_confirmacion').css('margin-bottom', '5px');
                $('#password_confirmacion').css('margin-top', '5px');
                $('#password_confirmacion').css('border-radius', '5px');
                $('#password_confirmacion_info').show();
            }else{
                $('#password_confirmacion').css('border', '1px solid #ccc');
                $('#password_confirmacion').css('background', '#fff');
                $('#password_confirmacion').css('color', '#555');
                $('#password_confirmacion').css('font-weight', 'normal');
                $('#password_confirmacion').css('font-size', '14px');
                $('#password_confirmacion').css('padding', '5px');
                $('#password_confirmacion').css('margin-bottom', '5px');
                $('#password_confirmacion').css('margin-top', '5px');
                $('#password_confirmacion').css('border-radius', '5px');
                $('#password_confirmacion_info').hide();
            }
        });
        




        $('.btn-procesando').click(function(){
            if( 
                //document.getElementById("nombre").value != '' &&
                //document.getElementById("email").value != '' &&
                //el input nombre no puede estar vacio y debe tener mas de 5 caracteres
                document.getElementById("nombre").value != '' && document.getElementById("nombre").value.length > 5 &&
                document.getElementById("password").value != '' &&
                document.getElementById("password").value == document.getElementById("password_confirmacion").value &&
                document.getElementById("direccion_de_entrega").value != '' &&  
                document.getElementById("telefono").value != '' && 
                //document.getElementById("fecha_de_nacimiento").value != '' &&  
                //document.getElementById("ingedientes_que_no_consumo").value != '' &&  
                // TODO: document.getElementById("cantidad_de_quesos").value != '' &&  
                document.getElementById("dia_de_entrega").value != '' &&
                //document.getElementById("cantidad_de_canastas").value != '' &&  
                //document.getElementById("fecha_de_inicio").value != '' &&  
                //document.getElementById("fecha_de_renovacion").value != ''
                //verifica si esta chequeado el checkbox de terminos_y_condiciones_del_club
                document.getElementById("terminos_y_condiciones_del_club").checked == true
            ){
                let timerInterval
                Swal.fire({
                title: 'Procesando',
                html: 'Por favor espere.',
                //timer: 10000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
            }
        });
    });
    
</script>


<!--MODAL TERMINOS Y CONDICIONES -- MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES-->
<!--MODAL TERMINOS Y CONDICIONES -- MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES-->
<div class="modal fade" id="modal_terminos_y_condiciones_del_club" tabindex="-1" role="dialog" aria-modal="true" aria-labelledby="modal_terminos_y_condiciones_del_clubLabel"
    aria-hidden="true">
    <div class="modal-dialog negro" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <h5 class="modal-title text-center" id="modal_terminos_y_condiciones_del_clubLabel">Términos y condiciones de Club Macanudo</h5>
            <div class="modal-body">
                <h6>ACEPTACIÓN</h6>
                <p>El uso de este sitio web, www.macanudonoqueso.com y todas las páginas de este dominio, 
                    constituye la aceptación de los siguientes términos y condiciones. Macanudo se reserva 
                    el derecho de buscar todos los recursos disponibles por ley por cualquier violación 
                    de estos términos de uso, incluida cualquier violación de los derechos del nombre y 
                    logotipo de MACANUDO y sus derechos en relación con la información, texto, video, 
                    audio o imágenes (juntos o separados) de este sitio web. El uso no autorizado está 
                    prohibido. No puede copiarse ni reproducirse de ninguna manera sin el permiso previo 
                    por escrito de Macanudo.</p>

                <h6>USUARIO</h6>
                <p>Se considera usuario a los efectos de estos Términos y Condiciones  cualquier persona 
                    física, jurídica o entidad pública, estatal o no, que ingrese al sitio para recorrer, 
                    conocer, informarse, realizar una compra, o utilice la página web y su contenido, 
                    directamente o a través de una aplicación.</p>

                <h6>EL SITIO WEB</h6>
                <p>La utilización del sitio web tiene carácter gratuito para el usuario, (exceptuando la 
                    realización de una compra), quien se obliga a utilizarlo respetando la normativa 
                    nacional vigente, las buenas costumbres y el orden público.</p>

                <p>MACANUDO es creador y se hace responsable por todo el contenido,  texto, imágenes, 
                    audios, fotos y videos incluidos en este sitio web. </p>

                <p>Todas las marcas, nombres comerciales o signos distintivos de cualquier clase que 
                    eventualmente aparezcan en este sitio web son propiedad de MACANUDO o  de terceros, 
                    sin que pueda entenderse que el uso o acceso al sitio atribuye al usuario derecho 
                    alguno sobre las citadas marcas, nombres comerciales o signos distintivos de cualquier 
                    clase.</p>

                <p>MACANUDO se reserva la facultad de modificar, en cualquier momento y sin previo aviso, 
                    la presentación, configuración, contenidos y servicios del sitio web, pudiendo 
                    interrumpir, desactivar y/o cancelar cualquiera de los contenidos y/o servicios 
                    presentados, por tiempo parcial o definitivo,  integrados o incorporados a este, 
                    sin expresión de causa y sin responsabilidad.</p>

                <h6>DATOS PERSONALES</h6>
                <p>Los datos personales proporcionados en el sitio web serán tratados por MACANUDO según 
                    lo establecido en la Ley Nº 18.331 del 11 de agosto de 2008 y su decreto reglamentario 
                    Nº 414/2009 del 31 de agosto de 2009. link a la ley de proteccion de datos 
                    https://www.impo.com.uy/bases/leyes/18331-2008</p>

                <p>MACANUDO podrá utilizar cookies cuando se utilice el sitio web. No obstante, el usuario 
                    podrá configurar su navegador para ser avisado de la recepción de las cookies e impedir 
                    en caso de considerarlo adecuado.</p>

                <h6>ENLACES</h6>
                <p>Este sitio ocasionalmente podría contener enlaces de hipertexto a otros sitios.</p>
                <p>MACANUDO no asume ninguna 
                    responsabilidad por esos sitios, incluidas las prácticas de privacidad o 
                    el contenido de dichos sitios web</p>

                <h6>OBLIGACIONES DEL USUARIO</h6>
                <p>El usuario se compromete a:</p>
                <p>NO incumplir todas las leyes, reglamentos y normas aplicables a nivel local, regional y 
                    nacional; NO dañar, inutilizar o deteriorar los sistemas informáticos que sustentan el 
                    sitio web www.macanudonoqueso.com y  de otros usuarios o de terceros, ni los contenidos 
                    incorporados y/o almacenados en estos; NO modificar los sistemas de ninguna manera y no 
                    utilizar versiones de sistemas modificados con el fin de obtener acceso no autorizado a 
                    cualquier contenido y/o servicios del sitio; NO interferir ni interrumpir el acceso y 
                    utilización del sitio web, servidores o redes conectados a este o incumplir los 
                    requisitos, procedimientos y regulaciones de la política de conexión de redes; NO 
                    infringir los derechos de propiedad intelectual y de privacidad, entre otros, los 
                    derechos de patente (copyright), los derechos sobre la base de datos, las marcas 
                    registradas o el know how de terceros; NO acceder o intentar acceder a la cuenta o al 
                    login de terceras personas o empresas que sean usuarias de este sitio web; NO copiar, 
                    modificar, reproducir, eliminar, distribuir, descargar, almacenar, transmitir, vender, 
                    revender, publicar, invertir el proceso de creación o crear productos derivados a partir 
                    del contenido del sitio web; NO hacerse pasar por otra persona o empresa: NO utilizar 
                    el Sitio Web de forma no autorizada o para alguna actividad delictiva;NO falsear los 
                    datos sobre sí mismo, sobre su asociación con terceros o sobre su empresa.</p>

                <h6>COMO DENUNCIAR CONTENIDOS</h6>
                <p>En caso de contenido erróneo, incompleto, desactualizado, que vulnere derechos de 
                    propiedad intelectual o ante cualquier otra situación irregular de hecho o de derecho, 
                    el usuario podrá comunicarse a través del correo electrónico: 
                    contacto@macanudonoqueso.com</p>

                <h6>CONTACTO</h6>
                <p>Por cualquier queja, sugerencia o propuesta de colaboración, puede comunicarse a 
                    contacto@macanudonoqueso.com o a cualquier dato de contacto proporcionado en este sitio 
                    web.</p>

            </div>
            {{--<div class="modal-footer">
                <button class="btn1 btn-azul shadown" data-toggle="modal"
                    data-target="#suscribirme_al_club">Unirme</button>
            </div>--}}

        </div>


    </div>
</div>


@endsection


