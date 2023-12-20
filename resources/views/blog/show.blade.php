@extends('layouts.plantilla')

@section('title', 'Blog | ' . $post->titulo )
@section('meta-description', $post->titulo )


@section('content')

<script>
    $(document).ready(function(){
      
        //esto agrega un div con la clase que corrije el problema de responsividad de los video
        $( "iframe" ).wrap( "<div class='col-sm video-responsive'></div>" );

    });
</script>


<div class="text-center my-4 text-white">
    <h1 id="in" class="text-center pt-2">{{ $post->titulo }}</h1>
    @if($post->descripcion)
        <p>{{ $post->descripcion }}</p>
    @endif
</div>


<div class="container">
    <div class="mb-5">

        <div class="card mt-3">

            @if(count($post->multimedias))
                <img src="{{$post->multimedias->last()->url}}" class="card-img-top img-post" alt="{{ $post->multimedias->last()->descripcion }}">
            @endif

            <div class="card-body">
                {!! $post->texto !!}
            </div>
            
            <div class="card-footer">
                <small class="text-dark">Creado el {{ $post->created_at->format('d/m/Y') }}</small>
                    
                
                
            </div>
            
        </div>
        
    </div>


    <!------------------- Categorias ------------------->
    <div class="mb-5">
        @if(count($post->categorias) && count($post->productos_asociados()))
            <h2 class="text-center mb-5">Productos relacionados</h2>
        @else    
            <h2 class="text-center mb-5">También te puede interesar</h2>
        @endif  
            <!------------------- PRODUCTOS RELACIONADOS ------------------->
            <div id="productos" class="container mt-5">
                <div class="row">
            
                    @foreach($post->productos_asociados() as $producto)
                    <!--EL PRODUCTO-->
                    <div class="col-lg-4 mb-5">
            
                        <div class="card shadow text-white border border-5 border-light" style="max-width: 520px; background-color:{{$producto->color}};">
                            @if (count($producto->multimedias))
                                <img src="{{$producto->multimedias->last()->url}}" class="card-img" alt="{{$producto->descripcion}}" width="60%">
                            @else
                                <div style="height: 520px"></div>
                            @endif
                            <div class="card-img-overlay">
                                <h4 class="card-title tituloProducto shadown" style="background-color:{{$producto->color}};">{{$producto->nombre}}</h4>
                                <br>
            
            
                                <p class="card-text parrafoProd px-1" style="opacity:60%; background-color:{{$producto->color}};">
                                    {{--{{Str::of($producto->descripcion)->limit(50)}}
                                    {{Str::of($producto->descripcion)->words(10, '...')}}--}}
                                    {{Str::of($producto->descripcion)->words(10, '...')}}
                                    <br>
                                    <a class=" link" data-toggle="modal" data-target="#modal_{{$producto->id}}" ><strong>Leer mas...</strong></a> </p>
                                
            
                                    {{-- ETIQUETA CON EL PRECIO --}}
                                    @if(Auth::user()) {{-- si hay una sesion iniciada se muestran 3 botones, por eso usamos una clase css distinta --}}
                                        <h4 class="precio-prod shadown">${{$producto->precio}}</h4> 
                                    @else
                                        <h4 class="precio-prod-sm shadown">${{$producto->precio}}</h4>
                                    @endif
            
            
                                    <!-- boton de añadir al carrito -->
                                    <!-- boton de añadir al carrito --> 
                                    <!-- boton de añadir al carrito -->
                                    @if ($producto->stock > 0)
                                        <a onclick="anadirAlCarrito({{$producto->id}})" class="btn1 btn-derecho shadown"style="background-color:{{$producto->color}};">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                            </svg>
                                        </a>
                                    @endif
                                </p>
                                <p></p>


                                <!-- Categorias -->
                                <!-- Categorias -->
                                {{--@foreach ($producto->categorias as $categoria)
                                    <span class="px-1 shadown">{{ $categoria->nombre }} <i class="bi bi-tag"></i></span>
                                @endforeach--}}


                                <br><br>
            
            
                                <!-- boton de comprar -->
                                <!-- TODO: suma el producto al carrito y nos lleva a la pagina de carrito -->
                                <!-- boton de comprar -->
                                @if ($producto->stock > 0)
                                    <a href="{{route('mi_carrito')}}" onclick="anadirEIeAlCarrito({{$producto->id}})" class="btn1 btn-medio shadown" style="
                                        background-color:{{$producto->color}};
                                        text-decoration:none;
                                        color: inherit;
                                        cursor: default;">Comprar</a>
                                @endif
            
            
                                {{-- ETIQUETA DE PRODUCTO AGOTADO--}}
                                @if ($producto->stock < 1)
                                    <div class="etiqueta_de_agotado m-0 p-2 text-center">
                                        <span class="h4 text-white ">AGOTADO</span>
                                    </div>
                                @endif
            
                            
                                <!-- boton de favorito -->
                                <!-- boton de favorito -->
                                <!-- componente livewire EstablecerFavorito -->
                                @if ($producto->stock > 0)
                                    @if(Auth::user())
                                        @livewire('establecer-favorito', ['producto' => $producto, 'user_id' => Auth::user()->id])
                                    @endif
                                @endif
                                
            
                            </div>{{--<br>--}}
                        </div>
                    </div>
                    @endforeach
            
                </div>
            </div>

                
    </div>


        
</div>


@endsection