@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'metadescripcion para la pagina home')
    
    
@section('content')




<div class="mt-3 mr-0 mb-3 ml-0 contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.png')}}" class="nav d-block w-100 m-0" alt="...">
            <p class="abajo-centrado">
                <a class="btn1 btn-lg shadown btn-blanco negro" type="button" href="{{route('nuestros_productos')}}">
                    Ver productos
                </a>
        </div>
    </div>
</div>


<div class="contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0" style="overflow: hidden;">

            <h3 class="text-center ">Esto <span class="spanletrasrojo">
                no es queso</span>,
                <br> es alimento a base de castañas de caju.
            </h3><br>
            <h3 class="text-center scroll-content fadeRight">
                Elaboramos siguiendo los procesos de la quesería tradicional<br>pero 
                <span class=" spanletrasrojo">no usamos leche de ningún animal</span>,
                <br>usamos castañas.
            </h3><br><br>
        </div>
    </div>
</div>


<div class="mt-3 mr-0 mb-3  ml-0 contenedor">
    <div class="row m-0  p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.2.png')}}" class="nav d-block w-100" alt="...">
            <p class="abajo-centrado">
                <a href="{{route('blog.index')}}" class="btn1 btn-lg shadown btn-blanco negro" type="button" href="{{route('blog.index')}}">Ver proceso</a>
            </p>
        </div>
    </div>
</div>
<br>

<!--slider---slider---slider---slider---slider---slider---slider---slider----->
<div class="contenedorr mt-3 mb-5 p-3">
    <div class="row">
        <div class="slider">
            <div class="slide-track">
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="" />
                </div>

            </div>
        </div>
    </div><br>
</div><br>

<div class="mt-0 mr-0 mb-3  ml-0 contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.3.png')}}" class="nav d-block w-100" alt="...">
            <p class="abajo-centrado">
                <a class="btn1 btn-lg shadown btn-blanco negro" type="button" href="{{route('blog.index')}}">
                    Ver beneficios
                </a>
            </p>
        </div>
    </div>
</div>

<div class="contenedorr container">
    <div class="row">
        <div class="col" style="overflow: hidden;">
            <h2 class="mb-3 text-center scroll-content fadeRight verde">Cuidamos los recursos,</h2>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight verdeC"> utilizamos materiales reutilizables,</h1>
            <br>
            <h3 class="mb-3 text-center scroll-content fadeRight amarillo">minimizamos el packaging,</h3>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight gris"> y no involucramos animales.</h1><br>
        </div>

    </div>
</div>

<div class="mt-0 mr-0 mb-3  ml-0  contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.4.png')}}" class="nav d-block w-100" alt="...">
            <p class="abajo-centrado"><a class="btn1 btn-lg shadown btn-blanco negro" type="button"
                    href="{{route('nuestros_productos')}}">Nosotros</a>
        </div>
    </div>
</div>

<div class="contenedor mt-3 mb-5 p-3">
    <div class="row ">
        <div class="col" style="overflow: hidden;">
            <h2 class="mb-3 text-center scroll-content fadeRight verde">Detrás de cada producto</h2>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight verdeC">está la mano de un artesano,</h1><br>
            <h3 class="mb-3 text-center scroll-content fadeRight amarillo">que cuida todo el proceso </h3>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight gris">desde la
                castaña<br>hasta que el alimento llega a tu mesa.</h1>
            <br>
        </div>

    </div>
</div>

<img src="{{asset('/storage/img/club-macanudo.png')}}" class="nav d-block w-100" alt="...">


<div class="mt-2 mr-0 mb-5 ml-0 container-fluid">
    <div class="row">
        <div class="col text-center">
            <a href="{{route('club_macanudo')}}" class=" btn1 btn-club mt-5">
                Sé parte de nuestro club
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="text-center gris mb-3 mt-0">Mapa de los puntos de Venta</h4>
            <div class="video-responsive mb-5">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=13Y16rpsNzvf6A2ybMbV-TEEtXPgdehY&ehbc=2E312F" width="640" height="640"></iframe>
            </div>
        </div>
        <div class="col-sm-6 ">
            <h4 class="text-center gris mb-3 mt-0">Déjanos tu comentario</h4>
            <form class=" border border-light p-3">
                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="nombre" class="gris">Nombre: </label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" required>
                        <label for="email" class="gris">Email: </label>
                        <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" required>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-sm d-flex flex-wrap">
                        <textarea id="message" class="input form-control" name="message" rows="6" cols="60"
                            placeholder="Ingrese aquí su mensaje">
                        </textarea><br>

                        <button class="btn1 btn-azul shadown mt-1">Enviar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<br><br>
<hr>

<!--slider---slider---slider---slider---slider---slider---slider---slider----->
<div class="contenedorr mt-3 mb-5  ">
    <div class="row m-0 p-0 w-100">
        <div class="slider w-100">
            <div class="slide-track w-100">
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="" />
                </div>
            </div>

        </div>
    </div>
</div><br>


@endsection


