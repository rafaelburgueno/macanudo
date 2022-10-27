<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{--<x-jet-authentication-card-logo />--}}
            <img class="" src="{{asset('/storage/img/logo.1.png')}}">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{--{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}--}}
            {{ __('Esta es un área segura de la aplicación. Por favor, confirme su contraseña antes de continuar.') }}
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{--{{ __('Confirm') }}--}}
                    {{ __('Confirmar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
