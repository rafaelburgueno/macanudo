@extends('layouts.plantilla')

@section('title', 'Mi perfil')
@section('meta-description', 'metadescripcion para la pagina Mi perfil')
    
    
@section('content')


{{--@php
	// SDK de Mercado Pago
	//require __DIR__ .  '/vendor/autoload.php';
	require base_path('vendor/autoload.php');
	// Agrega credenciales
	//MercadoPago\SDK::setAccessToken('PROD_ACCESS_TOKEN');
	MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


	// Crea un objeto de preferencia
	$preference = new MercadoPago\Preference();

	// Crea un ítem en la preferencia
	$item = new MercadoPago\Item();
	$item->title = 'Mi producto';
	$item->quantity = 1;
	$item->unit_price = 75.56;
	$preference->items = array($item);
	$preference->save();

@endphp--}}


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">MI CARRITO</h1>
</div>

<!-- Barra de progreso de la compra -->
{{--<div class="container">
	<div class="progress" style="height: 30px;">
		<div class="progress-bar pl-5" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" >
				<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			</svg>
		</div>
		<div class="progress-bar bg-success pl-5" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
				<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
			</svg>
		</div>
		<div class="progress-bar bg-info pl-5" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
				<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
			</svg>
		</div>
		<div class="progress-bar bg-primary pl-5" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
				<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
				<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
			</svg>
		</div>
	</div>
<div>--}}


