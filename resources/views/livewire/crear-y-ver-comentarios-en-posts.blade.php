<div>
    
    <!-- Lista de Comentarios -->
    
        @foreach($comentarios as $comentario)
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $comentario->nombre }}</h5>
                    <p class="card-text">{{ $comentario->texto }}</p>
                </div>
            </div>
            
        @endforeach

    
    

</div>
