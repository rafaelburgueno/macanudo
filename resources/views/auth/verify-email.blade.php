<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{--<x-jet-authentication-card-logo />--}}
            <img class="" src="{{asset('/storage/img/logo.1.png')}}">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Antes de continuar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}
            {{--{{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}--}}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó en la configuración de su perfil.') }}
                {{--{{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}--}}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Reenviar email de verificación') }}
                        {{--{{ __('Resend Verification Email') }}--}}
                    </x-jet-button>
                </div>
            </form>

            {{--<div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    {{ __('Editar perfil') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
            </div>--}}
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
