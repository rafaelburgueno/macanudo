@extends('layouts.plantilla')

@section('title', 'Mi perfil')
@section('meta-description', 'metadescripcion para la pagina Mi perfil')
    
    
@section('content')


@php
	// SDK de Mercado Pago
	//require __DIR__ .  '/vendor/autoload.php';
	require base_path('vendor/autoload.php');
	// Agrega credenciales
	//MercadoPago\SDK::setAccessToken('PROD_ACCESS_TOKEN');
	MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


	// Crea un objeto de preferencia
	$preference = new MercadoPago\Preference();

    //Shipments define los costos de envio
    $shipments = new MercadoPago\Shipments();
    $shipments->cost = 10;
    $shipments->mode = "not_specified";
    $preference->shipments = $shipments;



	// Crea un ítem en la preferencia
	$item = new MercadoPago\Item();
    
    $lista_de_productos = '';
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
        "success" => route('pagos.mercadopago', $pedido),
        "failure" => route('pagos.mercadopago', $pedido),
        "pending" => route('pagos.mercadopago', $pedido)
    );
    $preference->auto_return = "approved";



	$item->title = $lista_de_productos;
	$item->quantity = 1;
	$item->unit_price = $pedido->monto;
	$preference->items = array($item);
    //$preference->items = $lista_de_productos;
	$preference->save();

@endphp


{{--<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">Realizar el pago</h1>
</div>--}}

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


