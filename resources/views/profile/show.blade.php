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
                    <h3 class="text-lg font-medium text-gray-900">Información de las susripciónes</h3>
            
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
