@extends('layouts.plantilla')

@section('title', 'Editar costo de envío')
@section('meta-description', 'metadescripcion para la pagina de edición de costo de envío')
    
    
@section('content')


<div class="container text-white mt-5">

    <div class="text-center mt-4">
        <h2 id="in" class="text-center pt-2">EDITAR COSTO DE ENVÍO</h2>
    </div>
    
    
    
        <div class="row mb-5">
            <div class="col-md-12 p-3">
    
                <form class="" action="{{route('costos_de_envio.update', $costo_de_envio)}}" method="POST" {{--enctype="multipart/form-data"--}}>
                    @csrf
                    @method('PUT')
    
                    <div class="row">
                        <div class="col col-md-6">
    
                            <!-- input para el region -->
                            <div class="form-group mb-3">
                                <label for="region">Región</label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="..." value="{{old('region', $costo_de_envio->region)}}" maxlength="50">
                                @error('region')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--input para el departamento-->
                            <div class="form-group mb-3">
                                <label for="departamento">Departamento</label>
                                <input type="text" class="form-control" id="departamento" name="departamento" placeholder="..." value="{{old('departamento', $costo_de_envio->departamento)}}" min="0">
                                @error('departamento')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--input para la dia_de_entrega-->
                            <div class="form-group mb-3">
                                <label for="dia_de_entrega">dia_de_entrega</label>
                                <input type="text" class="form-control" id="dia_de_entrega" name="dia_de_entrega" placeholder="..." value="{{old('dia_de_entrega', $costo_de_envio->dia_de_entrega)}}" min="0">
                                @error('dia_de_entrega')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                                
                               
                        </div>
                    
                        <div class="col-md-6">
                            
                            <div class="row">
                                <div class="col col-sm-6">
                                    <!--input para el dias_de_demora-->
                                    <div class="form-group mb-3">
                                        <label for="dias_de_demora">Días_de_demora</label>
                                        <input type="number" class="form-control" id="dias_de_demora" name="dias_de_demora" placeholder="..." value="{{old('dias_de_demora', $costo_de_envio->dias_de_demora)}}" min="0" style="width: 100%;">
                                        @error('dias_de_demora')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <!--input para la hora_de_entrega-->
                                    <div class="form-group mb-3">
                                        <label for="hora_de_entrega">Hora_de_entrega</label>
                                        <input type="text" class="form-control" id="hora_de_entrega" name="hora_de_entrega" placeholder="..." value="{{old('hora_de_entrega', $costo_de_envio->hora_de_entrega)}}" min="0">
                                        @error('hora_de_entrega')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!--input para el costo_de_envio-->
                            <div class="form-group mb-3">
                                <label for="costo_de_envio">Costo de envío ($)</label>
                                <input type="number" class="form-control" id="costo_de_envio" name="costo_de_envio" placeholder="..." value="{{old('costo_de_envio', $costo_de_envio->costo_de_envio)}}" min="0" style="width: 100%;">
                                @error('costo_de_envio')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                                
                            <!--input para checkbox 'publicar'-->
                            <div class="form-check my-4">
                                <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $costo_de_envio->activo))>
                                <label class="form-check-label" for="activo">Activar el costo de envío</label>
                                @error('activo')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-outline-secondary btn-block">Actualizar</button>
                </form>
    
    
                
                <form action="{{ route('costos_de_envio.destroy', $costo_de_envio) }}" method="POST" class="alerta-antes-de-eliminar">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
                </form>
                
    
            </div>
        </div>
    
    
    </div>
    



@endsection


