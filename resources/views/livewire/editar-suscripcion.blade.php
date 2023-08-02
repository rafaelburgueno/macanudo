<div>

    <form wire:submit.prevent="guardar_cambios">
    
        
        @if( Auth::user()->rol == 'administrador' )
            <h3 class="h6">Susripción id: {{$suscripcion->id}}</h3>
        @endif
        {{--<p class="my-0 py-0 small">Duración {{$suscripcion->tipo}}.</p>--}}
        {{--<p class="my-0 py-0 small">Precio: ${{$suscripcion->precio}}</p>--}}
        <p class="my-0 py-0 small">Precio: $ {!! $precio !!} </p>
        {{--<p class="my-0 py-0 small">Restan {{$suscripcion->cantidad_de_canastas}} canastas.</p>--}}
        <p class="my-0 py-0 small">Fecha de inicio {{$suscripcion->fecha_de_inicio}}</p>
        
        <!-- activo -->
        <div class="row">
            @if($activo)
                <div class="col text-left">
                    <p class="my-0 py-0 small">La suscripción está activa</p>
                </div>
                <div class="col text-right">
                    <button wire:click="cancelar_suscripcion" type="button" class="btn btn-danger shadown btn-sm btn-procesando btn-blockk text-light">
                        Suspender la suscripción
                    </button>
                </div>
            @else
                <div class="col text-left">
                    <p class="my-0 py-0 small">Actualmente la suscripción está suspendida</p>
                </div>
                <div class="col text-right">
                    <button wire:click="activar_suscripcion" type="button" class="btn btn-azul shadown btn-sm btn-procesando btn-blockk text-light">
                        Activar la suscripción
                    </button>
                </div>
            @endif
        </div>

        @if (session()->has('cancelada'))
            <div class="text-center">
                <div class="my-3 alert alert-success">
                    {{ session('cancelada') }}
                </div>
            </div>
        @endif


        <!-- EDICION DE DATOS -->
        <div class="mt-5">
            
            <!-- Direccion -->
            <div class="form-group mb-3">
                <label class="" for="direccion_de_entrega_{{$suscripcion->id}}">Dirección de entrega</label>
                <input required class="form-control" wire:model="direccion_de_entrega" value="{{$suscripcion->direccion_de_entrega}}" id="direccion_de_entrega_{{$suscripcion->id}}" type="text" class="form-control" >
            </div>

            <!-- Teléfono -->
            <div class="form-group mb-3">
                <label class="" for="telefono_{{$suscripcion->id}}">Teléfono</label>
                <input required pattern="(?=^.{8,15}$)\+?\d{1,4}[-\s]?\d{1,4}[-\s]?\d{1,4}" wire:model="telefono" value="{{$suscripcion->telefono}}" class="form-control" id="telefono_{{$suscripcion->id}}" type="text" >
            </div>

            <!-- dia de entrega -->
            <div class="form-group mb-3">
                <label class="" for="dia_de_entrega">Dia de entrega</label>
                {{--<input value="{{$suscripcion->dia_de_entrega}}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="direccion_de_entrega" type="text">--}}
                <select required wire:model="dia_de_entrega" id="dia_de_entrega" name="dia_de_entrega" autocomplete="dia_de_entrega" class="form-control">
                    
                    <option value="Primer jueves del mes en la mañana (8 a 12hs)" @selected($suscripcion->dia_de_entrega == "Primer jueves del mes en la mañana (8 a 12hs)")>Primer jueves del mes en la mañana (8 a 12hs)</option>
                    <option value="Tercer jueves del mes en la tarde (14 a 18hs)" @selected($suscripcion->dia_de_entrega == "Tercer jueves del mes en la tarde (14 a 18hs)")>Tercer jueves del mes en la tarde (14 a 18hs)</option>
                            
                </select>
            </div>

            {{--<!-- tipo -->
            <div class="form-group mb-3">
                <label class="" for="tipo">Tipo de suscripcion</label>
                <select required id="tipo" name="tipo" autocomplete="tipo" class="form-control">
                    
                    <option value="Un mes" @selected($suscripcion->tipo == "Un mes")>Un mes</option>
                    <option value="Tres meses" @selected($suscripcion->tipo == "Tres meses")>Tres meses</option>
                    <option value="Seis meses" @selected($suscripcion->tipo == "Seis meses")>Seis meses</option>
                    <option value="Doce meses" @selected($suscripcion->tipo == "Doce meses")>Doce meses</option>
                    
                </select>
            </div>--}}

            <!-- cantidad de quesos -->
            <div class="form-group mb-3">
                <label class="" for="cantidad_de_quesos">Cantidad de quesos en la canasta</label>
                <select required wire:model="cantidad_de_quesos" data-te-select-init id="cantidad_de_quesos" name="cantidad_de_quesos" autocomplete="cantidad_de_quesos" class="form-control">
                    
                    <option value="3" @selected($suscripcion->cantidad_de_quesos == "3")>3 quesos  ($ 969)</option>
                    <option value="5" @selected($suscripcion->cantidad_de_quesos == "5")>5 quesos  ($ 1599)</option>
                    
                </select>
            </div>

            

            
        </div>


        <div class="text-center">
            @if (session()->has('exito'))
                <div class="my-3 alert alert-success">
                    {{ session('exito') }}
                </div>
            @endif
            {{--{!! $respuesta !!}--}}

            <button type="submit" {{--wire:click="guardar_cambios"--}} class="btn1 btn-azul shadown btn-procesando btn-blockk">
                Guardar cambios
            </button>
        </div>

        

    </form>
    

    <hr class="mt-5 text-gray-700">
    

</div>
