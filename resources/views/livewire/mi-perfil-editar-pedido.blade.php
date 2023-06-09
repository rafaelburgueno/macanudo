<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent="guardar_cambios">


        @if($pedido->tipo == 'club del queso')
            <p><strong>El pedido corresponde a tu suscripción al Club del queso </strong></p>
        @endif

        <h3 class="h6 font-medium text-gray-900">Pedido id: {{$pedido->id}}</h3>
        <p class="mt-1 text-sm text-gray-600">Monto: $ {{$pedido->monto}}</p>
        <p class="mt-1 text-sm text-gray-600">Estado del pedido: {{$pedido->status}}</p>
        <p class="mt-1 text-sm text-gray-600">Estado del pago: {{$pedido->estado_del_pago}}</p>
        
        @if($pedido->direccion == 'el pedido se retira en la planta' )
        <p class="mt-1 text-sm text-gray-600">El pedido debe ser retirado en la planta de elaboración</p>
        @endif
        
        <p class="mt-1 text-sm text-gray-600">Medio de pago: {{$pedido->medio_de_pago}}</p>
        <p class="mt-1 text-sm text-gray-600">Número de factura: {{$pedido->numero_de_factura}}</p>
        <p class="mt-1 text-sm text-gray-600">Fecha: {{$pedido->created_at}}</p>

        @if(count($pedido->productos))
            <h4 class="h6 font-medium text-gray-900 mt-3">Productos: </h4>   
            <ul class="py-0 mt-0 mb-3 pl-3">
                @foreach($pedido->productos as $producto)
                <li class="py-0 my-0"><small>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</small></li>
                @endforeach
            </ul>
        @else
            <p class="mt-1 text-sm text-gray-600 mt-3"><strong>Todavia no hay productos en este pedido</strong></p>
        @endif


        {{-- EDITAR PEDIDO LIVEWIRE --}}
        @if($pedido->status == 'pedido')

            <div class="grid grid-cols-6 gap-6 mt-3">
                
                <!-- Direccion -->
                @if($pedido->direccion != 'el pedido se retira en la planta' )
                    <div class="col-span-6 sm:col-span-4 text-dark">
                        <label class="block font-medium text-sm text-gray-700" for="direccion_{{$pedido->id}}">Dirección</label>
                        <input required wire:model="direccion" value="{{$pedido->direccion}}" id="direccion_{{$pedido->id}}" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" >
                    </div>
                @endif

                <!-- Teléfono -->
                <div class="col-span-6 sm:col-span-4 text-dark">
                    <label class="block font-medium text-sm text-gray-700" for="telefono_{{$pedido->id}}">Teléfono</label>
                    <input required wire:model="telefono" value="{{$pedido->telefono}}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="telefono_{{$pedido->id}}" type="text">
                </div>


                <!-- Cancelar pedido -->
                <div class="col-span-6 sm:col-span-4 text-dark">
                    <label class="block font-medium text-sm text-gray-700" for="cancelar_pedido_{{$pedido->id}}">Cancelar pedido</label>
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex items-center">
                                <input wire:model="cancelar" type="radio" class="form-radio border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="cancelar_pedido_{{$pedido->id}}" value="si" checked>
                                <span class="ml-2">Sí</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input wire:model="cancelar" type="radio" class="form-radio border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="cancelar_pedido_{{$pedido->id}}" value="no">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                    </div>
                  </div>
                  


                
            </div>


            <div class="flex items-center justify-end px-4 py-1 mt-5 text-right sm:px-6  sm:rounded-bl-md sm:rounded-br-md">
                <div x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms style="display: none;" class="text-sm text-gray-600 mr-3">
                    Guardado.
                </div>

                

                <button type="submit" {{--wire:click="guardar_cambios"--}} class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Guardar cambios
                </button>
            </div>

            <!-- activo -->
            {{--<div class="flex items-center justify-end px-4 py-1 mb-3 text-right sm:px-6  sm:rounded-bl-md sm:rounded-br-md">
                @if($pedido->status == 'pedido')

                <button wire:click="cancelar_pedido" type="button" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition ">
                    Cancelar el pedido
                </button>
                
                @else
                <button wire:click="activar_pedido" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 active:bg-gray-700 disabled:opacity-25 transition ">
                    Activar el pedido
                </button>
                @endif
            </div>--}}

        @endif

        <div class="flex items-center justify-end px-4 py-1 mt-1 text-right sm:px-6  sm:rounded-bl-md sm:rounded-br-md">
            {!! $respuesta !!}
        </div>

    </form>



</div>
