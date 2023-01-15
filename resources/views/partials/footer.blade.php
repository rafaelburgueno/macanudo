<!--  FOOTER --- FOOTER ---- FOOTER ----FOOTER --- FOOTER ---- FOOTER----->
    <!--  FOOTER --- FOOTER ---- FOOTER ----FOOTER --- FOOTER ---- FOOTER----->
    <!--  FOOTER --- FOOTER ---- FOOTER ----FOOTER --- FOOTER ---- FOOTER----->
    <!--  FOOTER --- FOOTER ---- FOOTER ----FOOTER --- FOOTER ---- FOOTER----->
    <div class="container">
        <footer class="mt-5">
            <div class="row">
                <div class="col-sm-4 d-flex flex-column align-items-center">
                    <h5 class="text-center">Web Macanudo</h5>
                    <p><a class="nav-link" href="{{route('nosotros')}}">Nosotros</a></p>
                    <p><a class="nav-link" href="{{route('nuestros_productos')}}">Productos</a></p>
                    <p><a class="nav-link" href="{{route('puntos_de_venta')}}">Puntos de venta</a></p>
                    <p><a class="nav-link" href="{{route('club_macanudo')}}">Club Macanudo</a></p>
                    {{--<p><a class="nav-link" href="{{route('blog.index')}}">Blog</a></p>--}}
                    <p><a class="nav-link" href="{{route('mi_carrito')}}">Mi carrito</a></p>
                    {{--<p><a class="nav-link" href="{{route('profile.show')}}">Mi perfil</a></p>--}}

                </div>

                <div class="col-sm-4 d-flex flex-column align-items-center">
                    <h5 class="text-center mr-4">Institucional</h5>
                    <p><a class="nav-link" href="#" data-toggle="modal" data-target="#preguntas_frecuentes">Preguntas frecuentes</a> </p>
                    <p><a class="nav-link" href="#" data-toggle="modal" data-target="#modal_terminos_y_condiciones">Terminos y condiciones</a> </p>
                    <p><a class="nav-link" href="#" data-toggle="modal" data-target="#politicas_de_privacidad">Politicas de privacidad</a> </p>
                    <p><a class="nav-link" href="#" class="link" data-toggle="modal" data-target="#politicas_de_envio">Políticas de envío</a></p>
                    <p><a class="nav-link" href="#" data-toggle="modal" data-target="#vender_macanudo">Vender Macanudo</a></p>

                </div>

                <div class="col-sm-4 d-flex flex-column align-items-center">

                    <h5 class="text-center">Contacto</h5>

                    <address class="text-center mb-0 mt-2">
                        <p><span class="oi oi-home footer-address-icon"></span>Montevideo e interior del país.</p>
                        <p></p>
                        <p><span class="oi oi-phone footer-address-icon"></span><a class="" href="https://wa.me/59899760201" target="_blank" style="color: var(--blanco);">099 760 201</a></p>
                        <p></p>
                        <p><span class="oi oi-envelope-closed footer-address-icon"></span><a href="mailto:{{env('MAIL_FROM_ADDRESS')}}" style="color: var(--blanco);">{{env('MAIL_FROM_ADDRESS')}}</a></p>
                    </address><br><br>
                    <img src="{{asset('/storage/img/macanudo_logoNegro.png')}}" width="70%" /><br>
                    {{--
                    <img src="{{asset('/storage/img/logo-footer.jpeg')}}" width="70%" /><br>
                    --}}

                    <p class="small text-center"></p><br><br>
                    <p class="text-center sticky-bottom fixed-bottom d-block">
                        <a class="" href="https://wa.me/59899760201" target="_blank"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-whatsapp mr-3 " viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg></a>
                        <a class="pe-auto" href="https://www.instagram.com/macanudoqueso" target="_blank"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-instagram mr-3 " viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg></a>
                        <a class="pe-auto" href="https://www.facebook.com/macanudoqueso" target="_blank"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg></a><br>

                    </p>

                    <p class="small text-center">© 2023 {{env('APP_NAME')}}</p><br><br>

                </div>








            </div>
        </footer>
    </div>

<!--MODAL PREGUNTAS FRECUENTES--MODAL PREGUNTAS FRECUENTES--MODAL PREGUNTAS FRECUENTES-->
<!--MODAL PREGUNTAS FRECUENTES--MODAL PREGUNTAS FRECUENTES--MODAL PREGUNTAS FRECUENTES-->
<div class="modal fade" id="preguntas_frecuentes" tabindex="-1" role="dialog" aria-labelledby="preguntas_frecuentesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center negro">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <h5 class="modal-title text-center" id="preguntas_frecuentesLabel">Preguntas frecuentes</h5><br>
            <div class="modal-body">
                <p>¿CÓMO SE CONSERVAN LOS ALIMENTOS?</p>
                <p>Lo recomendable es mantenerlo refrigerado, en un tupper cerrado, separado de otros alimentos. 
                    Todos los días o cada vez que te acuerdes voltealo.</p>
                <hr>

                <p>CORTÉ EL ALIMENTO Y  VI QUE DESPUÉS DE UNOS DÍAS EL MOHO VOLVIÓ A CRECER DONDE LO HABÍA CORTADO 
                    ¿ES NORMAL?</p>
                <p>Si es normal en todos nuestros alimentos con moho. Mientras no veas un mho de color diferente 
                    o un cambio de aroma no te preocupes.</p>
                <hr>

                <p>¿HASTA CUANDO PUEDO CONSUMIR EL ALIMENTO?</p>
                <p>Con el pasar de los días el alimento aumenta su sabor y su aroma. Mientras no veas que cambie 
                    de color o aparezca un hongo de color diferente. o su olor sea demasiado fuerte puedes seguir 
                    consumiéndolo. </p>
                <hr>

                <p>¿SE COME TODO EL ALIMENTO O LE SACO LA CORTEZA?</p>
                <p>La corteza de todos nuestros alimentos es comestible. Los mohos del CAMON-BERT y del EL-ROQUE 
                    se desarrollan en la superficie y son lo que le da su saber característico.</p>
                

            </div>

        </div>
    </div>

