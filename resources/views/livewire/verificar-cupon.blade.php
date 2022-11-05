<div>
    
    <div class="card shadown-gris" style="max-width:460px;">
        <div class="card-header">
            <strong>¿Tenes un cupón de descuento?</strong>
          </div>
        <div class="card-body p-3">
            
            <div class="form-group m-0">
                <input type="text" class="form-control" id="cupon" name="cupon" placeholder="Escribilo acá" wire:model.lazy="codigo">
                <input type="hidden" id="cupon_de_descuento" value="{{ $descuento }}">
                <button class="btn btn-block btn-outline-success my-1" wire:click="verificarCupon">Verificar cupon</button>
                @if($respuesta == 'cupon valido')
                <h6 class="mt-3 mb-0 text-success">Se aplicaran los descuentos de tu cupón.</h6>
                @endif
                @if($respuesta == 'cupon no valido')
                <h6 class="mt-3 mb-0 text-danger">El cupón no existe o esta desactivado.</h6>
                @endif
                {{-- TODO --}}
                {{--@error('cupon')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror--}}
            </div>
        </div>
    </div>

</div>
