<div>

    <div class="mt-5 card">
        <div class="card-header">
            <h3 class="card-title text-dark">Administrar categorias</h3>
            <p class="text-dark">
                @if(count($categoriasVinculadas))
                    @foreach ($categoriasVinculadas as $categoria)
                        <span class="badge badge-pill badge-info">{{ $categoria->nombre }} <i class="bi bi-tag"></i></span>
                    @endforeach
                @else
                    <span class="">No hay categorias vinculadas</span>
                @endif
            </p>
        </div>
        <div class="card-body p-0 ">
            <table class="table table-striped table-lightt roundedd mb-0">
                @foreach ($categorias_collection as $categoria)
                    <tr>
                        <td><div class="m-0 p-0 text-center">{{ $categoria->nombre }}</div></td>
                        <td>
                            <div class="m-0 p-0 text-center">
                                <button type="button" class="m-0 btn btn-sm btn-info" wire:click="vincularDesvincular({{$categoria->id}})">
                                    @if ($categoria->estaVinculada($categoriaable_id, $categoriaable_type))
                                        <strong>Desvincular</strong>  
                                    @else
                                        <strong>Vincular</strong>
                                    @endif
                                </button>
                            </div>
                        </td>
                        
                        <td> 
                            <div class="m-0 p-0 text-center">
                                <button type="button" class="m-0 btn btn-sm btn-danger" wire:click="delete({{$categoria->id}})"><strong>Eliminar categoria</strong></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
        




    <div class="mt-5 card">
        <div class="card-header">
            <h3 class="card-title text-dark">Nueva categoria</h3>
            
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-md-6 form-group ">
                        <input type="text" class="form-control" wire:model="nombreCategoria" id="nombreCategoria" name="nombreCategoria" placeholder="nombre">
                        @error('nombreCategoria')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group ">
                        <input type="text" class="form-control" wire:model="descripcionCategoria" id="descripcionCategoria" name="descripcionCategoria" placeholder="descripcion (opcional)">
                        @error('descripcionCategoria')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-outline-secondary" type="submit">Guardar</button>

            </form>
        </div>
    </div>



</div>


