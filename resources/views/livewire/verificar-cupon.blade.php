<div class="mb-5">
    
    <div class="card shadown-gris mx-auto">
        <div class="card-header">
            <strong id="btn-desplegar-cupon">¿Tenes un cupón de descuento?</strong>
          </div>
        <div class="card-body p-3" id="input-cupon-desplegable">
            
            <div class="form-group m-0" >
                <input type="text" class="form-control" id="cupon" name="cupon" placeholder="Escribilo acá" wire:model.lazy="codigo">
                <input type="hidden" id="cupon_de_descuento" value="{{ $descuento }}">
                <button class="btn btn-block btn-verdeC gris my-2" wire:click="verificarCupon">Verificar cupon</button>
                {!! $respuesta !!}

            </div>
        </div>
    </div>

</div>
