@extends('layouts.plantilla')

@section('title', 'Editar cupón')
@section('meta-description', 'metadescripcion para la pagina de edición de cupón')
    
    
@section('content')


<div class="container text-white mt-5">

    <div class="text-center mt-4">
        <h2 id="in" class="text-center pt-2">Editar cupón</h2>
    </div>
    
    
    
        <div class="row mb-5">
            <div class="col-md-12 p-3">
    
                <form class="" action="{{route('cupones.update', $cupon)}}" method="POST" {{--enctype="multipart/form-data"--}}>
                    @csrf
                    @method('PUT')
    
                    <div class="row">
                        <div class="col col-md-6">
    
                            <!-- input para el código -->
                            <div class="form-group mb-3">
                                <label for="codigo">Código</label>
                                <input required type="text" class="form-control" id="codigo" name="codigo" placeholder="..." value="{{old('codigo', $cupon->codigo)}}" maxlength="50">
                                @error('codigo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col col-sm-6">
                                    <!--input para el cantidad-->
                                    <div class="form-group mb-3">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="..." value="{{old('cantidad', $cupon->cantidad)}}" min="0">
                                        @error('cantidad')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col col-sm-6">
                                    <!--input para el descuento-->
                                    <div class="form-group mb-3">
                                        <label for="descuento">Descuento (%)</label>
                                        <input type="number" class="form-control" id="descuento" name="descuento" placeholder="..." value="{{old('descuento', $cupon->descuento)}}" min="0">
                                        @error('descuento')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!--input para el vencimiento-->
                            <div class="form-group mb-3">
                                <label for="vencimiento">Vencimiento</label>
                                <input type="date" class="form-control" id="vencimiento" name="vencimiento" placeholder="..." value="{{old('vencimiento', $cupon->vencimiento)}}" min="0">
                                @error('vencimiento')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                            
                            
    
                        </div>
                    
                        <div class="col-md-6">
    
                            
                            <!--input para la descripción-->
                            <div class="form-group mb-3">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{old('descripcion', $cupon->descripcion)}}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!--input para checkbox 'publicar'-->
                            <div class="form-check my-4">
                                <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $cupon->activo))>
                                <label class="form-check-label" for="activo">Publicar</label>
                                @error('activo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                                
                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-outline-secondary btn-block">Actualizar</button>
                </form>
    
    
                
                <form action="{{ route('cupones.destroy', $cupon) }}" method="POST" class="alerta-antes-de-eliminar">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
                </form>
                
    
            </div>
        </div>
    
    
    </div>
    



@endsection


