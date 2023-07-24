@extends('layouts.plantilla')

@section('title', 'Pedidos')
@section('meta-description', 'metadescripcion para la pagina de pedidos')
    
    
@section('content')

<!-- Tabla de Productos -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_pedidos').DataTable({
			order: [
				[8, 'desc']
			]
		});
	} );

    $(document).ready( function () {
		$('#tabla_suscripciones').DataTable({
			order: [
				[7, 'desc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">PEDIDOS</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_pedidos" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
                    <th></th>
                    {{--<th>Estatus</th>--}}
                    {{--<th>Dirección</th>--}}
					<th>Nombre</th>
                    <th>Tipo</th>
                    {{--<th>Teléfono</th>--}}
					<th>Productos</th>
                    {{--<th>Nombre</th>--}}
					<th>Monto</th>
                    <th>Cupón</th>
                    <th>Fecha</th>
					{{--<th>id</th>--}}
					<th>Administrar</th>
                    <th>Id</th>
					
				</tr>
			</thead>
			<tbody>
                {{--entregado-telefono-direccion- lista del pedido- nombre--}}
			
				@foreach ($pedidos as $pedido)
                    @if($pedido->estado_del_pago == 'pagado')
					<tr style="background-color:#beffbe;">
                    @elseif($pedido->status == 'cancelado' || $pedido->status == 'verificado')
                    <tr style="background-color: var(--gris-oscuro);color: var(--blanco);">
                    @elseif($pedido->estado_del_pago == 'pendiente')
					<tr style="background-color:#ffd4db;">
                    {{--@elseif($pedido->estado_del_pago == 'pagar al retirar')
					<tr style="background-color:#f8ff92;">--}}
                    
                    
                    @else
                    <tr>
                    @endif

                        

                        {{--<td>
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#info_del_pedido_{{ $pedido->id }}">Ver</a></td>
                        <td>--}}
                        @if($pedido->estado_del_pago == 'pagado')
                            <td class="rounded p-3 btn-verdeC">
                        @elseif($pedido->estado_del_pago == 'pendiente')
                            <td class="rounded p-3 btn-rojo">
                        @else
                            <td class="rounded p-3">
                        @endif
                            <a class="btn btn-light" data-toggle="modal" data-target="#info_del_pedido_{{ $pedido->id }}">Ver</a>
                        </td>
                        
                        
                        
                        {{--<td>{{ $pedido->direccion }}
                            @if($pedido->costo_de_envio && $pedido->costo_de_envio->region != "Planta de elaboración")
                            , {{ $pedido->costo_de_envio->region }}, {{ $pedido->costo_de_envio->departamento }}
                            @endif
                        </td>--}}
                        <td>{{ $pedido->nombre }}</td>
                        <td>{{ $pedido->tipo }}</td>
                        {{--<td>{{ $pedido->telefono }}</td>--}}
                        <td>
                            @if(count($pedido->productos) || isset($pedido->canasta_id))
                                @if(isset($pedido->canasta_id))
                                    <small>Canasta ({{ $pedido->canasta->nombre }}):
                                    <ul>
                                        @foreach($pedido->canasta->productos as $producto)
                                            <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                                        @endforeach
                                    </ul></small>
                                @endif
                                @if(count($pedido->productos))
                                    <small>Pedido:
                                    <ul>
                                        @foreach($pedido->productos as $producto)
                                            <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                                        @endforeach
                                    </ul></small>
                                @endif
                            @else
                                <div class="alert alert-warning m-1 p-1"><small>El pedido no tiene productos.</small></div>
                            @endif
                        </td>
                        {{--<td>{{ $pedido->nombre }}</td>--}}
						<td>{{ $pedido->monto }} $</td>
                        <td>
                            @if($pedido->cupon_id)
                                {{ $pedido->cupon->codigo }}
                            @endif
                        </td>
						<td>{{ $pedido->created_at }}</td>
                        {{--<td>{{ $pedido->created_at->format('d/m/Y') }}</td>--}}
                        {{--<td>{{ $pedido->detalleDeProductos() }}</td>--}}
                        {{--@if(isset($pedido->canasta))
                        <td>{{ $pedido->canasta->detalleDeProductos() }}</td>
                        @else
                        <td></td>
                        @endif--}}

						<td><a href="{{route('pedidos.edit', $pedido)}}" class="btn btn-sm btn-outline-secondary ">Editar</a></td>
                        <td>{{ $pedido->id }}</td>
						
					</tr>


                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <div class="modal fade" id="info_del_pedido_{{ $pedido->id }}" tabindex="-1" role="dialog" aria-labelledby="info_del_pedido_{{ $pedido->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content negro">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="info_del_pedido_{{ $pedido->id }}Label">{{$pedido->created_at}} | Pedido Id:{{$pedido->id}}</h5><br>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                {{--<h4 class="text-center rojo">{{ $pedido->monto }} $</h4><br>--}}
                                
                                <div class="modal-body ">
                                    <!-- Botones para editar el pedido -->
                                    <!-- Botones para editar el pedido -->
                                    {{--<livewire:editar-pedido />--}}
                                    {{--@livewire('editar-pedido', [$pedido])--}}
                                    <!-- Botones para editar el pedido -->
                                    <!-- Botones para editar el pedido -->
                                    {{--<p>creado: {{$pedido->created_at}}</p>
                                    <p>creado->subMonth(): {{$pedido->created_at->subMonth()}}</p>--}}
                                    <p>Tipo de pedido: <strong>{{ $pedido->tipo }}</strong></p>
                                    <p>Estado del pedido: <strong>{{ $pedido->status }}</strong></p>
                                    <p>Estado del pago: <strong>{{ $pedido->estado_del_pago }}</strong></p>
                                    <hr>
                                    <p>Dia de entrega: 
                                        @if($pedido->costo_de_envio_id)
                                            <strong>{{ $pedido->costo_de_envio->dia_de_entrega }}</strong>
                                        @endif
                                        @if($pedido->suscripcion_id)
                                            <strong>{{ $pedido->suscripcion->dia_de_entrega }}</strong>
                                        @endif
                                    </p>
                                    <p>Monto: <strong>{{ $pedido->monto }} $</strong></p>
                                    {{--<p>Status: <strong>{{ $pedido->status }}</strong></p>--}}
                                    <p>Medio de pago: <strong>{{ $pedido->medio_de_pago }}</strong></p>
                                    {{--<p>Estado del pago: <strong>{{ $pedido->estado_del_pago }}</strong></p>--}}
                                    <p>Factura: <strong>{{ $pedido->numero_de_factura }}</strong></p>
                                    <p>Factura de DGI: <strong>{{ $pedido->factura_dgi }}</strong></p>
                                    @if($pedido->cupon_id)
                                        <p>Cupon usado: "<strong class="">{{ $pedido->cupon->codigo }}</strong>" | id: {{$pedido->cupon_id}}</p>
                                    @endif
                                    @if($pedido->suscripcion_id)
                                        <p>Club: id: {{ $pedido->suscripcion_id }} | suscripcion: {{ $pedido->suscripcion->tipo }} | activa: {{ $pedido->suscripcion->activo }} </p>
                                    @endif
                                    <hr>
                                    <p>Nombre: <strong>{{ $pedido->nombre }}</strong></p>
                                    @if($pedido->user_id)
                                    <p>Email: <strong>{{ $pedido->user->email }}</strong></p>
                                    @endif
                                    <p>Dirección: <strong>{{ $pedido->direccion }}</strong></p>
                                    <p>Teléfono: <strong>{{ $pedido->telefono }}</strong></p>
                                    @if(!($pedido->documento_de_identidad == 9999999))
                                        <p>C.I.: <strong>{{ $pedido->documento_de_identidad }}</strong></p>
                                    @endif
                                    @if($pedido->costo_de_envio && $pedido->costo_de_envio->costo_de_envio != 0)
                                        <p>Localidad: <strong>{{ $pedido->costo_de_envio->region }}</strong></p>
                                        <p>Departamento: <strong>{{ $pedido->costo_de_envio->departamento }}</strong></p>
                                    @endif
                                    <hr>
                                    <h4>Productos:</h4>
                                    <ul>
                                        @foreach($pedido->productos as $producto)
                                            <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
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

<div id="titulo_suscripciones"><br></div>

<div class="text-center text-white my-4 mt-5">
    <h1 class="text-center pt-2">SUSCRIPCIONES</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_suscripciones" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
                    <th></th>
                    <th>Dia de entrega</th>
                    <th>Dirección de entrega</th>
                    <th>Tipo</th>
					<th>Precio</th>
					<th>Nombre</th>
                    <th>Fecha de nacimiento</th>
                    {{--<th>Teléfono</th>--}}
                    {{--<th>Canastas restantes</th>--}}
                    <th>Activa</th>
					<th>No consumo...</th>
					{{--<th>Administrar</th>--}}
					
				</tr>
			</thead>
			<tbody>
                {{--entregado-telefono-direccion- lista del pedido- nombre--}}
			
				@foreach ($suscripciones as $suscripcion)
                    
                    <tr>
                        <td><a class="btn btn-light" data-toggle="modal" data-target="#info_de_la_suscripcion_{{ $suscripcion->id }}">Ver</a></td>
                        <td>{{ $suscripcion->dia_de_entrega }}</td>
                        <td>{{ $suscripcion->direccion_de_entrega }}</td>
                        <td>{{ $suscripcion->cantidad_de_quesos }} <small>quesos</small></td>
                        <td>$ {{ $suscripcion->precio }}</td>
                        <td>
                            @if($suscripcion->user != null)
                                {{ $suscripcion->user->name }}
                            @endif
                        </td>
                        <td>
                            @if($suscripcion->user != null)
                                {{ $suscripcion->user->fecha_de_nacimiento }}
                            @endif
                        </td>
                        <td>
                        <!-- si la suscripcion esta activa imprime SI, si no esta activa imprime NO-->
                            @if($suscripcion->activo == 1)
                                SI
                            @else
                                NO
                            @endif    
                        </td>
                        {{--<td>{{ $suscripcion->telefono }}</td>--}}
                        {{--<td>{{ $suscripcion->cantidad_de_canastas }}</td>--}}
                        <td>
                            @if($suscripcion->user != null)
                                {{ $suscripcion->user->ingredientes_que_no_consumo }}
                            @endif
                        </td>
                        {{--<td></td>--}}
                        
						{{--<td><a href="{{route('pedidos.edit', $suscripcion)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>--}}

						
					</tr>


                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <div class="modal fade" id="info_de_la_suscripcion_{{ $suscripcion->id }}" tabindex="-1" role="dialog" aria-labelledby="info_de_la_suscripcion_{{ $suscripcion->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content negro">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="info_de_la_suscripcion_{{ $suscripcion->id }}Label">{{$suscripcion->created_at}} | Suscripción Id:{{$suscripcion->id}}</h5><br>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body ">

                                    <p>Dia de entrega: {{$suscripcion->dia_de_entrega}}</p>
                                    <p>Direccion de entrega: {{$suscripcion->direccion_de_entrega}}</p>
                                    <p>Telefono: {{$suscripcion->telefono}}</p>
                                    <p>Tipo: {{$suscripcion->cantidad_de_quesos}} quesos</p>
                                    <p>Precio: $ {{$suscripcion->precio}}</p>
                                    @if($suscripcion->user != null)
                                        <p>Nombre: {{$suscripcion->user->name}}</p>
                                        <p>Fecha de nacimiento: {{$suscripcion->user->fecha_de_nacimiento}}</p>
                                    @endif
                                    
                                    <p>Activo: @if($suscripcion->activo) Si @else No @endif</p>

                                    @if($suscripcion->user != null)
                                        <p>Ingredientes que no consumo: {{$suscripcion->user->ingredientes_que_no_consumo}}</p>
                                    @endif

                                    <p>Cantidad de canastas: {{$suscripcion->cantidad_de_canastas}}</p>
                                    
                                    <p>Fecha de inicio: {{$suscripcion->fecha_de_inicio}}</p>
                                    <p>Fecha de renovacion: {{$suscripcion->fecha_de_renovacion}}</p>
                                    <p>Fecha de creacion: {{$suscripcion->created_at}}</p>
                                    <p>Fecha de actualizacion: {{$suscripcion->updated_at}}</p>

                                    
                                </div>

                                <div class="modal-footer">
                                    <form action="{{ route('suscripcion.destroy', $suscripcion) }}" method="POST" class="alerta-antes-de-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger mt-2">Eliminar definitivamente</button>
                                    </form>
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
    <h2 class="text-center pt-2">CREAR PEDIDO</h2>
</div>--}}
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            {{--<form id="form_crear_pedido" class="p-3" action="{{route('pedidos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">

                        <!--input para el status-->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pedido">Pedido</option>
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
                                <option value="pedido normal">Pedido normal</option>
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
                    /*$("#form_crear_pedido").submit(function(e){
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


