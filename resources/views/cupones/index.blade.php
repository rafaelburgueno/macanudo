@extends('layouts.plantilla')

@section('title', 'Cupones')
@section('meta-description', 'metadescripcion para la pagina de cupones')
    
    
@section('content')

<!-- Tabla de Cupones -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_cupones').DataTable({
			order: [
				[0, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">CUPONES</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_cupones" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>id</th>
					<th>Código</th>
					<th>Descuento</th>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Creación</th>
                    <th>Vencimiento</th>
					<th>Activo?</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($cupones as $cupon)
					<tr>
                        <td>{{ $cupon->id }}</td>
                        <td>{{ $cupon->codigo }}</td>
                        <td>{{ $cupon->descuento }} %</td>
                        <td>{{ $cupon->descripcion }}</td>
                        <td>{{ $cupon->cantidad }}</td>
                        <td>{{ $cupon->created_at->format('Y-m-d') }}</td>
                        <td>{{ $cupon->vencimiento }}</td>
                        <td>
							@if($cupon->activo)
							SI
							@else
							NO
							@endif
						</td>
						
						
                        {{--<td>
                            @if (count($cupon->multimedias))
                                <img src="{{$cupon->multimedias->last()->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                            @else
                                NO    
                            @endif
                        </td>--}}
						<td><a href="{{route('cupones.edit', $cupon)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>

						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR CUPÓN</h2>
</div>
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <form class="p-3" action="{{route('cupones.store')}}" method="POST" {{--enctype="multipart/form-data"--}} >
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">
                        
                        <!--input para el codigo-->
                        <div class="form-group mb-3">
                            <label for="codigo">Código</label>
                            <input required type="text" class="form-control" id="codigo" name="codigo" placeholder="..." value="{{old('codigo')}}" maxlength="50">
                            @error('codigo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col col-sm-6">
                                <!--input para el cantidad-->
                                <div class="form-group mb-3">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="..." value="{{old('cantidad')}}" min="0" style="width: 100%;">
                                    @error('cantidad')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col col-sm-6">
                                <!--input para el descuento-->
                                <div class="form-group mb-3">
                                    <label for="descuento">Descuento (%)</label>
                                    <input type="number" class="form-control" id="descuento" name="descuento" placeholder="..." value="{{old('descuento')}}" min="0" max="100" style="width: 100%;">
                                    @error('descuento')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--input para el vencimiento-->
                        <div class="form-group mb-3">
                            <label for="vencimiento">Vencimiento</label>
                            <input type="date" class="form-control" id="vencimiento" name="vencimiento" value="{{old('vencimiento')}}">
                            @error('vencimiento')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                
                    <div class="col-md-6">
                        
                        <!--input para la descripción-->
                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{old('descripcion')}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!--input para checkbox 'publicar'-->
                        <div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                            <label class="form-check-label" for="activo">Activar el cupón</label>
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


