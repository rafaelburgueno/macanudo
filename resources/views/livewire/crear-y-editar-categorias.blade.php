<div>
    <h4>formulario livewire para crear y editar categorias</h4>
    <form wire:submit.prevent="save">
        <div class="form-group my-3">
            <input type="text" class="form-control" wire:model="nombreCategoria" id="nombreCategoria" name="nombreCategoria" placeholder="nombre de la nueva categoria">
            @error('nombreCategoria')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-outline-secondary" type="submit">Guardar</button>
    </form>

    <div class="my-5">
        <ul>
            @foreach ($categorias as $categoria)
                <li>{{ $categoria->nombre }}</li>
            @endforeach
        </ul>
    </div>

</div>
