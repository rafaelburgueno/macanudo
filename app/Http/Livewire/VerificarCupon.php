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

        $cupon = Cupon::where('activo', true)->where('cantidad', '>', 0)->where('codigo', $this->codigo)->first();

        if(isset($cupon)){
            $this->respuesta = ' <h6 class="mt-3 mb-0 verde">Se aplicaran los descuentos de tu cupón.</h6>' ;
            $this->descuento = $cupon->descuento;
        }else{
            $this->respuesta = '<h6 class="mt-3 mb-0 rojo">El cupón no existe o esta desactivado.</h6>';
            $this->descuento = 0;
        }
        $this->dispatchBrowserEvent('calcularCupon');

    }

    public function render()
    {
        return view('livewire.verificar-cupon');
    }
}
