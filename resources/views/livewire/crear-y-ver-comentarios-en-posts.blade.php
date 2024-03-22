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



    
    <!-- Formulario para Comentar -->
        <div class="mt-5 card">
            <div class="card-header">
                <h3 class="card-title text-dark">Deja tu comentario</h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="row">
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

                        <div class="col-md-6 form-group ">
                            <input type="text" class="form-control" wire:model="texto" id="texto" name="texto" placeholder="texto">
                            @error('texto')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
    
                    <button class="btn btn-outline-secondary" type="submit">Comentar</button>
    
                </form>
            </div>
        </div>


    

</div>
