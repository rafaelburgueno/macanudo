<div>

    <div class="m-3">
        
        {{--TODO
            --}}
        <input type="hidden" id="pedidoId" name="pedidoId" wire:model.lazy="pedidoId" value="{{--{{$pedido->id}}--}}">
        <button type="button" class="btn1 btn-gris azul btn-block" onclick="btn_pagar_al_recibir();" wire:click="pagarAlRecibir">Pagar al recibir</button>
        
        {!! $respuesta !!}
    </div>


    <script>

    

    //=============================================================
	// esta funcion se utiliza para redireccionar a la pagina de 
    // productos y resetear el carrito
	//=============================================================
	window.addEventListener('seDefinioPagarAlRecibir', event => {

		alert('Se ejecuta desde el servidor... pagar al recibir ');
		
	});
                 
    

    function btn_pagar_al_recibir(){
        //console.log("click!!!");
        Swal.fire({
            icon: 'success',
            title: 'Exelente!',
            text: 'Deberas pagar al recibir el pedido!',
            /*footer: '<a href="">Why do I have this issue?</a>'*/
        })
    }
        
    </script>


</div>
