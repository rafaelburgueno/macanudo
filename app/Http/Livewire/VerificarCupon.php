<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Cupon;

use Carbon\Carbon;

class VerificarCupon extends Component
{

    public $codigo;
    public $respuesta;
    public $descuento = 0;
 
    public function verificarCupon()
    {

        //$cupon = Cupon::where('activo', true)->where('cantidad', '>', 0)->where('codigo', $this->codigo)->whereDate('vencimiento', '>=', date('Y-m-d'))->first();
        $cupon = Cupon::where('activo', true)->where('cantidad', '>', 0)->where('codigo', $this->codigo)->first();


        if(isset($cupon)){

            $fecha_de_hoy = Carbon::parse(date('Y-m-d'));
            $fecha_de_vencimiento = Carbon::parse($cupon->vencimiento);

            if( $fecha_de_hoy->greaterThan($fecha_de_vencimiento)){
                $this->respuesta = '<h6 class="mt-3 mb-0 rojo">El cupón ya no es válido.</h6>';
                $this->descuento = 0;
            }else{
                $this->respuesta = ' <h6 class="mt-3 mb-0 verde">Se aplicaran los descuentos de tu cupón.</h6>' ;
                $this->descuento = $cupon->descuento;
            }

        }else{
            $this->respuesta = '<h6 class="mt-3 mb-0 rojo">El cupón no existe.</h6>';
            $this->descuento = 0;
        }
        $this->dispatchBrowserEvent('calcularCupon');

    }

    public function render()
    {
        return view('livewire.verificar-cupon');
    }
}
