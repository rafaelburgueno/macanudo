@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'metadescripcion para la pagina home')
    
    
@section('content')




<div class="mt-3 mx-0 mb-3 ml-0 contenedor">
    <div class="row  m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.png')}}" class="nav d-block w-100 m-0" alt="...">
            <p class="abajo-centrado">
                    <a class="btn1 btnn btn-lg shadownn btn-light" type="button" href="{{route('nuestros_productos')}}">
                    Ver productos
                </a>
            </p>
        </div>
    </div>
</div>


<div class="contenedorr container">
    <div class="row">
        <div class="col">

            <h3 class="text-center scroll-content fadeLeft">Esto 
                <span class="spanletrasrojo"> no es queso</span>,
                <br>
                es alimento a base de castañas de caju.
            </h3><br>
            <h3 class="text-center scroll-content fadeRight">
                Elaboramos siguiendo los procesos de la
                quesería tradicional<br>pero 
                <span class=" spanletrasrojo">no usamos leche de ningún animal</span>,
                <br>usamos castañas.
            </h3>
            <br>
        </div>
    </div>
</div>


<div class="mt-3 mx-0 mb-3 contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.2.png')}}" class="nav d-block w-100" alt="...">
            <p class="abajo-centrado">
                <a href="blog.html" class="btn1 btn-lg shadown btn-light" type="button" href="blog.html">Ver proceso</a>
            </p>
        </div>
    </div>
</div>
<br>
<br>


<!--slider---slider---slider---slider---slider---slider---slider---slider----->
<div class="contenedorr p-3">
    <div class="row">
        <div class="slider w-100">
            <div class="slide-track w-100">
                <div class="slide">
                    <img src="{{asset('/storage/img/5.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/7.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/6.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/8.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/5.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/7.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/6.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/8.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/5.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/7.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/6.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/8.png')}}" height="100" width="250" alt="" />
                </div>
            </div>

        </div>
    </div>
</div>
<br>
<br>
<br>


<div class="mt-0 mr-0 mb-3  ml-0 contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.3.png')}}" class="nav d-block w-100" alt="...">

            <p class="abajo-centrado">
                <a class="btn1 btn-lg shadown btn-light" type="button" href="productos.html">
                    Ver beneficios
                </a>
            </p>
        </div>
    </div>
</div>


<div class="contenedorr container">
    <div class="row">
        <div class="col">
            <h3 class="text-center scroll-content fadeLeft">Cuidamos los recursos</h3>
            <br>
            <h2 class="text-center scroll-content fadeRight"> utilizamos materiales reutilizables</h2><br>
            <h3 class="text-center scroll-content fadeLeft">minimizamos el packaging</h3>
            <br>
            <h2 class="text-center scroll-content fadeRight">y no involucramos animales.</h2>
            <br>
        </div>
    </div>
</div>


<div class="mt-0 mr-0 mb-3  ml-0 contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.4.png')}}" class="nav d-block w-100" alt="...">
            <p class="abajo-centrado">
                <a class="btn1 btn-lg shadown btn-light" type="button" href="productos.html">
                    Nosotros
                </a>
            </p>
        </div>
    </div>
</div>


<div class="contenedorr container">
    <div class="row ">
        <div class="col  ">
            <h3 class="text-center scroll-content fadeLeft" style="line-height: 50px ;"> 
                Detrás de cada producto<br> está la mano de un artesano, 
                <br>que cuida todo el proceso 
                <br>desde la castaña
                <br> hasta que el alimento llega a tu mesa.
            </h3><br>
        </div>

    </div>
</div>


<!--slider---slider---slider---slider---slider---slider---slider---slider----->
<div class="contenedorr p-3">
    <div class="row">
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
                    <img src="{{asset('/storage/img/slider.4.png')}} " height="100" width="250" alt="" />
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
                    <img src="{{asset('/storage/img/7.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/6.png')}}" height="100" width="250" alt="" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/8.png')}}" height="100" width="250" alt="" />
                </div>
            </div>

        </div>
    </div>
</div>
<br>



@endsection


