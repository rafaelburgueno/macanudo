@extends('layouts.plantilla')

@section('title', 'Cupones')
@section('meta-description', 'metadescripcion para la pagina de cupones')
    
    
@section('content')

<!-- Tabla de Cupones -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_cupones').DataTable({
			order: [
				[0, 'asc']
			]
		});

        $('#tabla_pedidos').DataTable({
			order: [
				[2, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">CUPONES</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_cupones" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>id</th>
					<th>Código</th>
					<th>Descuento</th>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Creación</th>
                    <th>Vencimiento</th>
					<th>Activo?</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($cupones as $cupon)
					<tr>
                        <td>{{ $cupon->id }}</td>
                        <td>{{ $cupon->codigo }}</td>
                        <td>{{ $cupon->descuento }} %</td>
                        <td>{{ $cupon->descripcion }}</td>
                        <td>{{ $cupon->cantidad }}</td>
                        <td>{{ $cupon->created_at->format('Y-m-d') }}</td>
                        <td>{{ $cupon->vencimiento }}</td>
                        <td>
							@if($cupon->activo)
							SI
							@else
							NO
							@endif
						</td>
						
						
                        {{--<td>
                            @if (count($cupon->multimedias))
                                <img src="{{$cupon->multimedias->last()->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                            @else
                                NO    
                            @endif
                        </td>--}}
						<td><a href="{{route('cupones.edit', $cupon)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>

						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR CUPÓN</h2>
</div>
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <form class="p-3" action="{{route('cupones.store')}}" method="POST" {{--enctype="multipart/form-data"--}} >
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">
                        
                        <!--input para el codigo-->
                        <div class="form-group mb-3">
                            <label for="codigo">Código</label>
                            <input required type="text" class="form-control" id="codigo" name="codigo" placeholder="..." value="{{old('codigo')}}" maxlength="50">
                            @error('codigo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col col-sm-6">
                                <!--input para el cantidad-->
                                <div class="form-group mb-3">
                                    <label for="cantidad">Cantidad</label>
                                    <input required type="number" class="form-control" id="cantidad" name="cantidad" placeholder="..." value="{{old('cantidad')}}" min="0" style="width: 100%;">
                                    @error('cantidad')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col col-sm-6">
                                <!--input para el descuento-->
                                <div class="form-group mb-3">
                                    <label for="descuento">Descuento (%)</label>
                                    <input required type="number" class="form-control" id="descuento" name="descuento" placeholder="..." value="{{old('descuento')}}" min="0" max="100" style="width: 100%;">
                                    @error('descuento')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--input para el vencimiento-->
                        <div class="form-group mb-3">
                            <label for="vencimiento">Vencimiento</label>
                            <input type="date" class="form-control" id="vencimiento" name="vencimiento" value="{{old('vencimiento')}}">
                            @error('vencimiento')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                
                    <div class="col-md-6">
                        
                        <!--input para la descripción-->
                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{old('descripcion')}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!--input para checkbox 'publicar'-->
                        <div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                            <label class="form-check-label" for="activo">Activar el cupón</label>
                            @error('activo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Confirmar</button>
            </form>
        </div>
    </div>


</div>



<!-- HISTORIAL DE CUPONES -->
<!-- HISTORIAL DE CUPONES -->
<!-- HISTORIAL DE CUPONES -->
<!-- HISTORIAL DE CUPONES -->
<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">Historial de cupones</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_pedidos" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
                    {{--<th></th>--}}
                    <th>Estatus</th>
                    {{--<th>Dirección</th>--}}
					<th>Nombre</th>
                    {{--<th>Teléfono</th>--}}
                    <th>Cupón</th>
					<th>Productos</th>
                    {{--<th>Nombre</th>
					<th>Monto</th>--}}
                    <th>Fecha</th>
					{{--<th>id</th>--}}
					{{--<th>Administrar</th>--}}
					
				</tr>
			</thead>
			<tbody>
                {{--entregado-telefono-direccion- lista del pedido- nombre--}}
			
				@foreach ($pedidos as $pedido)
                    
                    <tr>
                    
                        <td>{{ $pedido->status }}</td>
                        {{--<td>{{ $pedido->direccion }}
                            @if($pedido->costo_de_envio && $pedido->costo_de_envio->region != "Planta de elaboración")
                            , {{ $pedido->costo_de_envio->region }}, {{ $pedido->costo_de_envio->departamento }}
                            @endif
                        </td>--}}
                        <td>{{ $pedido->nombre }}</td>
                        {{--<td>{{ $pedido->telefono }}</td>--}}
                        <td>
                            @if($pedido->cupon_id)
                                <strong>{{ $pedido->cupon->codigo }}</strong>
                            @endif
                        </td>
                        <td>
                            <ul>
                                @foreach($pedido->productos as $producto)
                                    <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                                @endforeach
                            </ul>
                        </td>
                        {{--<td>{{ $pedido->nombre }}</td>
						<td>{{ $pedido->monto }} $</td>--}}
						<td>{{ $pedido->created_at }}</td>
                        {{--<td>{{ $pedido->created_at->format('d/m/Y') }}</td>--}}
                        {{--<td>{{ $pedido->id }}</td>--}}
                        
						{{--<td><a href="{{route('pedidos.edit', $pedido)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>--}}

						
					</tr>


                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <div class="modal fade" id="info_del_pedido_{{ $pedido->id }}" tabindex="-1" role="dialog" aria-labelledby="info_del_pedido_{{ $pedido->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content negro">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="info_del_pedido_{{ $pedido->id }}Label">{{$pedido->created_at}} | id:{{$pedido->id}}</h5><br>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                {{--<h4 class="text-center rojo">{{ $pedido->monto }} $</h4><br>--}}
                                
                                <div class="modal-body ">
                                    <!-- Botones para editar el pedido -->
                                    <!-- Botones para editar el pedido -->
                                    {{--<livewire:editar-pedido />--}}
                                    @livewire('editar-pedido', [$pedido])
                                    <!-- Botones para editar el pedido -->
                                    <!-- Botones para editar el pedido -->
                                    <hr>
                                    <p>Monto: <strong>{{ $pedido->monto }} $</strong></p>
                                    {{--<p>Status: <strong>{{ $pedido->status }}</strong></p>--}}
                                    <p>Medio de pago: <strong>{{ $pedido->medio_de_pago }}</strong></p>
                                    {{--<p>Estado del pago: <strong>{{ $pedido->estado_del_pago }}</strong></p>--}}
                                    <p>Factura: <strong>{{ $pedido->numero_de_factura }}</strong></p>
                                    @if($pedido->cupon_id)
                                        <p>Cupon usado: "<strong class="">{{ $pedido->cupon->codigo }}</strong>" | id: {{$pedido->cupon_id}}</p>
                                    @endif
                                    <hr>
                                    <p>Nombre: <strong>{{ $pedido->nombre }}</strong></p>
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



@endsection


