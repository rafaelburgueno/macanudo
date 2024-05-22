@extends('layouts.plantilla')

@section('title', 'Editar comentario')
@section('meta-description', 'metadescripcion para la pagina de edición de comentario')
    
    
@section('content')


<div class="container text-white mt-5">

    <div class="text-center mt-4">
        <h2 id="in" class="text-center pt-2">EDITAR COMENTARIO - id:{{$comentario->id}}</h2>
        {{--<p>Id: {{$comentario->id}}</p>--}}
        <h4>Pertenece a {{$comentario->getElementoAlQueApunta()}}</h4>
        {{--<p>comentario->nombre: {{$comentario->nombre}}</p>--}}
    </div>
    
    <div class="row mb-5">
        <div class="col-md-12 p-3">

            {{--@livewire('editar-comentario', ['comentarioId' => $comentario->id])--}}
            
            <form class="" action="{{route('comentarios.update', $comentario)}}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="row">

                    <!-- editar Nombre -->
                    <div class="col-md-6 form-group ">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $comentario->nombre)}}">
                        @error('nombre')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- editar Email -->
                    <div class="col-md-6 form-group ">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $comentario->email)}}">
                        @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- editar Texto -->
                    <div class="col-md-12 form-group ">
                        <label for="texto">Texto</label>
                        <textarea rows="4" class="form-control" id="texto" name="texto">{{ old('texto', $comentario->texto) }}</textarea>
                        @error('texto')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- editar Calificación -->
                    <div class="col-md-6 form-group ">
                        <label for="calificacion">Calificación</label>
                        <input type="number" class="form-control w-100" min="-128" max="127" id="calificacion" name="calificacion" value="{{ old('calificacion', $comentario->calificacion) }}">
                        @error('calificacion')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- editar Activo -->
                    <div class="col-md-6 form-group ">
                        <label for="activo">Activo</label>
                        <input type="checkbox" class="form-control w-100" id="activo" name="activo" {{--value="{{ $activo }}"--}} @checked(old('activo', $comentario->activo))>
                        @error('activo')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-success btn-procesando">Guardar</button>
                
                <!-- boton para volver a la tabla de comentarios -->
                <a href="{{route('comentarios.index')}}" class="btn btn-outline-secondary">Volver al administrador de comentarios</a>
            </form>

            

        </div>
    </div>
    
    </div>
    

    <script>
        $('.btn-procesando').click(function(){
                if( 
                    //el input nombre no puede estar vacio y debe tener mas de 5 caracteres
                    //document.getElementById("nombre").value != '' && 
                    //document.getElementById("nombre").value.length > 5 &&
                    document.getElementById("nombre").validity.valid && 
                    document.getElementById("email").validity.valid &&
                    document.getElementById("texto").validity.valid &&
                    document.getElementById("calificacion").validity.valid
    
                ){
                    let timerInterval
                    Swal.fire({
                    title: 'Procesando',
                    html: 'Por favor espere.',
                    timer: 18000,
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
                }
            });
    </script>


@endsection


