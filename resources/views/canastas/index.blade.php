@extends('layouts.plantilla')

@section('title', 'Canastas')
@section('meta-description', 'metadescripción para la pagina de canastas')
    
    
@section('content')

<!-- Tabla de Cupones -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_canastas').DataTable({
			order: [
				[0, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">CANASTAS</h1>
</div>

<div class="container bg-white py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_canastas" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>id</th>
					<th>Nombre</th>
					<th>Descripción</th>
                    <th>Precio</th>
					<th>Stock</th>
					<th>Productos</th>
					<th>Activo?</th>
                    <th>Imagen</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($canastas as $canasta)
					<tr>
                        <td>{{ $canasta->id }}</td>
                        <td>{{ $canasta->nombre }}</td>
                        <td>{{ $canasta->descripcion }} $</td>
                        <td>{{ $canasta->precio }} $</td>
                        <td>{{ $canasta->stock }}</td>
                        <td>
                            <ul>
                                @foreach ($canasta->productos as $producto)
                                <li>{{ $producto->nombre }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
							@if($canasta->activo)
							SI
							@else
							NO
							@endif
						</td>
						
						
                        <td>
                            @if (count($canasta->multimedias))
                                <img src="{{$canasta->multimedias->last()->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                            @else
                                NO    
                            @endif
                        </td>
						<td><a href="{{route('canastas.edit', $canasta)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>

						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR CANASTA</h2>
</div>
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <form class="p-3" action="{{route('canastas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">
                        
                        <!--input para el nombre-->
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre')}}" maxlength="100">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el descripción-->
                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="..." value="{{old('descripcion')}}" maxlength="50">
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el precio-->
                        <div class="form-group mb-3">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio')}}" min="0">
                            @error('precio')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el stock-->
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock')}}" min="0">
                            @error('stock')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para checkbox 'publicar'-->
                        <div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                            <label class="form-check-label" for="activo">Publicar canasta</label>
                            @error('activo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la imagen-->
                        <div class="form-group mb-3">
                            <label for="imagen">Imagen</label>
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
                                <input type="checkbox" class="form-check-input" id="productos" name="productos[]" value="{{ $producto->id }}" @checked(old('productos'))>
                                <label class="form-check-label" for="activo">{{ $producto->nombre }}</label>
                            </div>
                        
                        @endforeach


                        
                        
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Confirmar</button>
            </form>
        </div>
    </div>


</div>


@endsection


