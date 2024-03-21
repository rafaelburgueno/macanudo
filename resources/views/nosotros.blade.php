@extends('layouts.plantilla')

@section('title', 'Nosotros')
@section('meta-description', 'Conoce más acerca de nuestro proceso de elaboración de noquesos veganos con castañas de cajú. Descubre nuestra historia, valores y objetivos.')
    
    
@section('content')


<div class="container-fluid">

    <div class="row m-0 p-0 mt-2">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 align-items-center">
            <img src="{{asset('/storage/img/NOSOTROS1.png')}}" class="nav d-block w-100" alt="Imagen con varios sinónimos de la expresión 'macanudo'">
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div class="row m-0 p-0 ">
        <div class="col ">
            <h1 class="text-center" style="color: #e1e1e1;   text-shadow: 1.5px 1.5px  var(--lila);">
                Todo eso pensamos cuando descubrimos nuestras recetas.
            </h1>
        </div>

    </div>
    <div class="row m-0 p-0 m-0 p-0">
        <div class="col m-0 p-0" style="overflow: hidden;">

            <h3 class="text-center scroll-content fadeRight" style="color: #e1e1e1; line-height: 60px;">
                <span class="spanletrasrojo"> Confiamos</span> en que podemos
                demostrarle al mundo <br><span class="spanletrasrojo">que se puede disfrutar</span> de
                un sabroso noqueso <br>de una manera <span class="spanletrasrojo"> más amigable con el
                    planeta.</span>
            </h3>
        </div>

    </div>

    <div class="row m-0 p-0">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 py-5 align-items-center gris">
            <p class="scroll-content fadeLeft">Cuando decidimos dejar de consumir lácteos comenzamos una
                búsqueda
                personal
                del sabor a queso que extrañabamos muchísimo; comenzamos a tomar cursos
                de quesería vegetal, con conocimientos previos, horas de búsqueda de recetas, y
                muchas ganas nos pusimos a investigar y a crear en la cocina.</p>
            <p class="scroll-content fadeLeft"> Tuvimos muchos errores y todavía
                seguimos aprendiendo pero cada día tomabamos más confianza en lo
                que estábamos logrando, hasta que cumplimos nuestras primera misión y encontramos el sabor que
                buscábamos.
            </p>
            <p class="scroll-content fadeLeft">
                Terminamos
                apasionandonos con el proceso, comenzamos a elaborar nuestros quesos favoritos como el
                camembert,
                parmesano y
                el roquefort.</p>
            <p class="scroll-content fadeLeft"> Poco a poco fueron apareciendo personas que estaban en esa misma
                búsqueda
                y se
                mostraron
                interesadas en comprar nuestros productos, por eso nos lanzamos al nuevo camino de emprender.
                Así
                nace
                Macanudo y comienza otra etapa de desafíos.

            </p>

        </div>
        <div class="col-sm-3">
        </div>
    </div>

    <div class="row m-0 p-0 text-center">
        <div class="col ">
            <img src="{{asset('/storage/img/mision2.png')}}" class="text-center" width="100px">
            <h5 class="text-center scroll-content fadeTop gris">Hoy nuestra
                misión es poder llevar nuestros productos <br>a todos los rincones del mundo.<br> En Macanudo
                elaboramos alimentos de forma artesanal<br> para que las personas puedan disfrutar<br> de manera más
                saludable y nutritiva,<br> priorizando realizar un proceso sustentable para el planeta <br>y
                colaborar a
                reducir
                el impacto medioambiental.<br><br></h5>
        </div>
    </div>

</div>
<div class="row m-0 p-0 text-center">
    <div class="col ">
        <img src="{{asset('/storage/img/vision3.png')}}" class="text-center" width="100px">

        <h5 class="text-center scroll-content fadeTop gris">Nuestra vision es contribuir a mejorar la salud de las
            personas,<br> queremos generar conciencia en
            el
            consumo de alimentos,<br> alentar a realizar cambios en los hábitos alimenticios, <br>creemos que
            con pequeños pasos podemos empezar a cambiar el 🌎</h5><br>
        <br>
    </div>

</div>
<div class="row m-0 p-0 text-center">
    <div class="col  px-5">
        <img src="{{asset('/storage/img/valores1.png')}}" class="text-center" width="100px">

        <h5 class="text-center scroll-content fadeTop  gris
            ">En Macanudo respetamos a los humanos, los animales y al planeta.<br> Todos los días
            trabajamos bajo esa premisa,<br> cuidando la salud, el medioambiente<br> y sin involucrar
            animales<br> en
            ninguna parte del proceso.</h5><br><br><br>
    </div>

</div>

<div class="container">
    <div class="row mb-5">
        <div class="col-sm video-responsive mb-5">
            <iframe width="560" height="400" src="https://www.youtube.com/embed/WjcVMlPjK0E"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
</div>


@endsection


