@extends('layouts.plantilla')

@section('title', 'Costos de envío')
@section('meta-description', 'metadescripcion para la pagina de costos de envío')
    
    
@section('content')

<!-- Tabla de Cupones -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_costos').DataTable({
			order: [
				[0, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">COSTOS DE ENVÍO</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_costos" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>id</th>
					<th>Región</th>
                    <th>Costo de envío</th>
					<th>Departamento</th>
					<th>Días de demora</th>
					<th>Día de entrega</th>
					<th>Hora de entrega</th>
					<th>Activo?</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($costos_de_envio as $costo)
					<tr>
                        <td>{{ $costo->id }}</td>
                        <td>{{ $costo->region }}</td>
                        <td>{{ $costo->costo_de_envio }} $</td>
                        <td>{{ $costo->departamento }} </td>
                        <td>{{ $costo->dias_de_demora }}</td>
                        <td>{{ $costo->dia_de_entrega }}</td>
                        <td>{{ $costo->hora_de_entrega }}</td>
                        <td>
							@if($costo->activo)
							SI
							@else
							NO
							@endif
						</td>
						
						
                        {{--<td>
                            @if (count($costo->multimedias))
                                <img src="{{$costo->multimedias->last()->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                            @else
                                NO    
                            @endif
                        </td>--}}
						<td><a href="{{route('costos_de_envio.edit', $costo)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>

						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR COSTO DE ENVÍO</h2>
</div>
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <form class="p-3" action="{{route('costos_de_envio.store')}}" method="POST" {{--enctype="multipart/form-data"--}} >
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">
                        
                        <!--input para el region-->
                        <div class="form-group mb-3">
                            <label for="region">Región</label>
                            <input type="text" class="form-control" id="region" name="region" placeholder="..." value="{{old('region')}}" maxlength="100">
                            @error('region')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el departamento-->
                        <div class="form-group mb-3">
                            <label for="departamento">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" placeholder="..." value="{{old('departamento')}}" maxlength="50">
                            @error('departamento')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el dia_de_entrega-->
                        <div class="form-group mb-3">
                            <label for="dia_de_entrega">Día de entrega</label>
                            <input type="text" class="form-control" id="dia_de_entrega" name="dia_de_entrega" placeholder="..." value="{{old('dia_de_entrega')}}" maxlength="50">
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
                                    <label for="dias_de_demora">Días de demora</label>
                                    <input type="number" class="form-control" id="dias_de_demora" name="dias_de_demora" placeholder="..." value="{{old('dias_de_demora')}}" min="0" style="width: 100%;">
                                    @error('dias_de_demora')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <!--input para el hora_de_entrega-->
                                <div class="form-group mb-3">
                                    <label for="hora_de_entrega">Hora de entrega</label>
                                    <input type="text" class="form-control" id="hora_de_entrega" name="hora_de_entrega" placeholder="..." value="{{old('hora_de_entrega')}}" maxlength="20">
                                    @error('hora_de_entrega')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!--input para el costo_de_envio-->
                        <div class="form-group mb-3">
                            <label for="costo_de_envio">Costo de envío ($)</label>
                            <input type="number" class="form-control" id="costo_de_envio" name="costo_de_envio" placeholder="..." value="{{old('costo_de_envio')}}" min="0" style="width: 100%;">
                            @error('costo_de_envio')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!--input para checkbox 'publicar'-->
                        <div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                            <label class="form-check-label" for="activo">Activar el costo de envío</label>
                            @error('activo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Confirmar</button>
            </form>
        </div>
    </div>


</div>


@endsection