<div class="container mt-5">
	
    <!-- Seleccionar metodo de pago -->
    <!-- Seleccionar metodo de pago -->
    <!-- Seleccionar metodo de pago -->
    <div class="row" id="panel_seleccionar_metodo_de_pago">
        
        <!-- Botones de pago -->
        <div class="col-lg-6 mb-5">
            
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-dark">Selecciona el metodo de pago</h4>
                </div>

                <div class="card-body">

                    <div class="m-3">
                        {{--<input type="checkbox" class="form-check-input" id="mercado_pago" name="medio_de_pago" value="mercado pago" onclick="elegir_medio_de_pago('mercado pago')">--}}
                        {{-- TODO:  --}} 
                        <div class="cho-container btn-block"></div>
                        {{--<label class="form-check-label" for="mercado_pago">Mercado pago</label>--}}
                        {{--<img src="{{asset('/storage/img/mercadopago.png')}}" class="img-thumbnail" alt="...">--}}
                    </div>


                    {{--<livewire:editar-pedido /> --}}

                    {{-- TODO pagar al recibir --}}
                    <div class="m-3">
                        <form action="{{route('pagos.pagar_al_recibir', $pedido)}}" method="POST" class="form_pagar_al_recibir">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn1 btn-gris azul btn-block" id="btn_pagar_al_recibir" onclick="btn_pagar_al_recibir();">Pagar al recibir</button>
                        </form>
                    </div>

                    <script>
                        $(document).ready(function(){

                            $('.form_pagar_al_recibir').submit(function(e){
                                e.preventDefault();

                                Swal.fire({
                                    title: 'Exelente!',
                                    text: "Elegiste pagar al recibir el pedido!",
                                    icon: 'success',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Sí, es correcto.',
                                    cancelButtonText: 'Cancelar.'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                    /*Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    );*/
                                        this.submit();

                                        // spin giratorio
                                        let timerInterval
                                        Swal.fire({
                                        title: 'Procesando',
                                        html: 'Por favor espere.',
                                        //timer: 10000,
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
                                        // fin del spin giratorio

                                    }
                                })

                            });

                        });
                    </script>


                    {{-- BOTON DE CANCELAR COMPRA --}}
                    {{--TODO--}}
                    <div class="m-3">
                        <form action="{{ route('eliminar_mi_pedido', $pedido) }}" method="POST" class="alerta-antes-de-cancelar-pedido">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn1 btn-rojo gris btn-block">Cancelar pedido</button>
                        </form>
                    </div>

                    <script>
                        $(document).ready(function(){

                            $('.alerta-antes-de-cancelar-pedido').submit(function(e){
                                e.preventDefault();
                        
                                Swal.fire({
                                    title: 'Esta seguro?',
                                    text: "Realmente quiere cancelar la compra?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Sí, cancelar.',
                                    cancelButtonText: 'No'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                    /*Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    );*/
                                        this.submit();
                                    }
                                })
                        
                            });
                            
                        });
                    </script>



                    {{--<div class="form-check my-4 text-dark">
                        <input type="checkbox" class="form-check-input" id="paypal" name="medio_de_pago" value="paypal" onclick="elegir_medio_de_pago('paypal')">
                        <label class="form-check-label" for="paypal">Pagar con PayPal</label>
                       <!--<img src="{{asset('/storage/img/PayPal.webp')}}" class="img-thumbnail" alt="...">-->
                    </div>--}}

                    {{--<div class="form-check my-4 text-dark">
                        <input type="checkbox" class="form-check-input" id="pagar_al_recibir" name="medio_de_pago" value="pagar al recibir" onclick="elegir_medio_de_pago('pagar al recibir')">
                        <label class="form-check-label" for="pagar_al_recibir">Pagar al recibir</label>
                    </div>--}}

                    {{--<button type="button" class="btn btn-block btn-outline-primary my-3" onclick="elegir_medio_de_pago('mercado pago')">pagar con Mercado pago</button>
                    <button type="button" class="btn btn-block btn-outline-primary my-3" onclick="elegir_medio_de_pago('paypal')">pagar con Paypal</button>
                    <button type="button" class="btn btn-block btn-outline-primary my-3" onclick="elegir_medio_de_pago('pagar al recibir')">Pagar al recibir</button>
                    --}}
                
                </div>
                

            </div>
        </div>

        <!-- Resumen de la compra -->
        <div class="col-lg-6">
            <div class="card p-0 mb-5 text-dark">
                <div class="card-header">
                    <h4 class="text-center">Resumen de la compra</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <table class="table table-sm ">
                                <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio unitario</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedido->productos as $producto)
                                        <tr id="resumen-producto-{{$producto->id}}" class="producto ">
                                            <td>{{$producto->nombre}}</td>
                                            <td>{{$producto->precio}} $</td>
                                            <td>{{ $producto->pivot->unidades }}</td>
                                            <td>{{($producto->precio * $producto->pivot->unidades)}} $</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm p-0 card bg-danger text-light shadown mx-auto" style="max-width:290px; max-height:400px; margin-top: 30px;">
                            <div class="card-header">
                                <h6><strong><p id="subTotal">SubTotal: $ UYU</p></strong></h6>
                            </div>
                            <div class="card-body">
                                <p>Envío: {{$pedido->costo_de_envio->costo_de_envio}} $ UYU</p>
                                @if($pedido->cupon)
                                <p>Descuento: {{$pedido->cupon->descuento}} %</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                <p class="h5">Total: {{$pedido->monto}} $ UYU</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN del Resumen de la compra -->
        </div>
    </div>
	
</div>


<script>

    $(document).ready(function(){
        $("#pedidoId").val('{{$pedido->id}}');
        /*$("#pedidoId").val();*/
        

        // calcula el subTotal de la compra, sumando todos los totales de los productos
        let subTotal = 0;
        $(".producto").each(function(){
            subTotal += parseInt($(this).find("td").eq(3).text());
        });
        $("#subTotal").text("SubTotal: " + subTotal + " $ UYU");


    });
    
    
</script>

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
	  //id: 'ACA_ESTA_EL_YOUR_PREFERENCE_ID'
    },
    render: {
      container: '.cho-container',
      label: 'Pagar online',
    },
    theme: {
        elementsColor: "#1188bb",
        headerColor: '#c0392b',
    }
  });
</script>

@endsection


