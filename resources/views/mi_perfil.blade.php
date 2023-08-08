@extends('layouts.plantilla')

@section('title', 'Mi perfil')
@section('meta-description', 'metadescripcion para la pagina Mi perfil')
    
    
@section('content')



{{--<div class="container">
    <h1 class="text-center" style="color: #e1e1e1; ">MI PERFIL</h1><br>
</div>--}}

<div class="container px-4 text-dark">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6 card">
            <div class="card-title text-center pt-3">
                <img src="{{Auth::user()->profile_photo_url}}" id="imagen_de_perfil" class="card-img-top rounded-circle" style="max-width:350px ; align-self: center;">
                <h3 class="mt-2 nombre_a_actualizar">{{Auth::user()->name}}</h3><br>
                {{--el siguiente script modifica el nombre de forma dinamica cuando se edita en em formulario del modal mis_datos--}}
                <script> 
                    $(document).ready(function(){
                        $('.actualizar_nombre').click(function(){
                            var nombre = $('input[name="nombre"]').val();
                            $('.nombre_a_actualizar').text(nombre);
                            var srcTemporal = $('#imagen_de_perfil_temporal').attr('src');
                            $('#imagen_de_perfil').attr('src', srcTemporal);
                        });
                        $('.eliminar_foto').click(function(){
                            // Obtener el elemento canvas generado por Jetstream::gravatar()
                            //let canvas = document.querySelector('canvas');
                            // Obtener la URL de datos de la imagen generada por Jetstream::gravatar()
                            //let dataURL = canvas.toDataURL();
                            // Actualizar el atributo src del elemento img para mostrar la imagen generada por Jetstream::gravatar()
                            //$('#imagen_de_perfil').attr('src', dataURL);
                            $('#imagen_de_perfil').hide();
                        });
                    });
                </script>
            </div>
            <div class="card-body">


                <!-- Mis datos -->
                <h6 class="mr-5">
                    <a href="#{{--route('profile.show')--}}" class="link" data-toggle="modal" data-target="#modalMisDatos" style="color: #1e1e1e;">
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle mr-5" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg> --}}
                        <span class="bi bi-person-circle mr-5" style="font-size:2.5rem"></span>
                        Mis datos 
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>
                <br><br>



                <!-- Mis direcciones -->
                <h6 class="mr-5">
                    <a href="#" class="" data-toggle="modal" data-target="#modalMisDirecciones" style="color: #1e1e1e;">
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-geo-alt-fill mr-5" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg> --}}
                        <span class="bi bi-geo-alt-fill mr-5" style="font-size:2.5rem"></span>
                        Direcciones 
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>
                <br><br>



                <!-- Mis compras -->
                <h6 class="mr-5"> 
                    <a href="#" class="" data-toggle="modal" data-target="#modalMisCompras" style="color: #1e1e1e;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill mr-5" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
                        </svg>
                        {{--<span class="bi bi-bag-heart-fill mr-5" style="font-size:2.5rem"></span>--}}
                        Mis compras 
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>
                <br><br>



                <!-- Suscripciones -->
                <h6 class="mr-5"> 
                    <a href="#" class="" data-toggle="modal" data-target="#modalMisSuscripciones" style="color: #1e1e1e;">
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar2-date mr-5" viewBox="0 0 16 16">
                            <path d="M6.445 12.688V7.354h-.633A.312.312 0 0 1 5.5 7.042c0-.174.14-.313.313-.313h3.374c.173 0 .313.139.313.313 0 .173-.14.312-.313.312H9.555v5.334h1.445c.173 0 .313.139.313.312a.313.313 0 0 1-.313.313H5.312a.313.313 0 0 1-.313-.313c0-.173.14-.312.313-.312h1.133z"/>
                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3v1h14V3H1zm13 11H2V5h12v9z"/>
                        </svg>
                        --}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-basket2-fill mr-5" viewBox="0 0 16 16">
                            <path d="M.969 4.75a.5.5 0 0 1 .5-.5h13.062a.5.5 0 0 1 .5.5c0 .286-.068.569-.191.812l-3.47 6.88a2.5 2.5 0 0 1-4.38 0l-3.47-6.88A1.5 1.5 0 0 1 .97 4.75z"/>
                            <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V2h1V.5A1.5 1.5 0 0 0 9.5-.001h-3A1.5 1.5 0 0 0 5 .499V2h1V.5z"/>
                        </svg>--}}
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-basket3-fill mr-5" viewBox="0 0 16 16">
                            <path d="M.969 4.75a.5.5 0 0 1 .5-.5h13.062a.5.5 0 0 1 .5.5c0 .286-.068.569-.191.812l-3.47 6.88a2.5 2.5 0 0 1-4.38 0l-3.47-6.88A1.5 1.5 0 0 1 .97 4.75z"/>
                            <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V2h1V.5A1.5 1.5 0 0 0 9.5-.001h-3A1.5 1.5 0 0 0 5 .499V2h1V.5z"/>
                        </svg>--}}
                        <span class="bi bi-basket-fill mr-5" style="font-size:2.5rem"></span>
                        Suscripciones
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>
                <br><br>



                <!-- Seguridad -->
                <h6 class="mr-5">
                    <a href="#{{--route('profile.show')--}}" class="link" data-toggle="modal" data-target="#modalSeguridad" style="color: #1e1e1e;">
                        {{--<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-shield-lock mr-5" viewBox="0 0 16 16">
                            <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                            <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                        </svg>--}}
                        <span class="bi bi-shield-lock mr-5" style="font-size:2.5rem"></span>
                        Seguridad 
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>
                <br><br>


                {{--
                <!-- Privacidad -->
                <h6 class="mr-5">
                    <a href="#" class="link" data-toggle="modal" data-target="#modalPrivacidad" style="color: #1e1e1e;">
                        <!--<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-lock2 mr-5" viewBox="0 0 16 16">
                            <path d="M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0zM7 7v1h2V7a1 1 0 0 0-2 0z" />
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        </svg>-->
                        <span class="bi bi-file-earmark-lock2 mr-5" style="font-size:2.5rem"></span>
                        Privacidad 
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>--}}

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <hr>
</div>




