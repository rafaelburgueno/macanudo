@extends('layouts.plantilla')

@section('title', 'Mi carrito')
@section('meta-description', 'metadescripcion para la pagina Mi carrito')
    
    
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


<div id="h1" class="text-center text-white my-4">
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
			@if($producto->stock)
				<div class="card mb-5 shadown-gris producto" id="producto-{{$producto->id}}" style="background-color: #e1e1e1; max-width: 540px; max-height: 180px ;">
					<div class="row g-0">
				  		<div class="col-5 card-img">
							<img src="{{$producto->multimedias->last()->url}}" class='img-fluid shadown rounded-3' alt="..." style="max-height: 180px">
				  		</div>
				  		
						<div class="col-7 px-0">
							<div class="card-body px-0">
								<!-- TODO: cambiar a font-size : 0.8em cuando el tamaño del titulo es mayor de 16 caracteres -->
					  			<h5 class="card-title" style="{{ strlen($producto->nombre) > 16 ? 'font-size: 0.8em;' : '' }}">{{$producto->nombre}}</h5>
	  
					  			<form id="datosEnvio" class="was-validated">
									<div class="form row">
						  				<div class="form group col-sm">
											<label class="form-label" style="font-size: 0.9em" for="cantidad">Cantidad: </label>
											{{--
											<input type="number" id="cantidad" class="cantidad" width="30px" name="cantidad" placeholder="1" rows="2">
											<span style="font-size: 14px;"> $ 300 c/u</span>
											--}}
											<select class="cantidad py-1" id="cantidad-{{$producto->id}}" name="cantidad" onclick="cambiarCantidad({{$producto->id}})" width="30px">
												@if($producto->stock >= 10)
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
												@else
													@for ($i = 1; $i <= $producto->stock; $i++)
														<option value="{{$i}}">{{$i}} u.</option>
													@endfor
												@endif
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
				
			@endif
			@endforeach
		
			<h5 class="text-center my-0 py-0"><a class="nav-link my-0 py-0" href="{{route('nuestros_productos')}}">Seguir comprando</a></h5>
			<h6 class="text-center mt-3 mb-0 py-0"><a class="nav-link my-0 py-0" onclick="vaciarCarrito();" href="#">Vaciar el carrito</a></h6>
			<script>
				//=============================================================
				//Esta funcion vacia el carrito y recarga la pagina
				//=============================================================
				function vaciarCarrito(){
					localStorage.clear();
					location.reload();
				}
			</script>


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
									@if($costo_de_envio->region){{ $costo_de_envio->region }}, @endif
									@if($costo_de_envio->departamento){{ $costo_de_envio->departamento }}, @endif 
									@if($costo_de_envio->dia_de_entrega){{ $costo_de_envio->dia_de_entrega }}, @endif 
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
			<div class="card bg-danger text-light shadown mx-auto" style="max-width:290px; max-height:400px; margin-top: 30px;">
				<div class="card-header">
					<h6><strong>SubTotal: </strong><span id="sub_total_de_la_compra"></span> $ UYU</h6>
				</div>
				<div class="card-body">
					<p><strong>Envío: </strong><span id="costo_de_envio_final">0</span> $ UYU</p>
					<p class="porcentage_de_descuento"><strong>Descuento: </strong><span id="porcentage_de_descuento">0</span> %</p>
				</div>
				<div class="card-footer">
					<h5>Total: <strong id="total_de_la_compra"></strong> $ UYU</h5>
					<div class="text-center">
						<button class="btn btn-lg shadown bg-light my-2 mx-auto" style="color: #4554a4;" id="btn_confirmar_compra" data-toggle="modal" data-target="#resumen_de_la_compra_y_datos_del_pedido"><strong>Confirmar compra </strong></button>
					</div>
				</div>
			</div>
		</div>

	</div><!-- fin del row-->


</div>