<div class="container mt-5 text-dark">
	
	
	
	<div class="row">
		<div class="col-lg-6 mb-5">
		
			@foreach($productos as $producto)

				<div class="card mb-5 shadown-gris producto" id="producto-{{$producto->id}}" style="background-color: #e1e1e1; max-width: 540px; max-height: 180px ;">
					<div class="row g-0">
				  		<div class="col-5 card-img">
							<img src="{{$producto->multimedias->last()->url}}" class='img-fluid shadown rounded-3' alt="..." style="max-height: 180px">
				  		</div>
				  		
						<div class="col-7 px-0">
							<div class="card-body px-0">
					  			<h5 class="card-title">{{$producto->nombre}}</h5>
	  
					  			<form id="datosEnvio" class="was-validated">
									<div class="form row">
						  				<div class="form group col-sm">
											<label class="form-label" style="font-size: 0.9em" for="cantidad">Cantidad: </label>
											{{--
											<input type="number" id="cantidad" class="cantidad" width="30px" name="cantidad" placeholder="1" rows="2">
											<span style="font-size: 14px;"> $ 300 c/u</span>
											--}}
											<select class="cantidad py-1" id="cantidad-{{$producto->id}}" name="cantidad" onclick="cambiarCantidad({{$producto->id}})" width="30px">
												<option value="1" selected>1 u.</option>
												<option value="2">2 u.</option>
												<option value="3">3 u.</option>
												<option value="4">4 u.</option>
												<option value="5">5 u.</option>
												<option value="6">6 u.</option>
												<option value="7">7 u.</option>
												<option value="8">8 u.</option>
												<option value="9">9 u.</option>
												<option value="10">10 u.</option>
											</select>
											<br><span style="font-size: 14px;"> $ {{$producto->precio}} c/u</span>
												
											<input type="hidden" id="precio-{{$producto->id}}" name="precio" value="{{$producto->precio}}">
										</div>
	  
						  				<div class="form group col-sm">
											<label class="form-label" style="font-size: 0.9em" for="precio">Precio: $</label>
											{{--<input type="number" value="3000" readonly id="precio" name="precio" width="4em">--}}
											{{--<input type="number" value="3000" readonly id="precio_multiplicado-{{$producto->id}}" name="precio_multiplicado" width="4em">--}}
											<span class="h5" id="precio_multiplicado-{{$producto->id}}"></span>
						  				</div>
									</div>
					  			</form>
					  			{{--<a class="mt-2 bg-transparent" style="color:var(--rojo)">Eliminar</a>--}}
								<a class="mb-2 bg-transparent" style="color:var(--rojo);" onclick="quitarDelCarrito({{$producto->id}})">Eliminar</a>
	  
							</div>
				  		</div>
	  
					</div>
				</div>
				{{--====================================================================--}}
				{{--<div class="card mb-3 shadown-gris producto" id="producto-{{$producto->id}}" style="background-color: #e1e1e1; max-width: 540px; max-height: 200px ;">
					<div class="row g-0">
						<div class="col-4 card-imgg">
							<img src="{{$producto->multimedias->last()->url}}" class="img-fluid shadown rounded-3" alt="..." style="max-height: 180px">
						</div>
						
						<div class="col-7">
							<div class="card-body">
								<h5 class="card-title">{{$producto->nombre}} | id:{{$producto->id}}</h5>

								<form id="datosEnvio" class="">

									<div class="row">
										<div class="form-group col-sm-6">
											<label for="cantidad">Cantidad: </label>
											<select class="form-control" id="cantidad-{{$producto->id}}" name="cantidad" onclick="cambiarCantidad({{$producto->id}})">
												<option value="1" selected>1 unidad</option>
												<option value="2">2 unidades</option>
												<option value="3">3 unidades</option>
												<option value="4">4 unidades</option>
												<option value="5">5 unidades</option>
												<option value="6">6 unidades</option>
												<option value="7">7 unidades</option>
												<option value="8">8 unidades</option>
												<option value="9">9 unidades</option>
												<option value="10">10 unidades</option>
											</select>

											{{--<input  style="width: 100%;" type="number" class="form-control recalcularPrecioo" id="cantidad-{{$producto->id}}" class="cantidad" name="cantidad" value="0" min="0" onclick="cambiarCantidad({{$producto->id}})">--}}
											{{--<span style="font-size: 16px;"> $ {{$producto->precio}} c/u</span> 
											<input type="hidden" id="precio-{{$producto->id}}" name="precio" value="{{$producto->precio}}">
										</div>

										<div class="form-group col-sm-6">
											<label for="precio">Precio: $</label>
											<input  style="width: 100%;" type="number" class="form-control" value="{{$producto->precio}}" readonly id="precio_multiplicado-{{$producto->id}}" name="precio_multiplicado">
										</div>
									</div>
								</form>

								<a class="btn btn-quitarDelCarrito mb-2 bg-transparent btn-sm float-right" style="color:var(--rojo);" onclick="quitarDelCarrito({{$producto->id}})">Eliminar</a>
							</div>
						</div>
			
					</div>
			
				</div>--}}
		
			@endforeach
		
		
		</div>


		<div class="col-lg-6 mb-5 ">

			<div class="card shadown-gris mb-5" >
				<div class="card-header bg-info">
					<strong>Métodos de envío</strong>
				</div>

					<ul class="list-group list-group-flush">
						@foreach ($costos_de_envio as $costo_de_envio)
							<li class="list-group-item">
								<input class="recalcularCostoDeEnvio" type="radio" id="costo_de_envio-{{ $costo_de_envio->id }}" value="1" @checked(($costo_de_envio->costo_de_envio == 0))  name="costo_de_envio_id" onchange="recalcularCostoDeEnvio({{ $costo_de_envio->costo_de_envio}},{{ $costo_de_envio->id}})">
								<label class="form-check-label " for="costo_de_envio-{{ $costo_de_envio->id }}">
									<small>
										@if($costo_de_envio->dia_de_entrega){{ $costo_de_envio->dia_de_entrega }} en @endif
										@if($costo_de_envio->region){{ $costo_de_envio->region }}, @endif
										@if($costo_de_envio->departamento){{ $costo_de_envio->departamento }}@endif .
									</small>  {{ $costo_de_envio->costo_de_envio}} $
								</label>
								{{--Maldonado primer y tercer jueves de cada mes. $60--}}
							</li>
						@endforeach
					</ul>
				
			</div>


			<!-- Panel para verifiacar cupon de descuento -->
			<!-- Panel para verifiacar cupon de descuento -->
			<!-- Panel para verifiacar cupon de descuento -->
			<livewire:verificar-cupon /> 
			

			<!-- calculos totales de la compra -->
			<!-- calculos totales de la compra -->
			<!-- calculos totales de la compra -->
			<div class="card bg-danger text-light shadown" style="max-width:240px; margin-top: 30px; margin-left: 75px;">
				<div class="card-header">
					<h6><strong>SubTotal: </strong><span id="sub_total_de_la_compra"></span> $ UYU</h6>
				</div>
				<div class="card-body">
					<p><strong>Envío: </strong><span id="costo_de_envio_final">0</span> $ UYU</p>
					<p class="porcentage_de_descuento"><strong>Descuento: </strong><span id="porcentage_de_descuento">0</span> %</p>
				</div>
				<div class="card-footer">
					<h5>Total: <strong id="total_de_la_compra"></strong> $ UYU</h5>
					<button class="btn btn-lg shadown bg-light my-2" style="color: #4554a4;" id="btn_confirmar_compra" data-toggle="modal" data-target="#resumen_de_la_compra_y_datos_del_pedido"><strong>Confirmar compra </strong></button>

				</div>
			</div>
		</div>

	</div><!-- fin del row-->






	







	<!-- Resumen de la compra -->
	<!-- Resumen de la compra -->
	<!-- Resumen de la compra -->
	{{--<div class="" id="panel_resumen_de_la_compra" style="display: none;">
		<div class="row mb-5 d-flex justify-content-center" >

			<div class="card p-0">
				<div class="card-header">
					<h4 class="text-center">Resumen de la compra</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<table class="table">
								<thead>
								<tr>
									<th>Producto</th>
									<th>Precio unitario</th>
									<th>Cantidad</th>
									<th>Total</th>
								</tr>
								</thead>
								<tbody>
									@foreach($productos as $producto)
										<tr id="resumen-producto-{{$producto->id}}" class="producto">
											<td>{{$producto->nombre}}</td>
											<td>{{$producto->precio}} $</td>
											<td><span id="resumen-cantidad-{{$producto->id}}"></span></td>
											<td><span id="resumen-precio_multiplicado-{{$producto->id}}"></span> $</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-md-4">
							<div class="float-right pl-2">
								<p>SubTotal: <span id="resumen_sub_total_de_la_compra"></span> $ UYU</p>
								<p>Envío: <span id="resumen_costo_de_envio_final">0</span> $ UYU</p>
								<p class="porcentage_de_descuento">Descuento: <span id="resumen_porcentage_de_descuento">0</span> %</p>
								<p class="h5">Total: <span id="resumen_total_de_la_compra"></span> $ UYU</p>
							</div>
						</div>
					</div>

					<hr>

					<div class="d-flex justify-content-center">
						<button class="btn btn-block btn-outline-success w-50" id="btn_comprar">Comprar</button>
					</div>

				</div>
				
			</div>
			

		</div><!-- FIN del Resumen de la compra -->
	</div>--}}



	{{--<livewire:verifica-y-crea-pedido /> --}}





	<!-- completar los datos del pedido -->
	<!-- completar los datos del pedido -->
	<!-- completar los datos del pedido -->
	{{--<form id="form_crear_pedido" action="{{route('pedidos.carrito')}}" method="POST">
		@csrf
		@method('POST')

		<div class="card" id="panel_completar_datos_del_pedido" style="display: none;">
			<div class="card-header">
				<h4 class="text-center">Datos de envío</h4>
			</div>

			<div class="card-body">
				
				<div class="row">
					<div class="col-lg-6 ">

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
							<input style="width: 100%;" type="number" class="form-control" id="documento_de_identidad" name="documento_de_identidad" placeholder="..." value="{{old('documento_de_identidad')}}" min="0">
							@error('documento_de_identidad')
								<div class="alert alert-danger mt-1">{{ $message }}</div>
							@enderror
						</div>

						<!--input para el telefono-->
						<div class="form-group mb-3">
							<label for="telefono">Teléfono</label>
							<input style="width: 100%;" type="number" class="form-control" id="telefono" name="telefono" placeholder="..." value="{{old('telefono')}}" min="0">
							@error('telefono')
								<div class="alert alert-danger mt-1">{{ $message }}</div>
							@enderror
						</div>

					</div>
				
					<div class="col-lg-6">
						
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
							<label for="localidad">Localidad o barrio</label>
							<input type="text" class="form-control" id="localidad" name="localidad" placeholder="..." value="{{old('localidad')}}">
							@error('localidad')
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

					</div>

					<!--input para la departamento-->
					<!--<input type="hidden" id="departamento" name="departamento" value="">-->
					<!--input para la Pais-->
					<!--<input type="hidden" id="pais" name="pais" value="">-->
					<!--input para el status-->
					<!--<input type="hidden" id="status" name="status" value="pedido">-->
					<!--input para el tipo-->
					<input type="hidden" id="tipo" name="tipo" value="pedido normal">
					<!--input para la Costo de envio id-->
					<input type="hidden" id="costo_de_envio_id" name="costo_de_envio_id" value="">
					<!--input para la Cupon id-->
					<input type="hidden" id="nombre_del_cupon" name="nombre_del_cupon" value="">
					<!--input para la medio de pago-->
					<input type="hidden" id="medio_de_pago" name="medio_de_pago" value="">
					<!--input para el monto-->
					<input type="hidden" id="monto" name="monto" value="">
					<!--input para el tipo_de_cliente-->
					<input type="hidden" id="tipo_de_cliente" name="tipo_de_cliente" value="cliente del ecommerce">
					<!--input para el numero_de_factura-->
					<input type="hidden" id="numero_de_factura" name="numero_de_factura" value="555">
					<!--input para el productos-->
					<input type="hidden" id="productos" name="productos[]" value="">
					<!--input para el cantidades-->
					<input type="hidden" id="cantidades" name="cantidades[]" value="">
					<!--input para el numero_de_factura-->
					<input type="hidden" id="numero_de_factura" name="numero_de_factura" value="001">
						
				</div>

				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-outline-success btn-block btn-lg w-50">Selecciona el medio de pago</button>
				</div>


			</div>
		</div>

	</form>--}}


</div>




<!--MODAL RESUMEN DE LA COMPRA Y DATOS DEL PEDIDO-->
<!--MODAL RESUMEN DE LA COMPRA Y DATOS DEL PEDIDO-->
<div class="modal fade" id="resumen_de_la_compra_y_datos_del_pedido" tabindex="-1" role="dialog" aria-labelledby="resumen_de_la_compra_y_datos_del_pedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center negro">
            <div class="modal-header ">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <h5 class="modal-title text-center" id="resumen_de_la_compra_y_datos_del_pedidoLabel"></h5>
            <div class="modal-body">
            	<h4 class="text-center rojo"></h4>	
				<!-- Resumen de la compra -->
				<!-- Resumen de la compra -->
				<!-- Resumen de la compra -->
				<div class="cardd p-0 mb-5">
					<div class="card-headerr">
						<h4 class="text-center">Resumen de la compra</h4>
					</div>
					<div class="card-bodyy">
						<div class="row">
							<div class="col-md-8">
								<table class="table table-sm">
									<thead>
									<tr>
										<th>Producto</th>
										<th>Precio unitario</th>
										<th>Cantidad</th>
										<th>Total</th>
									</tr>
									</thead>
									<tbody>
										@foreach($productos as $producto)
											<tr id="resumen-producto-{{$producto->id}}" class="producto">
												<td>{{$producto->nombre}}</td>
												<td>{{$producto->precio}} $</td>
												<td><span id="resumen-cantidad-{{$producto->id}}"></span></td>
												<td><span id="resumen-precio_multiplicado-{{$producto->id}}"></span> $</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="col-md-4">
								<div class="float-right pl-2">
									<p>SubTotal: <span id="resumen_sub_total_de_la_compra"></span> $ UYU</p>
									<p>Envío: <span id="resumen_costo_de_envio_final">0</span> $ UYU</p>
									<p class="porcentage_de_descuento">Descuento: <span id="resumen_porcentage_de_descuento">0</span> %</p>
									<p class="h5">Total: <span id="resumen_total_de_la_compra"></span> $ UYU</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- FIN del Resumen de la compra -->


				<!-- completar los datos del pedido -->
				<!-- completar los datos del pedido -->
				<!-- completar los datos del pedido -->
				<form id="form_crear_pedido" action="{{route('pagos.verificar_carrito')}}" method="POST">
					@csrf
					@method('POST')

					<div class="cardd" id="panel_completar_datos_del_pedido">
						<div class="card-headerr">
							<h4 class="text-center">Datos de envío</h4>
						</div>

						<div class="card-bodyy">
							
							<div class="row">
								<div class="col-lg-6 ">

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
										<input style="width: 100%;" type="number" class="form-control" id="documento_de_identidad" name="documento_de_identidad" placeholder="..." value="{{old('documento_de_identidad')}}" min="0">
										@error('documento_de_identidad')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

									<!--input para el telefono-->
									<div class="form-group mb-3">
										<label for="telefono">Teléfono</label>
										<input style="width: 100%;" type="number" class="form-control" id="telefono" name="telefono" placeholder="..." value="{{old('telefono')}}" min="0">
										@error('telefono')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

								</div>
							
								<div class="col-lg-6">
									
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
										<label for="localidad">Localidad o barrio</label>
										<input type="text" class="form-control" id="localidad" name="localidad" placeholder="..." value="{{old('localidad')}}">
										@error('localidad')
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

								</div>

								<!--input para la departamento-->
								<!--<input type="hidden" id="departamento" name="departamento" value="">-->
								<!--input para la Pais-->
								<!--<input type="hidden" id="pais" name="pais" value="">-->
								<!--input para el status-->
								<!--<input type="hidden" id="status" name="status" value="pedido">-->
								<!--input para el tipo-->
								<input type="hidden" id="tipo" name="tipo" value="pedido normal">
								<!--input para la Costo de envio id-->
								<input type="hidden" id="costo_de_envio_id" name="costo_de_envio_id" value="">
								<!--input para la Cupon id-->
								<input type="hidden" id="nombre_del_cupon" name="nombre_del_cupon" value="">
								<!--input para la medio de pago-->
								<input type="hidden" id="medio_de_pago" name="medio_de_pago" value="">
								<!--input para el monto-->
								<input type="hidden" id="monto" name="monto" value="">
								<!--input para el tipo_de_cliente-->
								<input type="hidden" id="tipo_de_cliente" name="tipo_de_cliente" value="cliente del ecommerce">
								<!--input para el numero_de_factura-->
								<input type="hidden" id="numero_de_factura" name="numero_de_factura" value="555">
								<!--input para el productos-->
								<input type="hidden" id="productos" name="productos[]" value="">
								<!--input para el cantidades-->
								<input type="hidden" id="cantidades" name="cantidades[]" value="">
								<!--input para el numero_de_factura-->
								<input type="hidden" id="numero_de_factura" name="numero_de_factura" value="001">
									
							</div>

							<div class="d-flex justify-content-center">
								<button type="submit" class="btn btn-outline-success btn-block btn-lg w-50">Selecciona el medio de pago</button>
							</div>


						</div>
					</div>

				</form>
            </div>

        </div>
    </div>

</div>





<script>

	$(document).ready(function(){

		/*$("#btn_confirmar_compra").click(function(){
			$("#panel_resumen_de_la_compra").slideDown("slow");
		});


		$("#btn_comprar").click(function(){
			$("#panel_completar_datos_del_pedido").slideDown("slow");
		});*/
		



		//=============================================================
		//inicializacion del carrito
		//=============================================================
		iniciarCarrito();




		//=============================================================
		//evento para desplegar el input del cupon
		//=============================================================
		$("#btn-desplegar-cupon").click(function(){
			$("#input-cupon-desplegable").slideDown("slow");
		});

		$("#input-cupon-desplegable").hide();

	});




	//=============================================================
	// Esta funcion inicializa la lista de elementos 
	// que se muestran en el carrito
	//=============================================================
	function iniciarCarrito(){
		$('.producto').hide();
		$('.porcentage_de_descuento').hide();
		console.log('carrito: ' + localStorage.getItem("carrito"));

		let mi_carrito = [];
		
		if ( localStorage.getItem("carrito") ){
			let texto = localStorage.getItem("carrito");
			
			mi_carrito = texto.split(",");
		}

		// elimina los duplicados
		mi_carrito_sin_duplicados = mi_carrito.filter((element, index) => {
			return mi_carrito.indexOf(element) === index;
		});
		console.log('carrito sin duplicados: ' + mi_carrito_sin_duplicados);

		for(let i = 0; i < mi_carrito_sin_duplicados.length; i++){
			$('#producto-'+mi_carrito_sin_duplicados[i]).show();
			$('#resumen-producto-'+mi_carrito_sin_duplicados[i]).show();

			let cantidad = 0;

			for(let j = 0; j < mi_carrito.length; j++){
				if(mi_carrito_sin_duplicados[i] == mi_carrito[j]){
					cantidad += 1;
				}
			}
			
			//let cantidad = parseInt($('#cantidad-'+mi_carrito[i]).val());

			$('#cantidad-'+mi_carrito_sin_duplicados[i]).val(cantidad);
			//$('#cantidad-'+mi_carrito[i]).val(6);
			$('#resumen-cantidad-'+mi_carrito_sin_duplicados[i]).html(cantidad + 1);
			//console.log('muestro el producto: '+mi_carrito[i]);
		}

		calcular();
	}




	//=============================================================
	// hace los calculos para determinar el total de la compra
	// y los muestra en el html
	//=============================================================
	function calcular(){
		console.log('localStorage->carrito: ' + localStorage.getItem("carrito"));
		let mi_carrito = [];
		let cantidades = [];
		let suma_de_productos = 0;

		if ( localStorage.getItem("carrito") ){
			let texto = localStorage.getItem("carrito");
			mi_carrito = texto.split(",");
			
			
		}else{
			const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 6000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
			})

			Toast.fire({
			icon: 'warning',
			title: 'No hay productos en el carrito'
			})
		}

		// elimina los duplicados
		mi_carrito = mi_carrito.filter((element, index) => {
			return mi_carrito.indexOf(element) === index;
		});

		// este bucle toma el precio y la cantidad de cada producto
		// lo multiplica y lo agrega a la suma de productos
		for(let i = 0; i < mi_carrito.length; i++){
			
			let precio = parseInt($('#precio-'+mi_carrito[i]).val());
			let cantidad = parseInt($('#cantidad-'+mi_carrito[i]).val());
			/*$('#precio_multiplicado-'+mi_carrito[i]).val((precio * cantidad));*/
			$('#precio_multiplicado-'+mi_carrito[i]).html((precio * cantidad));
			$('#resumen-precio_multiplicado-'+mi_carrito[i]).html((precio * cantidad));
			suma_de_productos += (precio * cantidad);
			console.log(mi_carrito[i] + ': ' + cantidad);
			cantidades.push(cantidad);
		}

		// menda el array de productos al input del formulario que enviaremos al backend
		document.getElementById("productos").value = mi_carrito;
		// menda el array de cantidades al input del formulario que enviaremos al backend
		document.getElementById("cantidades").value = cantidades;
		
		let costo_de_envio_final = parseInt(document.getElementById("costo_de_envio_final").innerHTML);
		//let costo_de_envio_final = document.getElementById("costo_de_envio_final").innerHTML;
		
		// aplicar el descuento
		let cupon_de_descuento = parseInt(document.getElementById("cupon_de_descuento").value);
		let suma_de_productos_con_descuento = suma_de_productos - ((suma_de_productos*cupon_de_descuento)/100);


		let total_de_la_compra = suma_de_productos_con_descuento + costo_de_envio_final;
		
		/*console.log('el descuento es: ' + cupon_de_descuento);
		console.log('la suma de productos es: ' + suma_de_productos);
		console.log('el costo de envio es: ' + costo_de_envio_final);
		console.log('el total de la compra es: '+ total_de_la_compra);*/

		// escribe el decuento en el carrito y en el resumen
		$('#resumen_porcentage_de_descuento').html(cupon_de_descuento);
		$('#porcentage_de_descuento').html(cupon_de_descuento);

		// escribe el sub total
		document.getElementById("sub_total_de_la_compra").innerHTML = suma_de_productos;
		$('#resumen_sub_total_de_la_compra').html(suma_de_productos);

		// escribe el total
		document.getElementById("total_de_la_compra").innerHTML = total_de_la_compra;
		$('#resumen_total_de_la_compra').html(total_de_la_compra);
		document.getElementById("monto").value = total_de_la_compra;

		actualizarContadorDelCarrito();

	}




	//=============================================================
	// Este evento se ejecuta cuando se cambia alguno de los input
	// que modifican la cantidad de productos
	//=============================================================
	$(".recalcularPrecio").change(function(){
		calcular();

	});




	//=============================================================
	// cuando verificamos un cupon ejecuta la funcion calcular
	// Esta es activado desde el backend.
	//=============================================================
	window.addEventListener('calcularCupon', event => {
		$('.porcentage_de_descuento').show();

		//alert('Name updated to: ');
		calcular();
		nombre_del_cupon = document.getElementById("cupon").value;

		// escribe el nombre del cupon en el input hidden que se manda al backend
		document.getElementById("nombre_del_cupon").value = nombre_del_cupon;
	});




	//=============================================================
	// esta funcion escribe el medio de pago en el 
	// input hidden que se va a enviar al backend
	//=============================================================
	function elegir_medio_de_pago(medio_de_pago){
		console.log('se ejecuto la funcion elegir_medio_de_pago: '+medio_de_pago);
		document.getElementById("medio_de_pago").value = medio_de_pago;
	}




	//=============================================================
	//Esta funcion responde al boton de eliminar producto del carrito
	//=============================================================
	function quitarDelCarrito(id){
		let mi_carrito = [];
		if ( localStorage.getItem("carrito") ){
			let texto = localStorage.getItem("carrito");
			mi_carrito = texto.split(",");
		}

		console.log('carrito antes de quitar producto'+ mi_carrito);

		let nuevo_carrito = mi_carrito.filter(function(elemento){
			return elemento != id;
		});

		
		$('#producto-'+id).fadeOut();
		$('#resumen-producto-'+id).hide();

		console.log('carrito antes de quitar producto'+ nuevo_carrito);

		localStorage.setItem("carrito", nuevo_carrito);

		calcular();
		//iniciarCarrito();
	}




	//=============================================================
	//Esta funcion recalcula el costo si se cambia el costo de envio
	//=============================================================
	function recalcularCostoDeEnvio(costo, id){
		// escribe el campo costo_de_envio_final
		document.getElementById("costo_de_envio_final").innerHTML = costo;
		document.getElementById("resumen_costo_de_envio_final").innerHTML = costo;

		// escribe el costo_de_envio_id en el input hidden que se envia al backend
		document.getElementById("costo_de_envio_id").value = id;
		calcular();
	}




	//=============================================================
	//Esta funcion responde al cambio de cantidades en cada producto
	//=============================================================
	function cambiarCantidad(id){
		let nueva_cantidad = parseInt($('#cantidad-'+id).val());

		// cambia la cantidad en el resumen
		document.getElementById('resumen-cantidad-'+id).innerHTML = nueva_cantidad;

		if(nueva_cantidad<1){
			quitarDelCarrito(id)
		}

		/*console.log('la nueva cantidad es: '+cantidad);
		console.log('cambié la cantidad en el id: ' + id + ': ' + cantidad );*/
		//let contador = 0;
		
		// actualizar el local storage
		let mi_carrito = [];
		if ( localStorage.getItem("carrito") ){
			let texto = localStorage.getItem("carrito");
			mi_carrito = texto.split(",");
		}

		/*for(let i=0; i<mi_carrito.length; i++){
			if(mi_carrito[i] == id){
				//mi_carrito.splice(i, 1);
				//break;
				contador += 1;
			}
		}
		console.log('la cantidad dice: '+contador);*/

		

		let nuevo_carrito = mi_carrito.filter(function(elemento){
			return elemento != id;
		});

		for(let i=0; i<nueva_cantidad; i++){
			nuevo_carrito.push(id);
		}

		/*if(parseInt($('#cantidad-'+id).val()) < contador){
			let index = mi_carrito.indexOf(id);
			mi_carrito.splice(index);
		}
		if(parseInt($('#cantidad-'+id).val()) > contador){
			mi_carrito.push(id);
		}*/



		//actualiza el nuevo valor al local storage
		localStorage.setItem("carrito", nuevo_carrito);
		//console.log('carrito: ' + localStorage.getItem("carrito"));
		calcular();
		//iniciarCarrito();

	}

	



</script>

<!-- SDK MercadoPago.js V2 -->
{{--<script src="https://sdk.mercadopago.com/js/v2"></script>




<script>
  const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
	//const mp = new MercadoPago('PUBLIC_KEY', {
    locale: 'es-AR'
  });

  mp.checkout({
    preference: {
      id: '{{ $preference->id }}'
	  //id: 'YOUR_PREFERENCE_ID'
    },
    render: {
      container: '.cho-container',
      label: 'Pagar',
    }
  });
</script>--}}



@endsection


