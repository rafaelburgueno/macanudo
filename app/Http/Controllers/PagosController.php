<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidosMail;
use App\Mail\PedidoClienteMail;
use Exception;

class PagosController extends Controller
{

    /**
     * esta ruta verifica el estatus del pedido y nos lleva a la vista con las opciones de pago
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function realizarPago(Pedido $pedido)
    {

        // TODO: verificar el tiempo que paso desde que se inicio la compra
        // como medida de seguridad para no poder modificar un pedido despues de pasado cierto tiempo
        if($pedido->medio_de_pago ==  'sin definir'){
            return view('realizar_pago')->with('pedido', $pedido);
        }else{
            session()->flash('error', 'Ya se ha definido una forma de pago para el pedido.');
            return redirect() -> route('mi_carrito');
        }
            
        //return view('pedidos.edit', compact('pedido'));
    }




    /**
     * por aca se gestionan los pedidos definidos con status 'pagar al recibir'
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function pagar_al_recibir(Pedido $pedido)
    {

        //dd($pedido->id);

        if($pedido->medio_de_pago ==  'sin definir' ){
            $pedido->status = 'pedido';
            $pedido->medio_de_pago =  'pagar al recibir';
            $pedido->estado_del_pago =  'pendiente';
            $pedido->numero_de_factura = rand();
            $pedido->save();
            //dd($pedido->status);

            
            // Envia un email con el pedido
            Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))
            ->queue(new PedidosMail($pedido));

            try {
                // Envia un email al cliente con el pedido // TODO:un try catch por si falla el envio de email
                Mail::to($pedido->email)->queue(new PedidoClienteMail($pedido));
            } catch (Exception $e) {
                $error = $e->getMessage();
                //session()->flash('error', 'Ha ocurrido un error con la dirección de email suministrada.');
                session()->flash('error', 'Ha ocurrido un error: '. $error);
                return redirect() -> route('mi_carrito');
            }

            


            session()->flash('pagar_al_recibir', 'Gracias. Debera pagar su pedido al momento de recibirlo.');
            return redirect() -> route('nuestros_productos');
        
        
        }else{
            //dd($pedido->status);
            session()->flash('error', 'Ya se ha definido una forma de pago.');
            return redirect() -> route('mi_carrito');
        }


        // TODO: verificar el tiempo que paso desde que se inicio la compra
        // como medida de seguridad para no poder modificar un pedido despues de pasado cierto tiempo
        /*if($pedido->status ==  'sin definir la forma de pago'){
            return view('realizar_pago')->with('pedido', $pedido);
        }*/
            
        //return view('pedidos.edit', compact('pedido'));
    }




    /**
     * luego del formulario de mercado pago se terminan de completar los datos en nuestra plataforma
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function mercadopago(Request $request, Pedido $pedido)
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

        $pedido->estado_del_pago = $status;
        $pedido->numero_de_factura = $payment_id;
        $pedido->medio_de_pago = 'mercadopago';
        $pedido->save();

        if($status == 'approved'){

            $pedido->status = 'pedido';
            //$pedido->numero_de_factura = $payment_id;
            //$pedido->medio_de_pago = 'mercadopago';
            $pedido->estado_del_pago = 'pagado';
            $pedido->save();

            // Envia un email con el pedido
            Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))
            ->queue(new PedidosMail($pedido));
            // Envia un email al cliente con el pedido
            Mail::to($pedido->email)->queue(new PedidoClienteMail($pedido));

            session()->flash('pago_aprovado', 'La compra fue realizada con éxito. Te enviamos un email con la información tu pedido.');
            return redirect() -> route('nuestros_productos');

        }elseif($status == 'pending'){
            $pedido->status = 'pedido';
            //$pedido->numero_de_factura = $payment_id;
            //$pedido->medio_de_pago = 'mercadopago';
            $pedido->estado_del_pago = 'pendiente';
            $pedido->save();

            // Envia un email con el pedido
            /*Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))
            ->queue(new PedidosMail($pedido));
            // Envia un email al cliente con el pedido
            Mail::to($pedido->email)->queue(new PedidoClienteMail($pedido));*/

            session()->flash('pago_aprovado', 'La compra fue realizada con éxito, solo falta que realices el pago. Te enviamos un email con la información tu pedido.');
            return redirect() -> route('nuestros_productos');
        
        }else{
            // hay un error por 'valor fuera de rango' para la columna 'numero_de_factura' = 53 978 965 097
            // TODO aunque el pedido este pendiente deberia enviarse un email
            //$pedido->numero_de_factura = $payment_id;
            $pedido->status = 'pedido';
            //$pedido->medio_de_pago = 'mercadopago';
            $pedido->estado_del_pago = $status;
            $pedido->save();

            session()->flash('error', 'Algo salio mal, el pago fue rechazado.');
            return redirect() -> route('mi_carrito');

        }

        //return $request->all();
        //return view('pay')->with('pedido', $pedido);
        //return view('pedidos.edit', compact('pedido'));
    }






    /**
     * Accion del usuario que elimina el pedido creado antes de definir el medio de pago.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function eliminar_mi_pedido(Pedido $pedido)
    {
        if($pedido->status == 'verificado' and $pedido->medio_de_pago == 'sin definir'){
            $pedido->delete();
            session()->flash('exito', 'El pedido fue cancelado.');
        }
        
        return redirect() -> route('mi_carrito');
    }


}
