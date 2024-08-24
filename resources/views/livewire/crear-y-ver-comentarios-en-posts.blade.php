<div>
    
    <!-- Lista de Comentarios -->
    
        @foreach($comentarios as $comentario)
            
            <div class="card text-dark mb-1">
                <div class="card-header">

                    <small class="text-info float-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-circle mr-3" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>{{ $comentario->nombre }}
                    </small>
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
