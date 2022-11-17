@extends('layouts.plantilla')

@section('title', 'Nosotros')
@section('meta-description', 'metadescripcion para la pagina Nosotros')
    
    
@section('content')


<div class="container">
    
    <div class="row mt-2">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 align-items-center">
            <img src="{{asset('/storage/img/NOSOTROS1.png')}}" class="nav d-block w-100" alt="...">
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row">
        <div class="col  px-5">
            <h2 class="text-center scroll-content fadeLeft h1" style="color: #e1e1e1; text-shadow: 1.5px 1.5px  var(--lila);">
                Todo eso pensamos cuando descubrimos nuestras recetas.
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col px-5" style="overflow: hidden;">
            <h3 class="text-center scroll-content fadeRight" style="color: #e1e1e1; line-height: 60px;">
                <span class="spanletrasrojo"> Confiamos</span> en que podemos
                demostrarle al mundo <br><span class="spanletrasrojo">que se puede disfrutar</span> de
                un sabroso noqueso <br>de una manera <span class="spanletrasrojo"> más amigable con el
                planeta.</span>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 py-5 px-5 align-items-center" style="color: #e1e1e1">
            <p class="scroll-content fadeLeft">
                Cuando decidimos dejar de consumir lácteos comenzamos una búsqueda
                personal del sabor a queso que extrañabamos muchísimo; comenzamos a tomar cursos
                de quesería vegetal, con conocimientos previos, horas de búsqueda de recetas, y
                muchas ganas nos pusimos a investigar y a crear en la cocina.
            </p>
            <p class="scroll-content fadeLeft"> 
                Tuvimos muchos errores y todavía seguimos aprendiendo pero cada día tomabamos más 
                confianza en lo que estábamos logrando, hasta que cumplimos nuestras primera misión 
                y encontramos el sabor que buscábamos.
            </p>
            <p class="scroll-content fadeLeft">
                Terminamos apasionandonos con el proceso, comenzamos a elaborar nuestros quesos 
                favoritos como el camembert, parmesano y el roquefort.
            </p>
            <p class="scroll-content fadeLeft">
                Poco a poco fueron apareciendo personas que estaban en esa misma búsqueda y se
                mostraron interesadas en comprar nuestros productos, por eso nos lanzamos al 
                nuevo camino de emprender. Así nace Macanudo Queso y comienza otra etapa de desafíos.
            </p>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row">
        <div class="col  px-5">
            <h3 class="text-center scroll-content fadeTop" style="color: #e59dd6; line-height: 60px;">Hoy nuestra
                misión es poder llevar nuestros productos <br>a todos los rincones del mundo,<br> para que las
                personas tengan uuna opcion para alimentarse<br>
                mas saludable y ser más sustentables.</h3><br>
        </div>
    </div>

    <div class="row">
        <div class="col  px-5">
            <h5 class="text-center scroll-content fadeTop" style="color: #62c1ec; line-height:50px ;
            ">Nuestra vision es contribuir a mejorar la salud de las personas,<br> queremos generar conciencia en el
                consumo de alimentos,<br> alentar a realizar cambios en los hábitos alimenticios, <br>creemos que con pequeños pasos podemos empezar a cambiar el 🌎.</h5>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col  px-5">
            <h5 class="text-center scroll-content fadeTop" style="color: #89d8aa ; line-height: 40px;
            ">Nuestros valores también es poder llevar nuestros productos<br> a todos los rincones del mundo, para
                que las personas tengan <br>uuna opcion para alimentarse
                mas saludable<br> y ser más sustentables y amigables con el planeta.</h5><br><br><br>
        </div>
    </div>
    
</div>


@endsection


