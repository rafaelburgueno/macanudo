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
                                <input type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio', $canasta->precio)}}" min="0">
                                @error('precio')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock', $canasta->stock)}}" min="0">
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

                                <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                                @error('imagen')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                               
                        </div>
                    
                        <div class="col-md-6">
                            
                            @foreach ($lista_completa_de_productos as $producto)
                                <!--input para cada producto-->
                                <div class="form-check my-4">
                                    <input type="checkbox" class="form-check-input" id="productos" name="productos[]" value="{{ $producto->id }}" @checked(old('productos[]', in_array($producto->id, $canasta->arrayProductos()) ))>
                                    <label class="form-check-label" for="activo">{{ $producto->nombre }}</label>
                                </div>
                            @endforeach

                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-outline-secondary btn-block">Actualizar</button>
                </form>
    
    
                
                <form action="{{ route('canastas.destroy', $canasta) }}" method="POST" class="alerta-antes-de-eliminar">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
                </form>
                
    
            </div>
        </div>
    
    
    </div>
    



@endsection


