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

    <div class="row ">
        <div class="col  px-5">
            <h1 class="text-center" style="color: #e1e1e1;   text-shadow: 1.5px 1.5px  var(--lila);">
                Todo eso pensamos cuando descubrimos nuestras recetas.
            </h1>
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
        <div class="col-sm-6 py-5 px-5 align-items-center gris">
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
            <h3 class="text-center scroll-content fadeTop rojo">
                Hoy nuestra misión es poder llevar nuestros productos <br>a todos los rincones del mundo.<br> En Macanudo
                elaboramos alimentos de forma artesanal<br> para que las personas puedan disfrutar<br> de manera más
                saludable y nutritiva,<br> priorizando realizar un proceso sustentable para el planeta <br>y
                colaborar a reducir el impacto medioambiental.<br><br>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col  px-5">
            <h4 class="text-center scroll-content fadeTop lila">Nuestra vision es contribuir a mejorar la salud de las personas,<br> queremos generar conciencia en
                el consumo de alimentos,<br> alentar a realizar cambios en los hábitos alimenticios, <br>creemos que
                con pequeños pasos podemos empezar a cambiar el 🌎</h4><br>
            <br>
        </div>

    </div>

    <div class="row">
        <div class="col  px-5">
            <h5 class="text-center scroll-content fadeTop gris
                ">En Macanudo respetamos a los humanos, los animales y al planeta.<br> Todos los días
                trabajamos bajo esa premisa,<br> cuidando la salud, el medioambiente<br> y sin involucrar
                animales<br> en ninguna parte del proceso.
            </h5><br><br><br>
        </div>

    </div>

</div>

{{--
<!--PRODUCTOS--PRODUCTOS--PRODUCTOS--PRODUCTOS--PRODUCTOS--PRODUCTOS--PRODUCTOS---->
<div class="container-fluid">
    <div class="row mx-0 mt-0">
        <div class="col  text-center gris">
            <h5>Productos recomendados</h5><br>
        </div>
    </div>

    <div class="row">

        <!--PARME SANO-->
        <div class="col-sm-3 col-md-4 col-lg-3 text-center">

            <div class="card text-white border border-5 border-light"
                style="max-width: 240px; background-color:#dab926;">
                <img src="{{asset('/storage/img/producto.3.png')}}" class="card-img" alt="..." width="60%">
                <div class="card-img-overlay">
                    <p class="card-title shadown tituloProducto" style="text-align: center; background-color: #dab926; 
                      ">CHIFLADO</p>


                    <a href="mi_carrito.html" class="btn-amarillo btn1  btn-sm shadown btn-medio-sm">Comprar
                    </a>

                    <a href="favoritos" class="btn-amarillo btn1 btn-derecho-sm btn-sm shadown"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star" viewBox="0 0 16 16">
                            <path
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                    </a>

                </div><br>
            </div><br>

        </div>

        <!--HIERBAS-->
        <div class="col-sm-3 col-md-4 col-lg-3 ">

            <div class="card text-white border border-5 border-light"
                style="max-width: 240px; background-color:#dab926;">
                <img src="{{asset('/storage/img/producto.3.png')}}" class="card-img" alt="..." width="60%">
                <div class="card-img-overlay">
                    <p class="card-title shadown tituloProducto" style="text-align: center; background-color: #dab926; 
                      ">CHIFLADO</p>


                    <a href="mi_carrito.html" class="btn-amarillo btn1  btn-sm shadown btn-medio-sm">Comprar
                    </a>

                    <a href="favoritos" class="btn-amarillo btn1 btn-derecho-sm btn-sm shadown"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star" viewBox="0 0 16 16">
                            <path
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                    </a>

                </div><br>
            </div><br>

        </div>

        <!--HIERBAS-->
        <div class="col-sm-3 col-md-4 col-lg-3 ">

            <div class="card text-white border border-1 border-light"
                style="max-width: 240px; background-color:#dab926;">
                <img src="{{asset('/storage/img/producto.3.png')}}" class="card-img" alt="..." width="60%">
                <div class="card-img-overlay">
                    <p class="card-title shadown tituloProducto" style="text-align: center; background-color: #dab926; 
                      ">CHIFLADO</p>


                    <a href="mi_carrito.html" class="btn-amarillo btn1  btn-sm shadown btn-medio-sm">Comprar
                    </a>

                    <a href="favoritos" class="btn-amarillo btn1 btn-derecho-sm btn-sm shadown"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star" viewBox="0 0 16 16">
                            <path
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                    </a>

                </div><br>
            </div><br>

        </div>

        <!--HIERBAS-->
        <div class="col-sm-3 col-md-4 col-lg-3 ">

            <div class="card text-white border border-1 border-light"
                style="max-width: 240px; background-color:#dab926;">
                <img src="{{asset('/storage/img/producto.3.png')}}" class="card-img" alt="..." width="60%">
                <div class="card-img-overlay">
                    <p class="card-title shadown tituloProducto" style="text-align: center; background-color: #dab926; 
                      ">CHIFLADO</p>


                    <a href="mi_carrito.html" class="btn-amarillo btn1  btn-sm shadown btn-medio-sm">Comprar
                    </a>

                    <a href="favoritos" class="btn-amarillo btn1 btn-derecho-sm btn-sm shadown"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-star" viewBox="0 0 16 16">
                            <path
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                        </svg>
                    </a>

                </div><br>
            </div><br>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-9">
        </div>
        <div class="col-sm-3 text-center">
            <a href="{{route('nuestros_productos')}}" class="btn-gris btn1 btn-lg shadown">Ir a productos</a>

        </div>
    </div>
</div>--}}

@endsection


