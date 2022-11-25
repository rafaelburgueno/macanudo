@extends('layouts.plantilla')

@section('title', 'Club Macanudo')
@section('meta-description', 'metadescripcion para la pagina Club Macanudo')
    
    
@section('content')


<div>

    <br>
    <img src="{{asset('/storage/img/club-macanudo.png')}}" class="nav d-block w-100" alt="...">
    <br><br>
</div>



<div class="container-fluid">

    <div class="row mt-3  mr-0  ml-0 ">
        <div class="col">
            <h1 class="text-center text-shadow" style="color: var(--gris);">¡Tenemos una canasta especial para ti!
                <br> <img src="{{asset('/storage/img/canasta.png')}}" width="25%">
            </h1><br>


        </div>
    </div>
</div>

<div class="mt-5 mr-0 mb-5 ml-0 container-fluid">
    <div class="row">

        <div class="col text-center">
            <a href="" class=" btn1 btn-club " data-toggle="modal" data-target="#exampleModal">Sé parte de nuestro
                club</a>

        </div>
    </div>
</div><br>

</div>

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
                AUMENTAMOS<br>TU<br><img src="{{asset('/storage/img/canasta.png')}}" width="25%"></h1><br><br>
        </div>
    </div>
</div>

<div class="mt-3 mr-0 mb-3 ml-0 container-fluid">
    <div class="row">

        <div class="col text-center">
            <a href="" class=" btn1 btn-club link" data-toggle="modal"
                data-target="#exampleModal">unirme al club</a>

            <p>

            </p>
        </div>
    </div>
</div>

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



<!--MODAL TERMINOS Y CONDICIONES -- MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES-->
<!--MODAL TERMINOS Y CONDICIONES -- MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES-->
<div class="modal fade" id="modal_terminos_y_condiciones_del_club" tabindex="-1" role="dialog" aria-labelledby="modal_terminos_y_condiciones_del_clubLabel"
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
            <div class="modal-footer">
                <button class="btn1 btn-azul shadown" data-toggle="modal"
                    data-target="#exampleModal1">Unirme</button>
            </div>

        </div>


    </div>
</div>


<!-- MODAL INFO  ----MODAL INFO  ----MODAL INFO  ----MODAL INFO  ------>
<!-- MODAL INFO  ----MODAL INFO  ----MODAL INFO  ----MODAL INFO  ------>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <button class="btn1 btn-azul shadown" data-toggle="modal"
                    data-target="#exampleModal1">Unirme</button>
            </div>

        </div>


    </div>
</div>




<!--MODAL DATOS SUSCRIPCIÓN -- MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN-->
<!--MODAL DATOS SUSCRIPCIÓN -- MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog negro" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <h5 class="modal-title text-center" id="exampleModalLabel">Completa tus datos</h5>
            <div class="modal-body">
                <form class=" border border-light p-3">
                    <div class="form-row">

                        <div class="form-group col-sm">
                            <label for="nombre" class="negro">Nombre: </label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre"
                                required>

                            <label for="email"class="negro">Email: </label>
                            <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" required>

                        </div>
                        <div class="form-group col-sm">
                            <label for="nombre" class="negro">Contacto: </label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su contacto"
                                required>

                            <label for="dirección"class="negro">Dirección: </label>
                            <input type="dirección" class="form-control" id="dirección" placeholder="Ingrese su dirección" required>

                        </div>
                    </div>
                    
                    
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn1 btn-azul shadown" data-toggle="modal"
                    data-target="#exampleModal1">Unirme</button>
            </div>

        </div>


    </div>
</div>



@endsection


