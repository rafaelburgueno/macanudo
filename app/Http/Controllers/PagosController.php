<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use Illuminate\Support\Facades\Http;

class PagosController extends Controller
{
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, Pedido $pedido)
    {
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
            $pedido->status = 'pago recibido';
            $pedido->save();

            session()->flash('exito', 'La compra fue PAGADA con exito. En breve recibira nuestra visita.');
            return redirect() -> route('nuestros_productos');
        }else{
            session()->flash('error', 'Algo salio mal, el pago fue rechazado. Por favor comuniquese con nosotros');
            return redirect() -> route('mi_carrito');
        }

        //return $request->all();
        //return view('pay')->with('pedido', $pedido);
        //return view('pedidos.edit', compact('pedido'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function realizarPago(Pedido $pedido)
    {

        // TODO: verificar el tiempo que paso desde que se inicio la compra
        // como medida de seguridad para no poder modificar un pedido despues de pasado cierto tiempo
        if($pedido->status ==  'sin definir la forma de pago'){
            return view('realizar_pago')->with('pedido', $pedido);
        }else{
            session()->flash('error', 'Ya se ha definido una forma de pago.');
            return redirect() -> route('mi_carrito');
        }
            
        //return view('pedidos.edit', compact('pedido'));
    }




}
