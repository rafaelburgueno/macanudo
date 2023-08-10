<div>
    @if($activo)
        <div class="card-header" id="suscripcion-{{$suscripcion->id}}" style="background-color: rgb(255, 255, 242); cursor: pointer;" >
    @else
        <div class="card-header" id="suscripcion-{{$suscripcion->id}}" style="cursor: pointer;" >
    @endif    
        <div class="mb-0 btn btn-linkk btn-block text-left collapsed" data-toggle="collapse" data-target="#collapse-{{$suscripcion->id}}" aria-expanded="true" aria-controls="collapse-{{$suscripcion->id}}">
        
            <div class="row">
                <div class="col text-left">
                    {{--{{$suscripcion->created_at->format('d/m/Y')}}--}}
                    <span class="my-0 py-0">{{$suscripcion->created_at->format('d/m/Y')}}</span>

                </div>
                <div class="col text-center">
                    @if($activo)
                        <p class="my-0 py-0 small text-success">La suscripción está <strong>activa</strong></p>
                    @else
                        <p class="my-0 py-0 small">La suscripción está suspendida</p>
                    @endif
                </div>
                <div class="col text-right">
                    <strong>{{$suscripcion->precio}}$</strong>
                </div>
            </div>

        </div>
    </div>

    <div wire:ignore.self id="collapse-{{$suscripcion->id}}" class="collapse showw" aria-labelledby="suscripcion-{{$suscripcion->id}}" data-parent="#accordion-suscripciones">
        <div class="card-body">

            

            <form wire:submit.prevent="guardar_cambios">
            
                
                @if( Auth::user()->rol == 'administrador' )
                    <h3 class="h6">Susripción id: {{$suscripcion->id}}</h3>
                @endif
                {{--<p class="my-0 py-0 small">Duración {{$suscripcion->tipo}}.</p>--}}
                {{--<p class="my-0 py-0 small">Precio: ${{$suscripcion->precio}}</p>--}}
                <p class="my-0 py-0 small">Precio: $ {!! $precio !!} </p>
                {{--<p class="my-0 py-0 small">Restan {{$suscripcion->cantidad_de_canastas}} canastas.</p>--}}
                {{--<p class="my-0 py-0 small">Fecha de inicio {{$suscripcion->fecha_de_inicio}}</p>--}}
                <p class="my-0 py-0 small">Creada el {{$suscripcion->created_at->format('d/m/Y')}} a las {{$suscripcion->created_at->format('h:i A')}}</p>

                

                


                <!-- EDICION DE DATOS -->
                <div class="mt-3">
                    
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

                    <button type="submit" {{--wire:click="guardar_cambios"--}} class="btn1 btn-azul shadown">
                        Guardar cambios
                    </button>
                </div>



                <div class="text-center mt-4">
                    <!-- CANCELAR LA SUSCRIPCIÓN -->
                    @if($activo)
                        @if($btn_confirmar_cancelar)
                            <p class="my-0 py-0">¿Realmente quiere suspender la suscripción?</p>
                            <p class="my-0 py-0">Esta acción podrá revertirse en cualquier momento.</p>

                            <button wire:click="cancelar_suscripcion_confirmado" type="button" class="btn btn-danger shadown text-light">
                                Si, suspender la suscripción
                            </button>
                            <button wire:click="cancelar_suscripcion_cancelado" type="button" class="btn btn-azul shadown text-light">
                                No
                            </button>
                        @else
                            <p wire:click="cancelar_suscripcion" class="my-0 py-0 text-danger">
                                ¿Suspender la suscripción?
                            </p>
                        @endif

                    @else
                        <div class="py-2">
                            <button wire:click="activar_suscripcion" type="button" class="btn btn-azul shadown btn-sm text-light">
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

                

            </form>
    

            <hr class="mt-3 text-gray-700">
        </div>
    </div>
</div>
