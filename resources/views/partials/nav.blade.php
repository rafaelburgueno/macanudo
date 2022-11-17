<nav class="navbar navbar-expand-lg site-header sticky-top fixed-top align-items-center"
        style=" background-color: #1e1e1e; color:#e1e1e1; position: sticky">


        <a class="navbar-brand navbar-logo" href="{{route('home')}}"><img src="{{asset('/storage/img/maca.1.png')}}" width="240%"></a>

        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{route('nosotros')}}" style=" {{request()->routeIs('nosotros') ? 'color: yellow;' : ''}}">NOSOTROS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('nuestros_productos')}}" style=" {{request()->routeIs('nuestros_productos') ? 'color: yellow;' : ''}}">PRODUCTOS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('puntos_de_venta')}}" style=" {{request()->routeIs('puntos_de_venta') ? 'color: yellow;' : ''}}">PUNTOS DE VENTA</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('club_macanudo')}}" style=" {{request()->routeIs('club_macanudo') ? 'color: yellow;' : ''}}">CLUB MACANUDO</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('blog.index')}}" style=" {{request()->routeIs('blog') ? 'color: yellow;' : ''}}">BLOG</a></li>


            </ul>

            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('mi_carrito')}}" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                        </svg>
                        <span class="badge rounded-pill badge-danger" id="badgeDelCarrito">0</span>
                        
                        <script>
                            function actualizarContadorDelCarrito(){
                                let mi_carrito = [];
                                // trae los elementos que ubieran en el carrito
                                if ( localStorage.getItem("carrito") ){
                                    let texto = localStorage.getItem("carrito");
                                    mi_carrito = texto.split(",");
                                }

                                //console.log('se ejecuta la funcion de actualizar el contador del carrito');

                                // elimina los duplicados
                                /*mi_carrito = mi_carrito.filter((element, index) => {
                                    return mi_carrito.indexOf(element) === index;
                                });*/

                                if(mi_carrito.length){
                                    document.getElementById("badgeDelCarrito").innerHTML = mi_carrito.length;
                                    document.getElementById("badgeDelCarrito").style.display = "inline";
                                }else{
                                    document.getElementById("badgeDelCarrito").innerHTML = mi_carrito.length;
                                    document.getElementById("badgeDelCarrito").style.display = "none";
                                }
                            }
                            actualizarContadorDelCarrito();
                        </script>
                    </a>
                </li>
            </ul>

            @if( Auth::check() )
                <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profile.show')}}">Mi perfil</a>
                            @if( Auth::user()->rol == 'administrador' )
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('pedidos.index')}}">Pedidos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('productos.index')}}">Productos</a>
                                <a class="dropdown-item" href="{{route('canastas.index')}}">Canastas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('cupones.index')}}">Cupones</a>
                                <a class="dropdown-item" href="{{route('costos_de_envio.index')}}">Costos de envio</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('cerrar_sesion')}}">Salir</a>
                            
                        </div>
                    </li>                    

                    {{--@if( Auth::user()->rol == 'administrador' )
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('mi_perfil')}}">Mi perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('pedidos.index')}}">Pedidos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('productos.index')}}">Productos</a>
                                <a class="dropdown-item" href="{{route('canastas.index')}}">Canastas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('cupones.index')}}">Cupones</a>
                                <a class="dropdown-item" href="{{route('costos_de_envio.index')}}">Costos de envio</a>
                                
                            </div>
                        </li>
                    @endif--}}

                    {{--<li class="nav-item">
                        <a class="nav-link" href="{{route('cerrar_sesion')}}" class="ml-5">Salir</a>
                    </li>--}}

                </ul>
            @else

            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}" class="ml-5" alt="Iniciar sesión">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg></a>
                </li>
            </ul>

            @endif

        </div>
    </nav>