</div>




<!--MODAL TERMINOS Y CONDICIONES -- MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES-->
<!--MODAL TERMINOS Y CONDICIONES -- MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES--MODAL TERMINOS Y CONDICIONES-->
<div class="modal fade" id="modal_terminos_y_condiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog negro" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <h5 class="modal-title text-center" id="exampleModalLabel">Términos y condiciones</h5>
            <div class="modal-body">
                <h6>ACEPTACIÓN</h6>
                <p>El uso de este sitio web, {{env('APP_URL')}} y todas las páginas de este dominio, 
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
                    Nº 414/2009 del 31 de agosto de 2009. <br>
                    <a href="https://www.impo.com.uy/bases/leyes/18331-2008" target="_blank">Ley de proteccion de datos 
                    </a>.</p>

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
                    <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">{{env('MAIL_FROM_ADDRESS')}}</a></p>

                <h6>CONTACTO</h6>
                <p>Por cualquier queja, sugerencia o propuesta de colaboración, puede comunicarse a 
                    <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">{{env('MAIL_FROM_ADDRESS')}}</a> o a cualquier dato de contacto proporcionado en este sitio 
                    web.</p>

            </div>
            

        </div>


    </div>
</div>



<!--MODAL POLITICAS DE PRIVACIDAD--MODAL POLITICAS DE PRIVACIDAD--MODAL POLITICAS DE PRIVACIDAD-->
<!--MODAL POLITICAS DE PRIVACIDAD--MODAL POLITICAS DE PRIVACIDAD--MODAL POLITICAS DE PRIVACIDAD-->
<div class="modal fade" id="politicas_de_privacidad" tabindex="-1" role="dialog" aria-labelledby="politicas_de_privacidadLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center negro">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <h5 class="modal-title text-center" id="politicas_de_privacidadLabel">Politicas de privacidad</h5><br>
            <div class="modal-body">
                <p>Los datos personales proporcionados en el sitio web serán tratados por MACANUDO según lo 
                    establecido en la Ley Nº 18.331 del 11 de agosto de 2008 y su decreto reglamentario 
                    Nº 414/2009 del 31 de agosto de 2009. <br>
                    <a href="https://www.impo.com.uy/bases/leyes/18331-2008" target="_blank">Ley de proteccion de datos</a>. <br>
                    MACANUDO podrá utilizar cookies cuando se utilice el sitio web. No obstante, el usuario 
                    podrá configurar su navegador para ser avisado de la recepción de las cookies e impedir 
                    en caso de considerarlo adecuado.</p>
            </div>

        </div>
    </div>

</div>




<!--MODAL POLITICAS DE ENVIO--MODAL POLITICAS DE ENVIO--MODAL POLITICAS DE ENVIO-->
<!--MODAL POLITICAS DE ENVIO--MODAL POLITICAS DE ENVIO--MODAL POLITICAS DE ENVIO-->
<div class="modal fade" id="politicas_de_envio" tabindex="-1" role="dialog" aria-labelledby="politicas_de_envioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center negro">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <h5 class="modal-title text-center" id="politicas_de_envioLabel">Politicas
            de envio
            </h5><br>
            <div class="modal-body">
            <h4 class="text-center rojo">El envío tiene un costo de $60</h4><br>
            <p>
                - Todos los jueves se entrega en Montevideo, Ciudad de la costa y costa de oro.
            </p>
            <p>- Primer y Tercer jueves de cada mes se entrega en Maldonado</p>
            <p>- Se puede retirar en la planta ubicada en La Floresta, Canelones.</p>
            <p>- Puedes consultar los puntos de venta <a href="{{route('puntos_de_venta')}}">aquí</a></p>
            </div>

        </div>
    </div>

</div>





<!--MODAL VENDER MACANUDO--MODAL VENDER MACANUDO--MODAL VENDER MACANUDO-->
<!--MODAL VENDER MACANUDO--MODAL VENDER MACANUDO--MODAL VENDER MACANUDO-->
<div class="modal fade" id="vender_macanudo" tabindex="-1" role="dialog" aria-labelledby="vender_macanudoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center negro">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <h5 class="modal-title text-center" id="vender_macanudoLabel">Vender Macanudo</h5><br>
            <div class="modal-body text-center">
                <p>Para ser vendedor, distribuidor o trabajar con nosotros comunicate al mail
                    <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}">{{env('MAIL_FROM_ADDRESS')}}</a>
                </p>
                    

            </div>

        </div>
    </div>

</div>