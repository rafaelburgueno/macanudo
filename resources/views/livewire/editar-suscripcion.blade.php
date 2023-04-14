<div>
    
    <div class="max-w-xl text-sm text-gray-600">
    
        <h3 class="h6 font-medium text-gray-900">Susripción id: {{$suscripcion->id}}</h3>
        <p class="mt-1 text-sm text-gray-600">
            Duración {{$suscripcion->tipo}}. Precio: ${{$suscripcion->precio}}<br>
            Restan {{$suscripcion->cantidad_de_canastas}} canastas. Fecha de inicio {{$suscripcion->fecha_de_inicio}}
            
        </p>
        @if($activo)
            <p class="mt-1 text-sm text-gray-600">Suscripción activa.</p>
        @else
            <p class="mt-1 text-sm text-gray-600">Suscripción cancelada.</p>
        @endif


    </div>
    
    <div class="grid grid-cols-6 gap-6 mt-5">
        
        <!-- Direccion -->
        <div class="col-span-6 sm:col-span-4 text-dark">
            <label class="block font-medium text-sm text-gray-700" for="direccion_de_entrega_{{$suscripcion->id}}">Dirección de entrega</label>
            <input wire:model="direccion_de_entrega" value="{{$suscripcion->direccion_de_entrega}}" id="direccion_de_entrega_{{$suscripcion->id}}" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" >
        </div>

        <!-- dia de entrega -->
        <div class="col-span-6 sm:col-span-4 text-dark">
            <label class="block font-medium text-sm text-gray-700" for="dia_de_entrega">Dia de entrega</label>
            {{--<input value="{{$suscripcion->dia_de_entrega}}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="direccion_de_entrega" type="text">--}}
            <select id="dia_de_entrega" name="dia_de_entrega" autocomplete="dia_de_entrega" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                
                <option value="Primer jueves del mes en la mañana (8 a 12)" @selected($suscripcion->dia_de_entrega == "Primer jueves del mes en la mañana (8 a 12)")>Primer jueves del mes en la mañana (8 a 12)</option>
                <option value="Tercer jueves del mes en la tarde (14 a 18)" @selected($suscripcion->dia_de_entrega == "Tercer jueves del mes en la tarde (14 a 18)")>Tercer jueves del mes en la tarde (14 a 18)</option>
                        
            </select>
        </div>

        <!-- tipo -->
        <div class="col-span-6 sm:col-span-4 text-dark">
            <label class="block font-medium text-sm text-gray-700" for="tipo">Tipo de suscripcion</label>
            {{--<input value="{{$suscripcion->tipo}}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="direccion_de_entrega" type="text">--}}
            <select id="tipo" name="tipo" autocomplete="tipo" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                
                <option value="Un mes" @selected($suscripcion->tipo == "Un mes")>Un mes</option>
                <option value="Tres meses" @selected($suscripcion->tipo == "Tres meses")>Tres meses</option>
                <option value="Seis meses" @selected($suscripcion->tipo == "Seis meses")>Seis meses</option>
                <option value="Doce meses" @selected($suscripcion->tipo == "Doce meses")>Doce meses</option>
                
            </select>
        </div>

        <!-- cantidad de quesos -->
        <div class="col-span-6 sm:col-span-4 text-dark">
            <label class="block font-medium text-sm text-gray-700" for="cantidad_de_quesos">Cantidad de quesos en la canasta</label>
            <select data-te-select-init id="cantidad_de_quesos" name="cantidad_de_quesos" autocomplete="cantidad_de_quesos" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                
                <option value="3" @selected($suscripcion->cantidad_de_quesos == "3")>3 quesos</option>
                <option value="5" @selected($suscripcion->cantidad_de_quesos == "5")>5 quesos</option>
                
            </select>
        </div>

        

        <!-- Teléfono -->
        <div class="col-span-6 sm:col-span-4 text-dark">
            <label class="block font-medium text-sm text-gray-700" for="telefono_{{$suscripcion->id}}">Teléfono</label>
            <input value="{{$suscripcion->telefono}}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="telefono_{{$suscripcion->id}}" type="text" >
            
        </div>
    </div>


    <div class="flex items-center justify-end px-4 py-1 mt-5 text-right sm:px-6  sm:rounded-bl-md sm:rounded-br-md">
        <div x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms style="display: none;" class="text-sm text-gray-600 mr-3">
            Guardado.
        </div>

        
        {!! $respuesta !!}

        <button wire:click="guardar_cambios" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Guardar cambios
        </button>
    </div>

    <!-- activo -->
    <div class="flex items-center justify-end px-4 py-1 mb-3 text-right sm:px-6  sm:rounded-bl-md sm:rounded-br-md">
        @if($activo)
        <button wire:click="cancelar_suscripcion" type="button" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition ">
            Suspender la suscripción
        </button>
        @else
        <button wire:click="activar_suscripcion" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 active:bg-gray-700 disabled:opacity-25 transition ">
            Activar la suscripción
        </button>
        @endif
    </div>


    

    <hr class="mb-3 text-gray-700">
    

</div>
