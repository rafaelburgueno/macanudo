@extends('layouts.plantilla')

@section('title', 'Editar canasta')
@section('meta-description', 'metadescripción para la pagina de edición de canasta')
    
    
@section('content')


<div class="container text-white mt-5">

    <div class="text-center mt-4">
        <h2 id="in" class="text-center pt-2">EDITAR CANASTA</h2>
    </div>
    
        <div class="row mb-5">
            <div class="col-md-12 p-3">
    
                <form class="" action="{{route('canastas.update', $canasta)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                    <div class="row">
                        <div class="col col-md-6">
    
                            <!-- input para el nombre -->
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre', $canasta->nombre)}}" maxlength="50">
                                @error('nombre')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--input para el descripcion-->
                            <div class="form-group mb-3">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="..." value="{{old('descripcion', $canasta->descripcion)}}" min="0">
                                @error('descripcion')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                                
                            <div class="form-group mb-3">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio', $canasta->precio)}}" min="0" style="width: 100%;">
                                @error('precio')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock', $canasta->stock)}}" min="0" style="width: 100%;">
                                @error('stock')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!--input para checkbox 'publicar'-->
                            <div class="form-check my-4">
                                <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $canasta->activo))>
                                <label class="form-check-label" for="activo">Activar el costo de envío</label>
                                @error('activo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="imagen">Imagenes</label>

                                @if (count($canasta->multimedias))
                                    <div class="card-columns talleres py-2">
                                        @foreach ($canasta->multimedias as $imagen)
                                            <div class="mb-2">
                                                <img src="{{$imagen->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <input type="file" class="form-control pt-3 pb-5" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                                @error('imagen')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                               
                        </div>
                    
                        <div class="col-md-6">
                            
                            {{--@foreach ($lista_completa_de_productos as $producto)
                                <!--input para cada producto-->
                                <div class="form-check my-4">
                                    <input type="checkbox" class="form-check-input" id="productos" name="productos[]" value="{{ $producto->id }}" @checked(old('productos[]', in_array($producto->id, $canasta->arrayProductos()) ))>
                                    <label class="form-check-label" for="activo">{{ $producto->nombre }}</label>
                                </div>
                            @endforeach--}}

                            <div class="form-group mb-3 border rounded border-light  p-2">
                                <h4>Lista actual de productos</h4>
                                <hr>
    
                                <ul>
                                    @foreach($canasta->productos as $producto)
                                        {{--<li>{{ $producto->nombre }} x {{ $producto->unidades($pedido->id) }}</li>--}}
                                        <li>{{ $producto->nombre }} x {{ $producto->pivot->unidades }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <table class="table table-striped table-dark rounded">
                                <thead>
                                    <tr>
                                        <h5 class="">Nueva lista de productos</h5>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    @foreach ($lista_completa_de_productos as $producto)
                                        <tr>
                                            <td><p class="m-0 p-0 pt-1">{{ $producto->nombre }}</p></td>
                                            <td><p class="m-0 p-0 pt-1" id="idicador_cantidad_{{ $producto->id }}">0</p></td><!--cantidad-->
                                            <td>
                                                <button type="button" class="m-0 btn btn-sm btn-info" onclick="modificar_cantidad_producto({{ $producto->id }}, true)"><strong>+</strong></button>
                                                <button type="button" class="m-0 btn btn-sm btn-info" onclick="modificar_cantidad_producto({{ $producto->id }}, false)"><strong>-</strong></button>
                                            </td>
                                            <div id="input_producto_{{ $producto->id }}"></div>
                                            <div id="input_cantidad{{ $producto->id }}"></div>
                                            {{--
                                                <input type="hidden" name="productos[]" value="">
                                                <input type="hidden" name="cantidades[]" value="">
                                            --}}
                                        </tr>
                                    @endforeach
    
                                </tbody>
                            </table>

                            <script>

                                function modificar_cantidad_producto(id , operacion){
    
                                    // calcula la cantidad actual 
                                    let cantidad_actual = parseInt(document.getElementById('idicador_cantidad_'+id).innerHTML);
                                    let nueva_cantidad = 0;
                                    if(operacion){
                                        nueva_cantidad = ++cantidad_actual;
                                    }else{
                                        if(cantidad_actual > 0){
                                            nueva_cantidad = --cantidad_actual;
                                        }
                                    }
                                    // modifica el indicador
                                    document.getElementById('idicador_cantidad_'+id).innerHTML = nueva_cantidad
    
                                    // agrega los input para mandar productos[] y cantidades[]
                                    if(cantidad_actual > 0){
                                        document.getElementById('input_producto_'+id).innerHTML = '<input type="hidden" name="productos[]" value="'+id+'"><input type="hidden" name="cantidades[]" value="'+nueva_cantidad+'">'
                                    }else{
                                        document.getElementById('input_producto_'+id).innerHTML = '';
                                    }
                                    
                                }
    
                            </script>

                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-outline-secondary btn-block btn-crear">Actualizar</button>
                </form>
    

                <script>
                    $(document).ready(function(){
                        $('.btn-crear').click(function(){
                            
                            let timerInterval
                            Swal.fire({
                            title: 'Actualizando',
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
                    
                        });
                    });
                    
                    </script>
    
                
                <form action="{{ route('canastas.destroy', $canasta) }}" method="POST" class="alerta-antes-de-eliminar">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
                </form>
                
    
            </div>
        </div>
    
    
    </div>
    



@endsection


