<div>

    <div>
        <p>Estado del pedido: <strong>{{$pedido->status}}</strong>
            @if($pedido->status != 'entregado')
                <button class="btn btn-verdeC gris btn-sm float-right" wire:click="entregado()">Marcar como entregado</button>
            @else
                <button class="btn btn-rojo gris btn-sm float-right" wire:click="pedido()">Marcar como pedido</button>
            @endif
        </p>
    </div>

    <div>
        <p>Estado del pago: <strong>{{$pedido->estado_del_pago}}</strong>
            @if($pedido->estado_del_pago == 'pendiente') {{-- TODO: no funciona bien este IF --}}
                <button class="btn btn-verdeC gris btn-sm float-right" wire:click="pagado()">Marcar como pagado</button>
            @else
                <button class="btn btn-rojo gris btn-sm float-right" wire:click="pendiente()">Marcar como pendiente</button>
            @endif
        </p>
    </div>

</div>
