@extends('layouts.plantilla')

@section('title', 'Editar Pedido')
@section('meta-description', 'metadescripcion para la pagina de edición de pedidos')
    
    
@section('content')


<div class="container text-white">

    <div class="text-center text-white mt-5">
        <h2 class="text-center pt-2">EDITAR PEDIDO | {{$pedido->nombre}}, id:{{$pedido->id}}</h2>
    </div>

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <form id="form_crear_pedido" action="{{route('pedidos.update', $pedido)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col col-md-6">

                        <!--input para el status-->
                        {{--<div class="form-group mb-3">
                            <label for="status">status</label>
                            <input required type="text" class="form-control" id="status" name="status" placeholder="..." value="{{old('status', $pedido->status)}}">
                            @error('status')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pedido" @selected((old('status') == "pedido") || $pedido->status == "pedido" )>Pedido</option>
                                <option value="despachado" @selected((old('status') == "despachado") || $pedido->status == "despachado" )>despachado</option>
                                <option value="en viaje" @selected((old('status') == "en viaje") || $pedido->status == "en viaje" )>En viaje</option>
                                <option value="entregado" @selected((old('status') == "entregado") || $pedido->status == "entregado" )>Entregado</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>



                        <!--input para el medio_de_pago-->
                        {{--<div class="form-group mb-3">
                            <label for="medio_de_pago">Medio de pago</label>
                            <input required type="text" class="form-control" id="medio_de_pago" name="medio_de_pago" placeholder="..." value="{{old('medio_de_pago', $pedido->medio_de_pago)}}">
                            @error('medio_de_pago')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}
                        <div class="form-group mb-3">
                            <label for="status">Medio de pago</label>
                            <select class="form-control" id="medio_de_pago" name="medio_de_pago">
                                <option value="pagar al recibir" @selected((old('medio_de_pago') == "pagar al recibir") || $pedido->medio_de_pago == "pagar al recibir" )>Pagar al recibir</option>
                                <option value="mercadopago" @selected((old('medio_de_pago') == "mercadopago") || $pedido->medio_de_pago == "mercadopago" )>Mercadopago</option>
                                <option value="sin definir" @selected((old('medio_de_pago') == "sin definir") || $pedido->medio_de_pago == "sin definir" )>Sin definir</option>
                            </select>
                            @error('medio_de_pago')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>




                        <!--input para el estado_del_pago-->
                        {{--<div class="form-group mb-3">
                            <label for="estado_del_pago">Estado del pago</label>
                            <input required type="text" class="form-control" id="estado_del_pago" name="estado_del_pago" placeholder="..." value="{{old('estado_del_pago', $pedido->estado_del_pago)}}">
                            @error('estado_del_pago')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}
                        <div class="form-group mb-3">
                            <label for="estado_del_pago">Estado del pago</label>
                            <select class="form-control" id="estado_del_pago" name="estado_del_pago">
                                <option value="pagado" @selected((old('estado_del_pago') == "pagado") || $pedido->estado_del_pago == "pagado" )>Pagado</option>
                                <option value="pendiente" @selected((old('estado_del_pago') == "pendiente") || $pedido->estado_del_pago == "pendiente" )>Pendiente</option>
                                {{--<option value="" @selected((old('estado_del_pago') == "") || $pedido->estado_del_pago == "" )>NULL</option>--}}
                            </select>
                            @error('estado_del_pago')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>



                        <!--input para el numero_de_factura-->
                        <div class="form-group mb-3">
                            <label for="numero_de_factura">Numero de factura</label>
                            <input type="number" class="form-control" id="numero_de_factura" name="numero_de_factura" placeholder="..." value="{{old('numero_de_factura', $pedido->numero_de_factura)}}" min="0" style="width: 100%;">
                            @error('numero_de_factura')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{--<div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pedido" @selected((old('status') == "pedido") || $pedido->status == "pedido" )>Pedido</option>
                                <option value="despachado" @selected((old('status') == "despachado") || $pedido->status == "despachado" )>despachado</option>
                                <option value="en viaje" @selected((old('status') == "en viaje") || $pedido->status == "en viaje" )>En viaje</option>
                                <option value="entregado" @selected((old('status') == "entregado") || $pedido->status == "entregado" )>Entregado</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}


                        <!--input para el tipo-->
                        {{--<div class="form-group mb-3">
                            <label for="tipo">tipo</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="pedido normal" @selected((old('tipo') == "pedido normal") || $pedido->tipo == "pedido normal" )>Pedido normal</option>
                                <option value="club del queso" @selected((old('tipo') == "club del queso") || $pedido->tipo == "club del queso" )>Club del queso</option>
                            </select>
                            @error('tipo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                        
                        <!--input para el status-->
                        {{--<div class="form-group mb-3">
                            <label for="status">status</label>
                            <input required type="text" class="form-control" id="status" name="status" placeholder="..." value="{{old('status', $pedido->status)}}">
                            @error('status')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}


                        <!--input para el email-->
                        {{--<div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input required type="text" class="form-control" id="email" name="email" placeholder="..." value="{{old('email', $pedido->email)}}">
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                        <!--input para el documento_de_identidad-->
                        {{--<div class="form-group mb-3">
                            <label for="documento_de_identidad">Documento de identidad</label>
                            <input type="number" class="form-control" id="documento_de_identidad" name="documento_de_identidad" placeholder="..." value="{{old('documento_de_identidad', $pedido->documento_de_identidad)}}" min="0">
                            @error('documento_de_identidad')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                       

                        <!--input para la Pais-->
                        {{--<div class="form-group mb-3">
                            <label for="Pais">Pais</label>
                            <input type="text" class="form-control" id="pais" name="pais" placeholder="..." value="{{old('pais', $pedido->pais)}}">
                            @error('Pais')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}


                    </div>
                
                    <div class="col-md-6">


                         <!--input para el telefono-->
                         <div class="form-group mb-3">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="..." value="{{old('telefono', $pedido->telefono)}}" min="0" style="width: 100%;">
                            @error('telefono')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <!--input para la direccion-->
                        <div class="form-group mb-3">
                            <label for="direccion">Dirección</label>
                            <textarea required class="form-control" id="direccion" name="direccion" rows="3">{{old('direccion', $pedido->direccion)}}</textarea>
                            @error('direccion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la localidad-->
                        <div class="form-group mb-3">
                            <label for="localidad">Localidad</label>
                            <input type="text" class="form-control" id="localidad" name="localidad" placeholder="..." value="{{old('localidad', $pedido->localidad)}}">
                            @error('localidad')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la departamento-->
                        <div class="form-group mb-3">
                            <label for="departamento">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" placeholder="..." value="{{old('departamento', $pedido->departamento)}}">
                            @error('departamento')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el monto-->
                        {{--<div class="form-group mb-3">
                            <label for="monto">Monto</label>
                            <input type="number" class="form-control" id="monto" name="monto" placeholder="..." value="{{old('monto', $pedido->monto)}}" min="0">
                            @error('monto')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                        <!--input para checkbox Recibir novedades -->
                        {{--<div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="recibir_novedades" name="recibir_novedades" value="1" @checked(old('recibir_novedades', $pedido->recibir_novedades))>
                            <label class="form-check-label" for="recibir_novedades">Recibir novedades</label>
                            @error('recibir_novedades')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                        <!--input para la tipo_de_cliente-->
                        {{--<div class="form-group mb-3">
                            <label for="tipo_de_cliente">Tipo de cliente</label>
                            <input type="text" class="form-control" id="tipo_de_cliente" name="tipo_de_cliente" placeholder="..." value="{{old('tipo_de_cliente', $pedido->tipo_de_cliente)}}">
                            @error('tipo_de_cliente')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                        


                        {{--<div class="form-group mb-3 border rounded border-light p-2">
                            <h4>Canasta</h4>
                            @foreach ($canastas as $canasta)
                                <!--input para cada canasta-->
                                <div class="form-check my-4">
                                    <input type="radio" class="form-check-input" id="canasta_id" name="canasta_id" value="{{ $canasta->id }}" @checked(old('canasta_id', ($canasta->id == $pedido->canasta_id) ))>
                                    <label class="form-check-label" for="canasta_id">{{ $canasta->nombre }}</label>
                                </div>
                            @endforeach
                        </div>--}}
                        

                        <div class="form-group mb-3 border rounded border-light  p-2">
                            <h4>Productos</h4>
                            <hr>

                            <ul>
                                @foreach($pedido->productos as $producto)
                                    {{--<li>{{ $producto->nombre }} x {{ $producto->unidades($pedido->id) }}</li>--}}
                                    <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                                @endforeach
                            </ul>

                            {{--@foreach ($lista_de_productos as $key => $producto)

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
                            
                            @endforeach--}}
                            {{--<input id="cantidadesFinales" name="cantidadesFinales[]" type="hidden">--}}
                        </div>


                        {{--<div class="form-group mb-3 border rounded border-light  p-2">
                            <h4>Costos de envio</h4>
                            @foreach ($costos_de_envio as $costo_de_envio)

                                <!--input para cada costo_de_envio-->
                                <div class="form-check my-4">
                                    <input type="radio" class="form-check-input" id="costo_de_envio_id" name="costo_de_envio_id" value="{{ $costo_de_envio->id }}" @checked(old('costo_de_envio_id', ($costo_de_envio->id == $pedido->costo_de_envio_id) ))>
                                    <label class="form-check-label" for="costo_de_envio_id">{{ $costo_de_envio->region }} - {{ $costo_de_envio->departamento }}</label>
                                </div>
                            
                            @endforeach
                        </div>--}}
                        

                        {{--<div class="form-group mb-3 border rounded border-light  p-2">
                            <h4>Cupones</h4>
                            @foreach ($cupones as $cupon)

                                <!--input para cada cupon-->
                                <div class="form-check my-4">
                                    <input type="radio" class="form-check-input" id="cupon_id" name="cupon_id" value="{{ $cupon->id }}" @checked(old('cupon_id', ($cupon->id == $pedido->cupon_id) ))>
                                    <label class="form-check-label" for="cupon_id">{{ $cupon->codigo }} - {{ $cupon->descripcion }}</label>
                                </div>
                            
                            @endforeach
                        </div>        --}}              
                       

                        

                        
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Confirmar</button>

            </form>

            <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="alerta-antes-de-eliminar">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
            </form>

        </div>
    </div>


</div>


@endsection


