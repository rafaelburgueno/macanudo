@extends('layouts.plantilla')

@section('title', 'Nuestros productos')
@section('meta-description', 'metadescripcion para la pagina Nuestros productos')
    
    
@section('content')


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2 h2">NUESTROS PRODUCTOS</h1>
</div>





<div class="container mt-5 ">

    <div class="row ccard-columns-2 ">
        
        @foreach($productos as $producto)
            <div class="col-md-6 mb-5">    

                <div class="card text-white border border-5 border-light" style="background-color:{{$producto->color}};">
                    @if (count($producto->multimedias))
                        <img src="{{$producto->multimedias->last()->url}}" class="card-img" alt="..." width="">
                    @else
                        <div style="height: 520px"></div>
                    @endif
                    <div class="card-img-overlay">
                        <h4 class="card-title shadown rounded" style= "top:-35px ; text-align: center; background-color: {{$producto->color}}; position: relative; ">
                            {{$producto->nombre}}
                        </h4>
                    
                        <div style="opacity:50%; background-color: {{$producto->color}}; bottom: 60px; left:10px; right:10px; position: absolute;">
                            <p class="card-text m-1">
                                {{$producto->descripcion}}<br>Leer mas...
                            </p>
                            <span class="p-2 ">{{$producto->precio}} $</span>
                        </div>
        
        
                        <button class="btn " style="color:{{$producto->color}} ; background-color: #e1e1e1; position: absolute; bottom: 10px; right: 65px;">Comprar</button>
                        <button class="btn " style="color:{{$producto->color}} ; background-color: #e1e1e1; position: absolute;  bottom: 10px; right: 10px;" onclick="anadirAlCarrito({{$producto->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                        </button>
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


    </div>
</div>


@endsection