<!-- MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS------>
<!-- MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS------>
<div class="modal fade" id="modalMisDatos" tabindex="-1" role="dialog" aria-labelledby="modalMisDatosLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <div class="px-4">
                    <h3 id="modalMisDatosLabel" class="text-lg">Información del perfil</h3>
                    <p class="mt-1 text-sm">
                        Actualice la información de perfil de su cuenta.
                    </p>
                </div>
            

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body ">


                @livewire('actualizar-perfil')
                {{-- EDICION DE DATOS DEL USUARIO --}}
                
    
                {{--
                <button class="btn shadown" style="color:#f04643;">Modificar</button>
                <button class="btn btn-outline shadown " style="color: #4554a4; ">Guardar</button>
                --}}
            </div>
            
        </div>


    </div>
</div>




<!-- MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES------>
<!-- MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES------>
<div class="modal fade text-darkk" id="modalMisDirecciones" tabindex="-1" role="dialog" aria-labelledby="modalMisDireccionesLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">

                <div class="px-4">
                    <h3 id="modalMisDireccionesLabel" class="text-lg">Mis direcciones</h3>
                    <p class="mt-1 text-sm">
                        Listado de las direcciones registradas en las compras realizadas.
                    </p>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @if(count($pedidos) > 0)
                    @foreach($pedidos as $pedido)
                        @if($pedido->direccion != 'el pedido se retira en la planta')
                            <p class="my-0 py-0"><strong>Pedido relizado el {{$pedido->created_at->format('d/m/Y')}} a las {{$pedido->created_at->format('h:i A')}}</strong></p>
                            
                            @if($pedido->telefono)
                                <p class="my-0 py-0 small">Teléfono: {{$pedido->telefono}}</p>
                            @endif

                            @if($pedido->direccion)
                                <p class="my-0 py-0 small">Dirección: {{$pedido->direccion}}</p>
                            @endif

                            @if($pedido->localidad)
                                <p class="my-0 py-0 small">Localidad: {{$pedido->localidad}}</p>
                            @endif

                            @if($pedido->departamento)
                                <p class="my-0 py-0 small">Departamento: {{$pedido->departamento}}</p>
                            @endif

                            <hr class="mt-4">
                        @endif
                    @endforeach
                @else
                    <div class="text-center pt-3">
                        <p>No tiene compras.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>




