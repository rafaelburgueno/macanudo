<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pedido;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidosMail;
use App\Mail\PedidoClienteMail;
use App\Mail\EmailDeControl;

class EditarPedido extends Component
{

    public $pedido;
    public $estado_del_pago = 'incierto';
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




    // metodo que maneja el input type select del status
    public function cambiarStatus($value)
    {
        $this->pedido->status = $value;
        $this->pedido->save();
    }

    // metodo que maneja el input type select del estado_del_pago
    public function cambiarEstadoDelPago($value)
    {
        $this->pedido->estado_del_pago = $value;
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


    public function revisarEstadoDelPago(){
        
        if($this->pedido->medio_de_pago == 'mercadopago'){

            $this->estado_del_pago = '...';
            
            $payment_id = $this->pedido->numero_de_factura;

            $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=".env('MP_ACCESS_TOKEN'));
            $response = json_decode($response);
            Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($response));
            $status = $response->status;
            
            $this->estado_del_pago = $status;
            
            
            /*$this->pedido->estado_del_pago = $status;
            $this->pedido->save();*/
            

            if($status == 'approved'){

                //$this->pedido->status = 'pedido';
                //$this->pedido->numero_de_factura = $payment_id;
                //$this->pedido->medio_de_pago = 'mercadopago';
                $this->pedido->estado_del_pago = 'pagado';
                $this->pedido->save();
    
                // Envia un email con el pedido
                Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))
                ->queue(new PedidosMail($this->pedido));
                // Envia un email al cliente con el pedido
                Mail::to($this->pedido->email)->queue(new PedidoClienteMail($this->pedido));
    
    
            }


        }

        
    }


    public function render()
    {
        return view('livewire.editar-pedido');
    }


}
