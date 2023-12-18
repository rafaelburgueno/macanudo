@extends('layouts.plantilla')

@section('title', 'Editar post')
@section('meta-description', 'metadescripción para la pagina de edición de post')
    
    
@section('content')


<div class="container mt-5">

    <div class="text-center text-white mt-4 mb-4">
        <h2 id="in" class="text-center pt-2">EDITAR POST</h2>
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
        }
        
    </style>
    
    <div class="mb-5">

        <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group my-3 mx-1">
                {{--<label for="titulo">Titulo</label>--}}
                <input required type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo', $post->titulo)}}">
                @error('titulo')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-3 mx-1">
                {{--<label for="titulo">Titulo</label>--}}
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" value="{{old('descripcion', $post->descripcion)}}">
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
            


            <div class="mb-2 ">
                <textarea required class="" name="texto" id="summernote">{{old('texto', $post->texto)}}</textarea>
            </div>
            @error('texto')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror


            <div class="form-group my-5">
                <label class="text-white" for="imagen">Imagen</label>
                
                @if (count($post->multimedias))
                    <div class="card-columns talleres py-1">
                        @foreach ($post->multimedias as $imagen)
                            <div class="mb-2">
                                <img src="{{$imagen->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                            </div>
                        @endforeach
                    </div>
                @endif

                <input type="file" class="form-control p-1" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                @error('imagen')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                {{--<div class="form-check mb-2">
                    @if (count($post->multimedias))
                        <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info', $post->multimedias->last()->imagen_con_info))>
                    @else
                        <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info'))>
                    @endif
                    <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del post?</label>
                </div>--}}
            </div>

            <div class="form-check my-5">
                <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $post->activo))>
                <label class="form-check-label text-white" for="activo">Publicar post</label>
            </div>

            <button type="submit" class="btn btn-outline-secondary btn-block">Actualizar</button>
            
        </form>

        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="alerta-antes-de-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger my-3">Eliminar Post</button>
        </form>
            


        {{-- EDITAR CATEGORIAS LIVEWIRE --}}
        <div class="my-5">
            @livewire('crear-y-editar-categorias', ['categoriaable_id' => $post->id, 'categoriaable_type' => 'App\Models\Post'])

        </div>
                        
        
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


