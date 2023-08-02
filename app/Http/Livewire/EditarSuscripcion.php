<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Suscripcion;

class EditarSuscripcion extends Component
{

    public $suscripcion;

    public $direccion_de_entrega;
    public $dia_de_entrega;
    //public $tipo;
    public $cantidad_de_quesos;
    public $telefono;
    public $activo;

    public $respuesta = '';
    public $precio;


    public function mount($suscripcion)
    {
        $this->suscripcion = $suscripcion;
        $this->direccion_de_entrega = $suscripcion->direccion_de_entrega;
        $this->dia_de_entrega = $suscripcion->dia_de_entrega;
        //$this->tipo = $suscripcion->tipo;
        $this->cantidad_de_quesos = $suscripcion->cantidad_de_quesos;
        $this->telefono = $suscripcion->telefono;
        $this->activo = $suscripcion->activo;
        $this->precio = $suscripcion->precio;

    }

    //metodo para guardar cambios
    public function guardar_cambios()
    {
        $this->respuesta = '';

        //se busca la suscripcion en la base de datos
        $suscripcion_guardada = Suscripcion::find($this->suscripcion->id);
        $suscripcion_guardada->direccion_de_entrega = $this->direccion_de_entrega;

        $suscripcion_guardada->dia_de_entrega = $this->dia_de_entrega;
        //$suscripcion_guardada->tipo = $this->tipo;
        
        $suscripcion_guardada->cantidad_de_quesos = $this->cantidad_de_quesos;
        //si la cantidad de quesos es 3 el precio de pa suscripcion es 969, si es 5 el precio es 1599
        if($this->cantidad_de_quesos == 3){
            $suscripcion_guardada->precio = 969;
        }else{
            $suscripcion_guardada->precio = 1599;
        }

        $this->precio = $suscripcion_guardada->precio;

        $suscripcion_guardada->telefono = $this->telefono;
        $suscripcion_guardada->save();
        //$this->suscripcion->save();

        //buscamos los pedidos asociados a la suscripcion y actualizamos la direccion de entrega y el telefono
        $pedidos = $suscripcion_guardada->pedidos;
        foreach ($pedidos as $pedido) {
            if($pedido->status == 'pedido'){
                $pedido->direccion = $this->direccion_de_entrega;
                $pedido->telefono = $this->telefono;
                //TODO: consultar: si se cambia la cantidad de quesos, hay que actualizar los productos y el precio del pedido
                $pedido->save();
            }
        }

        //$this->respuesta = '<div class="text-sm text-gray-600 mr-3">Suscripción actualizada.</div>';
        session()->flash('exito', 'Suscripción actualizada exitosamente.');

    }


    //funcion para cancelar la suscripcion
    public function cancelar_suscripcion()
    {
        $this->respuesta = '';

        //se busca la suscripcion en la base de datos
        $suscripcion_guardada = Suscripcion::find($this->suscripcion->id);
        $suscripcion_guardada->activo = 0;
        $suscripcion_guardada->save();
        $this->activo = $suscripcion_guardada->activo;

        //buscamos los pedidos asociados a la suscripcion y los cancelamos
        $pedidos = $suscripcion_guardada->pedidos;
        foreach ($pedidos as $pedido) {
            if($pedido->status == 'pedido'){
                $pedido->status = 'cancelado';
                $pedido->save();
            }
        }

        //$this->respuesta = '<div class="text-sm text-gray-600 mr-3">Suscripción cancelada.</div>';
        session()->flash('cancelada', 'La suscripción fue suspendida.');
    }

    //funcion para reactivar la suscripcion
    public function activar_suscripcion()
    {
        $this->respuesta = '';

        //se busca la suscripcion en la base de datos
        $suscripcion_guardada = Suscripcion::find($this->suscripcion->id);
        $suscripcion_guardada->activo = 1;
        $suscripcion_guardada->save();
        $this->activo = $suscripcion_guardada->activo;

        //buscamos los pedidos asociados a la suscripcion y los reactivamos
        $pedidos = $suscripcion_guardada->pedidos;
        foreach ($pedidos as $pedido) {
            if($pedido->status == 'cancelado'){
                $pedido->status = 'pedido';
                $pedido->save();
            }
        }

        //$this->respuesta = '<div class="text-sm text-gray-600 mr-3">Suscripción reactivada.</div>';
        
        session()->flash('cancelada', 'La suscripción fue reactivada exitosamente.');
    }


    public function render()
    {
        return view('livewire.editar-suscripcion');
    }

}
