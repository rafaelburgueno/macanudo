@extends('layouts.plantilla')

@section('title', 'Mi perfil')
@section('meta-description', 'metadescripcion para la pagina Mi perfil')
    
    
@section('content')




<div class="container">
    <h1 class="text-center" style="color: #e1e1e1; ">MI PERFIL</h1><br>
</div>

<div class="container px-4 text-dark">
    <div class="row">
        <div class="col-sm-3"></div>

        <div class="col-sm-6 card">
            <div class="card-title text-center pt-2">
                <img src="{{Auth::user()->profile_photo_url}}" class="card-img-top rounded-circle" style="max-width:350px ; align-self: center;">
                <h3 class="mt-2">{{Auth::user()->name}}</h3><br>
            </div>
            <div class="card-body">
                <br>
                <h6 class="mr-5"><a href="{{route('profile.show')}}" class="link" {{--data-toggle="modal" data-target="#exampleModal"--}} style="color: #1e1e1e;">
                    <svg
                            xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                            class="bi bi-person-circle mr-5" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg> Mis datos <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                            fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg></a>
                </h6>
                <hr>
                <br><br>


                <h6 class="mr-5">
                    <a class="" data-toggle="modal" data-target="#exampleModal1" style="color: #1e1e1e;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-geo-alt-fill mr-5" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg> 
                        Direcciones 
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>
                <br><br>


                <h6 class="mr-5"> 
                    <a class="" data-toggle="modal" data-target="#modal_mis_compras" style="color: #1e1e1e;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill mr-5" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
                        </svg>
                        Mis compras 
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg>
                    </a>
                </h6>
                <hr>
                <br><br>

                <h6 class="mr-5"><a href="{{route('profile.show')}}" class="link" {{--data-toggle="modal" data-target="#exampleModal"--}} style="color: #1e1e1e;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-shield-lock mr-5" viewBox="0 0 16 16">
                        <path
                            d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                        <path
                            d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                    </svg>Seguridad <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                        fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                    </svg></a></h6>
                <hr> <br><br>
                <h6 class="mr-5"><a href="{{route('profile.show')}}" class="link" {{--data-toggle="modal" data-target="#exampleModal"--}} style="color: #1e1e1e;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-file-earmark-lock2 mr-5" viewBox="0 0 16 16">
                        <path
                            d="M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0zM7 7v1h2V7a1 1 0 0 0-2 0z" />
                        <path
                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    </svg>Privacidad <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                        fill="currentColor" class="bi bi-arrow-right-circle ml-3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                    </svg></a></h6>
                <hr>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <hr>
</div>




<!-- MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS------>
<!-- MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS----MODAL MIS DATOS------>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">
                <img src="img/fot.png" class="img-top" style="max-width:250px ; margin-left: 90px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>



            </div>
            <h5 class="modal-title text-center" id="exampleModalLabel">Verde Verdad</h5>
            <div class="modal-body">

                <form>

                    <div class="form-row">
                        <div class="form-group col-sm">
                            <label for="nombre">Nombre completo: </label>
                            <input type="text" class="form-control" id="nombre"
                                placeholder="Ingrese su nombre completo" required>
                        </div>

                    </div>
                    <div class="form-group ">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" required>
                    </div>

                    <div class="form-row">
                        <div class="form group col-sm">
                            <label for="nContacto">Número de contacto: </label>
                            <input type="text" class="form-control" id="nContacto"
                                placeholder="Ingrese su número de contacto" required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form group col-sm">
                            <label for="nContactoAlt">Contacto alternativo: </label>
                            <input type="text" class="form-control" id="nContactoAlt"
                                placeholder="Ingrese su número de contacto" required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form group col-sm">
                            <label for="nCedula">Número de cédula: </label>
                            <input type="text" class="form-control" id="nCedula"
                                placeholder="Ingrese su número de contacto" required>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" class="form-control" name="contraseña" id="contraseña"
                                placeholder="Contraseña" required />
                        </div>
                        <div class=" form-group col-sm-6">
                            <label for="confirmarContraseña">Confirmar contraseña:</label>
                            <input type="password" class="form-control" name="confirmarContraseña"
                                id="confirmarContraseña" placeholder="Confirmar contraseña" required />
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="recordarme">
                            <label class="form-check-label" for="recordarme">Recordarme</label><br>

                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button class="btn shadown" style="color:#f04643;">Modificar</button>
                <button class="btn btn-outline shadown " style="color: #4554a4; ">Guardar</button>
            </div>

        </div>


    </div>
</div>




<!-- MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES------>
<!-- MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES----MODAL MIS DIRECCIONES------>
<div class="modal fade text-dark" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Mis direcciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="line-height: 10px;">

                @foreach($pedidos as $pedido)
                    @if($pedido->direccion != 'el pedido se retira en la planta')
                        <p><strong>Teléfono: </strong>{{$pedido->telefono}}</p>
                        <p><strong>Dirección: </strong>{{$pedido->direccion}}</p>
                        <p><strong>Localidad: </strong>{{$pedido->localidad}}</p>
                        <p><strong>Departamento: </strong>{{$pedido->departamento}}</p><br>
                        <hr>
                    @endif
                @endforeach
                
            </div>
        </div>
    </div>
</div>




<!-- MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS------>
<!-- MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS----MODAL MIS COMPRAS------>
<div class="modal fade text-dark" id="modal_mis_compras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Mis compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="line-height: 10px;">


                <div class="accordion" id="accordion-mis-compras">

                    @foreach($pedidos as $pedido)
                    
                        <div class="card">
                        <div class="card-header" id="compra-{{$pedido->id}}">
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse-{{$pedido->id}}" aria-expanded="true" aria-controls="collapse-{{$pedido->id}}">
                                <strong>{{$pedido->monto}}$</strong> | {{$pedido->created_at->format('d/m/Y')}}
                            </button>
                            </h2>
                        </div>
                        <div id="collapse-{{$pedido->id}}" class="collapse showw" aria-labelledby="compra-{{$pedido->id}}" data-parent="#accordion-mis-compras">
                            <div class="card-body">
                                <p><strong>Estado del pedido: </strong>{{$pedido->status}}</p>
                                <p><strong>Estado del pago: </strong>{{$pedido->estado_del_pago}}</p>
                                <p><strong>Medio de pago: </strong>{{$pedido->medio_de_pago}}</p>
                                <p><strong>Número de factura: </strong>{{$pedido->numero_de_factura}}</p>
                                <p><strong>Fecha de creación: </strong>{{$pedido->created_at}}</p>
                                
                                <p><strong>Productos: </strong>    
                                    <ul class="py-0 mt-0 mb-3">
                                        @foreach($pedido->productos as $producto)
                                        <li class="py-1 my-0">{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                                        @endforeach
                                    </ul>
                                </p>

                            </div>
                        </div>
                        </div>

                    @endforeach

                </div>
                
            </div>
        </div>
    </div>
</div>






@endsection


