<div>

    <table class="table table-striped table-dark rounded">
        {{--<thead>
            <tr>
                <h5 class="">Nueva lista de productos</h5>
            </tr>
        </thead>--}}
        <tbody>

            @foreach ($categorias_collection as $categoria)
                <tr>
                    <td><p class="m-0 p-0 pt-1">{{ $categoria->nombre }}</p></td>
                    <td>
                        <button type="button" class="m-0 btn btn-sm btn-info" wire:click="vincularDesvincular({{$categoria->id}})"><strong>Vincular / Desvincular</strong></button>
                        <button type="button" class="m-0 btn btn-sm btn-info" wire:click="delete({{$categoria->id}})"><strong>Eliminar categoria</strong></button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
        



        {{--<div class="">
        @foreach ($categorias_collection as $categoria)
            <div class="">
                <p class="">
                    <span class="">{{ $categoria->nombre }}</span>
                    <a href="#" class="btn btn-primary" wire:click="vincularDesvincular({{$categoria->id}})">
                        Vincular / Desvincular
                    </a>
                    <a href="#" class="btn btn-danger" wire:click="delete({{$categoria->id}})">
                        Eliminar categoria
                    </a>
                </p>
            </div>
        @endforeach
    </div>--}}


    <h4>formulario livewire para crear y editar categorias</h4>
    <form wire:submit.prevent="save">
        <div class="form-group my-3">
            <input type="text" class="form-control" wire:model="nombreCategoria" id="nombreCategoria" name="nombreCategoria" placeholder="nombre de la nueva categoria">
            @error('nombreCategoria')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group my-3">
            <input type="text" class="form-control" wire:model="descripcionCategoria" id="descripcionCategoria" name="descripcionCategoria" placeholder="descripcion">
            @error('descripcionCategoria')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-outline-secondary" type="submit">Guardar</button>

        @if (session()->has('exitoNuevaCategoria'))
            <div class="my-3 alert alert-success">
                {{ session('exitoNuevaCategoria') }}
            </div>
        @endif
    </form>

    <div class="my-5">
        <ul>
            @foreach ($categorias_collection as $categoria)
                <li>{{ $categoria->nombre }}| id: {{ $categoria->id }}</li>
            @endforeach
        </ul>
    </div>



    @if (session()->has('exitoCategoriaEliminada'))
        {{--<div class="my-3 alert alert-success">
            {{ session('exitoCategoriaEliminada') }}
        </div>--}}
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
    
            Toast.fire({
            icon: 'success',
            title: '{{session('exitoCategoriaEliminada')}}'
            })
        </script>
    @endif


    @if (session()->has('exitoCategoriaVinculada'))
        {{--<div class="my-3 alert alert-success">
            {{ session('exitoCategoriaEliminada') }}
        </div>--}}
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
    
            Toast.fire({
            icon: 'success',
            title: '{{session('exitoCategoriaVinculada')}}'
            })
        </script>
    @endif



</div>


