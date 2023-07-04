<nav class="navbar navbar-expand-lg site-header sticky-top fixed-top align-items-center"
        style=" background-color: #1e1e1e; color:#e1e1e1; position: sticky">


        <a class="navbar-brand navbar-logo" href="{{route('home')}}">
            @if(request()->routeIs('home'))
                <img src="{{asset('/storage/img/maca.1.png')}}" width="150px" alt="logo de Macanudo"> <!--width="240%"-->
            @else
                <img src="{{asset('/storage/img/castana negro.png')}}" width="60%" alt="logo de Macanudo"> <!--width="60%"-->
            @endif
        </a>

        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{route('nosotros')}}" style=" {{request()->routeIs('nosotros') ? 'color: var(--lila);' : ''}}">NOSOTROS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('nuestros_productos')}}" style=" {{request()->routeIs('nuestros_productos') ? 'color: var(--lila);' : ''}}">PRODUCTOS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('puntos_de_venta')}}" style=" {{request()->routeIs('puntos_de_venta') ? 'color: var(--lila);' : ''}}">PUNTOS DE VENTA</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('club_macanudo')}}" style=" {{request()->routeIs('club_macanudo') ? 'color: var(--lila);' : ''}}">CLUB DEL QUESO</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('blog.index')}}" style=" {{request()->routeIs('blog.*') ? 'color: var(--lila);' : ''}}">BLOG</a></li>
                
            </ul>

            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">

                @if( !Auth::check() )
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}" title="iniciar sesión">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{route('mi_carrito')}}" class="ml-3" style=" {{request()->routeIs('mi_carrito') ? 'color: var(--lila);' : ''}}">
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
                        <a class="nav-link dropdown-toggle" style="
                            {{request()->routeIs('pedidos*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('reparto*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('productos*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('canastas*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('posts*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('banner*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('cupones*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('costos_de_envio*') ? 'color: var(--lila);' : ''}}
                            {{request()->routeIs('profile.show') ? 'color: var(--lila);' : ''}}
                            " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{--<a class="dropdown-item" href="{{route('profile.show')}}">Mi perfil</a>--}}
                            <a class="dropdown-item" href="{{route('profile.show')}}">Mi perfil</a>
                            @if( Auth::user()->rol == 'administrador' )
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('reparto')}}">Reparto</a>
                                <a class="dropdown-item" href="{{route('pedidos.index')}}">Pedidos</a>
                                <a class="dropdown-item" href="{{route('pedidos.index')}}/#titulo_suscripciones">Suscripciones</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('productos.index')}}">Productos</a>
                                <a class="dropdown-item" href="{{route('canastas.index')}}">Canastas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
                                <a class="dropdown-item" href="{{route('banner.index')}}">Banner</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a>
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
            {{-- 
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
            --}}
            @endif

        </div>
    </nav>