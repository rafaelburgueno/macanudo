@extends('layouts.plantilla')

@section('title', 'Crear producto')
@section('meta-description', 'metadescripcion para la pagina de creación de producto')
    
    
@section('content')


<div class="container text-white mt-5">

    <div class="text-center mt-4">
        <h2 id="in" class="text-center pt-2">Editar producto</h2>
    </div>
    
        <div class="row mb-5">
            <div class="col-md-12 p-3">
    
                <form class="" action="{{route('productos.update', $producto)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                    <div class="row">
                        <div class="col col-md-6">
    
                            <!-- nombre -->
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre</label>
                                <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre', $producto->nombre)}}">
                                @error('nombre')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- tipo de producto -->
                            <div class="form-group mb-3">
                                <label for="tipo">Tipo</label>
                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="horma" @selected((old('tipo') == "horma") || $producto->tipo == "horma" )>Horma</option>
                                    <option value="untable" @selected((old('tipo') == "untable") || $producto->tipo == "untable" )>Untable</option>
                                </select>
                                @error('tipo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Precio unitario -->
                            <div class="form-group mb-3">
                                <label for="precio">Precio unitario</label>
                                <input required type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio', $producto->precio)}}" min="0" style="width: 100%;">
                                @error('precio')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- stock -->
                            <div class="form-group mb-3">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock', $producto->stock)}}" min="0" max="32765" style="width: 100%;">
                                @error('stock')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- peso -->
                            <div class="form-group mb-3">
                                <label for="peso_neto">Peso neto</label>
                                <input type="number" class="form-control" id="peso_neto" name="peso_neto" placeholder="..." value="{{old('peso_neto', $producto->peso_neto)}}" min="0" style="width: 100%;">
                                @error('peso_neto')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- descripcion -->
                            <div class="form-group mb-3">
                                <label for="descripcion">Descripción <small>(Se usa para completar el texto alternativo a las imagenes)</small></label>
                                <textarea required class="form-control" id="descripcion" name="descripcion" rows="3">{{old('descripcion', $producto->descripcion)}}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- color -->
                            <div class="form-group mb-3">
                                <label for="color">Color</label>
                                <input type="color" class="form-control" id="color" name="color" value="{{old('color', $producto->color)}}">
                                @error('color')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    
                        <div class="col-md-6">
    
                            {{--<div class="form-group mb-3">
                                <label for="categorias">Categorías (opcional)</label>
                                <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                            </div>--}}
    
                            <!-- ingredientes -->
                            <div class="form-group mb-3">
                                <label for="ingredientes">Ingredientes</label>
                                <textarea required class="form-control" id="ingredientes" name="ingredientes" rows="2">{{old('ingredientes', $producto->ingredientes)}}</textarea>
                                @error('ingredientes')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- informacion nutricional -->
                            <div class="form-group mb-3">
                                <label for="informacion_nutricional">Información nutricional</label>
                                <textarea required class="form-control" id="informacion_nutricional" name="informacion_nutricional" rows="12">{{old('informacion_nutricional', $producto->informacion_nutricional)}}</textarea>
                                @error('informacion_nutricional')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- relevancia -->
                            <div class="form-group mb-3">
                                <label for="relevancia">Relevancia</label>
                                <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{old('relevancia', $producto->relevancia)}}" min="0" style="width: 100%;">
                                @error('relevancia')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- activo -->
                            <div class="form-check my-4">
                                <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $producto->activo))>
                                <label class="form-check-label" for="activo">Publicar</label>
                                @error('activo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- imagen -->
                            <div class="form-group mb-3">
                                <label for="imagen">Imagenes</label>

                                <script>
                                    function borrar(id){
                                        document.getElementById('contenedor-multimedia-'+id).style = 'display:none';
                                    }
                                </script>

                                @if (count($producto->multimedias))
                                    <div class="row card-columnss talleres my-2">
                                        @foreach ($producto->multimedias as $multimedia)
                                            <div id="contenedor-multimedia-{{$multimedia->id}}" class="col mb-2">
                                                
                                                @livewire('eliminar-multimedia', [$multimedia])
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                @endif

                                <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                                @error('imagen')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- TODO: desarrollar esta parte del formulario para poder editar las variedades de un producto 
                                aun no esta desarrollado en el backend--}}
                            {{-- si el producto no es una variedad de otro producto se le puede agregar una variedad--}}
                            {{-- el if se vera asi: @if($producto->es_variedad_del_producto == null)--}}
                            @if(false)
                            <!-- variantes del producto -->
                                <h4>Agregar una presentacion adicional del producto</h4>
                                <div class="row">
                                    
                                    <!-- Precio unitario -->
                                    <div class="col-4 form-group mb-3">
                                        <label for="precio2">Precio unitario</label>
                                        <input required type="number" class="form-control" id="precio2" name="precio2" placeholder="..." value="{{old('precio2')}}" min="0">
                                        @error('precio2')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- stock -->
                                    <div class="col-4 form-group mb-3">
                                        <label for="stock2">Stock</label>
                                        <input type="number" class="form-control" id="stock2" name="stock2" placeholder="..." value="{{old('stock2')}}" min="0" max="32765">
                                        @error('stock2')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- peso -->
                                    <div class="col-4 form-group mb-3">
                                        <label for="peso_neto2">Peso neto</label>
                                        <input type="number" class="form-control" id="peso_neto2" name="peso_neto2" placeholder="..." value="{{old('peso_neto2')}}" min="0">
                                        @error('peso_neto2')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                            @endif



                                
                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-outline-secondary btn-block btn_editar">Actualizar</button>
                </form>
    
    
                
                <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="alerta-antes-de-eliminar">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
                </form>
                

                {{-- EDITAR CATEGORIAS LIVEWIRE --}}
                <div class="my-5">
                    @livewire('crear-y-editar-categorias', ['categoriaable_id' => $producto->id, 'categoriaable_type' => 'App\Models\Producto'])

                </div>

    
            </div>
        </div>
    
    
    </div>


    <script>
        $(document).ready(function(){
            $('.btn_editar').click(function(){
                
                if(
                    document.getElementById("nombre").value != '' &&
                    document.getElementById("tipo").value != '' &&
                    document.getElementById("descripcion").value != '' &&
                    document.getElementById("precio").value != ''
                ){
    
                    let timerInterval
                    Swal.fire({
                    title: 'Editando',
                    html: 'Por favor espere.',
                    //timer: 10000,
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
        });
    
    </script>




@endsection