<!--MODAL RESUMEN DE LA COMPRA Y DATOS DEL PEDIDO-->
<!--MODAL RESUMEN DE LA COMPRA Y DATOS DEL PEDIDO-->
<div class="modal fade" id="resumen_de_la_compra_y_datos_del_pedido" tabindex="-1" role="dialog" aria-labelledby="resumen_de_la_compra_y_datos_del_pedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center negro">
            <div class="modal-header ">
				<button type="button" class="close text-center" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <h5 class="modal-title text-center" id="resumen_de_la_compra_y_datos_del_pedidoLabel"></h5>
            <div class="modal-body">
            	
				<!-- Resumen de la compra -->
				<!-- Resumen de la compra -->
				<!-- Resumen de la compra -->
				<div class="card p-0 mb-5" id="modal_resumen_de_la_compra">
					<div class="card-header">
						<h4 class="text-center">Resumen de la compra</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm">
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
						</div>
						<div class="row">
							<div class="col-sm card bg-danger text-light shadown mx-auto" style="max-width:290px; max-height:400px; margin-top: 30px;">
								<div class="card-header">
									<h6><strong>SubTotal: </strong><span id="sub_total_de_la_compra_modal"></span> $ UYU</h6>
								</div>
								<div class="card-body">
									<p><strong>Envío: </strong><span id="costo_de_envio_final_modal">0</span> $ UYU</p>
									<p class="porcentage_de_descuento"><strong>Descuento: </strong><span id="porcentage_de_descuento_modal">0</span> %</p>
								</div>
								<div class="card-footer">
									<h5>Total: <strong id="total_de_la_compra_modal"></strong> $ UYU</h5>
									<div class="text-center">
										<button class="btn btn-lg shadown bg-light my-2 mx-auto" style="color: #4554a4;" id="btn_confirmar_compra_modal" data-toggle="modal" data-target="#datos_del_pedido"><strong>Confirmar compra </strong></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- FIN del Resumen de la compra -->


				
            </div>

        </div>
    </div>

</div>



