<div>

    <div class="m-3">
        
        {{--TODO
            <input type="hidden" id="pagar_al_recibir" name="medio_de_pago" value="{{$pedidoId = $pedido->id}}">--}}
        <button type="button" class="btn1 btn-gris azul btn-block" wire:click="pagarAlRecibir" >Pagar al recibir</button>
        
        {!! $respuesta !!}
    </div>

</div>
