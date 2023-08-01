<div>

    <div class="">
        <h5 class="">Borrar cuenta</h5>
        {{--<p class="">Elimina tu cuenta de forma permanente.</p>--}}
        <p class="" style="font-size: 0.9em;">
            Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán de forma permanente. 
            Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.
        </p>
        <p class="" style="font-size: 0.9em;">    
            Ingrese su contraseña para confirmar que desea eliminar su cuenta de forma permanente.
        </p>
        
    </div>

    
    <form wire:submit.prevent="verificar">
        <div class="form-group mb-3">
            <input type="password" class="form-control" wire:model="password" placeholder="Contraseña">
            @error('password') <span class="mx-1 text-danger">{{ $message }}</span> @enderror
        </div>
        {{--<hr class="w-50 mt-4">--}}
        <div class="text-center">
            <button type="submit" class="btn1 btn-danger shadown btn-borrar-cuenta">Borrar cuenta</button>
        </div>
        {!! $respuesta !!}
        
    </form>

</div>