<!--MODAL DATOS DEL PEDIDO-->
<!--MODAL DATOS DEL PEDIDO-->
<div class="modal fade" id="datos_del_pedido" tabindex="-1" role="dialog" aria-labelledby="datos_del_pedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center negro">
            <div class="modal-header ">
				<button type="button" class="close text-center" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <h5 class="modal-title text-center" id="datos_del_pedidoLabel"></h5>
            <div class="modal-body">
			
				<!-- completar los datos del pedido -->
				<!-- completar los datos del pedido -->
				<!-- completar los datos del pedido -->
				<form id="form_crear_pedido" action="{{route('verificar_carrito')}}" method="POST">
					@csrf
					@method('POST')

					<div class="card" id="modal_completar_datos_del_pedido">
						<div class="card-header">
							<h4 class="text-center">Datos de contacto</h4>
						</div>

						<div class="card-body">
							
							<div class="row">
								<div class="col-lg-6 ">

									<!--input para el nombre-->
									<div class="form-group mb-3">
										@if( Auth::check() )
											<input type="hidden" name="nombre" id="nombre" value="{{Auth::user()->name}}">
										@else
											<label for="nombre" class="negro">Nombre y apellido <small>(Obligatorio)</small>: </label>
											<input value="{{old('nombre')}}" type="text" pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{6,100}" class="form-control" name="nombre" id="nombre" placeholder="..." required min="6" max="100" title="Por favor ingresa nombre y apellido, con al menos 6 caracteres">
										@endif
										@error('nombre')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

									<!--input para el email-->
									<div class="form-group mb-3 ocultar_al_retirar_en_plantaa">
										@if( Auth::check() )
											<label for="email" class="negro">Sesion iniciada con el correo: </label>
											<p  class="form-control"> {{Auth::user()->email}}</p>
											<input type="hidden" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
										@else
											<label for="email" class="negro">Email <small>(Obligatorio)</small>: </label>
											<input value="{{old('email')}}" type="email" class="form-control" name="email" id="email" placeholder="..." required title="Un correo electrónico válido debe tener el formato usuario@dominio.com">
										@endif
										@error('email')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
										@if( Auth::check() )
											<small>Para cambiar de usuario, primero debes <a href="{{route('cerrar_sesion')}}">cerrar sesión</a>.</small>
										@endif
									</div>

									<!--input para el documento_de_identidad-->
									{{--<div class="form-group mb-3 ocultar_al_retirar_en_planta">
										<label for="documento_de_identidad">Documento de identidad </label>
										<input required pattern="\d{7,9}" title="Ingresa los números sin puntos ni guiones" style="width: 100%;" type="text" class="form-control" id="documento_de_identidad" name="documento_de_identidad" placeholder="..." value="{{old('documento_de_identidad')}}">
										@error('documento_de_identidad')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>--}}

									<!--input para el telefono-->
									<div class="form-group mb-3">
										<label for="telefono" class="negro">Teléfono <small>(Obligatorio)</small>: </label>
										{{--<input value="{{old('telefono')}}" type="text" pattern="\+?\d{1,4}[-\s]?\d{1,4}[-\s]?\d{1,4}" class="form-control" name="telefono" id="telefono" placeholder="..." title="Número de teléfono inválido" required>--}}
										<input value="{{old('telefono')}}" type="text" pattern="(?=^.{8,15}$)\+?\d{1,4}[-\s]?\d{1,4}[-\s]?\d{1,4}" class="form-control" name="telefono" id="telefono" placeholder="..." title="El número de teléfono debe contener al menos 8 caracteres" required>
										@error('telefono')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

								</div>
							
								<div class="col-lg-6">
									
									<!--input para la direccion-->
									<div class="form-group mb-3 ocultar_al_retirar_en_planta">
										<label for="direccion">Dirección de entrega <small>(Obligatorio)</small>: </label>
										<textarea required class="form-control" id="direccion" name="direccion" rows="3">{{old('direccion')}}</textarea>
										@error('direccion')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

									<!--input para la localidad-->
									<div class="form-group mb-3 ocultar_al_retirar_en_planta">
										<label for="localidad">Localidad o barrio <small>(Obligatorio)</small>: </label>
										<input required pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{5,100}" type="text" class="form-control" id="localidad" name="localidad" placeholder="..." value="{{old('localidad')}}">
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

									<!--input para checkbox aceptar terminos y condiciones -->
									<div class="form-check my-4">
										<input required type="checkbox" class="form-check-input" id="terminos_y_condiciones" name="terminos_y_condiciones" value="1" @checked(old('terminos_y_condiciones'))>
										<label class="form-check-label" for="terminos_y_condiciones">Aceptas nuestros <a class="" href="#" data-toggle="modal" data-target="#modal_terminos_y_condiciones">terminos y condiciones?</a></label>
										@error('terminos_y_condiciones')
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
								<!--input para el productos-->
								<input type="hidden" id="productos" name="productos[]" value="">
								<!--input para el cantidades-->
								<input type="hidden" id="cantidades" name="cantidades[]" value="">
									
							</div>

							<div class="d-flex justify-content-center">
								<button type="submit" class="btn btn-verdeC gris btn-block btn-lg w-50 btn-procesando"><strong>Selecciona el medio de pago</strong></button>
							</div>

							<script>
								$(document).ready(function(){

									$('.btn-procesando').click(function(){
										if(
											//document.getElementById("nombre").value != '' &&
											document.getElementById("nombre").validity.valid && 
											//document.getElementById("email").value != '' &&
							                document.getElementById("email").validity.valid &&
											//document.getElementById("documento_de_identidad").value != '' &&  
											//document.getElementById("telefono").value != ''  &&  
											document.getElementById("telefono").validity.valid &&
											//document.getElementById("direccion").value != '' && 
											document.getElementById("direccion").validity.valid &&
											//document.getElementById("localidad").value != '' && 
											document.getElementById("localidad").validity.valid &&
											document.getElementById("terminos_y_condiciones").checked
										){

										
											let timerInterval
											Swal.fire({
											title: 'Procesando',
											html: 'Por favor espere.',
											timer: 18000,
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

						</div>
					</div>

				</form>
			
			</div>
		</div>
	</div>
</div>



<script>


		


	$(document).ready(function(){

		$("#btn_confirmar_compra").click(function(){
			//$("#panel_resumen_de_la_compra").slideDown("slow");
			$("#modal_completar_datos_del_pedido").hide();
			$("#modal_resumen_de_la_compra").show();
		});


		$("#btn_confirmar_compra_modal").click(function(){
			$("#modal_resumen_de_la_compra").hide();
			$("#modal_completar_datos_del_pedido").show();
		});
		


		


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




	if ( !localStorage.getItem("carrito") ){
		//alert('el carrito esta null: ' + localStorage.getItem("carrito"));

		//document.getElementsByTagName("h1").innerHTML = "No hay productos en el carrito";
		document.getElementById("h1").innerHTML = "<h1 class='text-center pt-2'>No hay productos en el carrito</h1> <a class='nav-link' href='" + "{{route('nuestros_productos')}}" + "'> VOLVER A PRODUCTOS</a>";

		var divsToHide = document.getElementsByClassName("container"); //divsToHide is an array
		for(var i = 0; i < divsToHide.length; i++){
			divsToHide[i].style.visibility = "hidden"; // or
			//divsToHide[i].style.display = "none"; // depending on what you're doing
		}



	}




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
		//console.log('carrito sin duplicados: ' + mi_carrito_sin_duplicados);

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
			$('#resumen-cantidad-'+mi_carrito_sin_duplicados[i]).html(cantidad);
			//console.log('muestro el producto: '+mi_carrito[i]);
		}

		// las siguientes instrucciones son necesarias porque el costo de envio es cero por defecto
		// entonces se debe desactivar los campos en el formulario
		$(".ocultar_al_retirar_en_planta").hide();
		//document.getElementById("email").value = 'retirar@enplanta.com';
		//document.getElementById("documento_de_identidad").value = 9999999;  
		document.getElementById("direccion").value = 'el pedido se retira en la planta'; 
		document.getElementById("localidad").value = 'el pedido se retira en la planta'; 
		//========================================

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
			timer: 4000,
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
		$('#porcentage_de_descuento').html(cupon_de_descuento);
		$('#porcentage_de_descuento_modal').html(cupon_de_descuento);
		//$('#resumen_porcentage_de_descuento').html(cupon_de_descuento);

		// escribe el sub total
		document.getElementById("sub_total_de_la_compra").innerHTML = suma_de_productos;
		document.getElementById("sub_total_de_la_compra_modal").innerHTML = suma_de_productos;
		//$('#resumen_sub_total_de_la_compra').html(suma_de_productos);

		// escribe el total
		document.getElementById("total_de_la_compra").innerHTML = total_de_la_compra;
		document.getElementById("total_de_la_compra_modal").innerHTML = total_de_la_compra;
		//$('#resumen_total_de_la_compra').html(total_de_la_compra);
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
		//console.log('se ejecuto la funcion elegir_medio_de_pago: '+medio_de_pago);
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

		//console.log('carrito antes de quitar producto'+ mi_carrito);

		let nuevo_carrito = mi_carrito.filter(function(elemento){
			return elemento != id;
		});

		
		$('#producto-'+id).fadeOut();
		$('#resumen-producto-'+id).hide();

		//console.log('carrito antes de quitar producto'+ nuevo_carrito);

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
		document.getElementById("costo_de_envio_final_modal").innerHTML = costo;
		//document.getElementById("resumen_costo_de_envio_final").innerHTML = costo;

		// escribe el costo_de_envio_id en el input hidden que se envia al backend
		document.getElementById("costo_de_envio_id").value = id;
		

		//================================================================================
		// TODO
		//si el costo de envio es 0, significa que se selecciono la opcion retirar en planta
		//en ese caso hay que poner los inputs () en hidden y establecer valores por defecto 
		//para que no disparen un error de validacion
		if(costo == 0 ){
			//console.log('el costo de envio es cero');
			//document.getElementById("email").value = 'retirar@enplanta.com'; 
			//document.getElementById("documento_de_identidad").value = 9999999; 
			document.getElementById("direccion").value = 'el pedido se retira en la planta'; 
			document.getElementById("localidad").value = 'el pedido se retira en la planta'; 

			$(".ocultar_al_retirar_en_planta").hide();
		}else{
			//console.log('el costo de envio NO es cero');
			//document.getElementById("email").value = '';
			//document.getElementById("documento_de_identidad").value = ''; 
			document.getElementById("direccion").value = ''; 
			document.getElementById("localidad").value = ''; 

			$(".ocultar_al_retirar_en_planta").show();
		}
		//================================================================================

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


