<div>

    <div>
        
        {{--<p>Estado del pedido: <strong>{{$pedido->status}}</strong>
            @if($pedido->status != 'entregado')
                <button class="btn btn-verdeC gris btn-sm float-right" wire:click="entregado()">Marcar como entregado</button>   
            @else
                <button class="btn btn-rojo gris btn-sm float-right" wire:click="pedido()">Marcar como pedido</button>
                <script>
                    //document.getElementById('tr-{{$pedido->id}}').style = "background-color: var(--gris);";
                </script> 
            @endif
        </p>--}}
        
        <div class="form-group mb-3">
            <label>Estado del pedido:</label>
            <select class="form-control"  wire:click="cambiarStatus($event.target.value)">
                <option value="pedido" @selected( $pedido->status == "pedido" )>Pedido</option>
                <option value="despachado" @selected( $pedido->status == "despachado" )>Despachado</option>
                <option value="en viaje" @selected( $pedido->status == "en viaje" )>En viaje</option>
                <option value="entregado" @selected( $pedido->status == "entregado" )>Entregado</option>
            </select>
        </div>

    </div>

    <div>
        <div class="form-group mb-3">
            <label>Estado del pago:</label>
            <select class="form-control" wire:click="cambiarEstadoDelPago($event.target.value)">
                <option value="pagado" @selected( $pedido->estado_del_pago == "pagado" )>Pagado</option>
                <option value="pendiente" @selected( $pedido->estado_del_pago == "pendiente" )>Pendiente</option>
            </select>
        </div>

        {{--<p>Estado del pago: <strong>{{$pedido->estado_del_pago}}</strong>
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
        </p>--}}
    </div>

</div>
