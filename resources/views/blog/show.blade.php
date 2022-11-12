@extends('layouts.plantilla')

@section('title', 'Blog | {{ $post->titulo }}')
@section('meta-description', '{{ $post->titulo }}')


@section('content')

<script>
    $(document).ready(function(){
      
        //esto agrega un div con la clase que corrije el problema de responsividad de los video
        $( "iframe" ).wrap( "<div class='col-sm video-responsive'></div>" );

    });
</script>


<div class="text-center my-4 text-white">
    <h1 id="in" class="text-center pt-2">{{ $post->titulo }}</h1>
    @if($post->descripcion)
        <p>{{ $post->descripcion }}</p>
    @endif
</div>


<div class="container">
    <div class="mb-5">

        <div class="card mt-3">

            <div class="card-body">
                {!! $post->texto !!}
            </div>
            
            <div class="card-footer">
                <small class="text-dark">Creado el {{ $post->created_at->format('d/m/Y') }}</small>
                    
                @if(count($post->categorias))
                    <p><span class="badge">{{ $post->categorias }}</span></p>
                @endif
                
            </div>
            
        </div>
        
    </div>
</div>


@endsection