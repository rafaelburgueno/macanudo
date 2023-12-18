<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{--<html lang="es">--}}
    <head>
        <!--<meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">


        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <title>Macanudo - @yield('title')</title>


        <!-- CSS BOOTSTRAP 4 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- CSS BOOTSTRAP 5 -->
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

        <!-- Estilos de liwire -->
        @livewireStyles

        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- JS BOOTSTRAP 4 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- JS BOOTSTRAP 5 -->
        {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>--}}
        
        <!--Popper-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        

        <!-- Sweet alert 2-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- ESTILOS CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css')}}">



        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

         <!-- ESTILOS CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css')}}">

    </head>
    <body class="font-sanss antialiasedd">
        <style>
            /*estos estilos arreglan el problema que los links no se ven en esta pagina*/
            .collapse{
                visibility: visible;
                padding-right: 7%;
            }
        </style>
        @include('partials.nav')
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            {{--@livewire('navigation-menu')--}}
            <!-- Header -->
            {{--@include('partials.nav')--}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')


        <!-- Footer -->
        {{--@include('partials.footer')--}}

        @livewireScripts

        <!-- Nuestro javascript -->
        <script src="{{ asset('/js/index.js')}}"></script>
        
        @yield('scripts')

    </body>
</html>
