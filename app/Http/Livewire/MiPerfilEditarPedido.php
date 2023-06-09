<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class MiPerfilEditarPedido extends Component
{

    public $pedido; // $suscripcion;

    public $status;
    public $direccion; // $direccion_de_entrega;
    public $telefono;
    public $cancelar;

    public $respuesta = '';



    public function mount($pedido)
    {
        $this->pedido = $pedido;
        
        $this->status = $pedido->status;
        $this->direccion = $pedido->direccion;
        $this->telefono = $pedido->telefono;
        if($pedido->status == 'cancelado'){
            $this->cancelar = 'si';
        }else{
            $this->cancelar = 'no';
        }

        
    }



    //metodo para guardar cambios
    public function guardar_cambios()
    {
        $this->respuesta = '';

        //se busca el pedido en la base de datos
        $pedido_guardado = Pedido::find($this->pedido->id);

        //$pedido_guardado->status = $this->status;
        $pedido_guardado->direccion = $this->direccion;
        $pedido_guardado->telefono = $this->telefono;
        if($this->cancelar == 'si'){
            $pedido_guardado->status = 'cancelado';
        }

        $pedido_guardado->save();
        $this->pedido = $pedido_guardado;

        $this->respuesta = '<div class="text-sm text-gray-600 mr-3"><strong>Pedido actualizado.</strong></div>';
    }


    //funcion para cancelar el pedido
    public function cancelar_pedido()
    {
        $this->respuesta = '';

        //se busca el pedido en la base de datos
        $pedido_guardado = pedido::find($this->pedido->id);
        $pedido_guardado->status = 'cancelado';
        $pedido_guardado->save();
        $this->pedido = $pedido_guardado;

        $this->respuesta = '<div class="text-sm text-gray-600 mr-3">Pedido cancelado.</div>';

    }



    //funcion para reactivar el pedido
    public function activar_pedido()
    {
        $this->respuesta = '';

        //se busca el pedido en la base de datos
        $pedido_guardado = Pedido::find($this->pedido->id);
        $pedido_guardado->status = 'pedido';
        $pedido_guardado->save();
        $this->pedido = $pedido_guardado;

        $this->respuesta = '<div class="text-sm text-gray-600 mr-3">Pedido reactivado.</div>';

    }




    public function render()
    {
        return view('livewire.mi-perfil-editar-pedido');
    }
}
