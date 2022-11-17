<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class EditarPedido extends Component
{

    public $pedidoId;
    //public $pedido = null;
    public $respuesta;


    public function pagarAlRecibir()
    {
        $pedido = Pedido::find($this->pedidoId);
        if($pedido->status ==  'sin definir la forma de pago'){
            $pedido->status = 'pagar al recibir';
            $pedido->save();

            $this->dispatchBrowserEvent('forma_de_pago');
        }
    }



    public function render()
    {
        return view('livewire.editar-pedido');
    }


}
