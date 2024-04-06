@extends('layouts.plantilla')

@section('title', 'Comentarios')
@section('meta-description', 'metadescripcion para la pagina de comentarios')
    
    
@section('content')

<!-- Tabla de Comentarios -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
<script>
	$(document).ready( function () {
		$('#tabla_comentarios').DataTable({
			order: [
				[0, 'asc']
			]
		});
	} );
</script>


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">COMENTARIOS</h1>
</div>

<div class="container bg-white text-dark py-2 rounded">

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="tabla_comentarios" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					<th>id</th>
					<th>Nombre</th>
                    <th>Email</th>
					<th>Texto</th>
					<th>Pertenece a...</th>
					<th>Calificación</th>
					<th>Activo?</th>
					<th>Creación</th>
				</tr>
			</thead>
			<tbody>
			
				@foreach ($comentarios as $comentario)
					<tr>
						@livewire('editar-comentario', ['comentario' => $comentario])
                        {{--<td>{{ $comentario->id }}</td>
                        <td><small>{{ $comentario->nombre }}</small></td>
                        <td><small>{{ $comentario->email }}</small></td>
                        <td><small>{{ Str::limit($comentario->texto, 30, '...') }}</small> </td>
                        <td><small>{{ $comentario->getElementoAlQueApunta()}}</small></td>
                        <td>{{ $comentario->calificacion }}</td>
                        <td>
							@if($comentario->activo)
							SI
							@else
							NO
							@endif
						</td>
                        <td><small>{{ $comentario->created_at }}</small></td>--}}
						
						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>



@endsection


