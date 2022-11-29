<div>

    <div>
        <p>Estado del pedido: <strong>{{$pedido->status}}</strong>
            @if($pedido->status != 'entregado')
                <button class="btn btn-verdeC gris btn-sm float-right" wire:click="entregado()">Marcar como entregado</button>   
            @else
                <button class="btn btn-rojo gris btn-sm float-right" wire:click="pedido()">Marcar como pedido</button>
                <script>
                    //document.getElementById('tr-{{$pedido->id}}').style = "background-color: var(--gris);";
                </script> 
            @endif
        </p>
    </div>

    <div>
        <p>Estado del pago: <strong>{{$pedido->estado_del_pago}}</strong>
            @if($pedido->estado_del_pago == 'pendiente')
                <button class="btn btn-verdeC gris btn-sm float-right" wire:click="pagado()">Marcar como pagado</button>
                <script>
                    //ocument.getElementById('tr-{{$pedido->id}}').style = "background-color: #ffd4db;";
                </script>
            @else
            <button class="btn btn-rojo gris btn-sm float-right" wire:click="pendiente()">Marcar como pendiente</button>
                <script>
                    //document.getElementById('tr-{{$pedido->id}}').style = "background-color: #beffbe;";
                </script>
            @endif
        </p>
    </div>

</div>
