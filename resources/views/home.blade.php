@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'Déjate sorprender por los deliciosos alimentos elaborados con castañas de cajú. Nuestros alimentos veganos son perfectos para aquellos que buscan opciones saludables y con un sabor único.')
    
    
@section('content')


<!-- Banner -->
@include('partials.banner')


<div class="mr-0 mb-3 ml-0 contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.b.jpeg')}}" class="nav d-block w-100 m-0" alt="Imagen de diferentes tipos de productos de Macanudo, con el sobreimpreso '¿Querés conocer algo mejor que el queso?'">
            <p class="abajo-centrado">
                <a class="btn1 btn-lg shadown btn-blanco negro" type="button" href="{{route('nuestros_productos')}}" style="font-size: 1.28em">
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
            <img src="{{asset('/storage/img/index.2b.jpeg')}}" class="nav d-block w-100" alt="Imagen con productos de Macanudo, con el sobreimpreso 'A base de plantas, deliciosos y saludables'">
            <p class="abajo-centrado">
                <a href="{{route('blog.index')}}" class="btn1 btn-lg shadown btn-blanco negro" type="button" href="{{route('blog.index')}}" style="font-size: 1.28em">Ver proceso</a>
            </p>
        </div>
    </div>
</div>
<br>

<!--slider---slider---slider---slider---slider---slider---slider---slider----->
<div class="contenedorr mt-3 mb-5 m-0 p-0">
    <div class="row w-100 m-0 p-0">
        <div class="slider w-100 m-0 p-0">
            <div class="slide-track">
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="100% veganos" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="100% veganos" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="100% veganos" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="100% veganos" />
                </div>

            </div>
        </div>
    </div><br>
</div><br>

<div class="mt-0 mr-0 mb-5 ml-0 contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.3b.jpeg')}}" class="nav d-block w-100" alt="Imagen con productos de Macanudo, con el sobreimpreso '100% lleno de amor al planeta'">
            <p class="abajo-centrado">
                <a class="btn1 btn-lg shadown btn-blanco negro" type="button" href="{{route('blog.index')}}" style="font-size: 1.28em">
                    Ver beneficios
                </a>
            </p>
        </div>
    </div>
</div>

<div class="contenedorr container">
    <div class="row">
        <div class="col" style="overflow: hidden;">
            <h2 class="mb-3 text-center scroll-content fadeRight gris">Cuidamos los recursos,</h2>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight gris"> utilizamos materiales reutilizables,</h1>
            <br>
            <h3 class="mb-3 text-center scroll-content fadeRight gris">minimizamos el packaging,</h3>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight gris"> y no involucramos animales.</h1><br>
        </div>

    </div>
</div>

<div class="mt-0 mr-0 mb-3  ml-0  contenedor">
    <div class="row m-0 p-0">
        <div class="col m-0 p-0">
            <img src="{{asset('/storage/img/index.4b.jpeg')}}" class="nav d-block w-100" alt="Imagen con productos de Macanudo, con el sobreimpreso 'Elaborados con empatía y artesanalmente'">
            <p class="abajo-centrado"><a class="btn1 btn-lg shadown btn-blanco negro" type="button"
                    href="{{route('nosotros')}}" style="font-size: 1.28em">Nosotros</a>
        </div>
    </div>
</div>

<div class="contenedor mt-3 mb-5 p-3">
    <div class="row ">
        <div class="col" style="overflow: hidden;">
            <h2 class="mb-3 text-center scroll-content fadeRight gris">Detrás de cada producto</h2>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight gris">está la mano de un artesano,</h1><br>
            <h3 class="mb-3 text-center scroll-content fadeRight gris">que cuida todo el proceso </h3>
            <br>
            <h1 class="mb-3 text-center scroll-content fadeRight gris">desde la
                castaña<br>hasta que el alimento llega a tu mesa.</h1>
            <br>
        </div>

    </div>
</div>

<!--AL CLUB MACANUDO-->
<img src="{{asset('/storage/img/club-macanudo.png')}}" class="nav d-block w-100" alt="Imagen con productos de Macanudo, con el sobreimpreso '¿Te encanta Macanudo?'">

