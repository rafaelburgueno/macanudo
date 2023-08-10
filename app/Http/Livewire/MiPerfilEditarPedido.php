<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;

class MiPerfilEditarPedido extends Component
{

    public $pedido; // $suscripcion;

    public $status;
    public $departamento;
    public $direccion; // $direccion_de_entrega;
    public $telefono;
    public $cancelar;
    public $btn_confirmar_cancelar;

    public $respuesta = '';


    protected function rules()
    {
        return [
            'direccion' => 'required',
            'telefono' => 'required|min:8',
        ];
    }

    public function mount($pedido)
    {
        $this->pedido = $pedido;
        
        $this->status = $pedido->status;
        $this->departamento = $pedido->departamento;
        $this->direccion = $pedido->direccion;
        $this->telefono = $pedido->telefono;
        if($pedido->status == 'cancelado'){
            $this->cancelar = 'si';
        }else{
            $this->cancelar = 'no';
        }

        $this->btn_confirmar_cancelar = false;

        
    }



    //metodo para guardar cambios
    public function guardar_cambios()
    {
        $this->validate();

        $this->respuesta = '';

        //se busca el pedido en la base de datos
        $pedido_guardado = Pedido::find($this->pedido->id);

        //$pedido_guardado->status = $this->status;
        $pedido_guardado->departamento = $this->departamento;
        $pedido_guardado->direccion = $this->direccion;
        $pedido_guardado->telefono = $this->telefono;
        /*if($this->cancelar == 'si'){
            $pedido_guardado->status = 'cancelado';
        }*/

        $pedido_guardado->save();
        $this->pedido = $pedido_guardado;

        //$this->respuesta = '<div class="mr-3 mt-4 text-success"><strong>Pedido actualizado.</strong></div>';
    
        session()->flash('exito', 'Pedido actualizado exitosamente.');
    }


    // activa el boton para confirmar cancelar el pedido
    public function cancelar_pedido()
    {
        $this->btn_confirmar_cancelar = true;
    }
    
    // desactiva el boton para confirmar cancelar el pedido
    public function cancelar_pedido_cancelado()
    {
        $this->btn_confirmar_cancelar = false;
    }
    
    
    //funcion para cancelar el pedido
    public function cancelar_pedido_confirmado(){
        $this->btn_confirmar_cancelar = false;
        $this->respuesta = '';

        //se busca el pedido en la base de datos
        $pedido_guardado = pedido::find($this->pedido->id);
        $pedido_guardado->status = 'cancelado';
        $pedido_guardado->save();
        $this->pedido = $pedido_guardado;

        //$this->respuesta = '<div class="text-sm text-gray-600 mr-3">Pedido cancelado.</div>';
        
        session()->flash('cancelado', 'Pedido cancelado exitosamente.');
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
