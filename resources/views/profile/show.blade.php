<x-app-layout>
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-white">
            {{ __('Perfil') }}
            {{--{{ __('Profile') }}--}
        </h2>
    </x-slot>--}}


    {{-- Editar suscripción --}}
    @if(count(Auth::user()->suscripciones))
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Información de la susripción</h3>
            
                    <p class="mt-1 text-sm text-gray-600">
                        Actualice la información de perfil y la dirección de email de su cuenta.
                    </p>
                    {{--<p  class="mt-1 text-sm text-gray-600">Tipo: {{$suscripcion->tipo}}</p>
                    <p  class="mt-1 text-sm text-gray-600">Precio: ${{$suscripcion->precio}}</p>
                    <p  class="mt-1 text-sm text-gray-600">Canastas que te quedan por recibir: {{$suscripcion->cantidad_de_canastas}}</p>
                    <p  class="mt-1 text-sm text-gray-600">Fecha de inicio: {{$suscripcion->fecha_de_inicio}}</p>
                    {{--<p  class="mt-1 text-sm text-gray-600">{{$suscripcion->}}</p>--}}
                </div>
        
                <div class="px-4 sm:px-0">
                    
                </div> 
            </div>


            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="p-3 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    @foreach(Auth::user()->suscripciones as $suscripcion)
                        @livewire('editar-suscripcion', ['suscripcion' => $suscripcion])
                    @endforeach
                </div>
            </div>

        </div>
        
        <script>
            window.addEventListener('datos_actualizados', event => {
                //TODO: NO FUNCIONA
                
                alert('los datos se han guardado ');
                
            });
            
            
        </script>

        
    </div> 
    <div class="pb-5 px-5">
        <div class="mx-1 border-t border-gray-200"></div>
    </div>
    @endif


    @if(count(Auth::user()->pedidos))

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">


            <div class="md:col-span-1 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Mis compras</h3>
            
                    <p class="mt-1 text-sm text-gray-600">
                        Listado de pedidos y compras realizadas.
                    </p>
                
                </div>
        
                <div class="px-4 sm:px-0">
                    
                </div> 
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="p-0 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="accordion" id="accordion-mis-compras">

                        @foreach(Auth::user()->pedidos as $pedido)
                        
                        <div class="card text-gray-600" >
                                
                            @if($pedido->tipo == 'club del queso')
                                <div class="card-header" id="compra-{{$pedido->id}}" style="background-color: rgb(255, 255, 242)">
                            @else
                                <div class="card-header" id="compra-{{$pedido->id}}">
                            @endif

                                    <div class="mb-0 btn btn-linkk btn-block text-left collapsed" data-toggle="collapse" data-target="#collapse-{{$pedido->id}}" aria-expanded="true" aria-controls="collapse-{{$pedido->id}}">
                                        {{--<div class="float-left">
                                            {{$pedido->created_at->format('d/m/Y')}}
                                        </div>

                                        @if($pedido->tipo == 'club del queso')
                                            <div class="text-center">
                                                <strong>Club del queso</strong>
                                            </div>
                                        @endif

                                        <div class="float-right">
                                            <strong>{{$pedido->monto}}$</strong>
                                        </div>--}}

                                        <div class="row">
                                            <div class="col text-left">
                                                {{$pedido->created_at->format('d/m/Y')}}
                                            </div>
                                            <div class="col text-center">
                                                @if($pedido->tipo == 'club del queso')
                                                    <strong>Club del queso</strong>
                                                @endif
                                            </div>
                                            <div class="col text-right">
                                                <strong>{{$pedido->monto}}$</strong>
                                            </div>
                                          </div>

                                    </div>
                                </div>
                                <div id="collapse-{{$pedido->id}}" class="collapse showw" aria-labelledby="compra-{{$pedido->id}}" data-parent="#accordion-mis-compras">
                                    <div class="card-body">
                                        {{--@if($pedido->tipo == 'club del queso')
                                        <p><strong>El pedido corresponde a tu suscripción al Club del queso </strong></p>
                                        @endif

                                        <h3 class="h6 font-medium text-gray-900">Pedido id: {{$pedido->id}}</h3>
                                        <p class="mt-1 text-sm text-gray-600">Monto: $ {{$pedido->monto}}</p>
                                        <p class="mt-1 text-sm text-gray-600">Estado del pedido: {{$pedido->status}}</p>
                                        <p class="mt-1 text-sm text-gray-600">Estado del pago: {{$pedido->estado_del_pago}}</p>
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
                                        @endif--}}


                                        {{-- EDITAR PEDIDO LIVEWIRE --}}
                                        {{--@if($pedido->status == 'pedido')--}}
                                            @livewire('mi-perfil-editar-pedido', ['pedido' => $pedido])
                                        {{--@endif--}}
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="pb-5 px-5">
        <div class="mx-1 border-t border-gray-200"></div>
    </div>

    @endif



    {{-- EDICION DE DATOS DEL USUARIO --}}
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
