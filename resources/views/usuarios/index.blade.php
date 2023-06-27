@extends('layouts.plantilla')

@section('title', 'Usuarios')
@section('meta-description', 'metadescripcion para la pagina de usuarios')
    
    
@section('content')

<!-- Tabla de Usuarios -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_usuarios').DataTable({
			order: [
				[0, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">USUARIOS</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_usuarios" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
                    {{--<th></th>--}}
                    {{--<th>Estatus</th>--}}
                    <th>Id</th>
					<th>Nombre</th>
                    <th>Email</th>
                    {{--<th>Teléfono</th>--}}
					<th>Rol</th>
                    {{--<th>Nombre</th>--}}
					<th>Activo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Ingredientes que no consumo</th>
                    <th>Creado</th>
					{{--<th>id</th>--}}
					{{--<th>Administrar</th>--}}
					
				</tr>
			</thead>
			<tbody>
                {{--entregado-telefono-direccion- lista del usuario- nombre--}}
			
				@foreach ($usuarios as $usuario)
                    @if($usuario->rol == 'administrador')
					    <tr style="background-color:#beffbe;">
                    @elseif($usuario->rol == 'suscriptor')
					    <tr style="background-color:#ffd4db;">
                    @else
                        <tr>
                    @endif

                        @if($usuario->activo == true)
                            <td class="rounded p-3 btn-verdeC">
                        @elseif($usuario->activo == false)
                            <td class="rounded p-3 btn-rojo">
                        @else
                            <td class="rounded p-3">
                        @endif
                            <a class="btn btn-light" data-toggle="modal" data-target="#info_del_usuario_{{ $usuario->id }}">{{$usuario->id}}</a>
                        </td>
                        
                        
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td><small>{{ $usuario->rol }}</small></td>
                        <td>
                            @if($usuario->activo == true)
                                <strong>Si</strong>
                            @else
                                <strong>No</strong>
                            @endif
                        </td>
                        {{--<td>{{ $usuario->nombre }}</td>--}}
						<td>{{ $usuario->fecha_de_nacimiento }}</td>
                        <td>{{ $usuario->ingredientes_que_no_consumo }}</td>
						<td><small>{{ $usuario->created_at }}</small></td>
                        {{--<td>{{ $usuario->created_at->format('d/m/Y') }}</td>--}}
                        

						{{--<td><a href="{{route('usuarios.edit', $usuario)}}" class="btn btn-sm btn-outline-secondary">Editar</a></td>--}}
                
						
					</tr>


                    <!--MODAL CON INFORMACION DEL usuario-->
                    <!--MODAL CON INFORMACION DEL usuario-->
                    <!--MODAL CON INFORMACION DEL usuario-->
                    <div class="modal fade" id="info_del_usuario_{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="info_del_usuario_{{ $usuario->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content negro">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="info_del_usuario_{{ $usuario->id }}Label">Id:{{$usuario->id}} | {{ $usuario->name }}</h5><br>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                {{--<h4 class="text-center rojo">{{ $usuario->monto }} $</h4><br>--}}
                                
                                <div class="modal-body ">
                                    @if($usuario->profile_photo_url)
                                        <div class="text-center mb-4">
                                            <img class="rounded" src="{{ $usuario->profile_photo_url }}" alt="foto" {{--width="100px"--}}>
                                        </div>
                                    @endif

                                    <!-- Botones para editar el usuario -->
                                    <!-- Botones para editar el usuario -->
                                    {{--<livewire:editar-usuario />--}}
                                    {{--@livewire('editar-usuario', [$usuario])--}}
                                    <!-- Botones para editar el usuario -->
                                    <!-- Botones para editar el usuario -->
                                    {{--<p>creado: {{$usuario->created_at}}</p>
                                    <p>creado->subMonth(): {{$usuario->created_at->subMonth()}}</p>--}}
                                    {{--<p>Nombre: <strong>{{ $usuario->name }}</strong></p>--}}
                                    <p>Email: <strong>{{ $usuario->email }}</strong></p>
                                    <p>Rol: <strong>{{ $usuario->rol }}</strong></p>
                                    
                                    <p>Activo: 
                                        @if($usuario->activo == true)
                                            <strong>Si</strong>
                                        @else
                                            <strong>No</strong>
                                        @endif
                                    </p>
                                    
                                    <p>Fecha de nacimiento: <strong>{{ $usuario->fecha_de_nacimiento }}</strong></p>
                                    <p>Ingredientes que no consumo: <strong>{{ $usuario->ingredientes_que_no_consumo }}</strong></p>
                                    
                                    <p>Fecha de creacion: <strong>{{ $usuario->created_at }}</strong></p>
                                    <p>Fecha de edicion: <strong>{{ $usuario->updated_at }}</strong></p>
                                    
                                    
                                    
                                    <hr>

                                    <h4>Suscripciones:</h4>
                                    <ul class="h6">
                                        @foreach($usuario->suscripciones as $suscripcion)
                                            <li>Id: {{ $suscripcion->id }} | creada: {{ $suscripcion->created_at }} 
                                                | @if($suscripcion->activo == true)
                                                    Activa
                                                @else
                                                    No activa
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    
                                    <hr>

                                    <h4>Pedidos:</h4>
                                    <ul>
                                        @foreach($usuario->pedidos as $pedido)
                                            <li>
                                                <a href="{{URL::signedRoute('ver_pedido', ['pedido' => $pedido->id])}}">
                                                    Id: {{ $pedido->id }} | creado: {{ $pedido->created_at }} 
                                                </a>
                                                @if(@isset($pedido->suscripcion_id)) | Suscripcion: {{ $pedido->suscripcion_id }} @endif 
                                            </li>
                                        @endforeach
                                    </ul>
                                    
                                    
                                </div>

                            </div>
                        </div>

                    </div>

				@endforeach
			</tbody>
		</table>
	</div>


</div>




{{--<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR USUARIO</h2>
</div>--}}
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            {{--<form id="form_crear_usuario" class="p-3" action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">

                        <!--input para el status-->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="usuario">usuario</option>
                                <option value="despachado">despachado</option>
                                <option value="en viaje">En viaje</option>
                                <option value="entregado">Entregado</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!--input para el tipo-->
                        <div class="form-group mb-3">
                            <label for="tipo">tipo</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="usuario normal">usuario normal</option>
                                <option value="club del queso">Club del queso</option>
                            </select>
                            @error('tipo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <!--input para el nombre-->
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre')}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!--input para el email-->
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input required type="text" class="form-control" id="email" name="email" placeholder="..." value="{{old('email')}}">
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el documento_de_identidad-->
                        <div class="form-group mb-3">
                            <label for="documento_de_identidad">Documento de identidad</label>
                            <input type="number" class="form-control" id="documento_de_identidad" name="documento_de_identidad" placeholder="..." value="{{old('documento_de_identidad')}}" min="0">
                            @error('documento_de_identidad')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el telefono-->
                        <div class="form-group mb-3">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="..." value="{{old('telefono')}}" min="0">
                            @error('telefono')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <!--input para la direccion-->
                        <div class="form-group mb-3">
                            <label for="direccion">Dirección</label>
                            <textarea required class="form-control" id="direccion" name="direccion" rows="3">{{old('direccion')}}</textarea>
                            @error('direccion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la localidad-->
                        <div class="form-group mb-3">
                            <label for="localidad">Localidad</label>
                            <input type="text" class="form-control" id="localidad" name="localidad" placeholder="..." value="{{old('localidad')}}">
                            @error('localidad')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la departamento-->
                        <div class="form-group mb-3">
                            <label for="departamento">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" placeholder="..." value="{{old('departamento')}}">
                            @error('departamento')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la Pais-->
                        <div class="form-group mb-3">
                            <label for="Pais">Pais</label>
                            <input type="text" class="form-control" id="pais" name="pais" placeholder="..." value="{{old('pais')}}">
                            @error('Pais')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                
                    <div class="col-md-6">

                        <!--input para el monto-->
                        <div class="form-group mb-3">
                            <label for="monto">Monto</label>
                            <input type="number" class="form-control" id="monto" name="monto" placeholder="..." value="{{old('monto')}}" min="0">
                            @error('monto')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para checkbox Recibir novedades -->
                        <div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="recibir_novedades" name="recibir_novedades" value="1" @checked(old('recibir_novedades'))>
                            <label class="form-check-label" for="recibir_novedades">Recibir novedades</label>
                            @error('recibir_novedades')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la tipo_de_cliente-->
                        <div class="form-group mb-3">
                            <label for="tipo_de_cliente">Tipo de cliente</label>
                            <input type="text" class="form-control" id="tipo_de_cliente" name="tipo_de_cliente" placeholder="..." value="{{old('tipo_de_cliente')}}">
                            @error('tipo_de_cliente')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el numero_de_factura-->
                        <div class="form-group mb-3">
                            <label for="numero_de_factura">Numero de factura</label>
                            <input type="number" class="form-control" id="numero_de_factura" name="numero_de_factura" placeholder="..." value="{{old('numero_de_factura')}}" min="0">
                            @error('numero_de_factura')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group mb-3 border rounded border-light p-2">
                            <h4>Canasta</h4>
                            @foreach ($canastas as $canasta)
                                <!--input para cada canasta-->
                                <div class="form-check my-4">
                                    <input type="radio" class="form-check-input" id="canasta_id" name="canasta_id" value="{{ $canasta->id }}" @checked(old('canasta_id'))>
                                    <label class="form-check-label" for="canasta_id">{{ $canasta->nombre }}</label>
                                </div>
                            @endforeach
                        </div>
                        

                        <div class="form-group mb-3 border rounded border-light  p-2">
                            <h4>Productos</h4>
                            @foreach ($lista_de_productos as $producto)

                                <!--input para cada producto-->
                                <div class="form-check my-4">
                                    <input type="checkbox" class="rounded p-2 " id="producto{{ $producto->id }}" name="productos[]" value="{{ $producto->id }}" @checked(old('productos')) onclick="masCantidad{{ $producto->id }}()">
                                    <label class="" for="producto{{ $producto->id }}">{{ $producto->nombre }}</label>
                                    <!--input para añadir mas unidades-->
                                    <input type="number" style="display:none" class="cantidades rounded p-2 " id="cantidad{{ $producto->id }}" name="cantidades[]" value="0" min="0">
                                </div>
                                <script>
                                    function masCantidad{{ $producto->id }}() {
                                        // Get the checkbox
                                        var checkBox = document.getElementById('producto{{ $producto->id }}');
                                        // Get the intput cantidad
                                        var cantidad = document.getElementById('cantidad{{ $producto->id }}');

                                        // If the checkbox is checked, display the output cantidad
                                        if (checkBox.checked == true){
                                            cantidad.value = 1;
                                            cantidad.style.display = "block";
                                        } else {
                                            cantidad.style.display = "none";
                                            cantidad.value = 0;
                                        }
                                        //alert('aprete el checkbox!');
                                    }
                                </script>
                            
                            @endforeach
                            
                        </div>


                        <div class="form-group mb-3 border rounded border-light  p-2">
                            <h4>Costos de envio</h4>
                            @foreach ($costos_de_envio as $costo_de_envio)

                                <!--input para cada costo_de_envio-->
                                <div class="form-check my-4">
                                    <input type="radio" class="form-check-input" id="costo_de_envio_id" name="costo_de_envio_id" value="{{ $costo_de_envio->id }}" @checked(old('costo_de_envio_id'))>
                                    <label class="form-check-label" for="costo_de_envio_id">{{ $costo_de_envio->region }} - {{ $costo_de_envio->departamento }}</label>
                                </div>
                            
                            @endforeach
                        </div>
                        

                        <div class="form-group mb-3 border rounded border-light  p-2">
                            <h4>Cupones</h4>
                            @foreach ($cupones as $cupon)

                                <!--input para cada cupon-->
                                <div class="form-check my-4">
                                    <input type="radio" class="form-check-input" id="cupon_id" name="cupon_id" value="{{ $cupon->id }}" @checked(old('cupon_id'))>
                                    <label class="form-check-label" for="cupon_id">{{ $cupon->codigo }} - {{ $cupon->descripcion }}</label>
                                </div>
                            
                            @endforeach
                        </div>                      
                       

                        

                        
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Confirmar</button>

                <script>
                    /*$("#form_crear_usuario").submit(function(e){
                        e.preventDefault();

                        var valueArray = $('.cantidades').map(function() {
                            if(this.value >= 0){
                                return this.value;
                            }

                        }).get();

                        let arrayCantidades = [];
                        arrayCantidades = valueArray.filter(function(elemento){
                            return elemento != 0;
                        });

                        $("#cantidadesFinales").push(arrayCantidades);

                        //alert('las cantidades finales son: ' + $("#cantidadesFinales").val());
                        this.submit();
                    });*/
                </script>

            </form>--}}
        </div>
    </div>


</div>


@endsection


