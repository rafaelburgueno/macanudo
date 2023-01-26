<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidosMail;
use App\Mail\PedidoClienteMail;
use Exception;

class WebhooksController extends Controller
{
    

    public function __invoke(Request $request)
    {
        /*
        // Todo el codigo de este metodo debe ir tambien en el metodo invoke del controlador WebhooksController
        //$payment_id = $request->payment_id;
        $payment_id = $request->get('payment_id');
        //$status = $request->get('status');
        //"status":"approved"

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=".env('MP_ACCESS_TOKEN'));


        $response = json_decode($response);

        //dump($response);

        $status = $response->status;

        if($status == 'approved'){
            $pedido->status = 'pedido';
            $pedido->numero_de_factura = $payment_id;
            $pedido->medio_de_pago = 'mercadopago';
            $pedido->estado_del_pago = 'pagado';
            $pedido->save();

            // Envia un email con el pedido
            Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))
            ->queue(new PedidosMail($pedido));
            // Envia un email al cliente con el pedido
            Mail::to($pedido->email)->queue(new PedidoClienteMail($pedido));


            session()->flash('pago_aprovado', 'La compra fue realizada con éxito. Te enviamos un email con la información tu pedido.');
            return redirect() -> route('nuestros_productos');
        }else{
            $pedido->numero_de_factura = $payment_id;
            $pedido->status = 'pedido';
            $pedido->medio_de_pago = 'mercadopago';
            $pedido->estado_del_pago = $status;
            $pedido->save();

            session()->flash('error', 'Algo salio mal, el pago fue rechazado.');
            return redirect() -> route('mi_carrito');
        }

        //return $request->all();
        //return view('pay')->with('pedido', $pedido);
        //return view('pedidos.edit', compact('pedido'));
        */
    }


}
