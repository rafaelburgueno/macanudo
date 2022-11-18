@extends('layouts.plantilla')

@section('title', 'Nuestros productos')
@section('meta-description', 'metadescripcion para la pagina Nuestros productos')
    
    
@section('content')


<div class="ml-0 mt-0 mr-0 mb-0 contenedor">
    <h3 class="text-center btn-blanco negro">
        <a class="" data-toggle="modal" data-target="#politicas_de_envio" >
            Constultá aquí las formas de entrega
        </a>
    </h3><br>
</div>



<div class="container">
    <h1 class="text-center gris">NUESTROS PRODUCTOS</h1>
    <hr>
</div>

  
<div id="productos" class="container mt-5">
    <div class="row">

        @foreach($productos as $producto)
        <!--EL PRODUCTO-->
        <div class="col-md-6 mb-5">

            <div class="card shadow text-white border border-5 border-light" 
            style="max-width: 520px; background-color:{{$producto->color}};">
                @if (count($producto->multimedias))
                            <img src="{{$producto->multimedias->last()->url}}" class="card-img" alt="..." width="60%">
                        @else
                            <div style="height: 520px"></div>
                        @endif
                <div class="card-img-overlay">
                <h4 class="card-title tituloProducto shadown" style="background-color:{{$producto->color}};">{{$producto->nombre}}</h4>
                <br>
                <p class="card-text parrafoProd" style="opacity:60%; background-color:{{$producto->color}};">
                    {{--{{Str::of($producto->descripcion)->limit(50)}}
                    {{Str::of($producto->descripcion)->words(10, '...')}}--}}
                    {{Str::of($producto->descripcion)->words(10, '...')}}
                    <br>
                    <a class=" link" data-toggle="modal" data-target="#modal_{{$producto->nombre}}" ><strong>Leer mas...</strong></a> </p>
                    
                    <!-- boton de añadir al carrito -->
                    <!-- boton de añadir al carrito -->
                    <!-- boton de añadir al carrito -->
                    <a onclick="anadirAlCarrito({{$producto->id}})" class="btn1 btn-derecho shadown"style="background-color:{{$producto->color}};">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                        </svg>
                    </a>
                </p>
                <p></p>
                <br><br>


                <!-- boton de comprar -->
                <!-- TODO: suma el producto al carrito y nos lleva a la pagina de carrito -->
                <!-- boton de comprar -->
                <a onclick="anadirAlCarrito({{$producto->id}})" class="btn1 btn-medio shadown" style="background-color:{{$producto->color}};">Comprar</a>

                <!-- boton de carrito -->
                <!-- boton de carrito -->
                <!-- boton de carrito -->
                <a class="btn1 btn-izquierdo shadown" style="background-color:{{$producto->color}};">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg>
                </a>
                


            </div><br>
            </div>
        </div>
        @endforeach

    </div>
</div>



<br>


<div class="ml-0 mt-0 mr-0 mb-0">
    <h3 class="text-center btn-blanco negro">
        <a class="" data-toggle="modal" data-target="#politicas_de_envio">
            Constultá aquí las formas de entrega
        </a>
    </h3>
    <br><br>
</div>



  <!--slider---slider---slider---slider---slider---slider---slider---slider----->
<div class="contenedor">
    <div class="row m-0 p-0">
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
    </div>
</div>

<br>



@foreach($productos as $producto)
<!-- MODAL INFO  ----MODAL INFO  ----MODAL INFO  ----MODAL INFO  ------>
<!-- MODAL INFO  ----MODAL INFO  ----MODAL INFO  ----MODAL INFO  ------>
<div class="modal fade" id="modal_{{$producto->nombre}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content align-items-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <h1 class="modal-title text-center " style="color:{{$producto->color}};">{{$producto->nombre}}<br>{{$producto->precio}} $</h1>
            
            <div class="modal-body">
                <h6 class="" style="color:{{$producto->color}};">{{$producto->descripcion}}
                </h6>
                <br>
                <p class="" style="color:{{$producto->color}};"> Una vez abierto conservar refrigerado, cubierto 
                    con papel o tela, dentro de un recipiente cerrado. Contiene 
                    microorganismos vivos, esto cambiará el saborlentamente con 
                    el pasar de los días.
                </p>
                <br>
                <img class="img-fluid" src="{{asset('/storage/img/roque-info.png')}}">

                <p class="" style="color:{{$producto->color}};">¿Más datos? Consultá la sección de 
                    <a href="preguntas_frecuentes.html">
                        preguntas frecuentes
                    </a>
                </p>

            </div>


        </div>


    </div>
</div>
@endforeach


<script>

    function anadirAlCarrito(id){
        let mi_carrito = [];
        
        if ( localStorage.getItem("carrito") ){
            mi_carrito.push(localStorage.getItem("carrito"));
        }

        mi_carrito.push(id);
        
        localStorage.setItem("carrito", mi_carrito);
        

        //console.log( typeof mi_carrito );
        console.log('carrito: ' + mi_carrito );

        /*for(let i = 0; i < mi_carrito.length; i++){
            console.log(mi_carrito[i]);
        }*/


        //ALERTA 
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Se añadio al carrito'
        })

        actualizarContadorDelCarrito();

    }

    

</script>


@endsection


