<div>
    





    <!-- completar los datos del pedido -->
    <!-- completar los datos del pedido -->
    <!-- completar los datos del pedido -->
    <form id="form_crear_pedido" action="{{route('pedidos.carrito')}}" method="POST">
		@csrf
		@method('POST')

		<div class="card" id="panel_completar_datos_del_pedido" style="display: none;">
			<div class="card-header">
				<h4 class="text-center">Nuevos Datos de envío</h4>
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


							<!--input para la departamento-->
							<!--<input type="hidden" id="departamento" name="departamento" value="">-->
							
							<!--input para la Pais-->
							<!--<input type="hidden" id="pais" name="pais" value="">-->
							
                            <!--input para el status-->
							<input type="hidden" id="status" name="status" value="pedido">
							
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
							
							<!--input para el numero_de_factura-->
							<input type="hidden" id="numero_de_factura" name="numero_de_factura" value="001">
							

						</div>

						<div class="text-center">
							{{--<button type="button" class="btn btn-outline-secondary btn-block" id="btn_confirmar_datos_de_entrega">Confirmar compra</button>--}}
							<button type="submit" class="btn btn-outline-success btn-block w-50">Finalizar compra (seleccionar el medio de pago)</button>
						</div>

					</div>

				{{--</form>--}}
			</div>
		</div>

	</form>	




















    {{-- ==============================================
        realizar el pago
    ===============================================--}}
    
    @php
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
    
    $lista_de_productos = '';
    
    if(false){
        foreach ($pedido->productos as $producto) {
            // Crea un ítem en la preferencia
            //$item = new MercadoPago\Item();
            $item->title = $producto->nombre;
            //$item->quantity = $producto->pivot->unidades;
            //$item->unit_price = ($producto->precio * $producto->pivot->unidades);

            $lista_de_productos .= $producto->nombre .' x '. $producto->pivot->unidades .'. | ' ;
        }
    


    $preference = new MercadoPago\Preference();
    //...
    $preference->back_urls = array(
        "success" => route('pay', $pedido),
        "failure" => "http://www.tu-sitio/failure",
        "pending" => "http://www.tu-sitio/pending"
    );
    $preference->auto_return = "approved";



	$item->title = $lista_de_productos;
	$item->quantity = 1;
	$item->unit_price = $pedido->monto;
	$preference->items = array($item);
    //$preference->items = $lista_de_productos;
	$preference->save();
    }
@endphp


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">Realizar el pago</h1>
</div>


<div class="container mt-5">
	
    <!-- Seleccionar metodo de pago -->
    <!-- Seleccionar metodo de pago -->
    <!-- Seleccionar metodo de pago -->
    <div class="row" id="panel_seleccionar_metodo_de_pago">
        <div class="col-lg-6 mb-5">
            
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-dark">Seleccionar metodo de pago</h4>
                </div>

                <div class="card-body">

                    <div class="m-3">
                        {{--<input type="checkbox" class="form-check-input" id="mercado_pago" name="medio_de_pago" value="mercado pago" onclick="elegir_medio_de_pago('mercado pago')">--}}
                        <div class="cho-container"></div>
                        {{--<label class="form-check-label" for="mercado_pago">Mercado pago</label>--}}
                        {{--<img src="{{asset('/storage/img/mercadopago.png')}}" class="img-thumbnail" alt="...">--}}
                    </div>

                    <div class="m-3">
                        <form id="form_crear_pedido" action="{{route('pedidos.carrito')}}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="pagar_al_recibir" name="medio_de_pago" value="pagar al recibir">
                            <button type="submit" class="btn btn-primary ">Pagar al recibir</button>
                        </form>
                    </div>
                
                </div>
                

            </div>
        </div>
    </div>
	
</div>


<!-- SDK MercadoPago.js V2 -->
<script src="https://sdk.mercadopago.com/js/v2"></script>




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
      label: 'Pagar con MercadoPago',
    }
  });
</script>





</div>
