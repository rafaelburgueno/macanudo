@extends('layouts.plantilla')

@section('title', 'Blog')
@section('meta-description', 'metadescripcion para la pagina Blog')
    
    
@section('content')


<div class="text-center text-white my-4">
    <h1 class="text-center pt-2">BLOG</h1>
</div>


<div class="container">
    <div class="d-flex flex-wrap flex-row">
    
        
        @foreach ($posts as $post)
        <div class="col-md-6">
            <div class="card">
                
                @if (count($post->multimedias))
                    <a href="{{route('blog.show', $post)}}" class="">
                        <img src="{{$post->multimedias->last()->url}}" class="card-img-top" alt="{{ $post->multimedias->last()->descripcion }}">
                    </a>
                @endif

                <div class="card-body pb-2">
                    <a href="{{route('blog.show', $post)}}" class="">
                        <h5 class="card-title titulo">{{$post->titulo}}</h5>
                    </a>
                    
                    @if ($post->descripcion)
                        <p class="card-text">{{$post->descripcion}}</p>
                    @endif
                    
                    <small class="mb-0">Creado el {{ $post->updated_at->format('d/m/Y') }}</small>
                    
                </div>
                
            </div>
        </div>
        @endforeach
    
    
    </div>
</div>






@endsection


