@extends('layouts.plantilla')

@section('title', 'Mi perfil')
@section('meta-description', 'metadescripcion para la pagina Mi perfil')
    
    
@section('content')


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">MI CARRITO</h1>
</div>


<div class="container mt-5">
    <div class="row">
      	<div class="col-lg-6 mb-5">
        
			@foreach($productos as $producto)
        
				<div class="card mb-3 shadown-gris producto" id="producto-{{$producto->id}}">
					<div class="row g-0">
						<div class="col-4">
							<img src="{{$producto->multimedias->last()->url}}" class='img-fluid shadown' alt="...">
						</div>
						
						<div class="col-8">
							<div class="card-body">
								<h5 class="card-title">{{$producto->nombre}} | id:{{$producto->id}}</h5>

								<form id="datosEnvio" class="">

									<div class="row">
										<div class="form-group col-sm-6">
											<label for="cantidad">Cantidad: </label>
											<input type="number" class="form-control recalcularPrecioo" id="cantidad-{{$producto->id}}" class="cantidad" name="cantidad" value="0" min="0" onclick="cambiarCantidad({{$producto->id}})">
											<span style="font-size: 14px;"> $ {{$producto->precio}} c/u</span> 
											<input type="hidden" id="precio-{{$producto->id}}" name="precio" value="{{$producto->precio}}">
										</div>

										<div class="form-group col-sm-6">
											<label for="precio">Precio: $</label>
											<input type="number" class="form-control" value="{{$producto->precio}}" readonly id="precio_multiplicado-{{$producto->id}}" name="precio_multiplicado">
										</div>
									</div>
								</form>

							</div>
						</div>
			
					</div>
			
					<div class="card-footer text-center">
						<button class="btn shadown btn-quitarDelCarrito" style="color:#f04643;" onclick="quitarDelCarrito({{$producto->id}})">Eliminar</button>
						<button class="btn btn-outline shadown " style="color: #4554a4; ">Seguir comprando</button>
						<button class="btn shadown" style=" color:#dab926 ;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
							<path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" /></svg>
						</button>
					</div>
				</div>
        
			@endforeach
        
        
    	</div>





      	<div class="col-lg-6 mb-5 ">

        	<div class="card shadown-gris">
          		<div class="card-header">
            		<strong>Métodos de envío</strong>
          		</div>

				  	<ul class="list-group list-group-flush">
						@foreach ($costos_de_envio as $costo_de_envio)
							<li class="list-group-item">
								<input class="recalcularCostoDeEnvio" type="radio" id="costo_de_envio-{{ $costo_de_envio->id }}" value="1" @checked(($costo_de_envio->costo_de_envio_id == 0))  name="costo_de_envio_id" onchange="recalcularCostoDeEnvio({{ $costo_de_envio->costo_de_envio}})">
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
          		
				{{--<ul class="list-group list-group-flush">
            		<li class=" list-group-item">
              			<input class="form recalcularPrecio" type="radio" id="premium" onchange="envio()" value="1" name="local">
              			Maldonado primer y tercer jueves de cada mes. $60
            		</li>
            		<li class="list-group-item">
						<input class="form recalcularPrecio" type="radio" id="standard" onchange="envio()" name="local">
              			Montevideo, Ciudad de la Costa y Costa de Oro todos los jueves. $60
					</li>
            		<li class="list-group-item">
						<input class="form recalcularPrecio" type="radio" id="express" onchange="envio()" name="local">
              			Retiro en un Punto Macanudo. $ 0
					</li>
          		</ul>--}}
        	</div>

			<livewire:verificar-cupon /> 
			{{--<div class="card shadown-gris" style="max-width:460px; max-height: 260px;">
				<div class="card-header">
            		<strong>¿Tenes un cupón de descuento?</strong>
          		</div>
				<div class="card-body p-3">
					<div class="form-group m-0">
						<input type="text" class="form-control" id="cupon" name="cupon" placeholder="Escribilo acá" value="{{old('cupon')}}">
						@error('cupon')
							<div class="alert alert-danger mt-1">{{ $message }}</div>
						@enderror
					</div>
				</div>
			</div>--}}

        	
			<div class="card bg-light shadown-gris" style="max-width:240px; max-height: 300px; margin-top: 30px; margin-left: 75px;">
          		<div class="card-header">
            		<h6><strong>SubTotal: $ </strong><span id="sub_total_de_la_compra"></span></h6>
          		</div>
          		<div class="card-body">
            		<p><strong>Envío: $ </strong><span id="costo_de_envio_final">0</span></p>
          		</div>
          		<div class="card-footer">
            		<h5>Total: <strong id="total_de_la_compra"></strong> $ </h5>
            		<button type="submit" class="btn btn-lg shadown" style="color: #4554a4;" id="paso2"><strong>Confirmar compra </strong></button>

          		</div>
        	</div>
      	</div>

    </div>
