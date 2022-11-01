@extends('layouts.plantilla')

@section('title', 'Crear producto')
@section('meta-description', 'metadescripcion para la pagina de creación de producto')
    
    
@section('content')

<!-- Tabla de Productos -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_productos').DataTable({
			order: [
				[1, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">PRODUCTOS</h1>
</div>

<div class="container bg-white py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_productos" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>id</th>
					<th>Nombre</th>
					<th>Activo?</th>
					<th>Tipo</th>
					{{--<th>Descripción</th>--}}
					<th>Precio</th>
					<th>Stock</th>
					<th>Peso</th>
					{{--<th>Ingredientes</th>--}}
                    {{--<th>Informacion nutricional</th>--}}
                    <th>Fecha</th>
                    <th>Imagen</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($productos as $producto)
					<tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>
							@if($producto->activo)
							SI
							@else
							NO
							@endif
						</td>
						<td>{{ $producto->tipo }}</td>
						{{--<td>{{ $producto->descripcion }}</td>--}}
						<td>${{ $producto->precio }}</td>
						<td>{{ $producto->stock }}</td>
                        <td>{{ $producto->peso_neto }}g</td>
						{{--<td>{{ $producto->ingredientes }}</td>--}}
                        {{--<td>{{ $producto->informacion_nutricional }}</td>--}}
						
						<td>{{ $producto->created_at->format('d/m/Y') }}</td>
                        <td style="background-color: {{$producto->color}};">
                            @if (count($producto->multimedias))
                                <img src="{{$producto->multimedias->last()->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                            @else
                                NO    
                            @endif
                        </td>
						<td style="background-color: {{$producto->color}};"><a href="{{route('productos.edit', $producto)}}" class="btn btn-sm btn-light ">Editar ></a></td>

						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR PRODUCTO</h2>
</div>
    
    
<div class="container text-white">

    <div class="row mb-5 mt-2">
        <div class="col-md-12">

            <form class="p-3" action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">

                        <!--input para el tipo-->
                        <div class="form-group mb-3">
                            <label for="tipo">Tipo</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="horma">Horma</option>
                                <option value="untable">Untable</option>
                            </select>
                            @error('tipo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!--input para el nombre-->
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre')}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        

                         <!--input para el precio-->
                         <div class="form-group mb-3">
                            <label for="precio">Precio unitario</label>
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

                        <!--input para el peso-->
                        <div class="form-group mb-3">
                            <label for="peso_neto">Peso neto</label>
                            <input type="number" class="form-control" id="peso_neto" name="peso_neto" placeholder="..." value="{{old('peso_neto')}}" min="0">
                            @error('peso_neto')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para la descripcion-->
                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea required class="form-control" id="descripcion" name="descripcion" rows="3">{{old('descripcion')}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="color">Color</label>
                            <input type="color" class="form-control" id="color" name="color" value="{{old('color', '#70802c')}}">
                            @error('color')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                
                    <div class="col-md-6">

                        <!--input para las categorias-->
                        {{--<div class="form-group mb-3">
                            <label for="categorias">Categorías (opcional)</label>
                            <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                        </div>--}}

                        

                        <!--input para los ingredientes-->
                        <div class="form-group mb-3">
                            <label for="ingredientes">Ingredientes</label>
                            <textarea required class="form-control" id="ingredientes" name="ingredientes" rows="2">{{old('ingredientes', 'Castañas de cajú, agua, sal, fermento.')}}</textarea>
                            @error('ingredientes')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                       

                        <!--input para la Información nutricional-->
                        <div class="form-group mb-3">
                            <label for="informacion_nutricional">Información nutricional</label>
                            <textarea required class="form-control" id="informacion_nutricional" name="informacion_nutricional" rows="12">{{old('informacion_nutricional', 'Porción 27g - 1/6 unidad. 
Valor energetico: 92,34Kcal/386Kj | 4,1% 
Carbohidratos: 1,9g | 0,6% 
Proteína: 3,7g | 4,9% 
Grasas totales: 7,8g | 14,2% 
Grasas saturadas: 1,5g | 6,8% 
Fibra: 0 | 0 
Sodio: 135mg | 5,6% 
*Valores diarios con base a una dieta de 2500kcal u 8400kj. 
Sus valores diarios pueden ser mayores dependiendo de sus necesidades energeticas.')}}</textarea>
                            @error('informacion_nutricional')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para checkbox 'publicar'-->
                        <div class="form-check my-4">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                            <label class="form-check-label" for="activo">Publicar producto</label>
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
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Confirmar</button>
            </form>
        </div>
    </div>


</div>


@endsection


