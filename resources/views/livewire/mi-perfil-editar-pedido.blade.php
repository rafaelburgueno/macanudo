<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent="guardar_cambios">


        @if($pedido->tipo == 'club del queso')
            <p><strong>El pedido corresponde a tu suscripción al Club del queso </strong></p>
        @endif

        @if( Auth::user()->rol == 'administrador' )
            <h3 class="h6 ">Pedido id: {{$pedido->id}}</h3>
        @endif
        <p class="my-0 py-0 small"><strong>Monto: $ {{$pedido->monto}}</strong></p>
        <p class="my-0 py-0 small">Estado: {{$pedido->status}}</p>
        <p class="my-0 py-0 small">Estado del pago: {{$pedido->estado_del_pago}}</p>
        
        @if($pedido->direccion == 'el pedido se retira en la planta' )
        <p class="my-0 py-0 small">El pedido debe ser retirado en la planta de elaboración</p>
        @endif
        
        <p class="my-0 py-0 small">Medio de pago: {{$pedido->medio_de_pago}}</p>
        
        @if($pedido->numero_de_factura != 55 && $pedido->numero_de_factura != 66 && $pedido->numero_de_factura != null)
            <p class="my-0 py-0 small">Número de factura: {{$pedido->numero_de_factura}}</p>
        @endif
        {{--<p class="my-0 py-0 small">Fecha: {{$pedido->created_at}}</p>--}}
        <p class="my-0 py-0 small">Pedido relizado el {{$pedido->created_at->format('d/m/Y')}} a las {{$pedido->created_at->format('h:i A')}}</p>

        @if(count($pedido->productos))
            <h6 class="mt-1 mb-0">Productos: </h6>   
            <ul class="m-0 p-0">
                @foreach($pedido->productos as $producto)
                <li class="m-0 ml-4 p-0"><small>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</small></li>
                @endforeach
            </ul>
        @else
            <p class=""><strong>Todavia no hay productos en este pedido</strong></p>
        @endif


        




        {{-- EDITAR DIRECCION Y TELEFONO --}}
        @if($pedido->status == 'pedido')

            <div class="mt-3">

                <!-- Departamento -->
                <div class="form-group mb-4">
                    <label class="" for="departamento_{{$pedido->id}}">Departamento</label>
                    <select wire:model="departamento" id="departamento_{{$pedido->id}}" name="departamento" autocomplete="departamento" class="form-control">
                        <option value="" @selected($pedido->departamento == "")></option>
                        <option value="Canelones" @selected($pedido->departamento == "Canelones")>Canelones</option>
                        <option value="Maldonado" @selected($pedido->departamento == "Maldonado")>Maldonado</option>
                        <option value="Montevideo" @selected($pedido->departamento == "Montevideo")>Montevideo</option>      
                    </select>
                    @error('departamento') <span class="mx-1 text-danger">{{ $message }}</span> @enderror
                </div>
                
                <!-- Direccion -->
                @if($pedido->direccion != 'el pedido se retira en la planta' )
                    <div class="form-group mb-4">
                        <label class="" for="direccion_{{$pedido->id}}">Dirección</label>
                        <input class="form-control" required wire:model="direccion" value="{{$pedido->direccion}}" id="direccion_{{$pedido->id}}" type="text" >
                        @error('direccion') <span class="mx-1 text-danger">{{ $message }}</span> @enderror
                    </div>
                @endif

                <!-- Teléfono -->
                <div class="form-group mb-4">
                    <label class="negro" for="telefono_{{$pedido->id}}">Teléfono</label>
                    <input required pattern="(?=^.{8,15}$)\+?\d{1,4}[-\s]?\d{1,4}[-\s]?\d{1,4}" class="form-control" wire:model="telefono" value="{{$pedido->telefono}}" id="telefono_{{$pedido->id}}" type="text">
                    @error('telefono') <span class="mx-1 text-danger">{{ $message }}</span> @enderror
                </div>


                <!-- Cancelar pedido -->
                {{--<div class="form-group">
                    <label class="" for="cancelar_pedido_{{$pedido->id}}">Cancelar pedido</label>
                    <div class="row">
                        <div class="col-6 text-center">
                            <label class="p-0 m-0 w-50">
                                <div class="border rounded mr-1 p-1">
                                    <input wire:model="cancelar" type="radio" class="" name="cancelar_pedido_{{$pedido->id}}" value="si" checked>
                                    <span class="ml-2">Sí</span>
                                </div>
                            </label>
                        </div>
                        <div class="col-6 text-center">
                            <label class="p-0 m-0 w-50">
                                <div class="border rounded mr-1 p-1">
                                    <input wire:model="cancelar" type="radio" class="" name="cancelar_pedido_{{$pedido->id}}" value="no">
                                    <span class="ml-2">No</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>--}}

            </div>


            {{--<hr class="w-50 mt-4">--}}
            <div class="text-center">
                @if (session()->has('exito'))
                    <div class="my-3 alert alert-success">
                        {{ session('exito') }}
                    </div>
                @endif
                <button type="submit" {{--wire:click="guardar_cambios"--}} class="btn1 btn-azul shadown btn-procesando btn-blockk">
                    Guardar cambios
                </button>
            </div>

        @endif

        {{--<div class="">
            {!! $respuesta !!}
        </div>--}}



        <!-- CANCELAR PEDIDO -->
        @if($pedido->status == 'pedido')
            <div class="text-center mt-4">
            
                {{--<p class="my-0 py-0 small">El estatus es {{$status}}</p>--}}
            
                @if($btn_confirmar_cancelar)
                    <p class="my-0 py-0">¿Realmente quiere cancelar el pedido?</p>
                    <p class="my-0 py-0">Esta acción es irreversible.</p>
                    
                    <button wire:click="cancelar_pedido_confirmado" type="button" class="btn btn-danger shadown text-light">
                        Si, cancelar el pedido
                    </button>
                    <button wire:click="cancelar_pedido_cancelado" type="button" class="btn btn-azul shadown text-light">
                        No
                    </button>
                @else
                    <p wire:click="cancelar_pedido" class="text-danger my-0 py-0">
                        ¿Cancelar el pedido?
                    </p>
                @endif
            </div>
        
        @endif

        @if (session()->has('cancelado'))
            <div class="text-center">
                <div class="my-3 alert alert-success">
                    {{ session('cancelado') }}
                </div>
            </div>
        @endif


    </form>



</div>