<div class="mt-5 mr-0 mb-5 ml-0 container-fluid">
    <div class="row">
        <div class="col text-center">
            <a href="{{route('club_macanudo')}}" class=" btn1 btn-club ">
                Sé parte de nuestro club
            </a>
        </div>
    </div>
</div>
<br>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="text-center gris mb-3 mt-0">Mapa de los puntos de Venta</h4>
            <div class="video-responsive mb-5">
                <iframe src="https://www.google.com/maps/d/embed?mid=1ycvQhsZ8ift8jHkpa9kqeslwAOlTNis&ehbc=2E312F" width="640" height="640"></iframe>
            </div>
        </div>


        <!-- FORMULARIO DE CONTACTO -->
        <!-- FORMULARIO DE CONTACTO -->
        <!-- FORMULARIO DE CONTACTO -->
        <div class="col-sm-6 ">
            <h4 class="text-center gris mb-3 mt-0">Déjanos tu comentario</h4>
            <form id="form_contacto" class="border border-light p-3" action="{{route('formulario_de_contacto')}}" method="POST">
                    @csrf
                    @method('POST')


                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="nombre" class="gris">Nombre y apellido: </label>
                        <input type="text" {{--pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{6,100}"--}} class="form-control mb-2" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="{{old('nombre')}}" required min="6" max="100" maxlength="100" minlength="6" >
                        @error('nombre')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                        
                        <label for="email" class="gris mt-2">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su Email" value="{{old('email')}}" required>
                        @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm d-flex flex-wrap">
                        <label for="texto" class="gris">Mensaje: </label>
                        <textarea required max="255" maxlength="255" id="texto" class="form-control" name="texto" rows="4" cols="60" placeholder="Ingrese aquí su mensaje">{{old('texto')}}</textarea><br>
                        @error('texto')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="g-recaptcha btn-procesando btn1 btn-azul shadown mt-1" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}" data-callback='onSubmit' data-action='submit'>Enviar</button>

            </form>
        </div>

        {{--<script src="https://www.google.com/recaptcha/api.js"></script>--}}
        <script src="https://www.google.com/recaptcha/api.js?render=invisible"></script>
        <script>
            function onSubmit(token) {
                if(
                    document.getElementById("nombre").validity.valid && 
                    document.getElementById("email").validity.valid &&
                    document.getElementById("texto").validity.valid
                ){
                    document.getElementById("form_contacto").submit();
                }
            }
        </script>
        {{--ocultar el badge de recaptcha--}}
        <style>
            .grecaptcha-badge{ display: none !important; }
        </style>

    </div>
</div>
<br><br>
<hr>



<!--video---video---video---video---video---video---video---video----->
<div class="container">
    <div class="row">
        <div class="col-sm video-responsive">
            <iframe width="560" height="400"  src="https://www.youtube.com/embed/WjcVMlPjK0E"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
</div><br><br>



<!--slider---slider---slider---slider---slider---slider---slider---slider----->
<div class="contenedorr mt-3 mb-5 m-0 p-0">
    <div class="row w-100 m-0 p-0">
        <div class="slider w-100 m-0 p-0">
            <div class="slide-track">
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="100% veganos" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="100% veganos" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sing.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/singluten.png')}}" height="100" width="250" alt="sin gluten" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinl.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinlactosa.png')}}" height="100" width="250" alt="sin lactosa" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sincolesterol.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/sinc.png')}}" height="100" width="250" alt="sin colesterol" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/veg.png')}}" height="100" width="250" alt="100% veganos" />
                </div>
                <div class="slide">
                    <img src="{{asset('/storage/img/vegano.png')}}" height="100" width="250" alt="100% veganos" />
                </div>
            </div>

        </div>
    </div>
</div><br>



<script>
    $('.btn-procesando').click(function(){
            if( 
                //el input nombre no puede estar vacio y debe tener mas de 5 caracteres
                //document.getElementById("nombre").value != '' && 
                //document.getElementById("nombre").value.length > 5 &&
                document.getElementById("nombre").validity.valid && 
                document.getElementById("email").validity.valid &&
                document.getElementById("texto").validity.valid

            ){
                let timerInterval
                Swal.fire({
                title: 'Procesando',
                html: 'Por favor espere.',
                timer: 18000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
            }
        });
</script>


@endsection


