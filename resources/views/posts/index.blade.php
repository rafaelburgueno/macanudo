@extends('layouts.plantilla')

@section('title', 'Posts')
@section('meta-description', 'metadescripción para la pagina de Posts')
    
    
@section('content')

<!-- Tabla de Posts -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_posts').DataTable({
			order: [
				[0, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">POSTS</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_posts" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>id</th>
					<th>Titulo</th>
					<th>Descripción</th>
					<th>Activo?</th>
                    <th>Imagen</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($posts as $post)
					<tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->titulo }}</td>
                        <td>{{ $post->descripcion }}</td>
                        <td>
							@if($post->activo)
							SI
							@else
							NO
							@endif
						</td>
						
						
                        <td>
                            @if (count($post->multimedias))
                                <img src="{{$post->multimedias->last()->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                            @else
                                NO    
                            @endif
                        </td>
						<td><a href="{{route('posts.edit', $post)}}" class="btn btn-sm btn-outline-secondary ">Editar ></a></td>

						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center text-white mt-5">
    <h2 class="text-center pt-2">CREAR POST</h2>
</div>
    
<!-- Estos estilos son necesarios para que el editor funcione correctamente -->
<style>
    .card{
        opacity: initial;
        background-image:linear-gradient( white, white);
        flex: 1 0;
        margin-top: 0;
        margin-right: 0;
        margin-left: 0;
        border-top-left-radius:  4px;
    }
    
</style>
    
<div class="container">

    <div class="roww mb-5 mt-2">

        <form class="" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group mt-3 mb-2">
                {{--<label for="titulo">Titulo</label>--}}
                <input required type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
                @error('titulo')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                {{--<label for="titulo">Titulo</label>--}}
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" value="{{old('descripcion')}}">
                @error('descripcion')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{--<div class="form-group mb-3">
                <label for="categorias">categorias (opcional)</label>
                <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                @error('categorias')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>--}}
            
            <div class="mb-2 text-darkk">
                <textarea required class="" name="texto" id="summernote">{{old('texto')}}</textarea>
            </div>
            @error('texto')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
                <label class="text-white" for="imagen">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                @error('imagen')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                {{--<div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info'))>
                    <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del post?</label>
                </div>--}}
            </div>

            <div class="form-check my-3">
                <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                <label class="form-check-label text-white" for="activo">Publicar post</label>
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Guardar</button>

        </form>
        
    </div>


</div>

<script>
    $('#summernote').summernote({
      //placeholder: '...',
      tabsize: 2,
      height: 300
    });
  </script>

@endsection