</div>


<script>

	$(document).ready(function(){
		
	//=============================================================
	//inicializacion del carrito
	//=============================================================
	iniciarCarrito();

	});


	//=============================================================
	// Esta funcion inicializa la lista de elementos 
	// que se muestran en el carrito
	//=============================================================
	function iniciarCarrito(){
		$('.producto').hide();
		console.log('localStorage->carrito: ' + localStorage.getItem("carrito"));

		let mi_carrito = [];
		
		if ( localStorage.getItem("carrito") ){
			let texto = localStorage.getItem("carrito");
			
			mi_carrito = texto.split(",");
		}

		for(let i = 0; i < mi_carrito.length; i++){
			$('#producto-'+mi_carrito[i]).show();
			let cantidad = parseInt($('#cantidad-'+mi_carrito[i]).val());
			$('#cantidad-'+mi_carrito[i]).val(cantidad + 1);
			//console.log('muestro el producto: '+mi_carrito[i]);
		}

		calcular();
	}




	//=============================================================
	// hace los calculos para determinar el total de la compra
	// y los muestra en el html
	//=============================================================
	function calcular(){

		let mi_carrito = [];
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
			$('#precio_multiplicado-'+mi_carrito[i]).val((precio * cantidad));
			suma_de_productos += (precio * cantidad);
			console.log(mi_carrito[i] + ': ' + cantidad);
		}

		
		let costo_de_envio_final = parseInt(document.getElementById("costo_de_envio_final").innerHTML);
		//let costo_de_envio_final = document.getElementById("costo_de_envio_final").innerHTML;
		
		// aplicar el descuento
		let cupon_de_descuento = parseInt(document.getElementById("cupon_de_descuento").value);
		let suma_de_productos_con_descuento = suma_de_productos - ((suma_de_productos*cupon_de_descuento)/100);


		let total_de_la_compra = suma_de_productos_con_descuento + costo_de_envio_final;
		
		console.log('el descuento es: ' + cupon_de_descuento);
		console.log('la suma de productos es: ' + suma_de_productos);
		console.log('el costo de envio es: ' + costo_de_envio_final);
		console.log('el total de la compra es: '+ total_de_la_compra);

		// escribe el sub total
		document.getElementById("sub_total_de_la_compra").innerHTML = suma_de_productos;

		// escribe el total
		document.getElementById("total_de_la_compra").innerHTML = total_de_la_compra;


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
		//alert('Name updated to: ');
		calcular();
	});



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
		//$('#producto-'+id).hide();

		console.log('carrito antes de quitar producto'+ nuevo_carrito);

		localStorage.setItem("carrito", nuevo_carrito);

		calcular();
		//iniciarCarrito();
	}



	//=============================================================
	//Esta funcion recalcula el costo si se cambia el costo de envio
	//=============================================================
	function recalcularCostoDeEnvio(costo){
		// escribe el campo costo_de_envio_final
		document.getElementById("costo_de_envio_final").innerHTML = costo;
		calcular();
	}


	//=============================================================
	//Esta funcion responde al cambio de cantidades en cada producto
	//=============================================================
	function cambiarCantidad(id){
		let nueva_cantidad = parseInt($('#cantidad-'+id).val());

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



@endsection


