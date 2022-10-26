@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'metadescripcion para la pagina home')
    
    
@section('content')




{{--<div class="container">
    <h3 class="text-center" style="color: #e1e1e1"> Este sitio se encuentra en construcción <br><svg
            xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-android"
            viewBox="0 0 16 16">
            <path
                d="M2.76 3.061a.5.5 0 0 1 .679.2l1.283 2.352A8.94 8.94 0 0 1 8 5a8.94 8.94 0 0 1 3.278.613l1.283-2.352a.5.5 0 1 1 .878.478l-1.252 2.295C14.475 7.266 16 9.477 16 12H0c0-2.523 1.525-4.734 3.813-5.966L2.56 3.74a.5.5 0 0 1 .2-.678ZM5 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm6 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" />
        </svg>
    </h3>
</div>--}}
<div class="mt-2 mr-0 mb-2 ml-0 contenedor">
    <img src="{{asset('/storage/img/img.1.png')}}" class="nav d-block w-100" alt="...">
    <!--<div class="texto-encima">Texto</div>-->
    <div class="centrado">
        <h3 style="text-shadow:  0px 1px 2px #f3f5eb">¿Querés conocer algo mejor que el queso?</h3>
    </div>
</div>
<div class="mt-0 mr-0 mb-2 ml-0 contenedor">
    <img src="{{asset('/storage/img/img.2.png')}}" class="nav d-block w-100" alt="...">
    <div class="texto-encima"></div>
    <div class="centrado">
        <h3 style="text-shadow:  0px 1px 2px #ebf0f5"><strong>nuestros alimentos</strong></h3>
        <h6 class="bg-light">NO CONTIEN LÁCTEOS</h6>
    </div> 
    <a href="productos.html" role="button" class="btn btn-dark texto-abajo">Ver productos</a>

</div>
<div class="mt-0 mr-0 mb-2 ml-0 contenedor">
    <img src="{{asset('/storage/img/img.3.png')}}" class="nav d-block w-100" alt="...">
    <div class="texto-encima"></div>
    <div class="centrado">
        <h3 class="text-light" style="text-shadow:  0px 2px 2px #1e1e1e" ;>seguimos el proceso de la quesería
            tradicional</h3><br>
    </div>
    <button class="btn btn-dark texto-abajo">Ver proceso</button>
</div>

<div class="mt-0 mr-0 mb-0 ml-0 contenedor">
    <img src="{{asset('/storage/img/img.5.png')}}" class="nav d-block w-100" alt="...">
    <div class="texto-encima"></div>
    <div class="centrado">
        <h3 style="text-shadow:  0px 2px 2px #ebf0f5"><strong>pero elaboramos</strong></h3>
        <h6 class="bg-light">CON CASTAÑAS DE CAJÚ</h6>
    </div>
    <button class="btn btn-dark texto-abajo">Ver beneficios</button>
</div>

<div class="mt-0 mr-0 mb-0 ml-0 contenedor">
    <img src="{{asset('/storage/img/img.6.png')}}" class="nav d-block w-100" alt="...">
    <div class="texto-encima"></div>
    <div class="centrado">
        <h3 style="text-shadow:  0px 2px 3px #ebf0f3"><strong>invitamos a que seamos </strong></h3>
        <h6 class="bg-light">MAS AMIGABLES CON EL PLANETA</h6>
    </div>
    <a href="quienes_somos.html" class="btn btn-dark texto-abajo" role="button">Nosotros</a>
</div>
</div>

<div class="mt-0 mr-0 mb-0 ml-0 contenedor">
    <img src="{{asset('/storage/img/img.7.png')}}" class="nav d-block w-100" alt="...">
    <div class="texto-encima"></div>
    <div class="centrado">
        <h3 style="text-shadow:  0px 2px 3px #ebf0f3"><strong>y a disfrutar</strong></h3>
        <h6 class="bg-light">MAS SALUDABLE Y NUTRITIVO</h6>
    </div>
</div>


<style>
    .contenedor {
        position: relative;
        display: block;
        text-align: center;
    }

    .texto-encima {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .texto-abajo {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }

    .centrado {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>




    
    



@endsection


