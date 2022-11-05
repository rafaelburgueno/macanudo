<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Cupon;

class VerificarCupon extends Component
{

    public $codigo;
    public $respuesta;
    public $descuento = 0;
 
    public function verificarCupon()
    {

        $cupon = Cupon::where('activo', true)->where('codigo', $this->codigo)->first();

        if(isset($cupon)){
            $this->respuesta = 'cupon valido' ;
            $this->descuento = $cupon->descuento;
        }else{
            $this->respuesta = 'cupon no valido';
            $this->descuento = 0;
        }
        $this->dispatchBrowserEvent('calcularCupon');

    }

    public function render()
    {
        return view('livewire.verificar-cupon');
    }
}
