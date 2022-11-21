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
				[0, 'desc']
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
                    <th>Dirección</th>
                    <th>Teléfono</th>
					<th>Nombre</th>
					<th>Productos</th>
                    {{--<th>Nombre</th>
					<th>Monto</th>--}}
                    <th>Fecha</th>
					{{--<th>id</th>--}}
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
                {{--entregado-telefono-direccion- lista del pedido- nombre--}}
			
				@foreach ($pedidos as $pedido)
                    @if($pedido->status == 'pago recibido')
					<tr style="background-color:#beffbe;">
                    @elseif($pedido->status == 'pedido sin pagar')
					<tr style="background-color:#ffd4db;">
                        @elseif($pedido->status == 'pagar al retirar')
					<tr style="background-color:#f8ff92;">
                    @else
                    <tr>
                    @endif
                        {{--<td>
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#info_del_pedido_{{ $pedido->id }}">Ver</a></td>
                        <td>--}}
                        @if($pedido->status == 'sin definir la forma de pago')
                            <td class="rounded p-3">
                        @elseif($pedido->status == 'pedido sin pagar')
                            <td class="rounded p-3 btn-rojo">
                        @elseif($pedido->status == 'pagar al retirar')
                            <td class="rounded p-3 btn-amarillo">
                        @elseif($pedido->status == 'pago recibido')
                            <td class="rounded p-3 btn-verdeC">
                        @else
                            <td class="rounded p-3">
                        @endif
                            <a class="btn btn-light" data-toggle="modal" data-target="#info_del_pedido_{{ $pedido->id }}">Ver</a>
                        </td>
                        <td>{{ $pedido->direccion }}
                        <td>{{ $pedido->telefono }}</td>
                        <td>{{ $pedido->nombre }}</td>
                            @if($pedido->costo_de_envio)
                                , {{ $pedido->costo_de_envio->region }}
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
                        
						<td><a href="{{route('pedidos.edit', $pedido)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>

						
					</tr>


                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <!--MODAL CON INFORMACION DEL PEDIDO-->
                    <div class="modal fade" id="info_del_pedido_{{ $pedido->id }}" tabindex="-1" role="dialog" aria-labelledby="info_del_pedido_{{ $pedido->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content align-items-center negro">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <h5 class="modal-title text-center" id="info_del_pedido_{{ $pedido->id }}Label">{{$pedido->nombre}}</h5><br>
                                <h4 class="text-center rojo">{{ $pedido->monto }} $</h4><br>
                                
                                <div class="modal-body ">
                                    <p>Dirección: {{ $pedido->direccion }}</p>
                                    <p>Teléfono: {{ $pedido->telefono }}</p>
                                    @if($pedido->costo_de_envio)
                                        <p>Localidad: {{ $pedido->costo_de_envio->region }}</p>
                                        <p>Departamento: {{ $pedido->costo_de_envio->departamento}}</p>
                                    @endif
                                    <ul>
                                        <h3>Detalle del pedido:</h3>
                                        @foreach($pedido->productos as $producto)
                                            <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                                        @endforeach
                                    </ul>
                                    <p>Estatus: {{ $pedido->status }}</p>
                                    <p>C.I.: {{ $pedido->documento_de_identidad }}</p>
                                    <p>Medio de pago: {{ $pedido->medio_de_pago }}</p>
                                    <p>Factura: {{ $pedido->numero_de_factura }}</p>
                                    
                                    
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

