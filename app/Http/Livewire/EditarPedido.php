<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class EditarPedido extends Component
{

    public $pedidoId;
    //public $pedido = null;
    public $respuesta;


    public function pagarAlRecibir($id)
    {

        $pedido = Pedido::find($id);
        //dd($pedido);
        //if($pedido->status ==  'sin definir la forma de pago' || true){
        if(true){
            //$pedido->status = 'pagar al recibir';
            //$pedido->save();

            $this->respuesta = $id;

        }
        $this->dispatchBrowserEvent('seDefinioPagarAlRecibir');
    } 



    public function render()
    {
        return view('livewire.editar-pedido');
    }


}