<!-- MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS------>
<!-- MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS------>
<div class="modal fade text-dark" id="modalMisCompras" tabindex="-1" role="dialog" aria-labelledby="modalMisComprasLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                
                <div class="px-4">
                    <h3 id="modalMisComprasLabel" class="text-lg">Mis compras</h3>
                    <p class="mt-1 text-sm">
                        Listado de pedidos y compras realizadas.
                    </p>
                </div>
            
                {{--<h5 class="modal-title text-center" id="modalMisComprasLabel">Mis compras</h5>--}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-bodyy">


                {{-- PEDIDOS --}}
                @if(count(Auth::user()->pedidos))
                            
                    <div class="accordion" id="accordion-mis-compras">

                        @foreach(Auth::user()->pedidos as $pedido)
                        
                        <div class="card">
                                
                            @if($pedido->tipo == 'club del queso')
                                <div class="card-header" id="compra-{{$pedido->id}}" style="background-color: rgb(255, 255, 242); cursor: pointer;" >
                            @else
                                <div class="card-header" id="compra-{{$pedido->id}}" style="cursor: pointer;">
                            @endif

                                    <div class="mb-0 btn btn-linkk btn-block text-left collapsed" data-toggle="collapse" data-target="#collapse-{{$pedido->id}}" aria-expanded="true" aria-controls="collapse-{{$pedido->id}}">
                                        {{--<div class="float-left">
                                            {{$pedido->created_at->format('d/m/Y')}}
                                        </div>

                                        @if($pedido->tipo == 'club del queso')
                                            <div class="text-center">
                                                <strong>Club del queso</strong>
                                            </div>
                                        @endif

                                        <div class="float-right">
                                            <strong>{{$pedido->monto}}$</strong>
                                        </div>--}}

                                        <div class="row">
                                            <div class="col text-left">
                                                {{$pedido->created_at->format('d/m/Y')}}
                                            </div>
                                            <div class="col text-center">
                                                @if($pedido->tipo == 'club del queso')
                                                    <strong>Club del queso</strong>
                                                @endif
                                            </div>
                                            <div class="col text-right">
                                                <strong>{{$pedido->monto}}$</strong>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="collapse-{{$pedido->id}}" class="collapse showw" aria-labelledby="compra-{{$pedido->id}}" data-parent="#accordion-mis-compras">
                                    <div class="card-body">
                                        {{--@if($pedido->tipo == 'club del queso')
                                        <p><strong>El pedido corresponde a tu suscripción al Club del queso </strong></p>
                                        @endif

                                        <h3 class="h6 font-medium text-gray-900">Pedido id: {{$pedido->id}}</h3>
                                        <p class="mt-1 text-sm text-gray-600">Monto: $ {{$pedido->monto}}</p>
                                        <p class="mt-1 text-sm text-gray-600">Estado del pedido: {{$pedido->status}}</p>
                                        <p class="mt-1 text-sm text-gray-600">Estado del pago: {{$pedido->estado_del_pago}}</p>
                                        <p class="mt-1 text-sm text-gray-600">Medio de pago: {{$pedido->medio_de_pago}}</p>
                                        <p class="mt-1 text-sm text-gray-600">Número de factura: {{$pedido->numero_de_factura}}</p>
                                        <p class="mt-1 text-sm text-gray-600">Fecha: {{$pedido->created_at}}</p>

                                        @if(count($pedido->productos))
                                            <h4 class="h6 font-medium text-gray-900 mt-3">Productos: </h4>   
                                            <ul class="py-0 mt-0 mb-3 pl-3">
                                                @foreach($pedido->productos as $producto)
                                                <li class="py-0 my-0"><small>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</small></li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="mt-1 text-sm text-gray-600 mt-3"><strong>Todavia no hay productos en este pedido</strong></p>
                                        @endif--}}


                                        {{-- EDITAR PEDIDO LIVEWIRE --}}
                                        {{--@if($pedido->status == 'pedido')--}}
                                            @livewire('mi-perfil-editar-pedido', ['pedido' => $pedido])
                                        {{--@endif--}}
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>

                        @endforeach

                    </div>

                    <div class="pb-5 px-5">
                        <div class="mx-1 border-t border-gray-200"></div>
                    </div>
                @else
                    <div class="modal-body">
                        <div class="text-center pt-3">
                            <p>No tiene compras.</p>
                        </div>
                    </div>
                @endif

                
            </div>
        </div>
    </div>
</div>



<!-- MODAL SUSCRIPCIONES----MODAL SUSCRIPCIONES----MODAL SUSCRIPCIONES----MODAL SUSCRIPCIONES------>
<!-- MODAL SUSCRIPCIONES----MODAL SUSCRIPCIONES----MODAL SUSCRIPCIONES----MODAL SUSCRIPCIONES------>
<div class="modal fade text-dark" id="modalMisSuscripciones" tabindex="-1" role="dialog" aria-labelledby="modalMisSuscripcionesLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">

                <div class="px-4">
                    <h3 id="modalMisSuscripcionesLabel" class="text-lg">Información de la susripción</h3>
                    <p class="mt-1 text-sm">
                        Actualice la información de su suscripción.
                    </p>
                </div>
            
                {{--<h5 class="modal-title text-center" id="modalMisSuscripcionesLabel">Información de la susripción</h5>--}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @if(count(Auth::user()->suscripciones))
                    {{-- SUSCRIPCIONES --}}
                    @foreach(Auth::user()->suscripciones as $suscripcion)
                        @livewire('editar-suscripcion', ['suscripcion' => $suscripcion])
                    @endforeach

                @else
                    <div class="text-center pt-3">
                        <p>No tiene suscripciones.</p>
                    </div>
                @endif

                    
            </div>
        </div>
    </div>
</div>



<!-- MODAL seguridad----MODAL seguridad----MODAL seguridad----MODAL seguridad------>
<!-- MODAL seguridad----MODAL seguridad----MODAL seguridad----MODAL seguridad------>
<div class="modal fade" id="modalSeguridad" tabindex="-1" role="dialog" aria-labelledby="modalSeguridadLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <div class="px-4">
                    <h3 id="modalSeguridadLabel" class="text-lg">Seguridad</h3>
                    <!--<p class="mt-1 text-sm">
                        Listado de pedidos y compras realizadas.
                    </p>-->
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            
            <div class="modal-body">


                <!-- BORRAR CUENTA -->
                @livewire('borrar-cuenta')
                

            </div>
            

        </div>


    </div>
</div>


{{--
<!-- MODAL Privacidad----MODAL Privacidad----MODAL Privacidad----MODAL Privacidad------>
<!-- MODAL Privacidad----MODAL Privacidad----MODAL Privacidad----MODAL Privacidad------>
<div class="modal fade" id="modalPrivacidad" tabindex="-1" role="dialog" aria-labelledby="modalPrivacidadLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">

                <h3 class="modal-title text-center" id="modalPrivacidadLabel">Privacidad</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            
            <div class="modal-body">


                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-jet-section-border />
                @endif

                <div class="">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
                

            </div>
            

        </div>


    </div>
</div>--}}


@endsection


