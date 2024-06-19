<div>
    
    <!-- Lista de Comentarios -->
    
        @foreach($comentarios as $comentario)
            
            <div class="card text-dark mb-1">
                <div class="card-header">
                    <small class="text-info float-left">{{ $comentario->nombre }}</small>
                    <small class="text-muted float-right">{{ $comentario->created_at->format('d/m/Y') }}</small>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $comentario->texto }}</p>
                </div>
                
            </div>
            
        @endforeach



    @if( Auth::check() )
    <!-- Formulario para Comentar -->
        <div class="mt-3 card">
            {{--<div class="card-header">
                <h3 class="card-title text-dark">Deja tu comentario</h3>
            </div>--}}
            <div class="card-body">
                <form wire:submit.prevent="save">
                    {{--<div class="row">
                        <div class="col-md-6 form-group ">
                            <input type="text" class="form-control" wire:model="nombre" id="nombre" name="nombre" placeholder="nombre">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group ">
                            <input type="text" class="form-control" wire:model="email" id="email" name="email" placeholder="email">
                            @error('email')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>--}}

                        <div class="form-group ">
                            <textarea type="text" class="form-control" wire:model="texto" id="texto" name="texto" placeholder="Deja tu comentario"></textarea>
                            @error('texto')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


    
                    <button class="btn btn-outline-success" type="submit">Comentar</button>
    
                </form>
            </div>
        </div>
    @endif

    

</div>
