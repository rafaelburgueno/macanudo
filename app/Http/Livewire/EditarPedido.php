<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class EditarPedido extends Component
{

    public $pedido;
    // este metodo es necesario para traer una variable desde el frontend
    public function mount(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }
    


    public function entregado()
    {
        $this->pedido->status = 'entregado';
        $this->pedido->save();
    }

    public function pedido()
    {
        $this->pedido->status = 'pedido';
        $this->pedido->save();
    }



    public function pagado()
    {
        $this->pedido->estado_del_pago = 'pagado';
        $this->pedido->save();
    }

    public function pendiente()
    {
        $this->pedido->estado_del_pago = 'pendiente';
        $this->pedido->save();
    }


    /*public function pagarAlRecibir($id)
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
    } */



    public function render()
    {
        return view('livewire.editar-pedido');
    }


}
